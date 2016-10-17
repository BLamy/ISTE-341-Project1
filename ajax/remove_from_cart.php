<?php
session_start();
require_once '../db.php';
require_once '../../../dbinfo.php';
require_once '../LIB_project1.php';

if(!isset($_SESSION['cart_items'])){
  $_SESSION['cart_items'] = array();
}

$id = isset($_POST['id']) ? $_POST['id'] : false;
if ($id) {
  $pos = array_search($id, $_SESSION['cart_items']);
  unset($_SESSION['cart_items'][$pos]);
  $_SESSION['cart_items'] = array_values($_SESSION['cart_items']);
}

$db = new DB($DB_host, $DB_port, $DB_name, $DB_user, $DB_pass); // From dbinfo.php
$cartItems = $db->getItemsById($_SESSION['cart_items']);
$quantities = array_count_values($_SESSION['cart_items']);
$items = array_map(function($item) use($quantities){
  $item['imageName'] = '';
  $item['quantity'] = $quantities[$item['id']];
  return $item;
}, $cartItems);
$price = array_reduce($items, function($total, $item) {
  if ($item['salePrice'] == 0) {
    $total += intval($item['quantity']) * floatval($item['price']);
  } else {
    $total += intval($item['quantity']) * floatval($item['salePrice']);
  }
  return $total;
}, 0);
$items = json_encode($items);
echo TemplateEngine::render("<Cart items='$items' total='$price'/>", 'cart-page', "RIT Shirts | Cart");

?>
