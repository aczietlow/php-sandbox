<?php

$transform = function ($match) {
  return '_' . strtoupper($match[1]);
};

// Outputs file_Name.
print preg_replace_callback('~-([a-z])~', $transform, 'file-name');
