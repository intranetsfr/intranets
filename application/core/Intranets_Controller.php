<?php
/**
 *  ROTY Jeremy <rotyjeremy@gmail.com>
 */
class Intranets_Controller extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }
  public function view($data){
    //$data['_id'] = strreplace('/', '_', $data['view']);
    $data['_id'] = str_replace("/", "_", $data['view']);

    $this->load->view("templates/header", $data);
    $this->load->view($data['view'], $data);
    $this->load->view("templates/footer", $data);
  }
}
?>
