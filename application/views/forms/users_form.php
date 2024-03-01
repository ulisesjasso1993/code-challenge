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
	<?= form_open('admin/users/create') ?>
	<div class="mb-3 row">
		<label for="username" class="form-label">Nombre de usuario</label>
		<?= form_input(
			[
				'name'      => 'username',
				'id'        => 'username',
				'type'      => 'text',
				'maxlength' => '160',
				'class'     => 'form-control',
			]
		) ?>
	</div>

	<div class="mb-3 row">
		<label for="user_email" class="form-label">Email</label>
		<?= form_input(
			[
				'name'      => 'user_email',
				'id'        => 'user_email',
				'type'      => 'text',
				'maxlength' => '150',
				'class'     => 'form-control',
			]
		) ?>
	</div>

	<div class="mb-3 row">
		<button class="btn btn-outline-success" type="submit">Guardar</button>
	</div>
</div>
