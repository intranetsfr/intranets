<?php
function e($data=array(), $exit=false){
  echo '<pre>';
  var_dump($data);
  echo '</pre>';
  if($exit){
    exit();
  }
  return true;
}

function to_int($param) : int {
    return (int) $param;
}
 ?>
