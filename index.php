<?php
require_once '../dbinfo.php';
require_once './db.php';
require_once './LIB_project1.php';

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$db = new DB($DB_host, $DB_port, $DB_name, $DB_user, $DB_pass); // From dbinfo.php
$items = json_encode($db->getItems($page));
$saleItems = json_encode($db->getSaleItems());
$numberOfPages = json_encode($db->getPageCount());

echo TemplateEngine::page(
  "<Home items='$items' saleItems='$saleItems' pageCount='$numberOfPages' currentPage='$page' />",
  'homepage', "RIT Shirts | Home"
);
?>
