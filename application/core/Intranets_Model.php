<?php

/**
 * ROTY Jeremy <rotyjeremy@gmail.com>
 */
class Intranets_Model extends CI_Model
{
  public $functions = array();
  function __construct()
  {

    $functions = get_defined_functions();
    $functions_list = array();
    foreach ($functions['user'] as $func) {
            $f = new ReflectionFunction($func);
            $args = array();
            foreach ($f->getParameters() as $param) {
                    if ($param->isPassedByReference()){

                    }
                    if ($param->isOptional() && !is_array($param->getDefaultValue())) {
                          //  $tmparg = '[' . $tmparg . '$' . $param->getName() . ' = ' . $param->getDefaultValue() . ']';
                          $name = $param->getName();
                          $args[$name] = $param->getDefaultValue();
                    }

            }
            $functions_list[$func] = ($args);
    }
    $this->functions = $functions_list;
  }
  public function get($path=""){
    if(!empty($path)){
      $this->db->where("pages.pages_path", $path);
    }
    $this->db->group_start();
    $this->db->where("pages.pages_path", "*");
    $_path = '';
    foreach ($this->uri->rsegments as $path) {
      $_path .= $path.'/';
      $this->db->or_where("pages.pages_path", $_path);
    }
    $this->db->group_end();
    $result = $this->db->get("pages");
//e($this->db->last_query());
    return $this->afficher_menu(0, 0, $result->result("array"));
    //return $result->result("array");
  }
  public function footer_get(){

  }
  private function afficher_menu($parent, $niveau, $array) {
    $html = "";
    foreach ($array AS $noeud) {
        if ($parent == $noeud['pages_index']) {
          for ($i = 0; $i < $niveau; $i++){
            $html .= "-";
          }

          //$html .= " " . $noeud['pages_process'] . "<br>";
          $values = json_decode($noeud['pages_value'], true);
          $i = 0;
          $exec = 'return  '.$noeud['pages_process'].'(';
          foreach($values as $k=>$v){

            $exec .= "'".$v."'";
            if($i<count($values)-1){
              $exec .= ',';
            }
            $i++;
          }
          $exec .= ');';
          $html .= eval($exec);
          $html .= $this->afficher_menu($noeud['pages_id'], ($niveau + 1), $array);
        }
    }
    return $html;
  }
}
 ?>
