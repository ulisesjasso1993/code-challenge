<?php

class Crud extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->lang->load('general', 'spanish');
	}

	/**
	 * @param string $page
	 *
	 * @return void
	 */
	public function view($page = '', $offset = 0)
	{
		if (!file_exists(APPPATH . 'models/' . $page . '_model.php')) {
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->load->model($page . '_model', 'model');
		$records = $this->model->getAll($offset);

		$this->load->library('pagination');
		$config['base_url'] = base_url('admin/' . $page);
		$config['total_rows'] = $this->model->getAllCount();
		$config['per_page'] = 5;
		$config['last_link'] = "Final";
		$config['first_link'] = "Inicio";

		$this->pagination->initialize($config);

		$this->load->view(
			'templates/header',
			[
				'title' => $this->lang->line($page),
			]
		);
		$this->load->view(
			'pages/crud',
			[
				'records' => $records,
				'create' => site_url('admin/' . $page . '/create'),
				'identifier' => $page,
				'pagination' => $this->pagination->create_links()
			]
		);
		$this->load->view('templates/footer');
	}

	/**
	 * @param $page
	 *
	 * @return void
	 */
	public function create($page = '')
	{
		if (!file_exists(APPPATH . 'models/' . $page . '_model.php')) {
			// Whoops, we don't have a page for that!
			show_404();
		}

		$this->load->helper(['form', 'custom_form']);
		$this->load->library('form_validation');
		$this->load->model($page . '_model', 'model');
		setRulesForm($page);

		if ($this->form_validation->run() === false) {
			$this->load->view(
				'templates/header',
				[
					'title' => "Creación de " . $this->lang->line($page),
				]
			);
			$params = ['page' => $page];
			if ($page === 'books') {
				$params['categories'] = $this->model->getCategories();
			}
			$this->load->view("forms/{$page}_form", $params);
			$this->load->view('templates/footer');
		} else {
			if ($this->model->create($this->input->post()) !== FALSE) {
				$this->session->set_flashdata('success_saving', 'Registro almacenado exitosamente');
				redirect("admin/{$page}");
			} else {
				$this->session->set_flashdata('error_saving', 'No se pudo guardar el registro');
				$this->load->view(
					'templates/header',
					[
						'title' => "Creación de " . $this->lang->line($page),
					]
				);
				$this->load->view("forms/{$page}_form", ['page' => $page]);
				$this->load->view('templates/footer');
			}
		}
	}
}
