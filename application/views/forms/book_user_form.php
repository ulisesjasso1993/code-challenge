<?php if (!empty(validation_errors())) : ?>
	<div class="bg-danger text-white rounded p-2 mb-3 mt-3">
		<?= validation_errors() ?>
	</div>
<?php endif; ?>

<div class="row">
	<div class="col-1">
		<a href="<?= site_url("admin/books") ?>" class="btn btn-outline-danger">Regresar</a>
	</div>
</div>

<div class="col-8 offset-2">
	<?= form_open("admin/books/assign/{$book['book_id']}") ?>
	<?= form_hidden('book_id', $book['book_id']) ?>
	<div class="mb-3 row">
		<label for="book" class="form-label">Libro</label>
		<?= form_input(
			[
				'name'      => 'book_name',
				'id'        => 'book_name',
				'type'      => 'text',
				'maxlength' => '150',
				'value'     => $book['book_name'],
				'class'     => 'form-control',
				'disabled'  => true,
			]
		) ?>
	</div>

	<div class="mb-3 row">
		<label for="user_book" class="form-label">Asignar a:</label>
		<?= form_dropdown(
			'user_book',
			$users,
			$book['book_user'],
			[
				'class' => 'form-control',
			]
		) ?>
	</div>

	<div class="mb-3 row">
		<button class="btn btn-outline-success" type="submit">Guardar</button>
	</div>

	<div class="mb-3 row">
		<a class="btn btn-outline-danger" href="<?= site_url("admin/books/{$book['book_id']}/unassign") ?>">Quitar asignación</a>
	</div>
</div>
