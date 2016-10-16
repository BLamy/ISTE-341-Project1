<?php
function Cart($props) {
  foreach ($props as $key => $prop) { $$key = $prop; }
  if ($items === '[]') {
    return <<<TEMPLATE
    <div class='Cart Paper'>
      <h1 class='title'>Your Cart</h1>
      <h2>There Are No Items in your Cart</h2>
    </div>
TEMPLATE;
  }

  return <<<TEMPLATE
  <div class='Cart Paper'>
    <h1 class='title'>Your Cart</h1>
    <SaleItemList items='$items' delete='Cart.remove' />
  </div>
TEMPLATE;
};
