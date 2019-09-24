<div class="container-fluid">
    <div class="row">
    	<div class="col-xs-2">	
            <ul class="demo-list-icon mdl-list">
            <?php 
            foreach ($tables as $table){
            ?>
              <li class="mdl-list__item">
              	<a href="<?php echo site_url('admin/'.$table.'.view')?>">
    	            <i class="fa fa-database"></i>&nbsp; <?= $table?>
              	</a>
              </li>
              <?php 
            }
            ?>
            </ul>
    	</div>
    	<div class="col-xs-10">
    	<?php 
    	if(!empty($table)){
    	    ?>
    	    <div align="center">
    	    	<br />
    	    	<br />
    	    	<br />
        	    <span class="mdl-chip">
                    <span class="mdl-chip__text">Select a table</span>
                </span>
    	    </div>
    	    <?php
    	}else{
    	    ?>
    	    <?php
    	}
    	?>
    	</div>
    </div>
</div>