<?php

/**
 * Class Install_Model
 */
class Install_Model extends Model {

  /**
   * Construct Method for install model. We don't call the parent construct because we don't have
   * a database to connect with just yet.
   */
  public function __construct() {

  }

  /**
   * Creates a new database using the credentials the user provided.
   * @TODO Use credentials to create new database schema.
   */
  public function database() {
    try {
      $dbh = new Database(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    echo "success";
  }

  /**
   * Saves the database connection credentials to the config file.
   */
  protected function _save_credentials() {

  }
}