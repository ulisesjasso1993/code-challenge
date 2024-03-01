<?php

class Dashboard extends CI_Controller
{
	public function index()
	{
		$this->load->view(
			'templates/header',
			[
				'title' => 'Dashboard',
			]
		);
		$this->load->view(
			'pages/dashboard',
			[
				'modules' => [
					'Usuarios' => site_url('admin/users'),
					'Categorias' => site_url('admin/categories'),
					'Libros' => site_url('admin/books'),
				],
			]
		);
		$this->load->view('templates/footer');
	}
}
