<?php
session_start();
require_once '../LIB_project1.php';
// This page is probably a huge CSRF issue, don't think CSRF was covered in class.
$_SESSION['cart_items'] = [];
echo TemplateEngine::render("<Cart items='[]' />", 'cart-page', "RIT Shirts | Cart");
?>
