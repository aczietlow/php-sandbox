<?php

class MathsAPI {
  public function filter(callable $condition, $numbers) {
    $filtered = array();
    // Iterate through all array elements and check the condition.
    foreach ($numbers as $number) {
      if ($condition($number)) {
        $filtered[] = $number;
      }
    }
    return $filtered;
  }
}

class MyClass {
  public static function doStuff($factor) {
    $math = new MathsAPI();

    // Arbitrary numbers are arbitrary.
    $random_numbers = array(34, 56, 1, 5, 67, 123, 4, 55);

    // Outputs Array ( [0] => 34 [1] => 56 [2] => 4 ).
    print_r($math->filter(function($x) use ($factor) {
      // Condition is true is number is a multiple of 2.
      return ($x % $factor == 0) ? TRUE : FALSE;
    }, $random_numbers));
  }
}

MyClass::doStuff(2);
