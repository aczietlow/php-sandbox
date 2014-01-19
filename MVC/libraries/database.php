<?php 

class Database extends PDO {
  /**
   * Create connection to the database.
   */
  public function __construct() {
    try {
      parent::__construct(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    } catch (PDOException $e) {
      echo $e->getMessage();
      die();
    }
	}

  /**
   * Install new database schemas.
   */
  public function installSchema($schema) {

  }
}