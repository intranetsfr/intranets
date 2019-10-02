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
			"Tables" => "admin",
			"Builder" => "admin/intranets.builder",
			"scripts" => "admin/scripts"
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

	public function builder($is_main = "")
	{
		array_push($this->jss, array(
			"node_modules/jstree/dist/jstree.min.js"
		));
		array_push($this->csss, array(
			"href"=>"node_modules/jstree/dist/themes/default/style.min.css"
		));
		if (empty($is_main)) {
			$data['title'] = "ok";
			$data['view'] = "admin/builder/index";
			$this->view($data, true);
		} else {
			$data['view'] = "admin/builder/main";
			$this->view($data, 'iframe');
		}
	}
}

?>
