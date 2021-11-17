<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
</style>
<body>

<!-- Top menu -->
<div class="w3-top">
    <div class="w3-xlarge" style="max-width:1200px;margin:auto">
        <div class="w3-center w3-padding-16">Burp!</div>
    </div>
</div>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">

    <!-- First Photo Grid-->
    <div class="w3-row-padding w3-padding-16 w3-center" id="food">
        <div class="w3-quarter" data-business-id="j1xPZlDFbVL8tbA9M-LlCQ">
            <img src="{{ asset('images/gjt0sjhmetr1jl3mb98clka0yqnf.png') }}" alt="Sandwich" style="width:100%">
            <h3>Oskar Blues Taproom</h3>
            <h4>Boulder, CO</h4>
        </div>
        <div class="w3-quarter">
            <img src="{{ asset('images/gjt0sjhmetr1jl3mb98clka0yqnf.png') }}" alt="Sandwich" style="width:100%">
            <h3>Oskar Blues Taproom</h3>
            <h4>Boulder, CO</h4>
        </div>
        <div class="w3-quarter">
            <img src="{{ asset('images/gjt0sjhmetr1jl3mb98clka0yqnf.png') }}" alt="Sandwich" style="width:100%">
            <h3>Oskar Blues Taproom</h3>
            <h4>Boulder, CO</h4>
        </div>
        <div class="w3-quarter">
            <img src="{{ asset('images/gjt0sjhmetr1jl3mb98clka0yqnf.png') }}" alt="Sandwich" style="width:100%">
            <h3>Oskar Blues Taproom</h3>
            <h4>Boulder, CO</h4>
        </div>
    </div>

    <!-- Second Photo Grid-->
    <div class="w3-row-padding w3-padding-16 w3-center">
        <div class="w3-quarter">
            <img src="{{ asset('images/gjt0sjhmetr1jl3mb98clka0yqnf.png') }}" alt="Sandwich" style="width:100%">
            <h3>Oskar Blues Taproom</h3>
            <h4>Boulder, CO</h4>
        </div>
        <div class="w3-quarter">
            <img src="{{ asset('images/gjt0sjhmetr1jl3mb98clka0yqnf.png') }}" alt="Sandwich" style="width:100%">
            <h3>Oskar Blues Taproom</h3>
            <h4>Boulder, CO</h4>
        </div>
        <div class="w3-quarter">
            <img src="{{ asset('images/gjt0sjhmetr1jl3mb98clka0yqnf.png') }}" alt="Sandwich" style="width:100%">
            <h3>Oskar Blues Taproom</h3>
            <h4>Boulder, CO</h4>
        </div>
        <div class="w3-quarter">
            <img src="{{ asset('images/gjt0sjhmetr1jl3mb98clka0yqnf.png') }}" alt="Sandwich" style="width:100%">
            <h3>Oskar Blues Taproom</h3>
            <h4>Boulder, CO</h4>
        </div>
    </div>

    <hr id="about">

    <!-- End page content -->
</div>

<script>
    $(document).ready(function() {
        $('div.w3-quarter').click(function() {
            let business_id = $(this).attr('data-business-id');
            window.open('/' + business_id, '_blank');
        })
    });
</script>

</body>
</html>
