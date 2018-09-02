<?php
  include 'db.php';

      $query = sprintf("SELECT * FROM (SELECT * FROM dht ORDER BY id DESC LIMIT 20) sub ORDER BY id ASC;");
      $res = mysqli_query($conn,$query);

      $data = array();
      foreach ($res as $row) {
        $data[]=$row;
      }
      echo json_encode($data);
 ?>
