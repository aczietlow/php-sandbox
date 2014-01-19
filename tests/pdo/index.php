<?php
//list all available drivers.
PDO::getAvailableDrivers();

try {
  // Create a new database handler and connect to the database.
  $dh = new PDO('mysql:host=127.0.0.1;dbname=test_app', 'root', 'root');
  $dh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  // Print error from mysql and die.
  print($e->getMessage());
  die();
}



// By default fetch will return a numerative and associative array.
//$r = $query->fetch(PDO::FETCH_BOTH);

// Will return result in object.
//$r = $query->fetch(PDO::FETCH_BOTH);

class GuestBookEntry {

  public $id, $name, $message, $date,
         $entry;

  public function __construct() {
    $this->entry = "$this->name posted: $this->message";
  }
}

$query = $dh->query('SELECT * FROM guest_book');
$query->setFetchMode(PDO::FETCH_CLASS, 'GuestBookEntry');

// Iterate through rows of result.
while($r = $query->fetch()) {
  echo "<pre>" , print_r($r) , "</pre>";
}


