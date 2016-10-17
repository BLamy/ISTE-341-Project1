<?php
session_start();
require_once '../dbinfo.php';
require_once './db.php';
require_once './LIB_project1.php';

if (isset($_POST['logout'])) {
  $_SESSION['isAdmin'] = false; // Don't delete the session or we will loose cart items.
}

if ((isset($_POST['password']) && $_POST['password'] === 'password') || $_SESSION['isAdmin']) {
  $_SESSION['isAdmin'] = true;
  $db = new DB($DB_host, $DB_port, $DB_name, $DB_user, $DB_pass); // From dbinfo.php

  // Add New Item
  if (isset($_POST['add'])) {
    $db->addItem($_POST['name'], $_POST['description'], $_POST['price'], $_POST['quantity'], $_POST['imageName'], $_POST['salePrice']);
  }

  // Delete
  if (isset($_GET['delete'])) {
    $db->deleteItem(intval($_GET['delete']));
  }

  // Edit
  if (isset($_POST['edit'])) {
    $db->update($_POST['id'], $_POST['name'], $_POST['description'], $_POST['price'], $_POST['quantity'], $_POST['imageName'], $_POST['salePrice']);
  }

  $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
  $items = json_encode($db->getItems($page));
  $saleItems = json_encode($db->getSaleItems());
  $numberOfPages = json_encode($db->getPageCount());
  echo TemplateEngine::page("<Admin items='$items' saleItems='$saleItems' pageCount='$numberOfPages' currentPage='$page' />", 'admin-page', "RIT Shirts | Admin");
} else {
  echo TemplateEngine::page("<SignIn />", 'sign-in', "RIT Shirts | Sign In");
}
?>
