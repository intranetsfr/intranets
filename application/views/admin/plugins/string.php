<?php
switch ($key) {
  case 'href':
?>
<select name="href" id="href">
<?php
foreach ($files as $file) {
  ?>
  <option <?= $file['path'] == $value ? "selected":""?> value="<?= $file['path']?>"><?= $file['path']?></option>
  <?php
} ?>
</select>
<?php
  ?>

  <?php
    break;
    case("rel"):

    break;
  default:
      echo $key;
      ?>
      <input type="text" name="<?= $key?>"/>
      <?php
    break;
}
 ?>
