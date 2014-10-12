<?php

// Using anonymous function as a variable.
$greet = function($name)
{
  printf("It goes to %s.", $name);
};
// Outputs Hello World.
$greet('eleven');
