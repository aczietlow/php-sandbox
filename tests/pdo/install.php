<?php

/**
 * @file
 * Test file for creating and dropping tables via PDO
 */
class InstallSchema {
  protected $dh;

  public function __construct($dh) {
    $this->dh = $dh;
  }
}