<?php
class Install extends Controller {
  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->view->msg = "Welcome!";
    $this->view->render('install/index');
  }

  public function database() {
    $this->model->database();
  }
}