<div class="row mb-3 mt-3">
	<div class="col-1">
		<a href="<?= site_url() ?>" class="btn btn-outline-danger">Regresar</a>
	</div>
	<div class="offset-8 col-2">
		<a href="<?= $create ?>" class="btn btn-outline-primary">Crear registro</a>
	</div>
</div>
<div class="row">
	<table class="table table-responsive table-striped">
		<?php $this->view("tables/{$identifier}_table") ?>
	</table>
</div>

<?= $pagination ?>
