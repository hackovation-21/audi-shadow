<?php

//The URL that we want to send a PUT request to.

$dev_id = $_GET['dev_id'];
$status = $_GET['status'];

$url = 'http://80.81.3.164:15003/leds/'.$dev_id .'/'.$status;

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
