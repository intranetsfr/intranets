<?php
/**
 *
 */
class Admin extends Intranets_Controller
{
  private $_admin = null;
  private $files = array();
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
          $data['functions'] = $this->Intranets_Model->functions;
          $data['files'] = $this->get_me_vendor_files();
          if(isset($_POST) && !empty($_POST['script_name'])){
            $data_insert = array(
              "pages_path"=>$this->input->post("pages_path"),
                "pages_process"=>$this->input->post("script_name"),
                "pages_value"=>json_encode($data['functions'][$this->input->post("script_name")])
            );
            $this->db->insert("pages", $data_insert);
  //          e($data['functions'][$_POST['script_name']], true);
          }
          if(isset($_POST['pages_id'])){
            e($_POST, true);
            $data_update = array("");
          }
          if(!empty($pages_index) or $pages_index === '0'){
            $pages_path = $data['pages'][$pages_index]['pages_path'];

            $this->db->where("pages_path", $pages_path);
            $page = $this->db->get("pages");
            $data['page_info'] = $data['pages'][$pages_index];


            $data['page'] = $page->result("array");
          }
          $data['view'] = "admin/users/dashboard";
        }else{
          $data['view'] = "admin/users/login";
        }
  			$this->view($data);
  }

  public function get_me_vendor_files($dir='./vendor'){

    /*
    https://www.php.net/manual/fr/function.scandir.php
    131mmda dot nl at gmail dot com ¶
    */
   $result = array();
   $cdir = scandir($dir);
   $avec = array('./');
   $sans = array('');
   foreach ($cdir as $key => $value)
   {
      if (!in_array($value,array(".","..")))
      {
         if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
         {
           $this->files = $this->get_me_vendor_files($dir . DIRECTORY_SEPARATOR . $value);
           //$this->get_me_vendor_files($dir . DIRECTORY_SEPARATOR . $value);

        }
         else
         {
            $this->files[] = array(
              "path"=>str_replace($avec, $sans, $dir . DIRECTORY_SEPARATOR.$value),
              "file"=>$value
            );
         }
      }
   }
   return $this->files;
  }
}

 ?>
