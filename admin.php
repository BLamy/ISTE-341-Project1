<?php
session_start();
require_once '../dbinfo.php';
require_once './db.php';
require_once './LIB_project1.php';

if (isset($_POST['logout'])) {
  $_SESSION['isAdmin'] = false; // Don't delete the session or we will loose cart items.
}

$db = new DB($DB_host, $DB_port, $DB_name, $DB_user, $DB_pass); // From dbinfo.php
// Add New Item
if (isset($_POST['add'])) {
  echo $db->addItem($_POST['name'], $_POST['description'], $_POST['price'], $_POST['quantity'], $_POST['imageName'], $_POST['salePrice']);
}

if ((isset($_POST['password']) && $_POST['password'] === 'password') || $_SESSION['isAdmin']) {
  $_SESSION['isAdmin'] = true;
  $items = json_encode($db->getItems());
  echo TemplateEngine::page("<Admin items='$items' />", 'admin-page', "RIT Shirts | Admin");
} else {
  echo TemplateEngine::page("<SignIn />", 'sign-in', "RIT Shirts | Sign In");
}
?>
