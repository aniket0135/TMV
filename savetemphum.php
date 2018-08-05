<?php
include('db.php');
$temp = $_GET['temp'];
$hum = $_GET['hum'];
$t=date("d-m-Y H:i:s");
$sql = "INSERT INTO dht (temp, hum, date_time)
VALUES ('$temp', '$hum', now() )";

if (mysqli_query($conn, $sql)) {

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
