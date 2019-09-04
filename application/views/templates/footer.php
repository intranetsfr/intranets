<?php
if(isset($jss)){
  foreach ($jss as $js) {
    ?>
<script type="text/javascript" src="<?= $js?>"></script>
    <?php
  }
} ?>
</body>
</html>
