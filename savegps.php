<?php
include('db.php');
$lng = $_GET['lng'];
$lat = $_GET['lat'];
$t=date("d-m-Y H:i:s");
$sql = "INSERT INTO location (lat, lng, date_time) VALUES ('$lat', '$lng', now() )";

if (mysqli_query($conn, $sql)) {

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
