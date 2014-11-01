<?php

class Posts extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('posts_model');
		$this->load->model('usuarios_model');
	}
	

	public function index() {
		$data['posts'] = $this->posts_model->get_posts();
		$data['title'] = "Posts";
		
		$this->load->view('templates/header', $data);
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer', $data);
	}
	

	public function view($id_post) {
		$data['posts_item'] = $this->posts_model->get_posts($id_post);
		if (empty($data['posts_item'])) {
			show_404();
		}
		$data['title'] = 'Post nº' . $id_post . '(' . $data['posts_item']['titulo'] . ')';
	
		$this->load->view('templates/header', $data);
		$this->load->view('posts/view', $data);
		$this->load->view('templates/footer', $data);
	}
	
	
	public function create() {
		$data['title'] = 'Nuevo post';
		
		// reglas para los campos del formulario
		$this->form_validation->set_rules('titulo', 'título', 'required');
		$this->form_validation->set_rules('contenido', 'contenido del post', 'required');
	
		if ($this->form_validation->run() === FALSE) {
			// mostramos formulario
			$this->load->view('templates/header', $data);
			$this->load->view('posts/create');
			$this->load->view('templates/footer', $data);
			
		} else {
			// llamamos modelo
			$this->posts_model->set_posts();
			$this->load->view('posts/success');
		}
	}
	
}