<?php

/*
 * Using closures we can access private variables in classes.
 *
 * Closures are objects and contain a bind and bindTo method. By using this
 * feature closures can extend classes without modifying the class.
 */
class SimpleClass {
  private $privateData = 42;
}

$simple_closure = function() {
  return $this->privateData;
};

$result_closure = Closure::bind($simple_closure, new SimpleClass(), 'SimpleClass');

echo $result_closure();
