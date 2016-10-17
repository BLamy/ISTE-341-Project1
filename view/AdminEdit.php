<?php
function AdminEdit($props) {
  $item = json_decode($props['item']);
  foreach ($item as $key => $prop) { $$key = $prop; }
  return <<<TEMPLATE
  <div class='Admin'>
    <div class='Paper'>
      <h1 class='title'>Add an Item</h1>
      <form action="admin.php" method="POST">
        <input type="hidden" name="edit" value="$id" />
        <span>Name:</span>
        <input type="text" name="name" value="$productName"/><br />
        <span>Description:</span>
        <input type="text" name="description" value="$description" /><br />
        <span>Price:</span>
        <input type="text" name="price" value="$price" /><br />
        <span>Quantity:</span>
        <input type="text" name="quantity" value="$quantity" /><br />
        <span>Image Name:</span>
        <input type="text" name="imageName" value="$imageName" /><br />
        <span>Sale Price:</span>
        <input type="text" name="salePrice" value="$salePrice" /><br />
        <input type="submit" value="Update" />
      </form>
    </div>
  </div>
TEMPLATE;
};
