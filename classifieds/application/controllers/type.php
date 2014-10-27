<?php
class Type extends MY_Autoload {

	public function __construct()
	{
		parent::__construct();
	}

	//GET all types
	public function index()
	{
		$data = $this->data;

		$data['types'] = $this->type_model->get_types();
		$data['title'] = '*** Classified Ads ***';

		$this->load->view('templates/header', $data);
		$this->load->view('type/index', $data);
		$this->load->view('templates/footer');
	}

	//GET type with id $type_id
	public function view($type_id)
	{
		$data = $this->data;
		
		$data['type_item'] = $this->type_model->get_types($type_id);

		if (empty($data['type_item']))
		{
			show_404();
		}

		$data['title'] = $data['type_item']['name'];

		$this->load->view('templates/header', $data);
		$this->load->view('type/view', $data);
		$this->load->view('templates/footer');
	}
}