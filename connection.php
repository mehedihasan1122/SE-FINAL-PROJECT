<?php
$vehicle_name = $_GET["Vehicle_name"];
$conn = mysqli_connect("localhost", "root", "", "parking_project") or die("connection failed!");
$sql = "DELETE FROM vehicle_info where Vehicle_name = '{$vehicle_name}'";
$result = mysqli_query($conn, $sql) or die("Query Failed!");
header("location: http://localhost/project/index.php");
mysqli_close($conn);
?>