<?php
/**
 *  ROTY Jeremy <rotyjeremy@gmail.com>
 */
class Intranets_Controller extends CI_Controller
{
  private $csss;
  private $jss;
  function __construct()
  {
    parent::__construct();
    $this->csss = array(

    );
    $this->jss = array(

    );
  }
  public function view($data){
    //$data['_id'] = strreplace('/', '_', $data['view']);
    $data['_id'] = str_replace("/", "_", $data['view']);
    if(isset($data['csss'])){
      array_merge($data['csss'], $this->csss);
    }
    $this->load->view("templates/header", $data);
    $this->load->view($data['view'], $data);
    if(isset($data['jss'])){
      array_merge($this->jss, $data['jss']);
    }

    $this->load->view("templates/footer", $data);
  }
}
?>
