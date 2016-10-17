<?php
session_start();
require_once '../dbinfo.php';
require_once './db.php';
require_once './LIB_project1.php';

function canAddMore($saleItems) { return count($saleItems) < 5; }
function canRemoveMore($saleItems) { return count($saleItems) > 3; }

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

if (isset($_POST['logout'])) {
  $_SESSION['isAdmin'] = false; // Don't delete the session or we will loose cart items.
}

// password / session protected
if ((isset($_POST['password']) && $_POST['password'] === 'password') || $_SESSION['isAdmin']) {
  $_SESSION['isAdmin'] = true; // Only need a password first time
  $db = new DB($DB_host, $DB_port, $DB_name, $DB_user, $DB_pass); // From dbinfo.php

  $saleItems = $db->getSaleItems();

  $error = '';

  //-------------------
  // Add
  //-------------------
  if (isset($_POST['add'])) {
    $isNotOnSale = intval($_POST['salePrice']) === 0;
    if ($isNotOnSale || canAddMore($saleItems)) { // Can only have a maximum of 5 items
      $db->addItem($_POST['name'], $_POST['description'], $_POST['price'], $_POST['quantity'], $_POST['imageName'], $_POST['salePrice']);
    } else {
      $error = 'Too Many Items on sale';
    }


  //-------------------
  // Edit
  //-------------------
  } else if (isset($_POST['edit'])) {
    $item = $db->getItemsById([intval($_POST['edit'])])[0];
    $isCurrentlyOnSale = intval($item['salePrice']) !== 0;
    $willBeOnSaleAfterUpdate = intval($_POST['salePrice']) !== 0;
    if ($isCurrentlyOnSale && !$willBeOnSaleAfterUpdate && !canRemoveMore($saleItems)) {
      $error = 'Error Must have atleast 3 items on sale';
    } else if (!$isCurrentlyOnSale && $willBeOnSaleAfterUpdate && !canAddMore($saleItems)) {
      $error = 'Error cannot have more than 5 items on sale';
    } else {
      $db->updateItem($_POST['edit'], $_POST['name'], $_POST['description'], $_POST['price'], $_POST['quantity'], $_POST['imageName'], $_POST['salePrice']);
    }

  //-------------------
  // Delete
  //-------------------
  } else if (isset($_GET['delete'])) {
    if (canRemoveMore($saleItems)) {
      $db->deleteItem(intval($_GET['delete']));
    } else {
      $error = 'Must have 3 items on sale';
    }
  }

  $saleItems = json_encode($db->getSaleItems());
  $items = json_encode($db->getItems($page));
  $numberOfPages = json_encode($db->getPageCount());

  if (isset($_GET['edit'])) { // Display edit page
   $item = $db->getItemsById([intval($_GET['edit'])])[0];
   $item = json_encode($item);
   echo TemplateEngine::page("<AdminEdit item='$item' />", 'admin-page', "RIT Shirts | Admin");
  } else {
   echo TemplateEngine::page("<Admin error='$error' items='$items' saleItems='$saleItems' pageCount='$numberOfPages' currentPage='$page' />", 'admin-page', "RIT Shirts | Admin");
  }
} else {
  echo TemplateEngine::page("<SignIn />", 'sign-in', "RIT Shirts | Sign In");
}
?>
