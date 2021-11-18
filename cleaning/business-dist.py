from pyspark.sql import SparkSession
from math import radians, cos, sin, asin, sqrt
import pyspark.sql.types as T
import json, pandas as pd
import pyspark.sql.functions as F

spark = SparkSession.builder.appName('geolocsort').getOrCreate()
data_file = open('hi.json')
data = []
for line in data_file:
    data.append(json.loads(line))
dataMain = pd.DataFrame(data)
dataMain = dataMain[['name', 'state', 'city', 'business_id', 'latitude', 'longitude']]
dataMain['combined'] = dataMain[['business_id', 'latitude', 'longitude']].values.tolist()
combinedMain = dataMain.groupby(['state'])['combined'].apply(list).reset_index(name = 'combined')
main_df = spark.createDataFrame(dataMain)

def filter_near_business(lat1, lon1, state):
    result = []
    lat1, lon1 = map(radians, [float(lat1), float(lon1)])
    for y in combinedMain[combinedMain['state'] == state]['combined'].iloc[0]:
        bus = y[0]
        lat2 = float(y[1])
        lon2 = float(y[2])

        # convert decimal degrees to radians
        lat2, lon2 = map(radians, [lat2, lon2])

        # haversine formula
        dlat = lat2 - lat1
        dlon = lon2 - lon1
        a = sin(dlat / 2) ** 2 + cos(lat1) * cos(lat2) * sin(dlon / 2) ** 2
        c = 2 * asin(sqrt(a))
        r = 6371  # Radius of earth in kilometers. Use 3956 for miles
        d = c * r
        if d != 0 and d < 1:
            result.append(bus)
    return result

filter_near_business_udf = F.udf(filter_near_business, T.ArrayType(T.StringType()))

main_df = main_df.withColumn('nearby', filter_near_business_udf(main_df['latitude'], main_df['longitude'], main_df['state'])).select('business_id', 'nearby')
main_df = main_df.withColumn('nearby_business_id', F.explode(main_df['nearby']))
main_df.toPandas().to_csv('nearby_businesses.csv', index=False)

businesses = main_df.select('business_id', 'name', 'state', 'city', 'latitude', 'longitude');
businesses.toPandas().to_csv('businesses.csv', index = False);
