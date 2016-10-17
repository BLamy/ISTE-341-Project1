<?php
session_start();
require_once '../db.php';
require_once '../../dbinfo.php';
require_once '../LIB_project1.php';

$id = isset($_POST['id']) ? $_POST['id'] : "";

$db = new DB($DB_host, $DB_port, $DB_name, $DB_user, $DB_pass); // From dbinfo.php
$cartItems = $db->getItemsById([$id]);
if (count($cartItems) == 0 || $cartItems[0]['quantity'] == 0) {
  header("HTTP/1.1 400 BAD");
  die('false');
}
// TODO: subtract one from quantity
// You will have a minimum of 3 items on sale at one time and at most 5 items on sale at one time.

if(!isset($_SESSION['cart_items'])){
    $_SESSION['cart_items'] = [];
}

$_SESSION['cart_items'][] = $id;

echo json_encode($_SESSION['cart_items']);
?>
