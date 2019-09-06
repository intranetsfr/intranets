<?php
/**
 *
 */
class Admin extends Intranets_Controller
{
  private $_admin = null;
  function __construct()
  {
    parent::__construct();
  }
  public function index(){

  			$data['title'] = "Admin";
  			$data['view'] = "admin/users/login";
  			$data['admin_editor'] = false;
  			$this->view($data);
  }
}

 ?>
