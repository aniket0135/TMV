<?php
  include 'db.php';

      $query = sprintf("SELECT * FROM (SELECT * FROM dht ORDER BY id DESC LIMIT 15) sub ORDER BY id ASC;");
      $res = mysqli_query($conn,$query);

      $data = array();
      foreach ($res as $row) {
        $data[]=$row;
      }
      echo json_encode($data);

  //$query = sprintf("SELECT temp, hum, cur_time FROM dht ORDER BY id DESC LIMIT 5;");
  /*$res = mysqli_query($conn,$query);

  $data = array();
  foreach ($res as $row) {
    $data[]=$row;
  }
  //$res->close()*/
  //echo json_encode($data);
 ?>
