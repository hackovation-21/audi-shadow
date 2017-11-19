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

$url = 'http://80.81.3.164:15002/leds/'.$signal_id.'/'.$desired_status;

//Initiate cURL
$ch = curl_init($url);

//Use the CURLOPT_PUT option to tell cURL that
//this is a PUT request.
curl_setopt($ch, CURLOPT_PUT, true);

//We want the result / output returned.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Our fields.
$fields = array("id" => 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));

//Execute the request.
$response = curl_exec($ch);

echo $response;

$conn->close();
