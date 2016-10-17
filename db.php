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
  function getItems($pageNumber = 1, $itemsPerPage = 5) {
    $first = ($pageNumber - 1) * $itemsPerPage;
    $last = $first + $itemsPerPage;
    try {
        $stmt = $this->dbh->prepare("SELECT * FROM Item ORDER BY id LIMIT :first, :itemsPerPage");
        $stmt->bindParam(":first", $first, PDO::PARAM_INT);
        $stmt->bindParam(":itemsPerPage", $itemsPerPage, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
  }

  function getPageCount($itemsPerPage = 5) {
    try {
        $stmt = $this->dbh->prepare("SELECT count(*) FROM Item");
        $stmt->execute();
        $count = $stmt->fetchAll()[0][0];
        return ceil($count / $itemsPerPage);
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
  }

  function getItemsById($ids) {
    try {
        $idarr = implode(',', $ids);
        $stmt = $this->dbh->prepare("SELECT * FROM Item WHERE FIND_IN_SET(id, :array)");
        $stmt->bindParam(":array", $idarr);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
  }

  function getSaleItems($pageNumber = 1, $itemsPerPage = 5) {
    $first = ($pageNumber - 1) * $itemsPerPage;
    try {
        $stmt = $this->dbh->prepare("SELECT * FROM Item WHERE salePrice != 0 ORDER BY id LIMIT :first, :itemsPerPage");
        $stmt->bindParam(":first", $first, PDO::PARAM_INT);
        $stmt->bindParam(":itemsPerPage", $itemsPerPage, PDO::PARAM_INT);
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
    // #TODO: If the item would put us over 5 sale items fail to add.
    try {
        $args = [$productName, $description, floatval($price), intval($quantity), $imageName, floatval($salePrice)];
        $stmt = $this->dbh->prepare("INSERT INTO Item (productName, description, price, quantity, imageName, salePrice) VALUES(?, ?, ?, ?, ?, ?)");
        $stmt->execute($args);
        return $this->dbh->lastInsertId();
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
  }

  function updateItem($itemId, $productName, $description, $price, $quantity, $imageName, $salePrice) {
    // If the update would put us over 5 (or under 3) sale items fail to update.
    try {
        $stmt = $this->dbh->prepare("UPDATE Item SET productName=? description=? price=? description=? price=? quantity=? imageName=? salePrice=? WHERE id=? ");
        $stmt->execute([$productName, $description, floatval($price), intval($quantity), $imageName, floatval($salePrice), intval($itemId)]);
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
  }

  function deleteItem($itemId) {
    // If the delete would put us under 3 sale items fail to delete.
    try {
        $stmt = $this->dbh->prepare("DELETE FROM Item WHERE id=?");
        $stmt->execute([intval($itemId)]);
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
  }
}
