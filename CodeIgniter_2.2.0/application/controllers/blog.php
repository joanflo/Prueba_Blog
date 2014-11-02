<?php

class Blog extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		// cargar modelos usados
		$this->load->model('posts_model');
		$this->load->model('usuarios_model');
	}
	

	/*
	 * Muestra todos los posts
	 */
	public function index() {
		$data['posts'] = $this->posts_model->get_posts();
		$data['title'] = "Posts";
		$data['creating_post'] = False;
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navigation_bar');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
	}
	

	/*
	 * Muestra un post (si existe)
	 */
	public function view($id_post) {
		$data['posts_item'] = $this->posts_model->get_posts($id_post);
		if (empty($data['posts_item'])) {
			show_404();
		}
		
		$data['title'] = 'Post nº' . $id_post . ' (' . $data['posts_item']['titulo'] . ')';
		$data['creating_post'] = False;
	
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navigation_bar');
		$this->load->view('posts/view', $data);
		$this->load->view('templates/footer');
	}
	
	
	/*
	 * Conforma la pantalla para crear un post
	 */
	public function create() {
		$data['title'] = 'Nuevo post';
		$data['creating_post'] = True;
		
		// reglas para los campos del formulario
		$this->form_validation->set_rules('titulo', 'título', 'required');
		$this->form_validation->set_rules('contenido', 'contenido del post', 'required');
	
		if ($this->form_validation->run() === FALSE) {
			// mostramos formulario
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navigation_bar', $data);
			$this->load->view('posts/create');
			$this->load->view('templates/footer');
			
		} else {
			// llamamos modelo
			$this->posts_model->set_posts();
			
			$this->load->view('posts/success');
		}
	}
	
	
	public function verify() {
		$data['title'] = 'Posts';
		
		// llamamos modelo
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$result = $this->usuarios_model->login($username, $password);
		
		if ($result) {
			// guardamos en variable de sesión
			foreach($result as $row) {
				$sess_array = array(
					'id' => $row->email,
					'username' => $row->username
				);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			$this->load->view('templates/footer');
		} else {
			$this->load->view('templates/footer');
			$this->load->view('templates/footer');
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navigation_bar');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
	}


	public function logout() {
		$this->session->unset_userdata('logged_in');
		session_destroy();
	}
	
}