<?php
class Subcategory_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	//gets all instances or $subcategory_id instance
	public function get_subcategories($subcategory_id = FALSE)
	{
		if ($subcategory_id === FALSE)
		{
			$query = $this->db->get('subcategory');
			return $query->result_array();
		}

		$query = $this->db->get_where('subcategory', array('id' => $subcategory_id));
		return $query->row_array();
	}

	public function get_subcategory_name($subcategory_id)
	{
		$this->db->select('name'); 
		$this->db->from('subcategory');   
		$this->db->where('id', $subcategory_id);
		$query = $this->db->get();
		return $query->row_array();
	}
}