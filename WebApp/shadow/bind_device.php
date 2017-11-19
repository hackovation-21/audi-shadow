<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_shadow";


$device_Id = $_GET['device_Id'];
$desired_status = $_GET['desired_status'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `tb_devices_status`(`device_Id`, `desired_status`) VALUES (".$desired_status.",".$desired_status.")";

if ($conn->query($sql) === TRUE) {
    echo "{'shadow_dev_id':".($conn->insert_id)."}";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>