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

  // Iterate through all array elements and check the condition.
  foreach ($numbers as $number) {
    if ($condition($number)) {
      $filtered[] = $number;
    }
  }
  return $filtered;
}

$random_numbers = array(34, 56, 1, 5, 67, 123, 4, 55);

// Condition is true is number is a multiple of 2.
$condition = function($x) {
  return ($x % 2 == 0) ? TRUE : FALSE;
};

$multiples = filter($condition, $random_numbers);

print_r($multiples_of_2);

echo "\n\n---------------\n\n";

/*
 * filter an array of number according to certain criteria.
 * Uses closures and allows for the lower bound to be flexible.
 */

function filter2($condition, $numbers) {
  $filtered = array();

  // Iterate through all array elements and check the condition.
  foreach ($numbers as $number) {
    if ($condition($number)) {
      $filtered[] = $number;
    }
  }
  return $filtered;
}

function filterByMultiples($factor) {
  return function ($x) use ($factor) {
    return ($x % $factor == 0) ? TRUE : FALSE;
  };
}

$multiples2 = filterByMultiples(2);
$multiples3 = filterByMultiples(3);

$random_numbers = array(34, 56, 1, 5, 67, 123, 4, 55, 42);

print_r(filter2($multiples_of_2, $random_numbers));
print_r(filter2($multiples_of_3, $random_numbers));

echo "\n\n---------------\n\n";

// Debug information about the closure object.
echo ReflectionFunction::export($greater_than_100);

echo "\n\n---------------\n\n";

/*
 * Though closures have access to variables from the parent scope,
 * they are not called by reference and as such changing the value
 * of a variable in which a closure has been "closed" around will
 * not effect the variable outside the closure.
 */

// Set the counter.
$i = 0;
// Increase counter within the scope of the function.
$closure = function () use ($i){
  $i++;
};
// Run the function.
$closure();
// The global count hasn't changed.
// Returns 0.
echo $i . "\n";

// Reset the count.
$i = 0;
// Increase counter within the scope of the function but pass it as a reference.
$closure = function () use (&$i){
  $i++;
};
// Run the function.
$closure();
// The global count has increased.
// Returns 1.
echo $i . "\n";

echo "</pre>";
