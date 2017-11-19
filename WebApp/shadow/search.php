<?php
$postdata = file_get_contents("php://input");
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://".json_decode($_ENV['VCAP_SERVICES'],true)['audi-carmanager'][0]['credentials']['uri']."/shadow/search.php?device_id=".$_GET["device_id"]."&signal_id=".$_GET["signal_id"]);
curl_setopt($ch, CURLOPT_PUT, 1);
curl_setopt($ch, CURLOPT_PUTFIELDS, $postdata); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close ($ch);
http_response_code($httpcode);
echo $server_output;