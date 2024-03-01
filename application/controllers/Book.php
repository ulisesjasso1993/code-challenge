<?php

class Book extends CI_Controller
{
	/**
	 * @param $idBook
	 *
	 * @return void
	 */
	public function assign($idBook)
	{
		$this->load->model('Books_model', 'books_model');
		$this->load->model('Users_model', 'users_model');
		$this->load->helper(['form', 'custom_form']);
		$this->load->library('form_validation');

		$book = $this->books_model->getBookById($idBook);
		$users = $this->users_model->getAll(null);

		$userArray = [
			'null' => 'Selecciona un usuario'
		];
		foreach ($users as $user) {
			$userArray[$user['user_id']] = $user['username'];
		}

		setRulesForm('user_book');

		if ($this->form_validation->run() === false) {
			$this->load->view(
				'templates/header',
				[
					'title' => 'Asignación de Libro',
				]
			);
			$this->load->view(
				'forms/book_user_form',
				[
					'book' => $book,
					'users' => $userArray,
				]
			);
			$this->load->view('templates/footer');
		} else {
			if ($this->books_model->assignBook($this->input->post())) {
				$this->session->set_flashdata('success_saving', 'Libro asignado exitosamente');
				redirect("admin/books");
			} else {
				$this->session->set_flashdata('error_saving', 'No se pudo asignar el libro');
				redirect("admin/books");
			}
		}
	}

	/**
	 * @param $bookId
	 *
	 * @return void
	 */
	public function unassign($bookId)
	{
		$this->load->model('Books_model', 'books_model');
		if ($this->books_model->unassign($bookId)) {
			$this->session->set_flashdata('success_saving', 'Libro desasignado exitosamente');
			$book = $this->books_model->getBookById($bookId);
			$this->load->library('messagesender');
			$this->messagesender->sendUpdateStatus($book);
		} else {
			$this->session->set_flashdata('error_saving', 'No se pudo desasignar el libro');
		}

		redirect("admin/books");
	}
}
