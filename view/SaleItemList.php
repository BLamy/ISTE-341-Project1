<?php
function SaleItemList($props) {
  $add = isset($props['add']) ? $props['add'] : false;
  $delete = isset($props['delete']) ? $props['delete'] : false;
  $edit = isset($props['edit']) ? $props['edit'] : false;
  $items = implode('', array_map(function($item) use($add, $delete, $edit){
    foreach ($item as $key => $prop) { $$key = $prop; }

    return <<<TEMPLATE
    <SaleItem
      id='$id'
      add='$add'
      delete='$delete'
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
