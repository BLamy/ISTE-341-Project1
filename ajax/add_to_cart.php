<?php
session_start();
session_start();
require_once '../db.php';
require_once '../../dbinfo.php';
require_once '../LIB_project1.php';

// TODO: Validate to see if there is an item by that id.
// TODO: Validate to see of there are any left in stock.
if(!isset($_SESSION['cart_items'])){
    $_SESSION['cart_items'] = [];
}

$id = isset($_POST['id']) ? $_POST['id'] : "";
$_SESSION['cart_items'][] = $id;

echo json_encode($_SESSION['cart_items']);
?>
