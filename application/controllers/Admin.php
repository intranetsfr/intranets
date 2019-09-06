<?php
/**
 *
 */
class Admin extends Intranets_Controller
{
  private $_admin = null;
  function __construct()
  {
    parent::__construct();
  }
  public function index($pages_index=""){
  			$data['title'] = "Admin";
        $data['admin'] = true;
        if($data['admin']){
          $this->db->group_by("pages_path");
          $pages = $this->db->get("pages");
          $data['pages'] = $pages->result("array");
          if(!empty($pages_index)){
            $data['page'] = $data['pages'][$pages_index];
          }
          $data['view'] = "admin/users/dashboard";
        }else{
          $data['view'] = "admin/users/login";
        }
  			$this->view($data);
  }
}

 ?>
