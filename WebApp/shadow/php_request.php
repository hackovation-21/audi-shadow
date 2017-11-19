<?php
$postdata = file_get_contents("php://input");
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://".json_decode($_ENV['VCAP_SERVICES'],true)['audi-carmanager'][0]['credentials']['uri']."/shadow/php_request.php?dev_id=".$_GET["dev_id"]."&status=".$_GET["status"]);
curl_setopt($ch, CURLOPT_PUT, 1);
curl_setopt($ch, CURLOPT_PUTFIELDS, $postdata); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close ($ch);
http_response_code($httpcode);
header('Content-Type: application/json');
echo $server_output;