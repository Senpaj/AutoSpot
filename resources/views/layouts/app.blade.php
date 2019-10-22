<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script>
    function yearDropDown(){
        var myDate = new Date();
        var year = myDate.getFullYear();
        var yearOptions = "<option value='"+0+"'>----</option>";
        for(var i = 1900; i <= year; i){
            if(i < 1970){
                yearOptions += "<option value='"+i+"'>"+i+"</option>"
                i += 10;
            }
            else if(i >= 1970 && i < 1990){
                    yearOptions += "<option value='"+i+"'>"+i+"</option>"
                i += 5;
            }
            else{
                    yearOptions += "<option value='"+i+"'>"+i+"</option>"
                i++;
            }
        }
        if(document.getElementById('selectYearFrom') != null)document.getElementById('selectYearFrom').innerHTML = yearOptions;
        if(document.getElementById('selectYearTo') != null)document.getElementById('selectYearTo').innerHTML = yearOptions;
    }
    
    function priceDropDown(){
        var priceOptions = "<option value='"+0+"'>----</option>";
        for(var i = 150; i <= 100000; i){
            if(i < 300){
                priceOptions += "<option value='"+i+"'>"+i+"</option>"
                i += 150;
            }
            else if(i >= 300 && i < 500){
                priceOptions += "<option value='"+i+"'>"+i+"</option>"
                i += 200;
            }
            else if(i >= 500 && i < 5000){
                priceOptions += "<option value='"+i+"'>"+i+"</option>"
                i += 500;
            }
            else if(i >= 5000 && i < 10000){
                priceOptions += "<option value='"+i+"'>"+i+"</option>"
                i += 2500;
            }
            else {
                priceOptions += "<option value='"+i+"'>"+i+"</option>"
                i += 10000;
            }
        }
        if(document.getElementById('selectPriceFrom') != null)document.getElementById('selectPriceFrom').innerHTML = priceOptions;
        if(document.getElementById('selectPriceTo') != null)document.getElementById('selectPriceTo').innerHTML = priceOptions;
    }
    function dateForNewOrder(){
        var year = new Date();
        year = year.getFullYear();
        var yearOption = "<option value='"+0+"'>----</option>";
        for(var i = year; i >= year-100; i--){
            yearOption += "<option value='"+i+"'>"+i+"</option>"
        }

        var monthOption = "<option value='"+0+"'>----</option>";
        for(var i = 1; i <= 12; i++){
            monthOption += "<option value='"+i+"'>"+i+"</option>"
        }
        if(document.getElementById('yearForNewOrder') != null) document.getElementById('yearForNewOrder').innerHTML = yearOption;
        if(document.getElementById('monthForNewOrder') != null) document.getElementById('monthForNewOrder').innerHTML = monthOption;
    }
    function dateForTA(){
        var year = new Date();
        year = year.getFullYear();
        var yearOption = "<option value='"+0+"'>----</option>";
        for(var i = year; i <= year+4; i++){
            yearOption += "<option value='"+i+"'>"+i+"</option>"
        }

        var monthOption = "<option value='"+0+"'>----</option>";
        for(var i = 1; i <= 12; i++){
            monthOption += "<option value='"+i+"'>"+i+"</option>"
        }
        if(document.getElementById('yearForTA') != null) document.getElementById('yearForTA').innerHTML = yearOption;
        if(document.getElementById('monthForTA') != null) document.getElementById('monthForTA').innerHTML = monthOption;
    }
    function start(){
        yearDropDown();
        priceDropDown();
        dateForNewOrder();
        dateForTA();
    }
    </script>
</head>
<body onload="start()">
    <div id="app">

        <main class="container">
            @yield('content')
        </main>
    </div>
    <!-- just some space -->
<div class="container" style="height:10%;"></div>
<footer class="page-footer font-small special-color-dark pt-4">
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
        <a href="https://MotoSopot.lt"> MotoSpot</a>
    </div>
</footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
