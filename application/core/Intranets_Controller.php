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
        "https://fonts.googleapis.com/icon?family=Material+Icons",
        "vendor/mdl/material.min.css",
        "vendor/components/font-awesome/css/all.css",
        "https://getmdl.io/templates/portfolio/styles.css",
        "vendor/twbs/bootstrap/dist/css/bootstrap-grid.min.css"
    );
    $this->jss = array(
        "vendor/mdl/material.min.js"
    );
  }
  public function view($data, $ajax=false){
    //$data['_id'] = strreplace('/', '_', $data['view']);
      if(isset($data['view'])){
        $data['_id'] = str_replace("/", "_", $data['view']);
    
        $data['csss'] = $this->csss;
        if(isset($data['csss'])){
          array_push($this->csss, $data['csss']);
        }
        if($ajax == false){
            $this->load->view("templates/header", $data);        
        }
        $this->load->view($data['view'], $data);
        $data['jss'] = $this->jss;
    
        if(isset($data['jss'])){
          array_push($data['jss'],$this->jss);
        }
        
        if($ajax == false){
            $this->load->view("templates/footer", $data);            
        }
      }else{
          $this->JSON($data);
      }
  }
  private function JSON($data){
      header('Content-Type: application/json');
      echo json_encode( $data );
  }
}
?>
