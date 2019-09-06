<?php
/**
 *  ROTY Jeremy <rotyjeremy@gmail.com>
 */
class Intranets_Controller extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model("Intranets_Model");
  }
  public function view($data){
    //$data['_id'] = strreplace('/', '_', $data['view']);
    $data['_id'] = str_replace("/", "_", $data['view']);

    $data['header'] = $this->Intranets_Model->header_get();
    $this->load->view("templates/header", $data);
    if(isset($data['admin_editor']) && $data['admin_editor'] == true){
      $this->load->view("admin/plugins/editor", $data);
    }
    $this->load->view($data['view'], $data);
    $data['footer'] = $this->Intranets_Model->footer_get();
    $this->load->view("templates/footer", $data);
  }
}
?>
