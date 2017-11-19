<?php
$vcap_services = json_decode($_ENV['VCAP_SERVICES']);
echo $vcap_services;
?>