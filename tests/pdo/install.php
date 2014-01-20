<?php

/**
 * @file
 * Test file for creating and dropping tables via PDO
 */
class InstallSchema {
  protected $dh;

  public function __construct($dh) {
    $this->dh = $dh;
  }

  // Create dummy table
  public function dummyTable($name) {
    // Test sql statement
    // CREATE TABLE IF NOT EXISTS test ( id int, userName varchar(255) )

    /**
     * @note
     * Prepare statement placeholder variables seem to be intended only for sql values, not table names.
     * Used normal string concatenation instead.
     */
    $createStatement = "CREATE TABLE IF NOT EXISTS $name (
      id int,
      userName varchar(255)
      )";
    $statement = $this->dh->prepare($createStatement);

    try {
      $statement->execute(array(':name' => $name));
      echo "success";
    } catch (PDOException $e) {
      echo $e->getMessage(), '<br>';
      echo $createStatement , '<br>', $name;
      die();
    }

  }

  public function addRecord($name, $message) {
    $sql = "INSERT INTO guest_book (name, message, date) VALUES (:name, :message, NOW())";
    $query = $this->dh->prepare($sql);

    try {
      $query->execute(array(
        ':name' => $name,
        ':message' => $message
      ));
    } catch (PDOException $e) {
      echo $e->getMessage();
      die();
    }
  }
}