<?php
function Admin($props) {
  foreach ($props as $key => $prop) { $$key = $prop; }
  return <<<TEMPLATE
  <div class='Admin'>
    <div class='Paper'>
      <h1 class='title'>Admin</h1>
      <h2>This is a Secret page</h2>
      <form action="admin.php" method="POST">
        <input type="hidden" name="logout" value="true" />
        <input type="submit" value="Logout" />
      </form>
    </div>
    <div class='Paper'>
      <h1 class='title'>Add an Item</h1>
      <form action="admin.php" method="POST">
        <input type="hidden" name="add" value="true" />
        <span>Name:</span>
        <input type="text" name="name" /><br />
        <span>Description:</span>
        <input type="text" name="description" /><br />
        <span>Price:</span>
        <input type="text" name="price" /><br />
        <span>Quantity:</span>
        <input type="text" name="quantity" /><br />
        <span>Image Name:</span>
        <input type="text" name="imageName" /><br />
        <span>Sale Price:</span>
        <input type="text" name="salePrice" /><br />
        <input type="submit" value="Add" />
      </form>
    </div>

    <div class='Paper catalog'>
      <h1 class='title'>Catalog</h1>
      <SaleItemList items='$items' edit='Admin.add' deleteFromInventory='Admin.delete' />
      <Pagination pageCount='$pageCount' currentPage='$currentPage'/>
    </div>

  </div>
TEMPLATE;
};
