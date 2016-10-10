<?php
require_once 'store.php';

const ADD_ITEM = "STORE/ADD_ITEM";
const REMOVE_ITEM = "STORE/REMOVE_ITEM";
const UPDATE_ITEM = "STORE/UPDATE_ITEM";
$storeReducer = function($state, $action) {
  switch($action->type) {
    case ADD_ITEM:
      return $state;

    case REMOVE_ITEM:
      return $state;

    case UPDATE_ITEM:
      return $state;

    default:
      return $state;
  }
};

$store = new Store($storeReducer);
// $store->getState()
echo json_encode($store->getState());

?>
