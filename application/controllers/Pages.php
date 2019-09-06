<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Intranets_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index($uri="/"){
		$data['title'] = "Intranets";
		$data['view'] = "pages/home";
		$this->view($data);
	}
	public function not_found(){
			$data['title'] = "Introuvable";
			$data['view'] = "pages/not_found";
			$data['admin_editor'] = false;
			$this->view($data);
	}
}
