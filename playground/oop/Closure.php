<?php

/*
 * Closures are anonymous functions that are aware of their surroundings.
 */

echo "<pre>";
// Can not change '5' within this anonymous function.
$mult = function($x) {
  return $x * 5;
};

echo $mult(2);

echo "\n\n---------------\n\n";

/*
 * The use construct allows the anonymous functions to access
 * variables outside of the function, or be 'closed' within the
 * current function.
 */

$multiply = function($multiplier) {
  return function($x) use ($multiplier) {
    return $x * $multiplier;
  };
};

// $mult5 now contains a function that returns a number multiplied by 5.
$mult5 = $multiply(5);

echo "</pre>";
