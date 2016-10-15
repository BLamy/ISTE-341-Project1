<?php
require_once './model/index.php';
require_once './lib/TemplateEngine.php';

require_once '../dbinfo.php';
$db = new DB($DB_host, $DB_port, $DB_name, $DB_user, $DB_pass); // From dbinfo.php

$items = json_encode($db->getItems());
$saleItems = json_encode($db->getSaleItems());

echo TemplateEngine::page("<Home items='$items' saleItems='$saleItems' />");

?>
