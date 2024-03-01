<?php

function setRulesForm($page)
{
	switch ($page) {
		case 'users':
			setRulesUserForm();
			break;

		case 'categories':
			setRulesCategoryForm();
			break;

		case 'books':
			setRulesBookForm();
			break;

		case 'user_book':
			setRulesBookUserForm();
			break;
	}
}

function setRulesUserForm()
{
	$ci =& get_instance();
	$ci->load->library('form_validation');
	$ci->form_validation->set_rules(
		'username',
		'Nombre de usuario',
		'required|regex_match[/^[a-zA-ZÀ-ÿ\x{00f1}\x{00d1}]+(\s*[a-zA-ZÀ-ÿ\x{00f1}\x{00d1}]*)*[a-zA-ZÀ-ÿ\x{00f1}\x{00d1}]+$/]',
		[
			'required'    => 'El nombre de usuario es obligatorio',
			'regex_match' => "El nombre debe contener unicamente letras",
		]
	);
	$ci->form_validation->set_rules(
		'user_email',
		'Email',
		'required|is_unique[user.user_email]|valid_email',
		[
			'required' => 'El email es obligatorio',
		]
	);

	$ci->form_validation->set_message('email', 'El email no tiene un formato correcto');
	$ci->form_validation->set_message('is_unique', 'El email ya esta registrado');
}

function setRulesCategoryForm()
{
	$ci =& get_instance();
	$ci->load->library('form_validation');
	$ci->form_validation->set_rules(
		'category_name',
		'Nombre de Categoría',
		'required|is_unique[category.category_name]|regex_match[/^[a-zA-ZÀ-ÿ\x{00f1}\x{00d1}]+(\s*[a-zA-ZÀ-ÿ\x{00f1}\x{00d1}]*)*[a-zA-ZÀ-ÿ\x{00f1}\x{00d1}]+$/]',
		[
			'required'    => 'El nombre de categoría es requerido',
			'regex_match' => 'El nombre de categoría debe contener solo letras',
		]
	);
	$ci->form_validation->set_rules(
		'category_description',
		'Descripción',
		'required',
		[
			'required' => 'La descripcíon es requerido',
		]
	);
}

function setRulesBookForm()
{
	$ci =& get_instance();
	$ci->load->library('form_validation');
	$ci->form_validation->set_rules(
		'book_name',
		'Nombre del libro',
		'required|regex_match[/^[a-zA-ZÀ-ÿ\x{00f1}\x{00d1}]+(\s*[a-zA-ZÀ-ÿ\x{00f1}\x{00d1}]*)*[a-zA-ZÀ-ÿ\x{00f1}\x{00d1}]+$/]',
		[
			'required'    => 'El nombre del libro es requerido',
			'regex_match' => 'El nombre del libro debe contener solo letras',
		]
	);

	$ci->form_validation->set_rules(
		'book_author',
		'Autor',
		'required|regex_match[/^[a-zA-ZÀ-ÿ\x{00f1}\x{00d1}]+(\s*[a-zA-ZÀ-ÿ\x{00f1}\x{00d1}]*)*[a-zA-ZÀ-ÿ\x{00f1}\x{00d1}]+$/]',
		[
			'required'    => 'El autor es requerido',
			'regex_match' => 'El autor debe contener solo letras',
		]
	);

	$ci->form_validation->set_rules(
		'book_category[]',
		'Categoría',
		'required',
		[
			'required' => 'Debes seleccionar al menos una categoría'
		]
	);

	$ci->form_validation->set_rules(
		'book_published_date',
		'Fecha de publicación',
		'required',
		[
			'required' => 'Debes indicar la fecha de publicación'
		]
	);
}

function setRulesBookUserForm()
{
	$ci =& get_instance();
	$ci->load->library('form_validation');

	$ci->form_validation->set_rules('user_book', 'Asignar a', 'greater_than[0]');
	$ci->form_validation->set_message('greater_than', 'Debes seleccionar un usuario');
}
