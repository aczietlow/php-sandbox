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

echo $mult5(1) . "\n";
echo $mult5(5) . "\n";


echo "\n\n---------------\n\n";

/*
 * filter an array of number according to certain criteria.
 * Uses anonymous functions, but the lower bound of the filter
 * is inflexible.
 */

function filter($condition, $numbers) {
  $filtered = array();

  // Iterate through all array elements.
  foreach ($numbers as $number) {
    if ($condition($number)) {
      $filtered[] = $number;
    }
  }
  return $filtered;
}

$not_random_numbers = array(34, 56, 1, 5, 67, 123, 4, 55);

$condition = function($x) {
  return ($x > 100) ? TRUE : FALSE;
};

$greater_than_100 = filter($condition, $not_random_numbers);

print_r($greater_than_100);

echo "\n\n---------------\n\n";

/*
 * filter an array of number according to certain criteria.
 * Uses closures and allows for the lower bound to be flexible.
 */

function filter2($condition, $numbers) {
  $filtered = array();

  // Iterate through all array elements.
  foreach ($numbers as $number) {
    if ($condition($number)) {
      $filtered[] = $number;
    }
  }
  return $filtered;
}

function createFilter($lower_bound) {
  return function ($x) use ($lower_bound) {
    return ($x > $lower_bound) ? TRUE : FALSE;
  };
}

$greater_than_100 = createFilter(100);
$greater_than_400 = createFilter(400);

$not_random_numbers = array(42, 34, 56, 1, 5, 67, 123, 4, 55, 467, 555);

print_r(filter($greater_than_100, $not_random_numbers));
print_r(filter($greater_than_400, $not_random_numbers));

echo "</pre>";
