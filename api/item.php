<?php
class Item {
  function __constructor($productName, $description, $price, $quantity, $imageName, $salePrice) {
    $this->productName = $productName;
    $this->description = $description;
    $this->price = $price;
    $this->quantity = $quantity;
    $this->imageName = $imageName;
    $this->salePrice = $salePrice;
  }

  function isOnSale() {
    return !($this->price === 0);
  }
}
?>
