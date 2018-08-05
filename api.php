<?php
  include 'db.php';
  $sql = "SELECT temp, hum, date_time FROM dht ORDER BY id DESC LIMIT 2";
  $result = mysqli_query($conn, $sql);                      //fetch result
  while($row = mysqli_fetch_assoc($result))
  {
    $array = mysqli_fetch_row($result);
  }
  echo json_encode($array);

?>
