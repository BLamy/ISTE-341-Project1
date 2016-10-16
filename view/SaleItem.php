<?php
function SaleItem($props) {
  foreach ($props as $key => $prop) { $$key = $prop; }
  $buttons = '';
  if (isset($add) && $add) {
    $buttons .= "<button onclick='$add($id)'>Add To Cart</button>";
  }
  if (isset($delete) && $delete) {
    $buttons .= "<button onclick='$delete($id)'>Remove</button>";
  }
  if (isset($edit) && $edit) {
    $buttons .= "<button onclick='$edit($id)'>Edit Item</button>";
  }

  $img = '';
  if (isset($imageName) && $imageName !== '') {
    $img = "<img src='public/$imageName' alt='$description' />";
  }

  return <<<TEMPLATE
  <div class="SaleItem">
    $img
    <div class="details">
      <h2 class="name">$productName</h2>
      <p class="description">$description</p>
      <Price price="$price" salePrice="$salePrice" />
      <span><strong>$quantity</strong> Left</span>
      $buttons
    </div>
  </div>
TEMPLATE;
};
?>
