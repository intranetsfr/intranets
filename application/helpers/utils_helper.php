<?php
function e($data, $exit=false){
  echo '<pre>';
  var_dump($data);
  echo '</pre>';
  if($exit){
    exit();
  }
}
 ?>
