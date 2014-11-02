<?php
class Posts_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	
	public function get_posts($id_post = FALSE) {
		
		//$this->db->select('post.id_post', 'post.titulo', 'post.contenido', 'post.create_time', 'post.status', 'usuario.username');
		$this->db->select('*');
		$this->db->from('post');
		$this->db->join('usuario', 'post.email_creador = usuario.email', 'inner');
			
		if ($id_post === FALSE) {
			// todos los posts
			$query = $this->db->get();
			return $query->result_array();
			
		} else {
			// un post
			$this->db->where('post.id_post', $id_post); 
			$query = $this->db->get();
			return $query->row_array();
		}
	}
	
	
	public function set_posts() {
		$data = array(
			'titulo' => $this->input->post('titulo'),
			'contenido' => $this->input->post('contenido'),
			'status' => 'b', // borradores
			'email_creador' => 'joan.g.florit@gmail.com'
		);
	
		return $this->db->insert('post', $data);
	}
	
}