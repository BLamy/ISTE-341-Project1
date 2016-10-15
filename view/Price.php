<?php
function Price($props) {
  foreach ($props as $key => $prop) { $$key = $prop; }

  if (floatval($salePrice)) {
    return <<<TEMPLATE
    <span class="Price">
      <span class="strike">{$price}</span>
      {$salePrice}
    </span>
TEMPLATE;
  }

  return <<<TEMPLATE
  <span class="Price">
    {$price}
  </span>
TEMPLATE;
};
