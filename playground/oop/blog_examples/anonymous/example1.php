<?php

// Using anonymous function as a variable.
$greet = function($name)
{
  printf("Hello %s", $name);
};
// Outputs Hello World.
$greet('World');
