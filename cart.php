<?php
session_start();
require_once './db.php';
require_once '../../dbinfo.php';
require_once './LIB_project1.php';

if(!isset($_SESSION['cart_items'])){
    $_SESSION['cart_items'] = array();
}
$quantities = array_count_values($_SESSION['cart_items']);
$db = new DB($DB_host, $DB_port, $DB_name, $DB_user, $DB_pass); // From dbinfo.php
$cartItems = $db->getItemsById($_SESSION['cart_items']);
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

//TODO Number of Items in cart. Cart Total
echo TemplateEngine::page("<Cart items='$items' total='$price' />", 'cart-page', "RIT Shirts | Cart");
?>
