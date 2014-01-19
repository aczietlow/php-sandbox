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

$query = $dh->query('SELECT * FROM guest_book');

while($r = $query->fetch()) {
  print $r['message'] . "<br>";
}