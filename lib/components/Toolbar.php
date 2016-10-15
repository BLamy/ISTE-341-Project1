<?php
function Toolbar() {
  // foreach ($props as $key => $prop) { $$key = $prop; }
  return <<<TEMPLATE
  <div class="Header">
    <a href="/">
      <img src="public/logo.svg" class="Header-logo" alt="logo" />
    </a>
    <div class="Header-right">
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
