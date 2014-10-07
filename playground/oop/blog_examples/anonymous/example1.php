<?php

// Using anonymous function as a variable.
$greet = function($name)
{
  printf("Hello %s\r\n", $name);
};
// Outputs Hello World.
$greet('World');
