<?php
$this->load->view("pages/templates/footer");
if(isset($jss)){
  foreach($jss as $js){
    script_tag($js);
  }
}
 ?>
</body>
</html>
