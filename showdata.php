<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Data Through Raspberry</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/epoch/0.8.4/css/epoch.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/epoch/0.7.1/js/epoch.min.js"></script> -->

    <style>
      /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 80%;  /* The width is the width of the web page */
       }
    </style>

  </head>
  <body>
    <div class="container">
      <div class="row">
    <div class="col-md-10 col-md-offset-4">
      <div style="font-size:24px;">
        <span>Temperature = </span><span class="temp">NaN</span> &#176;<span>C</span>
      </div>
      <div  style="font-size:24px;">
        <span>Humidity = </span><span class="hum">NaN</span> &#37;
      </div>
    </div>
    </div>
  </div>
  <h3>My Google Maps Demo</h3>
  <div class="container">
    <div class="row">
  <div class="col-md-10 col-md-offset-4">
    <div style="font-size:24px;">
      <span>Longitude = </span><span class="lng">NaN</span>
    </div>
    <div  style="font-size:24px;">
      <span>Latitude = </span><span class="lat">NaN</span>
    </div>
  </div>
  </div>
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
      var ajax_call = function()
      {

        $.ajax({
          url: 'apigps.php',                  //the script to call to get data
          data: "",                        //you can insert url argumnets here to pass to api.php
          dataType: 'json',                //data format
          success: function(data)          //on recieve of reply
          {
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
    <div id="dvMap" style="width: 400px; height: 500px">
  </div>
<script>
var temp;
var hum;
var ajax_call = function()
{

  $.ajax({
    url: 'api.php',                  //the script to call to get data
    data: "",                        //you can insert url argumnets here to pass to api.php
    dataType: 'json',                //data format
    success: function(data)          //on recieve of reply
    {
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
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWq4CfMatw18beo0TUU3ACY9awFXmFOP0&callback=initMap">
</script>
  </body>
  <!-- <script type="text/javascript" src="graph.js"></script> -->
</html>
