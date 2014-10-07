<?php

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
