<?php
function Home($props) {
  foreach ($props as $key => $prop) { $$key = $prop; }
  return <<<TEMPLATE
  <div class='Home'>
    <div class='wrapper'>
      <div class='catalog Paper'>
        <h1 class='title'>Catalog</h1>
        <SaleItemList items='$items' add='Cart.add' />
        <Pagination pageCount='$pageCount' currentPage='$currentPage'/>
      </div>
      <div class='saleItems Paper'>
        <h1 class='title'>Sales</h1>
        <SaleItemList items='$saleItems' add='Cart.add'/>
      </div>
    </div>
    <Toast message="Did Add to cart"/>
  </div>
TEMPLATE;
};
