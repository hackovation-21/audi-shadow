<?php

$url = 'http://80.81.3.164:15002/leds/1/0';

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

?>