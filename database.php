

<?php
$owner_name = $_POST['owner_name'];
$vehicle_name = $_POST['vehicle_name'];
$vehicle_number = $_POST['vehicle_number'];
$entry_date = $_POST['entry_date'];
$exit_date = $_POST['exit_date'];
$conn = mysqli_connect("localhost", "root", "", "parking_project") or die("connection failed!");
$sql = "INSERT INTO Parking_project.vehicle_info(Owner_name, Vehicle_name, Vehicle_number, Entry_date, Exi
t_date) VALUES('{$owner_name}', '{$vehicle_name}', '{$vehicle_number}', '{$entry_date}', '{$exit_date}')";
$result = mysqli_query($conn, $sql) or die("Query Failed!");
header("location: http://localhost/project/index.php");
mysqli_close($conn);
?>