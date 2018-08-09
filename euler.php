<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/flightindicators.css" />

  </head>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="js/jquery.flightindicators.js"></script>

  <body>
    <span id="attitude"></span>
    <span id="attitude2"></span>

<span id="heading"></span>
<span id="variometer"></span>
<span id="airspeed"></span>
<span id="altimeter"></span>

  </body>
  <script type="text/javascript">
  // Dynamic examples
  var attitude = $.flightIndicator('#attitude', 'attitude', {roll:50, pitch:0, size:250, showBox : false});
  var attitude2 = $.flightIndicator('#attitude2', 'attitude', {roll:0, pitch:-20, size:250, showBox : false});
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
</html>
