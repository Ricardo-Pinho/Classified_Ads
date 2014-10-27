<?php
class Type_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	//gets all instances or $type_id instance
	public function get_types($type_id = FALSE)
	{
		if ($type_id === FALSE)
		{
			$query = $this->db->get('type');
			return $query->result_array();
		}

		$query = $this->db->get_where('type', array('id' => $type_id));
		return $query->row_array();
	}

	public function get_type_name($type_id)
	{
		$this->db->select('name'); 
		$this->db->from('type');   
		$this->db->where('id', $type_id);
		$query = $this->db->get();
		return $query->row_array();
	}
}