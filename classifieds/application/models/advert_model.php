<?php
class Advert_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	//gets all instances
	public function get_adverts($offset = 0)
	{
			$this->db->order_by('id', 'desc');
			$query = $this->db->get('advert', 9, $offset);
			return $query->result_array();
	}

	//gets instances by category
	public function get_adverts_category($category)
	{
			$query = $this->db->get_where('advert', array('category_id' => $category));
			return $query->result_array();
	}

	//gets all instances by subcategory
	public function get_adverts_subcategory($subcategory)
	{
			$query = $this->db->get_where('advert', array('subcategory_id' => $subcategory));
			return $query->result_array();
	}

	//gets all instances by type
	public function get_adverts_type($type)
	{
			$query = $this->db->get_where('advert', array('type_id' => $type));
			return $query->result_array();
	}

	//gets $advert_id instance
	public function get_advert($advert_id)
	{

		$query = $this->db->get_where('advert', array('id' => $advert_id));
		return $query->row_array();
	}
	//gets number of instances in adverts
	function num_adverts()
	{
		$query = $this->db->count_all_results('advert');
		return $query;
	}
}