<?php
class DB {
  private $dbh;

  function __construct($host, $port, $dbname, $username, $password) {
    try {
      $this->dbh = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $username, $password);
      $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      echo $e->getMessage();
      die();
    }
  }

  //------------------------------
  // @permission Public
  //------------------------------
  function getItems($pageNumber = 1, $itemsPerPage = 10) {
    $first = ($pageNumber - 1) * $itemsPerPage;
    $last = $first + $itemsPerPage + 1;
    try {
        $stmt = $this->dbh->prepare("SELECT * FROM Item WHERE id BETWEEN :first AND :last");
        $stmt->bindParam(":first", $first, PDO::PARAM_INT);
        $stmt->bindParam(":last", $last, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
  }

  function addItemToCart($deviceId, $itemId) {
  }

  function getSaleItems($pageNumber = 1, $itemsPerPage = 10) {
    $first = ($pageNumber - 1) * $itemsPerPage;
    $last = $first + $itemsPerPage + 1;
    try {
        $stmt = $this->dbh->prepare("SELECT * FROM Item WHERE salePrice != 0 AND id BETWEEN :first AND :last");
        $stmt->bindParam(":first", $first, PDO::PARAM_INT);
        $stmt->bindParam(":last", $last, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
  }

  //------------------------------
  // @permission Admin
  //------------------------------
  function addItem($productName, $description, $price, $quantity, $imageName, $salePrice) {

  }

  function updateItem($itemId, $productName, $description, $price, $quantity, $imageName, $salePrice) {

  }

  function deleteItem($itemId) {

  }
}
