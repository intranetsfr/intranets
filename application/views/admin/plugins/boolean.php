<?php
echo $value;
switch ($key) {
  case 'index':
  break;
  default:
?>
<label>true <input type="radio" name="<?= $key?>" value=true/></label>
<label>false <input type="radio" name="<?= $key?>" value=false/></label>
<?php
  break;
}
  ?>
