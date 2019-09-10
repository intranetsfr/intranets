<?php 
class Admin extends Intranets_Controller {
    function __construct() {
        parent::__construct();
    }
    public function index(){
        $data['title'] = "ok";
        $this->view($data);
    }
}?>