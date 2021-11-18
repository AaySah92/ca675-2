import pandas as pd

import pyspark
from pyspark.sql import SparkSession, types as T
from pyspark.sql.functions import split, array_max, max, expr, size

from datetime import timedelta

data_file = open("/home/asahay/Downloads/yelp_academic_dataset_checkin.json")
data = []
for line in data_file:
    data.append(eval(line))
checkin_df = pd.DataFrame(data[:10])
data_file.close()

spark = SparkSession.builder

spark = SparkSession.builder.appName('Practice').getOrCreate()

df_pyspark = spark.createDataFrame(data)

df_pyspark = df_pyspark.withColumn('date_array', split(df_pyspark['date'], ', ').cast(T.ArrayType(T.DateType())))

df_pyspark = df_pyspark.drop('date')

df_pyspark = df_pyspark.withColumn('max_date', array_max(df_pyspark['date_array']))

max_date = df_pyspark.agg(max('max_date').alias('last_updated_date')).first()[0]

differences = [7, 14, 30, 60, 90]

past_days = {}

for diff in differences:
    key = 'past_' + str(diff) + '_day'
    value = max_date - timedelta(days = diff)
    past_days[key] = value
    
for past_day_key, past_day in past_days.items():
    df_pyspark = df_pyspark.withColumn(past_day_key + '_count', size(expr('filter(date_array, x -> x >= \'' + past_day.strftime('%Y-%m-%d') + '\')')))

unpivot_expr = "stack(5, \
	'7_days', past_7_day_count, \
	'14_days', past_14_day_count, \
	'30_days', past_30_day_count, \
	'60_days', past_60_day_count, \
	'90_days', past_90_day_count \
) as (Type,Count)"

df_export = df_pyspark.select("business_id", expr(unpivot_expr))

df_export.toPandas().to_csv('/home/asahay/Documents/DCU/CA675/burp/checkin.csv', index = False)

