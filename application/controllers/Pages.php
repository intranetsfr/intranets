<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Intranets_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$data['title'] = "Intranets";
		$data['view'] = "pages/home";
		$data['admin_editor'] = true;
		$this->view($data);
	}
	public function page($path="")
	{

		$this->load->view('welcome_message');
	}
	public function not_found(){
		$this->page("not_found");
	}
}
