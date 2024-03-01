<table class="table table-responsive table-striped">
	<tbody>
	<?php
	foreach ($modules as $moduleName => $moduleUrl) {
		?>
		<tr>
			<td><?= $moduleName ?></td>
			<td class="text-center"><a href="<?= $moduleUrl ?>" class="btn btn-link"><?= $moduleName ?></a></butt></td>
		</tr>
		<?php
	}
	?>
	</tbody>
</table>
