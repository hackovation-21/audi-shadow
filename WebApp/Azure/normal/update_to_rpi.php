<?php
ini_set('max_execution_time', 0);
echo " Hello World" ;

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



$counter = 0;


while(true)
{
	sleep(5);
	
	
	$sql = "SELECT * FROM `tb_devices_status` WHERE `desired_status` <> `current_status`" ;
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo  $row["desired_status"]. ":" . $row["signal_id"];
			$url = 'http://80.81.3.164:15002/leds/'.$row["signal_id"].'/'.$row["desired_status"];

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
		}
	} else {
		echo "0 results";
	}
		
	


	$counter = $counter+1;
}

$conn->close();
?>