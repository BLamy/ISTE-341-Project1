<?php
require_once '../dbinfo.php';
require_once './db.php';
require_once './LIB_project1.php';

$db = new DB($DB_host, $DB_port, $DB_name, $DB_user, $DB_pass); // From dbinfo.php
$items = json_encode($db->getItems());
$saleItems = json_encode($db->getSaleItems());
echo TemplateEngine::page("<Home items='$items' saleItems='$saleItems' />", 'homepage', "RIT Shirts | Home");
?>
