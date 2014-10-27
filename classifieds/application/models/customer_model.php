<?php
class Customer_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	//gets all instances or $customer_id instance
	public function get_customers($customer_id = FALSE)
	{
		if ($customer_id === FALSE)
		{
			$query = $this->db->get('customer');
			return $query->result_array();
		}

		$query = $this->db->get_where('customer', array('id' => $customer_id));
		return $query->row_array();
	}

	public function get_customer_name($customer_id)
	{
		$this->db->select('name'); 
		$this->db->from('customer');   
		$this->db->where('id', $customer_id);
		$query = $this->db->get();
		return $query->row_array();
	}
}