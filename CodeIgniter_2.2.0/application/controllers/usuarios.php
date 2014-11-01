<?php

class Usuarios extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	
	public function index() {
		$this->load->helper(array('form'));
		
		$this->load->view('templates/header', $data);
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer', $data);
	}
	
	
	public function verify() {
		// cargamos librerías
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// reglas para los campos del formulario
		$this->form_validation->set_rules('username', 'nombre de usuario', 'required');
		$this->form_validation->set_rules('password', 'contraseña', 'required');
		
		$data['title'] = 'Posts';
		
		if ($this->form_validation->run() === FALSE) {
			// llamamos modelo
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$login_ok = $this->usuarios_model->login($username, $password);
			
			if ($login_ok) {
				// guardamos en variable de sesión
				foreach($result as $row) {
					$sess_array = array(
						'id' => $row->email,
						'username' => $row->username
					);
					$this->session->set_userdata('logged_in', $sess_array);
				}
			}
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer', $data);
	}


	public function logout() {
		$this->session->unset_userdata('logged_in');
		session_destroy();
	}
	
}