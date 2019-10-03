<?php

/**
 *  ROTY Jeremy <rotyjeremy@gmail.com>
 */
class Intranets_Controller extends CI_Controller
{
	public $csss;
	public $jss;
	public $main;

	function __construct()
	{
		parent::__construct();

		$this->jss = array_merge(array(
			"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js",
			"node_modules/material-design-lite/material.min.js"
		), (empty($this->jss) ? array() : $this->jss));

		$this->csss = array_merge(array(
			"https://fonts.googleapis.com/icon?family=Material+Icons",
			"node_modules/material-design-lite/dist/material.min.css",
			"vendor/components/font-awesome/css/all.css",
			"https://getmdl.io/templates/portfolio/styles.css",
			"node_modules/bootstrap-grid/css/bootstrap.css"
		), (empty($this->csss) ? array() : $this->csss));
	}

	public function view($data, $ajax = false)
	{
		//$data['_id'] = strreplace('/', '_', $data['view']);
		if (isset($data['view'])) {
			$data['_id'] = str_replace("/", "_", $data['view']);

			$data['csss'] = $this->csss;
			if ($ajax !== true) {
				$this->load->view("templates/header", $data);
				if ($ajax !== 'iframe') {
					if (empty($this->main)) {
						$data['main'] = array(
							"Home" => ""
						);
					} else {
						$data['main'] = $this->main;
					}
					$this->load->view("pages/templates/header", $data);
				}
			}
			$this->load->view($data['view'], $data);
			if ($ajax !== true) {
				$data['jss'] = $this->jss;

				if ($ajax !== 'iframe') {
					$this->load->view("pages/templates/footer");
				}
				$this->load->view("templates/footer", $data);
			}
		} else {
			$this->JSON($data);
		}
	}

	private function JSON($data)
	{
		header('Content-Type: application/json');
		echo json_encode($data);
	}
}

?>
