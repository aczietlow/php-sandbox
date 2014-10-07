<?php
echo "<pre>";

/*
Anonymous functions are good for few lines code, without polluting the
namespace such as callbacks.
*/

// Using create_function to create a lambda function.
$str = "Hello world.";
// Create function is depreciated.
// It was part of a hack until true anonymous functions were introduced.
$lambda = create_function('$match', 'return "friend";');
$str = preg_replace_callback('/world/', $lambda, $str);
echo $str;

echo "\n\n---------------\n\n";

// Example 2
// Using anonymous functions as a callback parameter in preg_replace_callback().
$transform = function ($match) {
  return ' ' . strtoupper($match[1]);
};

echo preg_replace_callback('~-([a-z])~', $transform, 'hello-world -think');
// Outputs hello World.


// Example 3
echo preg_replace_callback('~-([a-z])~', function ($match) {
  return ' ' . strtoupper($match[1]);
}, 'hello-world');
// Outputs hello World.

echo "\n\n---------------\n\n";

// Example 1
// Using anonymous function as a variable.
$greet = function($name)
{
  printf("Hello %s\r\n", $name);
};

// Outputs Hello World.
$greet('World');

echo "\n\n---------------\n\n";

/*
 * The nested function will become part of the global namespace, and will throw
 * a redeclaration error if censorString is called multiple times.
 */

function censorString($string, $censor) {
  function replace($match) {
    return str_repeat("*", strlen($match[0]));
  }
  return preg_replace_callback('/' . $censor . '/', 'replace', $string);
}

echo censorString("hello world", "world");
echo "\n";
//echo censorString("hello world", "hello");

echo "\n\n---------------\n\n";

/*
 * Alternatively we can create an anonymous function and assign it to a
 * variable. Note the semi colon at the end of the declaration.
 *
 */

function censorString2($string, $censor) {
  $func = function ($match) {
    return str_repeat("*", strlen($match[0]));
  };
  return preg_replace_callback('/' . $censor . '/', $func, $string);
}

echo censorString2("hello world", "world");
echo "\n";
echo censorString2("hello world", "hello");


echo "\n\n---------------\n\n";

/*
 * Another, arguably cleaner solution is to place the anonymous function
 * inline as a parameter.
 */

function censorString3($string, $censor) {
  return preg_replace_callback('/' . $censor . '/', function ($match) {
    return str_repeat("*", strlen($match[0]));
  }, $string);
}

echo censorString3("hello world", "world");
echo "\n";
echo censorString3("hello world", "hello");

echo "</pre>";

$output = '
<h2>php functions that use callbacks </h2>
<ul>
    <li>bool array_walk ( array &$array , callable $callback [, mixed $userdata = NULL ] ) ***</li>
    <li>mixed preg_replace_callback ( mixed $pattern , callable $callback , mixed $subject [, int $limit = -1 [, int &$count ]] ) ***</li>
    <li>array array_diff_uassoc ( array $array1 , array $array2 [, array $... ], callable $key_compare_func )</li>
    <li>array array_diff_ukey ( array $array1 , array $array2 [, array $... ], callable $key_compare_func )</li>
    <li>array array_filter ( array $array [, callable $callback ] )</li>
    <li>array array_intersect_uassoc ( array $array1 , array $array2 [, array $... ], callable $key_compare_func )</li>
    <li>array array_intersect_ukey ( array $array1 , array $array2 [, array $... ], callable $key_compare_func )</li>
    <li>array array_map ( callable $callback , array $array1 [, array $... ] ) ****</li>
    <li>mixed array_reduce ( array $array , callable $callback [, mixed $initial = NULL ] )</li>
    <li>array array_udiff_assoc ( array $array1 , array $array2 [, array $... ], callable $value_compare_func )</li>
    <li>array array_udiff_uassoc ( array $array1 , array $array2 [, array $... ], callable $value_compare_func , callable $key_compare_func )</li>
    <li>array array_udiff ( array $array1 , array $array2 [, array $... ], callable $value_compare_func )</li>
    <li>array array_uintersect_assoc ( array $array1 , array $array2 [, array $... ], callable $value_compare_func )</li>
    <li>array array_uintersect_uassoc ( array $array1 , array $array2 [, array $... ], callable $value_compare_func , callable $key_compare_func )</li>
    <li>array array_uintersect ( array $array1 , array $array2 [, array $... ], callable $value_compare_func )</li>
    <li>bool array_walk_recursive ( array &$array , callable $callback [, mixed $userdata = NULL ] )</li>
    <li></li>

</ul>
';

echo "\n\n---------------\n\n";

/*
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$logClosure = function() {
  $log = new Logger('event');
  $log->pushHandler(new StreamHandler("logfile.log", Logger::DEBUG));
  return $log;
};

//logger will not be initialized until this point
$logger = $logClosure();
*/

print $output;
