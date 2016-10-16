<?php
function Toast($props) {
  foreach ($props as $key => $prop) { $$key = $prop; }
  return <<<TEMPLATE
  <div class='Toast'>
    $message
  </div>
TEMPLATE;
};
