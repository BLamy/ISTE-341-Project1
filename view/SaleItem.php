<?php
function SaleItem($props) {
  foreach ($props as $key => $prop) { $$key = $prop; }
  $buttons = '';
  if (isset($add) && $add) {
    $buttons .= "<button onclick='$add($id)'>Add To Cart</button>";
  }
  if (isset($deleteFromCart) && $deleteFromCart) {
    $buttons .= "<button onclick='$deleteFromCart($id)'>Remove</button>";
  }
  if (isset($deleteFromInventory) && $deleteFromInventory) {
    $buttons .= "<button onclick=\"document.location.href='admin.php?delete=$id'\">Delete</button>";
  }
  if (isset($edit) && $edit) {
    $buttons .= "<button onclick=\"document.location.href='admin.php?edit=$id'\">Edit</button>";
  }
  $buttons = "<div class='buttons'>$buttons</div>";

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
      <span>Quantity: <strong>$quantity</strong></span>
      $buttons
    </div>
  </div>
TEMPLATE;
};
?>
