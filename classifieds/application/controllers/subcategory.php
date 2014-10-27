<?php
class Subcategory extends MY_Autoload {

	public function __construct()
	{
		parent::__construct();
	}

	//GET all subcategories
	public function index()
	{
		$data = $this->data;

		$data['subcategories'] = $this->subcategory_model->get_subcategories();
		$data['title'] = '*** Classified Ads ***';

		$this->load->view('templates/header', $data);
		$this->load->view('subcategory/index', $data);
		$this->load->view('templates/footer');
	}

	//GET subcategory with id $subcategory_id
	public function view($subcategory_id)
	{
		$data = $this->data;

		$data['subcategory_item'] = $this->subcategory_model->get_subcategories($subcategory_id);

		if (empty($data['subcategory_item']))
		{
			show_404();
		}

		$data['title'] = $data['subcategory_item']['name'];

		$this->load->view('templates/header', $data);
		$this->load->view('subcategory/view', $data);
		$this->load->view('templates/footer');
	}
}