<?php
require_once 'item.php';
class User {

}

/**
 * Since our store won't have all that much content we will follow a redux-like architecture
 *
 * We will mock out our server in memory then worry about syncing to the DB
 */
$userStore = array(
  'cart' => array(
    new ItemRef(1),
    new ItemRef(1),
    new ItemRef(1),
    new ItemRef(1),
    new ItemRef(1),
  )
);
