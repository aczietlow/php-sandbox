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

// Using anonymous functions as a php callback.
echo preg_replace_callback('~-([a-z])~', function ($match) {
  return strtoupper($match[1]);
}, 'hello-world');
// Outputs hello world.

echo "\n\n---------------\n\n";

// Using anonymous function as a variable.
$greet = function($name)
{
  printf("Hello %s\r\n", $name);
};

// Outputs Hello World.
$greet('World');

echo "\n\n---------------\n\n";

function censorString($string, $censor) {
  return preg_replace_callback('/' . $censor . '/', function ($match) {
    return str_repeat("*", strlen($match[0]));
  }, $string);
}

echo censorString("hello world", "world");
echo "\n";
echo censorString("hello world", "hello");

echo "</pre>";
