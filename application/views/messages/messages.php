<?php if (!empty($this->session->flashdata('error_saving'))) : ?>
	<div class="bg-danger text-white rounded p-2 mb-3 mt-3">
		<?= $this->session->flashdata('error_saving') ?>
	</div>
<?php endif; ?>

<?php if (!empty($this->session->flashdata('success_saving'))) : ?>
	<div class="bg-success text-white rounded p-2 mb-3 mt-3">
		<?= $this->session->flashdata('success_saving') ?>
	</div>
<?php endif; ?>
