<?php
function Admin($props) {
  foreach ($props as $key => $prop) { $$key = $prop; }
  return <<<TEMPLATE
  <div class='Admin Paper'>
    <h1 class='title'>Admin</h1>
    <h2>This is a Secret page</h2>

    <form action="admin.php" method="POST">
      <input type="hidden" name="add" value="true" />
      <span>Name:</span>
      <input type="text" name="name" />
      <span>Description:</span>
      <input type="text" name="description" />
      <span>Price:</span>
      <input type="text" name="price" />
      <span>Quantity:</span>
      <input type="text" name="quantity" />
      <span>Image Name:</span>
      <input type="text" name="imageName" />
      <span>Sale Price:</span>
      <input type="text" name="salePrice" />
      <input type="submit" value="Add" />
    </form>
    <form action="admin.php" method="POST">
      <input type="hidden" name="logout" value="true" />
      <input type="submit" value="Logout" />
    </form>
  </div>
TEMPLATE;
};
