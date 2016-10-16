<?php
function Pagination($props) {
  foreach ($props as $key => $prop) { $$key = $prop; }
  $pages = '';
  for ($i = 1; $i < $pageCount + 1; $i++) {
    $active = $i === intval($currentPage) ? 'class="active"' : '';
    $pages .= "<a href='?page=$i' $active>$i</a>";
  }

  return "<div class='Pagination'>$pages</div>";
};
