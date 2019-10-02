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
					<a href="<?= site_url("admin/" . $table . ".schema") ?>" class="mdl-chip__action"><i
							class="material-icons">build</i></a>
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
					or
					<br/>
					<fieldset>
						<legend>Create a new table</legend>
						<form action="<?= site_url("admin/table/create") ?>">

							<div class="mdl-textfield mdl-js-textfield">
								<input class="mdl-textfield__input" type="text" pattern="/^\S*$/"
									   id="sample2">
								<label class="mdl-textfield__label" for="sample2">Nom de votre table</label>
								<span class="mdl-textfield__error">
									Ce nom n'est pas correct.
									(Seulement en minuscule sans espace)
								</span>
							</div>

						</form>
					</fieldset>
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
