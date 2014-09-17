<?php

echo "<pre>";

// Variable functions.

function Hello($name) {
  echo "hello $name.";
}

$func = "Hello";
$func("World");

echo "\n\n---------------\n\n";

Class CHello {
  static function hello($name) {
    echo "Hello $name.";
  }
}

// Not case sensitive?
$func = "Hello";
Chello::$func("World from a static method");


echo "</pre>";
