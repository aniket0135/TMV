<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Data Through Raspberry</title>
    <!--ALL JAVASCRIPT AND CSS AND OTHER HREF-->
    <link href='https://fonts.googleapis.com/css?family=Acme' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/flightindicators.css" />
    <link rel="stylesheet" type="text/css" href="css/showdata.css"/>
    <link rel="stylesheet" type="text/css" href="css/header.css"/>

    <!--CSS FOR THE CHART-->
  </head>
  <body>
    <?php include('header.php'); ?>
    <div class="main-page">
    <div class="container-fluid container-click graph-container no-disp" style="position: absolute;
top: 20%;">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="chart-container">
              <canvas id="mycanvas"></canvas>
            </div>
          </div>
          <div class="col-md-2">
            <div class="containertemp">
              <span>TEMPERATURE = </span><span class="temp">NaN</span> &#176;<span>C</span>
            </div>
            <div class="containerhum">
              <span>HUMIDITY = </span><span class="hum">NaN</span>&#37;
            </div>
          </div>
        </div>
    </div>

    <div class="container-fluid container-click location-container no-disp" style="position: absolute;
top: 20%;">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div id="dvMap"  style="height: 450px">
          </div>
          </div>
          <div class="col-md-2">
            <div class="containerlat">
              <span>Longitude = </span><span class="lng">NaN</span>
            </div>
            <div class="containerlng">
              <span>Latitude = </span><span class="lat">NaN</span>
            </div>
          </div>
        </div>
    </div>

    <div class="container-fluid container-click ypr-container no-disp" style="position: absolute;
top: 20%;">
        <div class="row">
          <div class="col-md-10 offset-md-2">
            <div >
                  <span id="attitude"></span>
                  <span id="attitude2"></span>
                  <span id="heading"></span>
                  <span id="variometer"></span>
                  <span id="airspeed"></span>
                  <span id="altimeter"></span>
            </div>
          </div>
        </div>
    </div>
<div class="container-fluid video-container" style="position: absolute;
top: 20%;">
  <div class="row">
    <div class="col-md-10 offset-md-2">
      <div >
            <!-- Live Video -->
      </div>
    </div>
  </div>
</div>

        </div>
  <!--The div element for the map -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="http://d3js.org/d3.v5.min.js" charset="utf-8"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
  <script src="js/jquery.flightindicators.js"></script>
  <script type="text/javascript" src=js/linegraph.js></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  <?php include('footer.php');?>
  </body>
</html>
