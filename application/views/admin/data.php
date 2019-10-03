<div class="container-fluid">
	<br />
	<a class="mdl-button" href="<?= site_url("admin")?>">&laquo;</a>
	<a class="mdl-button mdl-button--raised" href="<?= site_url("admin/".$table.'.form')?>">
		<i class="fa fa-plus"></i>&nbsp;
		ajouter une entrée
	</a>
	<br />
	<br />
	<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" width="100%">
		<thead>
		<tr>
			<?php
			foreach ($fields as $field){
				?>
			<th><?= $field?></th>

			<?php
			}
			?>
			<th>Options</th>
		</tr>
		</thead>
		<tbody>
		<?php
		foreach ($datas as $data) {
			?>
			<tr>
				<?php

				foreach ($fields as $field) {
					?>
					<td><?= $data[$field]?></td>
					<?php
				}
				?>
				<td>
					<a href="" class="mdl-button mdl-color--accent">modifier</a>
					<br />
					<a href="" class="mdl-button"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			<?php
		}
		?>
		</tbody>
	</table>

</div>
