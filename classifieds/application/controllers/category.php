<?php
class Category extends MY_Autoload {

	public function __construct()
	{
		parent::__construct();
	}

	//GET all categories
	public function index()
	{
		$data = $this->data;

		$data['categories'] = $this->category_model->get_categories();
		$data['title'] = '*** Search by Category ***';

		$this->load->view('templates/header', $data);
		$this->load->view('category/index', $data);
		$this->load->view('templates/footer');
	}

	//GET category with id $category_id
	public function view($category_id)
	{
		$data = $this->data;

		$data['category_item'] = $this->category_model->get_categories($category_id);

		if (empty($data['category_item']))
		{
			show_404();
		}

		$data['title'] = $data['category_item']['name'];

		$this->load->view('templates/header', $data);
		$this->load->view('category/view', $data);
		$this->load->view('templates/footer');
	}
}