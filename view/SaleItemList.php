<?php
function SaleItemList($props) {
  // echo html_entity_decode($props['items']);
  $items = implode('', array_map(function($item) {
    // print_r($item);
    foreach ($item as $key => $prop) { $$key = $prop; }
    return <<<TEMPLATE
    <SaleItem
      id='$id'
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
