<?php

class Install_Model extends Model {
  /**
   * Construct Method for install model. We don't call the parent construct because we don't have
   * a database to connect with just yet.
   */
  public function __construct() {

  }

  /**
   * Creates a new database using the credentials the user provided.
   */
  public function install_database() {
    print_r($_POST);
  }

  /**
   * Saves the database connection credentials to the config file.
   */
  protected function _save_credentials() {

  }
}