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
$random_numbers = array(34, 56, 1, 5, 67, 123, 4, 55);
// Condition is true is number is a multiple of 2.
$condition = function($x) {
  return ($x % 2 == 0) ? TRUE : FALSE;
};
$multiples = filter($condition, $random_numbers);
print_r($multiples);
