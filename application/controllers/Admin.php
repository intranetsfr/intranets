<?php

class Admin extends Intranets_Controller
{
	public $tables = array();

	function __construct()
	{
		$this->csss = array(
			"assets/css/style.css?time=" . time()
		);
		$this->main = array(
			"Admin" => "admin"
		);
		parent::__construct();
		$this->tables = $this->db->list_tables();
	}

	public function index($table = "")
	{
		$data['view'] = "admin/dashboard";
		$data['tables'] = $this->tables;
		$data['table'] = $table;
		$this->view($data);
	}

	public function schema($table)
	{

		$data['view'] = "admin/schema";
		$data['tables'] = $this->tables;
		$data['table'] = $table;
		$data['schema'] = $this->db->field_data($table);
		$this->view($data);
	}

	public function data($table)
	{

		$data['view'] = "admin/data";
		$data['tables'] = $this->tables;
		$data['table'] = $table;
		$data['fields'] = $this->db->list_fields($table);
		$datas = $this->db->get($table);
		$data['datas'] = $datas->result("array");

		$this->view($data);
	}

	public function components()
	{
		$data["components"] = array();
		$data["scripts"] = array();
		$this->view($data);
	}

	public function redirect(){
		$data["components"] = array();
		$data["scripts"] = array();
		$this->view($data);
	}
	public function pages()
	{

		$data["pages"] = array(
			array("name"=>"index", "online"=>true),
			array("name"=>"contact-us", "online"=>false),
			array("name"=>"services", "online"=>false),
			array("name"=>"prices", "online"=>false),
			array("name"=>"users/login", "online"=>false),
			array("name"=>"users/password", "online"=>false),
			array("name"=>"users/redefined_password", "online"=>false),
			array("name"=>"users/forgetpassword", "online"=>false),
		);
		$this->view($data);
	}

	public function builder($is_main = "")
	{

		array_push($this->jss, array());
		$this->csss = array();
		if (empty($is_main)) {
			$data['title'] = "ok";
			$data['view'] = "admin/builder/index";
			$this->view($data, true);
		} elseif ($is_main == 'main') {
			$data['view'] = "admin/builder/main";
			$this->view($data, 'iframe');
		} else {


		}
	}
}

?>
