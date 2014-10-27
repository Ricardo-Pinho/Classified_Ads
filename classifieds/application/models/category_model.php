<?php
class Category_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	//gets all instances or $category_id instance
	public function get_categories($category_id = FALSE)
	{
		if ($category_id === FALSE)
		{
			$query = $this->db->get('category');
			return $query->result_array();
		}

		$query = $this->db->get_where('category', array('id' => $category_id));
		return $query->row_array();
	}

	public function get_category_name($category_id)
	{
		$this->db->select('name'); 
		$this->db->from('category');   
		$this->db->where('id', $category_id);
		$query = $this->db->get();
		return $query->row_array();
	}
}