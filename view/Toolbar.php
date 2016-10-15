<?php
function Toolbar() {
  // foreach ($props as $key => $prop) { $$key = $prop; }
  return <<<TEMPLATE
  <div class="Toolbar">
    <a href="/">
      <img src="public/logo.svg" class="logo" alt="logo" />
    </a>
    <div class="right">
      <a href="/cart">
        <img src="public/cart.svg" alt="cart" />
      </a>
      <a href="/admin">
        <img src="public/admin.svg" alt="admin" />
      </a>
    </div>
  </div>
TEMPLATE;
};
