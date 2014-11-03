<?php
class Posts_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}
	
	
	/*
	 * Devuelve todos los posts o bien el post cuya id es pasada por parámetro.
	 * Sólo devuelve aquellos posts que pueden ser vistos por el usuario actual.
	 */
	public function get_posts($id_post = FALSE) {
		
		$this->db->select('post.id_post');
		$this->db->select('post.titulo');
		$this->db->select('post.contenido');
		$this->db->select('post.create_time');
		$this->db->select('post.status');
		$this->db->select('post.email_creador');
		$this->db->select('post.email_admin');
		$this->db->select('usuario.email');
		$this->db->select('usuario.username');
		$this->db->from('post');
		$this->db->join('usuario', 'post.email_creador = usuario.email', 'inner');
		
		if ($this->session->userdata('logged_in')) {
			$data = $this->session->userdata('logged_in');
			if ($data['status'] == 'n') {
				// usuario loggeado normal -> posts públicos & posts creados por él
				$this->db->where('post.status', 'p');
				$this->db->or_where("post.email_creador", $data['id']);
			}
		} else {
			// usuario no loggeado -> posts públicos
			$this->db->where('post.status', 'p');
		}
		// los únicos que pueden ver todos los posts son los admins loggeados
		
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
	
	
	/*
	 * Da de alta un nuevo post en la base de datos
	 */
	public function set_posts() {
		$session_data = $this->session->userdata('logged_in');
		$data = array(
			'titulo' => $this->input->post('titulo'),
			'contenido' => $this->input->post('contenido'),
			'status' => 'b', // borradores
			'email_creador' => $session_data['id']
		);
		
		// transacción necesaria para obtener la id del nuevo post y así poder redirigir a él
		$this->db->trans_start();
		$this->db->insert('post', $data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return  $insert_id;
	}
	
	
	/*
	 * actualiza el estado de un post
	 */
	public function update_post($id_post, $status) {
		$data = array(
			'status' => $status
		);
		$this->db->where('id_post', $id_post);
		$this->db->update('post', $data);
	}
	
}