<thead>
	<tr>
		<th>Nombre</th>
		<th>Correo</th>
	</tr>
</thead>
<?php
foreach ($records as $user) {
	?>
	<tr>
		<td><?= $user['username']?></td>
		<td><?= $user['user_email']?></td>
	</tr>
	<?php
}
?>
