<?php
// legacy
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME','sb_mvc');
define('DB_USER', 'root');
define('DB_PASS', 'root');

// temp solves URL structure issues. Needs to be reworked in htaccess.
define('URL', 'http://sandbox/php-sandbox/MVC/');

// database array
$database = array(
  'driver' => 'mysql',
  'host' => '127.0.0.1',
  'name' => 'sb_mvc',
  'user' => 'root',
  'password' => 'root',
  'port' => '',
);