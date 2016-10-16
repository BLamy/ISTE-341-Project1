<?php
session_start();
require_once '../db.php';
require_once '../../dbinfo.php';
require_once '../LIB_project1.php';

if(!isset($_SESSION['cart_items'])){
    $_SESSION['cart_items'] = [];
}

$id = isset($_POST['id']) ? $_POST['id'] : false;
if ($id) {
  $pos = array_search($id, $_SESSION['cart_items']);
  unset($_SESSION['cart_items'][$pos]);
  $_SESSION['cart_items'] = array_values($_SESSION['cart_items']);
}

$db = new DB($DB_host, $DB_port, $DB_name, $DB_user, $DB_pass); // From dbinfo.php
$cartItems = $db->getItemsById($_SESSION['cart_items']);
$items = json_encode(array_map(function($item){
  $item['imageName'] = '';
  return $item;
}, $cartItems));
echo TemplateEngine::render("<Cart items='$items' />", 'cart-page', "RIT Shirts | Cart");

?>