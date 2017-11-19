<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_shadow";

$dev_id = $_GET['device_id'];
$signal_id = $_GET['signal_id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM tb_devices_status where device_Id = ".$_GET['device_id'] .' and signal_id = '.$_GET['signal_id'] ;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo  $row["desired_status"]. ":" . $row["current_status"];
    }
} else {
    echo "0 results";
}
$conn->close();
?>
