<?php
function SaleItem($props) {
  foreach ($props as $key => $prop) { $$key = $prop; }
  return <<<TEMPLATE
  <div class="SaleItem">
    <img src="$imageName" alt="$description" class="SaleItem-img" />
    <div class="SaleItem-details">
      <h2 class="SaleItem-name">$productName</h2>
      <p class="SaleItem-description">$description</p>
      <Price price="$price" salePrice="$salePrice" />
      <span><strong>$quantity</strong> Left</span>
    </div>
  </div>
TEMPLATE;
};
?>
