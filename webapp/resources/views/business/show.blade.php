<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    let map;
    let points=[];

    let business_data = <?php echo json_encode($business_data)?>;
    let map_data = <?php echo json_encode($map_data)?>;
    let chart_data = <?php echo json_encode($chart_data)?>;
</script>
<script src="{{ asset('js/script.js') }}"></script>
<style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
    .w3-bar-block .w3-bar-item {padding:20px}
    body {
        background-color: #FFEADB;
    }
    .w3-xlarge {
        background-color: #A2A49C !important;
        color: white !important;
        font-size: 36px !important;
    }
    .w3-quarter {
        cursor: pointer;
    }
    .w3-quarter h4 {
        font-style: italic;
    }
    #map {
        height: 500px;
    }
</style>
<body>

<!-- Top menu -->
<div class="w3-top">
    <div class="w3-xlarge" style="max-width:1200px;margin:auto">
        <div class="w3-center w3-padding-16">{{ $business_data['name'] }} - <i>{{ $business_data['city'] . ', ' . $business_data['state']  }}</i></div>
    </div>
</div>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1800px;margin-top:100px;max-height:500px;">

    <!-- First Photo Grid-->
    <div class="w3-row-padding w3-padding-16 w3-center" id="food">
        <div class="w3-half">
            <div id="map"></div>
        </div>
        <div class="w3-half">
            <div id="container"></div>
        </div>
    </div>

    <hr id="about">

    <!-- End page content -->
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdMUgeB1I7a18nhQIr4nn1rPju-HmbI5Y" async></script>
</body>
</html>
