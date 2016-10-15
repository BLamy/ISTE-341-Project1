<?php
session_start();
require_once '../dbinfo.php';
require_once './db.php';
require_once './LIB_project1.php';

if ($_POST['logout']) {
  $_SESSION['isAdmin'] = false; // Don't delete the session or we will loose cart items.
}

if ($_POST['password'] === 'password' || $_SESSION['isAdmin']) {
  $_SESSION['isAdmin'] = true;
  $db = new DB($DB_host, $DB_port, $DB_name, $DB_user, $DB_pass); // From dbinfo.php
  $items = json_encode($db->getItems());
  echo TemplateEngine::page("<Admin items='$items' />", 'admin-page', "RIT Shirts | Admin");
} else {
  echo TemplateEngine::page("<SignIn />", 'sign-in', "RIT Shirts | Sign In");
}
?>
