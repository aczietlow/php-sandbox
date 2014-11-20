<?php

Class MyClass {
  private $string = 'Can\'t touch this!';

  public function doStuff() {
    $this->string = $this->string . ' Na Na Na Na.';
  }
}

Class SubClass extends MyClass {

  public function __construct() {
    parent::doStuff();
  }

  public function printStuff() {

    $getter = function($myClass) {
      return $myClass->string;
    };
    $getter = Closure::bind($getter, NULL, new MyClass());
    print $getter($this);
  }
}

$obj = new SubClass();
$obj->printStuff(); // prints stuff.
