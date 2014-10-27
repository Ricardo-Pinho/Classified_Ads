<?php
class Advert extends MY_Autoload {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('advert_model');
		$this->load->model('customer_model');
		$this->load->helper('url');
	}

	//GET all adverts
	public function index()
	{
		//load variables from MY_Autoload
		$data = $this->data;
		
		//query to get adverts and number of adverts
		$data['adverts'] = $this->advert_model->get_adverts();
		$data['num_adverts'] = $this->advert_model->num_adverts();

		//get customer,category,subcategory, and type for each advert
		foreach($data['adverts'] as &$advert)
		{
			$advert['customer'] = array();
			$advert['category'] = array();
			$advert['subcategory'] = array();
			$advert['type'] = array();
			$advert['customer'] = $this->customer_model->get_customers($advert['customer_id']);
			$advert['category'] = $this->category_model->get_category_name($advert['category_id']);
			$advert['subcategory'] = $this->subcategory_model->get_subcategory_name($advert['subcategory_id']);
			$advert['type'] = $this->type_model->get_type_name($advert['type_id']);
		}

		//$data['title'] = '*** Classified Ads ***';

		//load views
		$this->load->view('templates/header', $data);
		$this->load->view('advert/index', $data);
		$this->load->view('templates/footer');
	}

	function get_adverts($offset)
	{
		//make query to get adverts in ajax query
		$data['adverts'] = $this->advert_model->get_adverts($offset);
		
		//get columns from other tables in the database
		foreach($data['adverts'] as &$advert)
		{
			$advert['customer'] = array();
			$advert['category'] = array();
			$advert['subcategory'] = array();
			$advert['type'] = array();
			$advert['customer'] = $this->customer_model->get_customers($advert['customer_id']);
			$advert['category'] = $this->category_model->get_category_name($advert['category_id']);
			$advert['subcategory'] = $this->subcategory_model->get_subcategory_name($advert['subcategory_id']);
			$advert['type'] = $this->type_model->get_type_name($advert['type_id']);
		}
		//this sleep is used to show ajax
		sleep(1);

		//load views
		$this->load->view('advert/get_adverts', $data);
	}

	//get adverts by category
	function get_adverts_category($category_id)
	{
		//load variables from MY_Autoload
		$data = $this->data;
		//database query and update number of adverts
		$data['adverts'] = $this->advert_model->get_adverts_category($category_id);
		$data['num_adverts'] = count($data['adverts']);
		$category_name='';

		//fill category name if there are no adverts
		if(empty($data['adverts']))
		{
			$obj = $this->category_model->get_category_name($category_id);
			$category_name=$obj['name'];
		}

		//get columns from other tables in the database
		foreach($data['adverts'] as &$advert)
		{
			$advert['customer'] = array();
			$advert['category'] = array();
			$advert['subcategory'] = array();
			$advert['type'] = array();
			$advert['customer'] = $this->customer_model->get_customers($advert['customer_id']);
			$advert['category'] = $this->category_model->get_category_name($advert['category_id']);
			$advert['subcategory'] = $this->subcategory_model->get_subcategory_name($advert['subcategory_id']);
			$advert['type'] = $this->type_model->get_type_name($advert['type_id']);
			if($category_name === '')
				$category_name = $advert['category']['name'];
		}

		//variables used in category_bar
		$data['category_name'] = $category_name;
		$data['category_url'] = base_url().'advert/category/'.$category_id;

		//load views
		$this->load->view('templates/header', $data);
		$this->load->view('advert/index', $data);
		$this->load->view('templates/footer');
	}
	//get adverts by subcategory
	function get_adverts_subcategory($subcategory_id)
	{
		//load variables from MY_Autoload
		$data = $this->data;
		$data['adverts'] = $this->advert_model->get_adverts_subcategory($subcategory_id);
		$data['num_adverts'] = count($data['adverts']);
		$category_name='';
		$category_id=0;
		$subcategory_name='';

		if(empty($data['adverts']))
		{
			$obj = $this->subcategory_model->get_subcategories($advert['subcategory_id']);
			$subcategory_name=$obj['name'];
			$category_id = $obj['category_id'];
			$category_name= $this->category_model->get_category_name($category_id);
		}

		//get columns from other tables in the database
		foreach($data['adverts'] as &$advert)
		{
			$advert['customer'] = array();
			$advert['category'] = array();
			$advert['subcategory'] = array();
			$advert['type'] = array();
			$advert['customer'] = $this->customer_model->get_customers($advert['customer_id']);
			$advert['category'] = $this->category_model->get_categories($advert['category_id']);
			$advert['subcategory'] = $this->subcategory_model->get_subcategories($advert['subcategory_id']);
			$advert['type'] = $this->type_model->get_type_name($advert['type_id']);
			if($category_name === '')
				{
					$category_name = $advert['category']['name'];
					$category_id = $advert['category']['id'];
				}
			if($subcategory_name === '')
				$subcategory_name = $advert['subcategory']['name'];
		}

		//variables used in category_bar
		$data['category_name'] = $category_name;
		$data['category_url'] = base_url().'advert/category/'.$category_id;

		$data['subcategory_name'] = $subcategory_name;
		$data['subcategory_url'] = base_url().'advert/subcategory/'.$subcategory_id;

		//load views
		$this->load->view('templates/header', $data);
		$this->load->view('advert/index', $data);
		$this->load->view('templates/footer');
	}

	//get adverts by type
	function get_adverts_type($type_id)
	{
		//load variables from MY_Autoload
		$data = $this->data;
		$data['adverts'] = $this->advert_model->get_adverts_type($type_id);
		$data['num_adverts'] = count($data['adverts']);

		$category_name='';
		$category_id=0;
		$subcategory_name='';
		$subcategory_id=0;
		$type_name='';

		//fill category name if there are no adverts
		if(empty($data['adverts']))
		{
			$obj = $this->type_model->get_types($type_id);
			$type_name=$obj['name'];
			$subcategory_id = $obj['subcategory_id'];
			$obj= $this->subcategory_model->get_subcategories($subcategory_id);
			$subcategory_name= $obj['name'];
			$category_id = $obj['category_id'];
			$obj= $this->category_model->get_categories($obj['category_id']);
			$category_name=$obj['name'];
		}

		//get columns from other tables in the database
		foreach($data['adverts'] as &$advert)
		{
			$advert['customer'] = array();
			$advert['category'] = array();
			$advert['subcategory'] = array();
			$advert['type'] = array();
			$advert['customer'] = $this->customer_model->get_customers($advert['customer_id']);
			$advert['category'] = $this->category_model->get_categories($advert['category_id']);
			$advert['subcategory'] = $this->subcategory_model->get_subcategories($advert['subcategory_id']);
			$advert['type'] = $this->type_model->get_type_name($advert['type_id']);
			if($category_name === '')
				{
					$category_name = $advert['category']['name'];
					$category_id = $advert['category']['id'];
				}
			if($subcategory_name === '')
			{
				$subcategory_name = $advert['subcategory']['name'];
				$subcategory_id = $advert['subcategory']['id'];
			}
			if($type_name === '')
				$type_name = $advert['type']['name'];
		}

		//variables used in category_bar
		$data['category_name'] = $category_name;
		$data['category_url'] = base_url().'advert/category/'.$category_id;

		$data['subcategory_name'] = $subcategory_name;
		$data['subcategory_url'] = base_url().'advert/subcategory/'.$subcategory_id;

		$data['type_name'] = $type_name;
		$data['type_url'] = base_url().'advert/type/'.$type_id;

		//load views
		$this->load->view('templates/header', $data);
		$this->load->view('advert/index', $data);
		$this->load->view('templates/footer');
	}

	//GET advert with id $advert_id
	public function view($advert_id)
	{
		//load variables from MY_Autoload
		$data = $this->data;
		
		//get information from other tables in the database
		$data['advert_item'] = $this->advert_model->get_advert($advert_id);
		$data['advert_item']['customer'] = $this->customer_model->get_customers($data['advert_item']['customer_id']);
		$data['advert_item']['category'] = $this->category_model->get_categories($data['advert_item']['category_id']);
		$data['advert_item']['subcategory'] = $this->subcategory_model->get_subcategories($data['advert_item']['subcategory_id']);
		$data['advert_item']['type'] = $this->type_model->get_types($data['advert_item']['type_id']);

		//variables used in category_bar
		$data['category_name'] = $data['advert_item']['category']['name'];
		$data['category_url'] = base_url().'advert/category/'.$data['advert_item']['category']['id'];

		$data['subcategory_name'] = $data['advert_item']['subcategory']['name'];
		$data['subcategory_url'] = base_url().'advert/subcategory/'.$data['advert_item']['subcategory']['id'];

		$data['type_name'] = $data['advert_item']['type']['name'];
		$data['type_url'] = base_url().'advert/type/'.$data['advert_item']['type']['id'];

		//if advert doesn't exist, gives error
		if (empty($data['advert_item']))
		{
			show_404();
		}

		$data['title'] = $data['advert_item']['title'];

		//load views
		$this->load->view('templates/header', $data);
		$this->load->view('advert/view', $data);
		$this->load->view('templates/footer');
	}

	function write_all_xml() {
		//Load data from database
		$data['adverts'] = $this->advert_model->get_adverts();


	    // Load XML writer library
	    $this->load->library('Xml_writer');

	    // Initiate class
	    $xml = new Xml_writer;
	    $xml->setRootName('Adverts');
	    $xml->initiate();

		//get customer,category,subcategory, and type for each advert
		foreach($data['adverts'] as &$advert)
		{
			$advert['customer'] = array();
			$advert['category'] = array();
			$advert['subcategory'] = array();
			$advert['type'] = array();
			$advert['customer'] = $this->customer_model->get_customers($advert['customer_id']);
			$advert['category'] = $this->category_model->get_category_name($advert['category_id']);
			$advert['subcategory'] = $this->subcategory_model->get_subcategory_name($advert['subcategory_id']);
			$advert['type'] = $this->type_model->get_type_name($advert['type_id']);

			// Start branch 1
		    $xml->startBranch('Advert');

		     // Set its nodes

		    $xml->addNode('Title', $advert['title']);
		    $xml->addNode('Body', $advert['body']);

		    // Start branch 1-1
		    $xml->startBranch('Customer');
		    $xml->addNode('Name', $advert['customer']['name']);
		    $xml->addNode('Email', $advert['customer']['email']);
		    // End branch 1-1
		    $xml->endBranch();
		    $xml->addNode('Price', $advert['price']);
		    $xml->addNode('Post_date', $advert['post_date']);
		    //Start branch 1-2
		    $xml->startBranch('Category', array('name' => $advert['category']['name']));
		    //Start branch 1-2-1
		    $xml->startBranch('Subategory', array('name' => $advert['subcategory']['name']));
		    //Start branch 1-2-1-1
		    $xml->startBranch('Type', array('name' => $advert['type']['name']));
		    // End branch 1-2-1-1
		    $xml->endBranch();
		    // End branch 1-2-1
		    $xml->endBranch();
		    // End branch 1-2
		    $xml->endBranch();

		    // End branch 1
		    $xml->endBranch();
		}

	    // Print the XML to screen
	    $xml->getXml(true);
	}

	function write_single_xml($advert_id) {


	    // Load XML writer library
	    $this->load->library('Xml_writer');

	    // Initiate class
	    $xml = new Xml_writer;
	    $xml->setRootName('Adverts');
	    $xml->initiate();

	    //get customer, category, subcategory, and type for advert
		$advert = $this->advert_model->get_advert($advert_id);
		$advert['customer'] = $this->customer_model->get_customers($advert['customer_id']);
		$advert['category'] = $this->category_model->get_category_name($advert['category_id']);
		$advert['subcategory'] = $this->subcategory_model->get_subcategory_name($advert['subcategory_id']);
		$advert['type'] = $this->type_model->get_type_name($advert['type_id']);

		// Start branch 1
	    $xml->startBranch('Advert');

	    // Set its nodes

	    $xml->addNode('Title', $advert['title']);
	    $xml->addNode('Body', $advert['body']);
	    
	    // Start branch 1-1
	    $xml->startBranch('Customer');
	    $xml->addNode('Name', $advert['customer']['name']);
	    $xml->addNode('Email', $advert['customer']['email']);
	    // End branch 1-1
	    $xml->endBranch();
	    $xml->addNode('Price', $advert['price']);
	    $xml->addNode('Post_date', $advert['post_date']);
	    //Start branch 1-2
	    $xml->startBranch('Category', array('name' => $advert['category']['name']));
	    //Start branch 1-2-1
	    $xml->startBranch('Subategory', array('name' => $advert['subcategory']['name']));
	    //Start branch 1-2-1-1
	    $xml->startBranch('Type', array('name' => $advert['type']['name']));
	    // End branch 1-2-1-1
	    $xml->endBranch();
	    // End branch 1-2-1
	    $xml->endBranch();
	    // End branch 1-2
	    $xml->endBranch();

	    // End branch 1
	    $xml->endBranch();

	    // Print the XML to screen
	    $xml->getXml(true);
	}

	//GET all adverts
	public function write_all_json()
	{
		//untreated array with adverts
		$adverts_raw = $this->advert_model->get_adverts();

		//array where treated data will be stored
		$adverts = array();

		//get customer,category,subcategory, and type for each advert
		foreach($adverts_raw as $advert)
		{
			$advert['customer'] = array();
			$advert['category'] = array();
			$advert['subcategory'] = array();
			$advert['type'] = array();
			$advert['customer'] = $this->customer_model->get_customers($advert['customer_id']);
			$advert['category'] = $this->category_model->get_category_name($advert['category_id']);
			$advert['subcategory'] = $this->subcategory_model->get_subcategory_name($advert['subcategory_id']);
			$advert['type'] = $this->type_model->get_type_name($advert['type_id']);

			//setting up treated array
			$new_ad = array(
							'title' => $advert['title'],
							'body' => $advert['body'],
							'customer' => array('name' =>$advert['customer']['name'], 'email' => $advert['customer']['email']),
							'price' => $advert['price'],
							'post_date' => $advert['post_date'],
							'category' => $advert['category']['name'],
							'subcategory' => $advert['subcategory']['name'],
							'type' => $advert['type']['name']
							);
			array_push($adverts, $new_ad);
		}	

		echo json_encode($adverts);
	}

	//GET advert with id $advert_id
	public function write_single_json($advert_id)
	{
		//setting up untreated array
		$advert = $this->advert_model->get_advert($advert_id);
		$advert['customer'] = $this->customer_model->get_customers($advert['customer_id']);
		$advert['category'] = $this->category_model->get_category_name($advert['category_id']);
		$advert['subcategory'] = $this->subcategory_model->get_subcategory_name($advert['subcategory_id']);
		$advert['type'] = $this->type_model->get_type_name($advert['type_id']);

		//setting up treated array
		$new_ad = array(
							'title' => $advert['title'],
							'body' => $advert['body'],
							'customer' => array('name' =>$advert['customer']['name'], 'email' => $advert['customer']['email']),
							'price' => $advert['price'],
							'post_date' => $advert['post_date'],
							'category' => $advert['category']['name'],
							'subcategory' => $advert['subcategory']['name'],
							'type' => $advert['type']['name']
							);
		echo json_encode($new_ad);
	}

	function get_adverts_category_xml($category_id) {
		//Load data from database
		$data['adverts'] = $this->advert_model->get_adverts_category($category_id);


	    // Load XML writer library
	    $this->load->library('Xml_writer');

	    // Initiate class
	    $xml = new Xml_writer;
	    $xml->setRootName('Adverts');
	    $xml->initiate();

		//get customer,category,subcategory, and type for each advert
		foreach($data['adverts'] as &$advert)
		{
			$advert['customer'] = array();
			$advert['category'] = array();
			$advert['subcategory'] = array();
			$advert['type'] = array();
			$advert['customer'] = $this->customer_model->get_customers($advert['customer_id']);
			$advert['category'] = $this->category_model->get_category_name($advert['category_id']);
			$advert['subcategory'] = $this->subcategory_model->get_subcategory_name($advert['subcategory_id']);
			$advert['type'] = $this->type_model->get_type_name($advert['type_id']);

			// Start branch 1
		    $xml->startBranch('Advert');

		     // Set its nodes

		    $xml->addNode('Title', $advert['title']);
		    $xml->addNode('Body', $advert['body']);

		    // Start branch 1-1
		    $xml->startBranch('Customer');
		    $xml->addNode('Name', $advert['customer']['name']);
		    $xml->addNode('Email', $advert['customer']['email']);
		    // End branch 1-1
		    $xml->endBranch();
		    $xml->addNode('Price', $advert['price']);
		    $xml->addNode('Post_date', $advert['post_date']);
		    //Start branch 1-2
		    $xml->startBranch('Category', array('name' => $advert['category']['name']));
		    //Start branch 1-2-1
		    $xml->startBranch('Subategory', array('name' => $advert['subcategory']['name']));
		    //Start branch 1-2-1-1
		    $xml->startBranch('Type', array('name' => $advert['type']['name']));
		    // End branch 1-2-1-1
		    $xml->endBranch();
		    // End branch 1-2-1
		    $xml->endBranch();
		    // End branch 1-2
		    $xml->endBranch();

		    // End branch 1
		    $xml->endBranch();
		}

	    // Print the XML to screen
	    $xml->getXml(true);
	}

	function get_adverts_subcategory_xml($subcategory_id) {
		//Load data from database
		$data['adverts'] = $this->advert_model->get_adverts_subcategory($subcategory_id);


	    // Load XML writer library
	    $this->load->library('Xml_writer');

	    // Initiate class
	    $xml = new Xml_writer;
	    $xml->setRootName('Adverts');
	    $xml->initiate();

		//get customer,category,subcategory, and type for each advert
		foreach($data['adverts'] as &$advert)
		{
			$advert['customer'] = array();
			$advert['category'] = array();
			$advert['subcategory'] = array();
			$advert['type'] = array();
			$advert['customer'] = $this->customer_model->get_customers($advert['customer_id']);
			$advert['category'] = $this->category_model->get_category_name($advert['category_id']);
			$advert['subcategory'] = $this->subcategory_model->get_subcategory_name($advert['subcategory_id']);
			$advert['type'] = $this->type_model->get_type_name($advert['type_id']);

			// Start branch 1
		    $xml->startBranch('Advert');

		     // Set its nodes

		    $xml->addNode('Title', $advert['title']);
		    $xml->addNode('Body', $advert['body']);

		    // Start branch 1-1
		    $xml->startBranch('Customer');
		    $xml->addNode('Name', $advert['customer']['name']);
		    $xml->addNode('Email', $advert['customer']['email']);
		    // End branch 1-1
		    $xml->endBranch();
		    $xml->addNode('Price', $advert['price']);
		    $xml->addNode('Post_date', $advert['post_date']);
		    //Start branch 1-2
		    $xml->startBranch('Category', array('name' => $advert['category']['name']));
		    //Start branch 1-2-1
		    $xml->startBranch('Subategory', array('name' => $advert['subcategory']['name']));
		    //Start branch 1-2-1-1
		    $xml->startBranch('Type', array('name' => $advert['type']['name']));
		    // End branch 1-2-1-1
		    $xml->endBranch();
		    // End branch 1-2-1
		    $xml->endBranch();
		    // End branch 1-2
		    $xml->endBranch();

		    // End branch 1
		    $xml->endBranch();
		}

	    // Print the XML to screen
	    $xml->getXml(true);
	}

	function get_adverts_type_xml($type_id) {
		//Load data from database
		$data['adverts'] = $this->advert_model->get_adverts_type($type_id);


	    // Load XML writer library
	    $this->load->library('Xml_writer');

	    // Initiate class
	    $xml = new Xml_writer;
	    $xml->setRootName('Adverts');
	    $xml->initiate();

		//get customer,category,subcategory, and type for each advert
		foreach($data['adverts'] as &$advert)
		{
			$advert['customer'] = array();
			$advert['category'] = array();
			$advert['subcategory'] = array();
			$advert['type'] = array();
			$advert['customer'] = $this->customer_model->get_customers($advert['customer_id']);
			$advert['category'] = $this->category_model->get_category_name($advert['category_id']);
			$advert['subcategory'] = $this->subcategory_model->get_subcategory_name($advert['subcategory_id']);
			$advert['type'] = $this->type_model->get_type_name($advert['type_id']);

			// Start branch 1
		    $xml->startBranch('Advert');

		     // Set its nodes

		    $xml->addNode('Title', $advert['title']);
		    $xml->addNode('Body', $advert['body']);

		    // Start branch 1-1
		    $xml->startBranch('Customer');
		    $xml->addNode('Name', $advert['customer']['name']);
		    $xml->addNode('Email', $advert['customer']['email']);
		    // End branch 1-1
		    $xml->endBranch();
		    $xml->addNode('Price', $advert['price']);
		    $xml->addNode('Post_date', $advert['post_date']);
		    //Start branch 1-2
		    $xml->startBranch('Category', array('name' => $advert['category']['name']));
		    //Start branch 1-2-1
		    $xml->startBranch('Subategory', array('name' => $advert['subcategory']['name']));
		    //Start branch 1-2-1-1
		    $xml->startBranch('Type', array('name' => $advert['type']['name']));
		    // End branch 1-2-1-1
		    $xml->endBranch();
		    // End branch 1-2-1
		    $xml->endBranch();
		    // End branch 1-2
		    $xml->endBranch();

		    // End branch 1
		    $xml->endBranch();
		}

	    // Print the XML to screen
	    $xml->getXml(true);
	}

	//GET all adverts
	public function get_adverts_category_json($category_id)
	{
		//untreated array with adverts
		$adverts_raw = $this->advert_model->get_adverts_category($category_id);

		//array where treated data will be stored
		$adverts = array();

		//get customer,category,subcategory, and type for each advert
		foreach($adverts_raw as $advert)
		{
			$advert['customer'] = array();
			$advert['category'] = array();
			$advert['subcategory'] = array();
			$advert['type'] = array();
			$advert['customer'] = $this->customer_model->get_customers($advert['customer_id']);
			$advert['category'] = $this->category_model->get_category_name($advert['category_id']);
			$advert['subcategory'] = $this->subcategory_model->get_subcategory_name($advert['subcategory_id']);
			$advert['type'] = $this->type_model->get_type_name($advert['type_id']);

			$new_ad = array(
							'title' => $advert['title'],
							'body' => $advert['body'],
							'customer' => array('name' =>$advert['customer']['name'], 'email' => $advert['customer']['email']),
							'price' => $advert['price'],
							'post_date' => $advert['post_date'],
							'category' => $advert['category']['name'],
							'subcategory' => $advert['subcategory']['name'],
							'type' => $advert['type']['name']
							);
			array_push($adverts, $new_ad);
		}	

		echo json_encode($adverts);
	}

	//GET all adverts
	public function get_adverts_subcategory_json($subcategory_id)
	{
		//untreated array with adverts
		$adverts_raw = $this->advert_model->get_adverts_subcategory($subcategory_id);

		//array where treated data will be stored
		$adverts = array();

		//get customer,category,subcategory, and type for each advert
		foreach($adverts_raw as $advert)
		{
			$advert['customer'] = array();
			$advert['category'] = array();
			$advert['subcategory'] = array();
			$advert['type'] = array();
			$advert['customer'] = $this->customer_model->get_customers($advert['customer_id']);
			$advert['category'] = $this->category_model->get_category_name($advert['category_id']);
			$advert['subcategory'] = $this->subcategory_model->get_subcategory_name($advert['subcategory_id']);
			$advert['type'] = $this->type_model->get_type_name($advert['type_id']);

			$new_ad = array(
							'title' => $advert['title'],
							'body' => $advert['body'],
							'customer' => array('name' =>$advert['customer']['name'], 'email' => $advert['customer']['email']),
							'price' => $advert['price'],
							'post_date' => $advert['post_date'],
							'category' => $advert['category']['name'],
							'subcategory' => $advert['subcategory']['name'],
							'type' => $advert['type']['name']
							);
			array_push($adverts, $new_ad);
		}	

		echo json_encode($adverts);
	}

	//GET all adverts
	public function get_adverts_type_json($type_id)
	{
		//untreated array with adverts
		$adverts_raw = $this->advert_model->get_adverts_type($type_id);

		//array where treated data will be stored
		$adverts = array();

		//get customer,category,subcategory, and type for each advert
		foreach($adverts_raw as $advert)
		{
			$advert['customer'] = array();
			$advert['category'] = array();
			$advert['subcategory'] = array();
			$advert['type'] = array();
			$advert['customer'] = $this->customer_model->get_customers($advert['customer_id']);
			$advert['category'] = $this->category_model->get_category_name($advert['category_id']);
			$advert['subcategory'] = $this->subcategory_model->get_subcategory_name($advert['subcategory_id']);
			$advert['type'] = $this->type_model->get_type_name($advert['type_id']);

			$new_ad = array(
							'title' => $advert['title'],
							'body' => $advert['body'],
							'customer' => array('name' =>$advert['customer']['name'], 'email' => $advert['customer']['email']),
							'price' => $advert['price'],
							'post_date' => $advert['post_date'],
							'category' => $advert['category']['name'],
							'subcategory' => $advert['subcategory']['name'],
							'type' => $advert['type']['name']
							);
			array_push($adverts, $new_ad);
		}	

		echo json_encode($adverts);
	}
}