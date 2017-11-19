<?php

//The URL that we want to send a PUT request to.

$dev_id = $_GET['dev_id'];
$status = $_GET['status'];



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_shadow";

$signal_id = $dev_id;
$desired_status = $status ;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE tb_devices_status SET desired_status='".$desired_status."' WHERE device_Id= "."10000"." and signal_id = ".$signal_id;

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
