<?php
$vcap_services = json_decode($_ENV['VCAP_SERVICES']);
var_dump( $vcap_services);

echo json_decode($_ENV['VCAP_SERVICES'],true)['audi-carmanager'][0]['credentials']['uri'];


echo "<br/>";

echo "'"."http://".json_decode($_ENV['VCAP_SERVICES'],true)['audi-carmanager'][0]['credentials']['uri']."/shadow/php_request.php?dev_id=0&status=0"."'";
?>
