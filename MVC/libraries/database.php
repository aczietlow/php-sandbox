<?php 

class Database extends PDO {
  /**
   * Create connection to the database.
   */
  public function __construct() {
    global $database;
    try {
      parent::__construct($database['driver'] . ':host=' . $database['host'] . ';dbname=' . $database['name'], $database['user'], $database['password']);
    } catch (PDOException $e) {
      Database::_checkCredentials($database);
      echo $e->getMessage();
      die();
    }
	}

  /**
   * Checks that valid database credentials have been provided in settings.php
   * @param $databaseArray
   * @TODO: Add regex to check for illegal characters.
   */
  protected function _checkCredentials($databaseArray) {
    switch ($databaseArray) {
      case empty($databaseArray['driver']):
        echo 'No database driver was provided in the settings.php file';
        die();
        break;
      case !empty($databaseArray['driver']):
        $drivers = Database::getAvailableDrivers();
        if (!in_array($databaseArray['driver'], $drivers)) {
          echo 'Please provide a correct database driver', '<br>';
          echo 'Your available drivers are', '<pre>';
          echo '<pre>', print_r($drivers), '</pre>';
          die();
        }
        break;
      case empty($databaseArray['host']):
        echo 'No database host was provided in the settings.php file';
        die();
        break;
      case empty($databaseArray['name']):
        echo 'No database name was provided in the settings.php file';
        die();
        break;
      case empty($databaseArray['user']):
        echo 'No database user was provided in the settings.php file';
        die();
        break;
     case empty($databaseArray['password']):
        echo 'No database password was provided in the settings.php file';
        die();
        break;
    }
  }

  /**
   * Install new database schemas.
   */
  public function installSchema($schema) {

  }
}