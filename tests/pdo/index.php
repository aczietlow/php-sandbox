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





/** Different query modes. */
//// By default fetch will return a numerative and associative array.
//r = $query->fetch(PDO::FETCH_BOTH);
//
//// Will return result in object.
//$r = $query->fetch(PDO::FETCH_BOTH);


/** Fetching query into a class. */
//class GuestBookEntry {
//
//  public $id, $name, $message, $date,
//         $entry;
//
//  public function __construct() {
//    $this->entry = "$this->name posted: $this->message";
//  }
//}
//
//$query = $dh->query('SELECT * FROM guest_book');
//$query->setFetchMode(PDO::FETCH_CLASS, 'GuestBookEntry');
//
//// Iterate through rows of result.
//while($r = $query->fetch()) {
//  echo "<pre>" , print_r($r) , "</pre>";
//}


/** Prepared statements. */
//$name = 'Jim';
//$message = 'test';
//
//$sql = "INSERT INTO guest_book (name, message, date) VALUES (:name, :message, NOW())";
//$query = $dh->prepare($sql);
//$query->execute(array(
//  ':name' => $name,
//  ':message' => $message
//));
//
//// Grab the id from the last inserted record.
//echo $dh->lastInsertId();

/** Count */
$query =  $dh->query('SELECT * FROM guest_book');

if ($query->rowCount()) {
  while($r = $query->fetch()) {
    echo $r['message'], '<br>';
  }
}
else {
  echo 'No results';
}