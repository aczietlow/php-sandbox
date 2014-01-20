<?php

/**
 * array_change_key_case(array $array [, int $case = CASE_LOWER ]).
 * Returns an array with all the keys from $array lowercased or uppercased. Numbered indices are left as is.
 */
$input_array = array('FirsT' => 1, 'SeConD' => 2);
print_r(array_change_key_case($input_array, CASE_UPPER));

/** output
Array
(
    [FIRST] => 1
    [SECOND] => 4
)
*/
