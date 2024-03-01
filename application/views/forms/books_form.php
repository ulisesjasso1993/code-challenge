<?php if (!empty(validation_errors())) : ?>
	<div class="bg-danger text-white rounded p-2 mb-3 mt-3">
		<?= validation_errors() ?>
	</div>
<?php endif; ?>

<div class="row">
	<div class="col-1">
		<a href="<?= site_url("admin/{$page}") ?>" class="btn btn-outline-danger">Regresar</a>
	</div>
</div>

<div class="col-8 offset-2">
	<?= form_open('admin/books/create') ?>
	<div class="mb-3 row">
		<label for="book_name" class="form-label">Nombre del libro</label>
		<?= form_input(
			[
				'name'      => 'book_name',
				'id'        => 'book_name',
				'type'      => 'text',
				'maxlength' => '150',
				'class'     => 'form-control',
			]
		) ?>
	</div>

	<div class="mb-3 row">
		<label for="book_author" class="form-label">Autor</label>
		<?= form_input(
			[
				'name'      => 'book_author',
				'id'        => 'book_author',
				'type'      => 'text',
				'maxlength' => '200',
				'class'     => 'form-control',
			]
		) ?>
	</div>

	<div class="mb-3 row">
		<label for="book_published_date" class="form-label">Fecha de publicación</label>
		<?= form_input(
			[
				'name'  => 'book_published_date',
				'id'    => 'book_published_date',
				'type'  => 'date',
				'class' => 'form-control',
				'max' => date('Y-m-d')
			]
		) ?>
	</div>

	<div class="mb-3 row">
		<label for="book_category" class="form-label">Categoría(s)</label>
		<?= form_dropdown(
			'book_category[]',
			$categories,
			null,
			[
				'class' => 'form-control',
				'multiple' => true,
			]
		) ?>
	</div>

	<div class="mb-3 row">
		<button class="btn btn-outline-success" type="submit">Guardar</button>
	</div>
</div>
