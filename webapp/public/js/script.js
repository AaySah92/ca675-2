function prepareData() {
    business_data.loc = formatLoc(business_data);
}

function addMarker(options) {
    options.loc = formatLoc(options);
    new google.maps.Marker({
        position: options.loc ,
        label: String(options.name),
        map: map,
    });
}

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: business_data.loc,
        zoom: 18,
    });

    new google.maps.Marker({
        position: business_data.loc ,
        label: 'A',
        map: map,
    });

    for (let value of map_data) {
        addMarker(value);
        points.push(business_data.loc);
        points.push(value.loc);
    }

    const shape = new google.maps.Polygon({
        paths: points,
        strokeColor: "#FF0000",
        strokeOpacity: 0.8,
        strokeWeight: 3,
        fillColor: "#FF0000",
        fillOpacity: 0.35,
    });

    shape.setMap(map);
}

function initChart() {
    let days = ['7_days', '14_days', '30_days', '60_days', '90_days'];

    Highcharts.chart('container', {
        chart: {
            type: 'bar',
            style: {"height": "500px", "width": "100%"},
        },
        title: {
            text: 'Business check-ins within 5kms'
        },
        subtitle: {
            text: 'Source: <a href="https://www.kaggle.com/yelp-dataset/yelp-dataset/version/3">Yelp Dataset | Kaggle</a>'
        },
        xAxis: {
            categories: days,
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Check-in Count',
                // align: 'high'
            },
            labels: {
                overflow: 'justify'
            },
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        credits: {
            enabled: false
        },
        series: chart_data
    });
}

function init() {
    prepareData();
    initMap();
    initChart();
}

function formatLoc(obj) {
    return {
        lat: parseFloat(obj.loc.lat),
        lng: parseFloat(obj.loc.lng),
    };
}

$(document).ready(function() {
    init();
});
