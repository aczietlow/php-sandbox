<?php
class Install extends Controller {
  function __construct() {
    parent::__construct();
  }

  function index() {
    $this->view->msg = "Welcome!";
    $this->view->render('install/index');
  }
}