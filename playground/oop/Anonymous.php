<?php

echo "<pre>";

// Using anonymous functions as a php callback.
echo preg_replace_callback('~-([a-z])~', function ($match) {
  return strtoupper($match[1]);
}, 'hello-world');
// Outputs hello world.

echo "\n\n---------------\n\n";

// Using anonymous function as a variable.
$greet = function($name)
{
  printf("Hello %s\r\n", $name);
};

$greet('World'); // Outputs Hello World.
$greet('PHP'); // Outputs Hello PHP.

echo "</pre>";