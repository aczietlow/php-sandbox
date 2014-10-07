<?php

// Regular expression that matches email addresses with .co.uk TLD.
$pattern = "/[a-z0-9-]+(\.[a-z0-9-]+)*@[a-z0-9-]+(\.co)*(\.uk)/";

// Mock data.
$users = array(
  array(
    'name' => 'Tom',
    'mail' => 'tom@foobar.com',
  ),
  array(
    'name' => 'Chris',
    'mail' => 'chris@foobar.com',
  ),
  array(
    'name' => 'Jim',
    'mail' => 'jim@foobar.co.uk',
  ),
);
array_walk($users, function($user) use ($pattern) {
  // If a user is using an uk email, update their email domain to a new domain.
  if (preg_match($pattern, $user['mail'])) {
    print $user['name'];
  }
});
