<?php
session_start();
require_once './db.php';
require_once '../dbinfo.php';
require_once './LIB_project1.php';

if(!isset($_SESSION['cart_items'])){
    $_SESSION['cart_items'] = [];
}

$db = new DB($DB_host, $DB_port, $DB_name, $DB_user, $DB_pass); // From dbinfo.php
$cartItems = json_encode($db->getItemsById($_SESSION['cart_items']));
echo TemplateEngine::page("<Cart items='$cartItems' />", 'cart-page', "RIT Shirts | Cart");
?>
