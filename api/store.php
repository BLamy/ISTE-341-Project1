<?php
require_once 'item.php';

/**
 * Since our store won't have all that much content we will follow a redux-like architecture
 *
 * We will mock out our server in memory then worry about syncing to the DB
 */
class Store {
  private $state;
  private $reducer;

  public function __construct($reducer) {
    $this->reducer = $reducer;
    $this->state = [
      'catalog' => [
        new Item(1, "RIT, Vintage Dark T-Shirt", "Vintage Dark Tshirt", 19.95, 1, "tee1.jpeg", 17.95),
        new Item(2, "RIT, Vintage Dark T-Shirt", "Vintage Dark Tshirt", 19.95, 1, "tee1.jpeg", 0),
        new Item(3, "RIT, Vintage Dark T-Shirt", "Vintage Dark Tshirt", 19.95, 1, "tee1.jpeg", 17.95),
        new Item(4, "RIT, Vintage Dark T-Shirt", "Vintage Dark Tshirt", 19.95, 1, "tee1.jpeg", 17.95),
        new Item(5, "RIT, Vintage Dark T-Shirt", "Vintage Dark Tshirt", 19.95, 1, "tee1.jpeg", 0),
        new Item(6, "RIT, Vintage Dark T-Shirt", "Vintage Dark Tshirt", 19.95, 1, "tee1.jpeg", 0),
        new Item(7, "RIT, Vintage Dark T-Shirt", "Vintage Dark Tshirt", 19.95, 1, "tee1.jpeg", 0),
        new Item(8, "RIT, Vintage Dark T-Shirt", "Vintage Dark Tshirt", 19.95, 1, "tee1.jpeg", 17.95),
        new Item(9, "RIT, Vintage Dark T-Shirt", "Vintage Dark Tshirt", 19.95, 1, "tee1.jpeg", 0),
        new Item(10, "RIT, Vintage Dark T-Shirt", "Vintage Dark Tshirt", 19.95, 1, "tee1.jpeg", 17.95),
        new Item(11, "RIT, Vintage Dark T-Shirt", "Vintage Dark Tshirt", 19.95, 1, "tee1.jpeg", 0),
        new Item(12, "RIT, Vintage Dark T-Shirt", "Vintage Dark Tshirt", 19.95, 1, "tee1.jpeg", 17.95),
        new Item(13, "RIT, Vintage Dark T-Shirt", "Vintage Dark Tshirt", 19.95, 1, "tee1.jpeg", 0),
        new Item(14, "RIT, Vintage Dark T-Shirt", "Vintage Dark Tshirt", 19.95, 1, "tee1.jpeg", 17.95),
        new Item(15, "RIT, Vintage Dark T-Shirt", "Vintage Dark Tshirt", 19.95, 1, "tee1.jpeg", 0),
      ]
    ];
  }

  public function dispatch($action) {
    $this->state = $this->reducer($this->state, $action);
  }

  public function getState() {
    return $this->state;
  }
}
