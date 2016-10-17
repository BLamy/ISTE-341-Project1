<?php
function SaleItemList($props) {
  $add = isset($props['add']) ? $props['add'] : false;
  $deleteFromCart = isset($props['deleteFromCart']) ? $props['deleteFromCart'] : false;
  $deleteFromInventory = isset($props['deleteFromInventory']) ? $props['deleteFromInventory'] : false;
  $edit = isset($props['edit']) ? $props['edit'] : false;
  $items = implode('', array_map(function($item) use($add, $deleteFromCart, $deleteFromInventory, $edit){
    foreach ($item as $key => $prop) { $$key = $prop; }

    return <<<TEMPLATE
    <SaleItem
      id='$id'
      add='$add'
      deleteFromCart='$deleteFromCart'
      deleteFromInventory='$deleteFromInventory'
      edit='$edit'
      productName='$productName'
      imageName='$imageName'
      description='$description'
      price='$price'
      salePrice='$salePrice'
      quantity='$quantity'
    />
TEMPLATE;
  }, json_decode(html_entity_decode($props['items']))));
  return "<div class='SaleItemList'>$items</div>";
}
