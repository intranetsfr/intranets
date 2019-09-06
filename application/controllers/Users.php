<?php

/**
 * ROTY Jeremy <rotyjeremy@gmail.com>
 Users
 */
class Users extends Intranets_Controller
{

  public function __construct()
  {
    parent::__construct();
  }
  public function login(){
  		$data['title'] = "Login";
  		$data['view'] = "pages/users/login";
  		$this->view($data);
  }
  public function subscribe(){

  		$data['title'] = "Subscribe";
  		$data['view'] = "pages/users/subscribe";
  		$this->view($data);
  }
  public function forgetpassword(){
  		$data['title'] = "Forget password ?";
  		$data['view'] = "pages/users/forgetpassword";
  		$this->view($data);
  }
  public function redefinedpassword(){

  		$data['title'] = "Redefined Password";
  		$data['view'] = "pages/users/redefinedpassword";
  		$this->view($data);
  }
}
 ?>
