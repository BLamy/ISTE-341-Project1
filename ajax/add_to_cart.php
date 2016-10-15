<?php
session_start();

if(!isset($_SESSION['cart_items'])){
    $_SESSION['cart_items'] = [];
}

$id = isset($_POST['id']) ? $_POST['id'] : "";
$_SESSION['cart_items'][] = $id; // TODO: Validate to see if there is an item by that id.

echo json_encode($_SESSION['cart_items']);
?>
