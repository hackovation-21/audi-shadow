<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_shadow";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `tb_devices_status`(`device_Id`, `desired_status`, `current_status`) VALUES (10000,1,1)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>