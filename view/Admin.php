<?php
function Admin($props) {
  foreach ($props as $key => $prop) { $$key = $prop; }
  return <<<TEMPLATE
  <div class='Admin Paper'>
    <h1 class='title'>Admin</h1>
    <h2>This is a Secret page</h2>

    <form action="admin.php" method="POST">
      <input type="hidden" name="logout" value="true" />
      <input type="submit" value="Logout" />
    </form>
  </div>
TEMPLATE;
};
