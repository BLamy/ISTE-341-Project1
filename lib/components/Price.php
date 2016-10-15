<?php
function Price($props) {
  foreach ($props as $key => $prop) { $$key = $prop; }

  if (floatval($salePrice)) {
    return <<<TEMPLATE
    <span class="Price">
      <strike>{$price}</strike>
      {$salePrice}
    </span>
TEMPLATE;
  } else {
    return <<<TEMPLATE
    <span class="Price">
      {$price}
    </span>
TEMPLATE;
  }
};
