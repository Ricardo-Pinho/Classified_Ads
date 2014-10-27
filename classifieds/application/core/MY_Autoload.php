<?php
class MY_Autoload extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		$this->load->model('subcategory_model');
		$this->load->model('type_model');

		//loading all categories,subcategories, and types
		$categories = $this->category_model->get_categories();
		$subcategories = $this->subcategory_model->get_subcategories();
		$types = $this->type_model->get_types();

		//multi-dimensional array for the menu
		$menu = array();

		//loop to fill the menu array with categories,subcategories, and types
		foreach ($categories as &$category)
		{
			$category['subcategories']=array();
			foreach ($subcategories as &$subcategory)
				{
					$subcategory['types']=array();
					if ($subcategory['category_id'] === $category['id'])
						{						
							foreach ($types as $type)
							{
								if ($type['subcategory_id'] === $subcategory['id'])
									{						
										array_push($subcategory['types'],$type);
									}
							}
							array_push($category['subcategories'],$subcategory);
						}
				}
				array_push($menu,$category);
		}

		$this->data['menu'] = $menu;
	}
}