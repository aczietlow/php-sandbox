<?php
echo "<pre>";
/**
 * array_change_key_case(array $array [, int $case = CASE_LOWER ])
 * Returns an array with all the keys from $array lowercased or uppercased. Numbered indices are left as is.
 */
// Example 1
$input_array = array('FirsT' => 1, 'SeConD' => 2);
print_r(array_change_key_case($input_array, CASE_UPPER));

/*
Array
(
    [FIRST] => 1
    [SECOND] => 4
)
*/

/**
 * array_chunk(array $array, int size [, bool $perserve_keys = false] )
 * Returns multidimensional array numerically indexed starting with 0, with each dimension containing $size elements from $array
 */
// Example 1
$input_array = array('a', 'b', 'c', 'd', 'e');
print_r(array_chunk($input_array,2));
print_r(array_chunk($input_array,2, TRUE));

/*
Array
(
  [0] => Array
  (
    [0] => a
    [1] => b
  )

  [1] => Array
  (
    [0] => c
    [1] => d
  )

  [2] => Array
  (
    [0] => e
  )

)
Array
(
  [0] => Array
  (
    [0] => a
    [1] => b
  )

  [1] => Array
  (
    [2] => c
    [3] => d
  )

  [2] => Array
  (
    [4] => e
  )

)
 */

/**
 * array_column(array $array, $mixed $column_key [, mixed $index_key = null])
 * Returns an array of values representing a single column from the input array.
 * PHP 5 >= 5.5
 */
if (function_exists('array_column')) {
  // Example 1
  $records = array(
    array(
      'id' => 2135,
      'first_name' => 'John',
      'last_name' => 'Doe',
    ),
    array(
      'id' => 3245,
      'first_name' => 'Sally',
      'last_name' => 'Smith',
    ),
    array(
      'id' => 5342,
      'first_name' => 'Jane',
      'last_name' => 'Jones',
    ),
    array(
      'id' => 5623,
      'first_name' => 'Peter',
      'last_name' => 'Doe',
    )
  );

  $first_names = array_column($records, 'firstname');
  print_r($first_names);

  /*
  Array
  (
    [0] => John
    [1] => Sally
    [2] => Jane
    [3] => Peter
  )
   */

  // Example 2 using records from Example #1.
  $last_name = array_column($records, 'last_name', 'id');

  /*
  Array
  (
    [2135] => Doe
    [3245] => Smith
    [5342] => Jones
    [5623] => Doe
  )
   */

}

/**
 * array_combine(array $keys, array $values)
 * Returns an array by using the values from $keys as the keys and the values from $values as the corresponding values.
 */
// Example 1
$a = array('green', 'red', 'yellow');
$b = array('avocado', 'apple', 'banana');
$c = array_combine($a, $b);

print_r($c);

/*
Array
(
  [green]  => avocado
  [red]    => apple
  [yellow] => banana
)
 */


/**
 * array_count_values(array $array)
 * Returns an associative array of values from $array as keys and their count as their value.
 */

// Example 1
$array = array(1, 'hello', 1, 'world', 'hello');
print_r(array_count_values($array));

/*
Array
(
    [1] => 2
    [hello] => 2
    [world] => 1
)
 */

/**
 * array_diff_assoc(array $array1, array $array2[, array $...] )
 * Compares array1 against array2 and returns the difference. Array keys are also used in comparison.
 */
// Example 1
$array1 = array('a'=> 'green' , 'b' => 'brown', 'c' => 'blue', 'red');
$array2 = array('a' => 'green', 'yellow', 'red');
$result = array_diff_assoc($array1,$array2);
print_r($result);

/*
Array
(
    [b] => brown
    [c] => blue
    [0] => red
)
 */

// Example 2
$array1 = array(0, 1, 2);
$array2 = array('00', '01', '2');
$result = array_diff_assoc($array1, $array2);

/*
Array
(
    [0] => 0
    [1] => 1
)
 */

/**
 * array_diff_key(array $array1, array $array2, [, array $...])
 * Compares the keys from $array1 against the keys from $array2 and returns the difference.
 */
// Example 1
$array1 = array('blue' => 1, 'red' => 2, 'green' => 3, 'purple' => 4);
$array2 = array('green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan' => 8);

var_dump(array_diff_key($array1, $array2));

/*
array(2) {
  ["red"]=>
  int(2)
  ["purple"]=>
  int(4)
}
 */

/**
 * array_diff_uassoc()
 */

/**
 * array_diff_ukey()
 */

/**
 * array_diff(array $array1, array $array2, [, array $...])
 * Compares $array1 against one or more arrays and returns the values in $array1 that are not present in other arrays.
 */
// Example 1
$array1 = array("a" => "green", "red", "blue", "red");
$array2 = array("b" => "green", "yellow", "red");
$result = array_diff($array1, $array2);

print_r($result);

/*
Array
(
    [1] => blue
)
 */


/**
 * array_slice(array $array, int $offset [, int $length = NULL [, bool $perserve_keys = false]])
 * Returns the sequence of elements from $array as specified by $offset and $length
 */
// Example 1
$array = array('a', 'b', 'c', 'd', 'e');

$output = array_slice($array, 2);           // Returns 'c', 'd', and 'e'.
$output = array_slice($array, -2, 1);       // Returns 'd'.
$output = array_slice($array, 0, 3); // Returns 'a', 'b', 'c'.

print_r(array_slice($array, 2, -1));
print_r(array_slice($array, 2, -1, TRUE));

/*
Array
(
    [0] => c
    [1] => d
)
Array
(
    [2] => c
    [3] => d
)
 */
echo "</pre>";