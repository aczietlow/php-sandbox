<?php

$transform = function ($match) {
  return ' ' . strtoupper($match[1]);
};

print preg_replace_callback('~-([a-z])~', $transform, 'hello-world');
// Outputs hello World.
