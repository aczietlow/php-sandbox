<?php

print preg_replace_callback('.-([a-z]).', function ($match) {
  return '_' . strtoupper($match[1]);
}, 'file-name');
// Outputs file_Name.
