<?php
function Toolbar() {
  // foreach ($props as $key => $prop) { $$key = $prop; }
  return <<<TEMPLATE
  <div class="Toolbar">
    <a href="/~bel9708/ISTE-341-Project1/">
      <img src="public/logo.svg" class="logo" alt="logo" />
    </a>
    <div class="right">
      <a href="/~bel9708/ISTE-341-Project1/cart.php">
        <img src="public/cart.svg" alt="cart" />
      </a>
      <a href="/~bel9708/ISTE-341-Project1/admin.php">
        <img src="public/admin.svg" alt="admin" />
      </a>
    </div>
  </div>
TEMPLATE;
};
