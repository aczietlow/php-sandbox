<?php

class MathsAPI {
  public function filterByMultiplesOf2($numbers) {
    $filtered = array();
    // Iterate through all array elements and check the condition.
    foreach ($numbers as $number) {
      if ($number % 2 == 0) {
        $filtered[] = $number;
      }
    }
    return $filtered;
  }

  public function filterByMultiplesOf3($numbers) {
    $filtered = array();
    // Iterate through all array elements and check the condition.
    foreach ($numbers as $number) {
      if ($number % 3 == 0) {
        $filtered[] = $number;
      }
    }
    return $filtered;
  }
}

$math = new MathsAPI();

// Arbitrary numbers are arbitrary.
$random_numbers = array(34, 56, 1, 5, 67, 123, 4, 55);

// Outputs Array ( [0] => 34 [1] => 56 [2] => 4 ).
print_r($math->filterByMultiplesOf2($random_numbers));
