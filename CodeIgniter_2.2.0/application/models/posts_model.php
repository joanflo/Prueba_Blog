<?php
class Posts_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	
	public function get_posts($id_post = FALSE) {
		if ($id_post === FALSE) {
			// todos los posts
			$query = $this->db->get('post');
			return $query->result_array();
			
		} else {
			// un post
			$query = $this->db->get_where('post', array('status' => 'p'));
			return $query->row_array();
		}
	}
	
	
	public function set_posts() {
		$data = array(
			'titulo' => $this->input->post('titulo'),
			'contenido' => $this->input->post('contenido'),
			'status' => 'b', // borradores
			'email_creador' => ''
		);
	
		return $this->db->insert('post', $data);
	}
	
}