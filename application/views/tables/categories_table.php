<thead>
<tr>
	<th>Nombre</th>
	<th>Descripción</th>
</tr>
</thead>
<?php
foreach ($records as $category) {
	?>
	<tr>
		<td><?= $category['category_name']?></td>
		<td><?= $category['category_description']?></td>
	</tr>
	<?php
}
?>
<?php
