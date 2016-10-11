<?php
class Item implements JsonSerializable {
  private $itemId;
  private $productName;
  private $description;
  private $price;
  private $quantity;
  private $imageName;
  private $salePrice;

  public function __construct($itemId, $productName, $description, $price, $quantity, $imageName, $salePrice) {
    $this->itemId = $itemId;
    $this->productName = $productName;
    $this->description = $description;
    $this->price = $price;
    $this->quantity = $quantity;
    $this->imageName = $imageName;
    $this->salePrice = $salePrice;
  }

  public function isOnSale() {
    return !($this->salePrice === 0);
  }

  public function jsonSerialize() {
    return [
        'itemId' => $this->itemId,
        'productName' => $this->productName,
        'description' => $this->description,
        'price' => $this->price,
        'quantity' => $this->quantity,
        'imageName' => $this->imageName,
        'salePrice' => $this->salePrice
      ];
  }

}

class ItemRef {

  function __constructor($itemId) {
    $this->itemId = $itemId;
  }

  /**
   * @return Item
   */
  function getItem() {

  }
}
?>
