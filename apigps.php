<?php
  include 'db.php';
  $sql = "SELECT lat, lng, date_time FROM location ORDER BY id DESC LIMIT 2";
  // $sql = "SELECT lat, lng, date_time FROM location";
  $result = mysqli_query($conn, $sql);                      //fetch result
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $array = mysqli_fetch_row($result);
  }
  echo json_encode($array);

?>
