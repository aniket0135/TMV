<?php
include 'db.php';

session_start();
$temp = $_GET['temp'];
$hum = $_GET['hum'];

#$t=date("d-m-Y H:i:s");
#for($x=0;$x<100;$x++){
  #$t=rand(10,100);
  #$h=rand(10,100);
  $sql = "INSERT INTO dht (temp, hum, date_time, cur_time) VALUES ('$temp', '$hum', now(), current_time() )";
  if (mysqli_query($conn, $sql)) {

  }
  else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  #sleep(2);
#}

/*if (mysqli_query($conn, $sql)) {
echo "SUCCESS!";
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/
$_SESSION["temp"]=$temp;
$_SESSION["hum"]=$hum;

mysqli_close($conn);
?>
