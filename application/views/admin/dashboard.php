<div class="container">
	<div class="row">
		<div class="col-xs-2">
			<h2>Tables</h2>
			<?php
			foreach ($tables as $table) {
				?>
				<span class="mdl-chip mdl-chip--deletable">
					<span class="mdl-chip__text">
						<a href="<?php echo site_url('admin/' . $table . '.data') ?>">
							<i class="fa fa-database"></i>&nbsp; <?= $table ?>
						</a>
					</span>
					<a href="<?= site_url()?>" class="mdl-chip__action"><i class="material-icons">build</i></a>
				</span>


				<?php
			}
			?>
			</ul>
		</div>
		<div class="col-xs-10">
			<?php
			if (!empty($table)) {
				?>
				<div align="center">
					<br/>
					<span class="mdl-chip">
                    	<span class="mdl-chip__text">Select a table</span>
                	</span>

					<br/>
					<br/>
					<br/>
				</div>
				<?php
			} else {
				?>
				<?php
			}
			?>
		</div>
	</div>
</div>
