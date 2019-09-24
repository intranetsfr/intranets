<?php 
class Admin extends Intranets_Controller {
    public $tables = array();
    function __construct() {
        parent::__construct();
        $this->tables = $this->db->list_tables();
        
    }
    public function index($table=""){
        $data['view'] = "admin/dashboard";
        $data['tables'] = $this->tables;
        $data['table'] = $table;
        $this->view($data);
    }
}

?>