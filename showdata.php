<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Data Through Raspberry</title>
    <!--ALL JAVASCRIPT AND CSS AND OTHER HREF-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/flightindicators.css" />
    <link rel="stylesheet" type="text/css" href="css/showdata.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://d3js.org/d3.v5.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="js/jquery.flightindicators.js"></script>
    <script type="text/javascript" src=js/linegraph.js></script>
    <!--CSS FOR THE CHART-->
    <style>
      .chart-container {
        width: 700px;
        height: auto;
      }
    </style>
  </head>
  <body>
    <div class="chart-container">
      <canvas id="mycanvas"></canvas>
    </div>
    <div class="containerlat">
      <span>Longitude = </span><span class="lng">NaN</span>
    </div>
    <div class="containerlng">
      <span>Latitude = </span><span class="lat">NaN</span>
    </div>
    <div class="containertemp">
      <span>TEMPERATURE = </span><span class="temp">NaN</span> &#176;<span>C</span>
    </div>
    <div class="containerhum">
      <span>HUMIDITY = </span><span class="hum">NaN</span>&#37;
    </div>
  <!--The div element for the map -->
    <script>
      function initMap(){}
      window.onload = function () {
          LoadMap();
      };
      var map;
      var data = ["25.4938","81.863","2018-07-22 19:03:35"];
      var marker;
      var mapOptions;
      function LoadMap() {
          var mapOptions = {
              center: new google.maps.LatLng(data[0], data[1]),
              zoom: 18,
              mapTypeId: google.maps.MapTypeId.ROADMAP
          };
          map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
          SetMarker(data);
      };
      var ajax_call = function(){
        $.ajax({
          url: 'apigps.php',                  //the script to call to get data
          data: "",                        //you can insert url argumnets here to pass to api.php
          dataType: 'json',                //data format
          success: function(data){          //on recieve of reply
            console.log(data)
            SetMarker(data);
            $('.lat').text(data[0]);
            $('.lng').text(data[1]);
          }
        });
      };
      function SetMarker(data) {
     //Remove previous Marker.
        if (marker != null) {
         marker.setMap(null);
        }
     //Set Marker on Map.
        var myLatlng = new google.maps.LatLng(data[0], data[1]);
        console.log(data[0]);
        marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
        });
      }
      var interval = 100;
      setInterval(ajax_call, interval);
    </script>
    <div id="dvMap" style="width: 550px; height: 300px">
  </div>

    <script>
    var temp;
    var hum;
    var ajax_call = function(){
      $.ajax({
        url: 'api.php',                  //the script to call to get data
        data: "",                        //you can insert url argumnets here to pass to api.php
        dataType: 'json',                //data format
        success: function(data){          //on recieve of reply
          console.log(data);
          var hum = data[1];           //get Humidity
          var temp = data[0];
          $('.temp').text(temp);
          $('.hum').text(hum);
        }
      });
    };
    var interval = 1000;
    setInterval(ajax_call, interval);
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWq4CfMatw18beo0TUU3ACY9awFXmFOP0&callback=initMap">
    </script>
    <span id="attitude"></span>
    <span id="attitude2"></span>
    <span id="heading"></span>
    <span id="variometer"></span>
    <span id="airspeed"></span>
    <span id="altimeter"></span>
    <script type="text/javascript">
    // Dynamic examples
    var attitude = $.flightIndicator('#attitude', 'attitude', {roll:50, pitch:0, size:215, showBox : false});
    var attitude2 = $.flightIndicator('#attitude2', 'attitude', {roll:0, pitch:-20, size:215, showBox : false});
    var heading = $.flightIndicator('#heading', 'heading', {heading:150, showBox:true});
    var variometer = $.flightIndicator('#variometer', 'variometer', {vario:-5, showBox:true});
    var airspeed = $.flightIndicator('#airspeed', 'airspeed', {showBox: false});
    var altimeter = $.flightIndicator('#altimeter', 'altimeter');

    // Update at 20Hz
    var increment = 0;
    var i=0;
    var a  = [14, 15, 45, 32, 78, 56, 23, 12, 46];
    setInterval(function() {
        // Attitude update
          attitude.setRoll(50*Math.sin(increment/20));
          //console.log(a[i]);
        attitude2.setPitch(50*Math.sin(increment/20));

        // Heading update
        heading.setHeading(increment);

        // Vario update
        variometer.setVario(2*Math.sin(increment/10));

        // Airspeed update
        airspeed.setAirSpeed(80+80*Math.sin(increment/10));

        // Altimeter update
        altimeter.setAltitude(10*increment);
        altimeter.setPressure(1000+3*Math.sin(increment/50));
        increment++;
        i++;
    });
  </script>
  </body>
</html>
