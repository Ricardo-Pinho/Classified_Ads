<?php
class Customer extends MY_Autoload {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('customer_model');
	}

	//GET all customers
	public function index()
	{
		$data = $this->data;

		$data['customers'] = $this->customer_model->get_customers();
		$data['title'] = '*** Customers ***';

		$this->load->view('templates/header', $data);
		$this->load->view('customer/index', $data);
		$this->load->view('templates/footer');
	}

	//GET customer with id $customer_id
	public function view($customer_id)
	{

		$data = $this->data;
		
		$data['customer_item'] = $this->customer_model->get_customers($customer_id);

		if (empty($data['customer_item']))
		{
			show_404();
		}

		$data['title'] = $data['customer_item']['name'];

		$this->load->view('templates/header', $data);
		$this->load->view('customer/view', $data);
		$this->load->view('templates/footer');
	}
}