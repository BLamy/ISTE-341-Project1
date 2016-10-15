<?php
require_once '../dbinfo.php';
require_once './db.php';
require_once './lib/TemplateEngine.php';

$db = new DB($DB_host, $DB_port, $DB_name, $DB_user, $DB_pass); // From dbinfo.php
$items = json_encode($db->getItems());
echo TemplateEngine::page("<Admin items='$items' />", 'admin-page', "RIT Shirts | Admin");
?>
