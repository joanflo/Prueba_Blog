<?php
class Usuarios_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	
	/*
	 * Comprueba si el nombre de usuario y contraseña existen en la base de datos
	 */
	function login($username, $password) {
		$this->db->select('email, username, password, status');
		$this->db->from('usuario');
		$this->db->where('username', $username);
		$this->db->where('password', MD5($password));
		$this->db->limit(1);
		
		$query = $this->db->get();
		
		if($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	
}