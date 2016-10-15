<?php
function SaleItem($props) {
  // print_r($props);
  foreach ($props as $key => $prop) { $$key = $prop; }
  return <<<TEMPLATE
  <div class="SaleItem">
    <img src="$imageName" alt="$description" />
    <div class="details">
      <h2 class="name">$productName</h2>
      <p class="description">$description</p>
      <Price price="$price" salePrice="$salePrice" />
      <span><strong>$quantity</strong> Left</span>
      <button onclick="Cart.add($id)">Add To Cart</button>
    </div>
  </div>
TEMPLATE;
};
?>
