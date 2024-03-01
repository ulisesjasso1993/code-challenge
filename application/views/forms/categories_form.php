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
	<?= form_open('admin/categories/create') ?>
	<div class="mb-3 row">
		<label for="category_name" class="form-label">Categoría</label>
		<?= form_input(
			[
				'name'      => 'category_name',
				'id'        => 'category_name',
				'type'      => 'text',
				'maxlength' => '150',
				'class'     => 'form-control',
			]
		) ?>
	</div>

	<div class="mb-3 row">
		<label for="category_name" class="form-label">Descripción</label>
		<?= form_input(
			[
				'name'      => 'category_description',
				'id'        => 'category_description',
				'type'      => 'text',
				'maxlength' => '255',
				'class'     => 'form-control',
			]
		) ?>
	</div>

	<div class="mb-3 row">
		<button class="btn btn-outline-success" type="submit">Guardar</button>
	</div>
</div>
