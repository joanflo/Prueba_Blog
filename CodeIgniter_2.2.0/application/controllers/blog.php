<?php

class Blog extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('Wurflutils');
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
		$data['is_mobile'] = $this->is_mobile();
		$data['brandname'] = $this->get_brandname();
		$data['modelname'] = $this->get_modelname();
		
		// cargar vistas
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
		$data['is_mobile'] = $this->is_mobile();
		$data['brandname'] = $this->get_brandname();
		$data['modelname'] = $this->get_modelname();
		
		// cargar vistas
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
		$data['is_mobile'] = $this->is_mobile();
		$data['brandname'] = $this->get_brandname();
		$data['modelname'] = $this->get_modelname();
		
		// reglas para los campos del formulario
		$this->form_validation->set_rules('titulo', 'título', 'required');
		$this->form_validation->set_rules('contenido', 'contenido del post', 'required');
		
		if ($this->form_validation->run() === FALSE) {
			// mostramos formulario
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navigation_bar', $data);
			$this->load->view('posts/create', $data);
			$this->load->view('templates/footer');
			
		} else {
			// llamamos modelo
			$insert_id = $this->posts_model->set_posts();
			
			redirect('posts/' . $insert_id, 'refresh');
		}
	}
	
	
	/*
	 * Comprueba si los datos introducidos por el usuario en el login son válidos. En cuyo caso, los guarda
	 * en una variable de sesión.
	 * Si el usuario ya estaba loggeado, se cierra su sesión.
	 */
	public function verify() {
		$data['title'] = 'Posts';
		
		if (!$this->session->userdata('logged_in')) { // usuario no loggeado -> introducir datos
			// llamamos modelo
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$result = $this->usuarios_model->login($username, $password);
			
			if ($result) {
				// guardamos en variable de sesión
				foreach($result as $row) {
					$sess_array = array(
						'id' => $row->email,
						'username' => $row->username,
						'status' => $row->status
					);
					$this->session->set_userdata('logged_in', $sess_array);
				}
			}
			
		} else { // usuario loggeado -> salir
			$this->session->unset_userdata('logged_in');
			redirect('posts', 'refresh');
		}
	}
	
	
	/*
	 * Actualiza el status de un post
	 */
	public function update() {
		$data['title'] = 'Posts';
		
		// llamamos modelo
		$id_post = $this->input->post('id_post');
		$status = $this->input->post('status');
		$this->posts_model->update_post($id_post, $status);
	}
	
	
	/*
	 * Llama a la librería WURFL para saber si el dispositivo que nos visita es un móvil
	 */
	 private function is_mobile() {
	 	return $this->wurflutils->is_mobile();
	 }
	
	
	/*
	 * Llama a la librería WURFL para obtener el nombre de la marca de móvil
	 */
	 private function get_brandname() {
	 	return $this->wurflutils->get_brandname();
	 }
	 
	 
	 /*
	 * Llama a la librería WURFL para obtener el nombre del modelo de móvil
	 */
	 private function get_modelname() {
	 	return $this->wurflutils->get_modelname();
	 }
	
}