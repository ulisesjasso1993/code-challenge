<thead>
<tr>
	<th>Nombre</th>
	<th>Autor</th>
	<th>Fecha de publicación</th>
	<th>Usuario que lo tiene</th>
	<th>Disponible</th>
	<th></th>
</tr>
</thead>
<?php
foreach ($records as $book) {
	?>
	<tr>
		<td><?= $book['book_name'] ?></td>
		<td><?= $book['book_author'] ?></td>
		<td><?= date('Y-m-d', strtotime($book['book_published_date'])) ?></td>
		<td><?= $book['username'] ?></td>
		<td class="text-white text-center <?= empty($book['username']) ? 'bg-success' : 'bg-danger' ?>"><?= $book['username'] ? "Sí" : "No" ?></td>
		<td><a class="btn btn-sm btn-outline-primary" href="<?= site_url("admin/books/assign/{$book['book_id']}") ?>">Asignar <libro></libro></a></td>
	</tr>
	<?php
}
?>
<?php

