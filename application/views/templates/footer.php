<?php
$this->load->view("pages/templates/footer");
if(isset($jss)){
  foreach($jss as $js){
    echo script_tag($js);
  }
}
 ?>
</body>
</html>
