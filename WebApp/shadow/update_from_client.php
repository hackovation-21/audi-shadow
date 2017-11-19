<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_shadow";

$dev_id = $_GET['device_id'];
$signal_id = $_GET['signal_id'];
$desired_status = $_GET['desired_status'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE tb_devices_status SET desired_status='".$desired_status."' WHERE device_Id= ".$dev_id." and signal_id = ".$signal_id;

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>