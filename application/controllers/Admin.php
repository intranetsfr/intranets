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
          if(!empty($pages_index) or $pages_index === '0'){
            $pages_path = $data['pages'][$pages_index]['pages_path'];

            $this->db->where("pages_path", $pages_path);
            $page = $this->db->get("pages");
            $data['page_info'] = $data['pages'][$pages_index];
            $data['functions'] = $this->Intranets_Model->functions;
            $data['page'] = $page->result("array");
          }
          $data['view'] = "admin/users/dashboard";
        }else{
          $data['view'] = "admin/users/login";
        }
  			$this->view($data);
  }
}

 ?>
