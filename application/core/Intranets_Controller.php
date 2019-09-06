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

    $this->db->group_start();
    $this->db->where("pages.pages_process", "link_tag");
    $this->db->or_where("pages.pages_process", "meta");
    $this->db->group_end();
    $data['header'] = $this->Intranets_Model->get();

    $this->load->view("templates/header", $data);
    if(isset($data['admin_editor']) && $data['admin_editor'] == true){
      $this->load->view("admin/plugins/editor", $data);
    }
    $this->load->view($data['view'], $data);

    $this->db->where("pages.pages_process", "script_tag");

        $this->db->group_start();
        $this->db->where("pages.pages_process", "script_tag");
        $this->db->group_end();
    $data['footer'] = $this->Intranets_Model->get();
    $this->load->view("templates/footer", $data);
  }
}
?>
