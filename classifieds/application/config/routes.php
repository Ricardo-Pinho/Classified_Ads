<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
//Type routes
//html
$route['types/(:any)'] = 'type/view/$1';
$route['types'] = 'type';
$route['type/(:any)'] = 'type/view/$1';
$route['type'] = 'type';

//Subcategory routes
//html
$route['subcategories/(:any)'] = 'subcategory/view/$1';
$route['subcategories'] = 'subcategory';
$route['subcategory/(:any)'] = 'subcategory/view/$1';
$route['subcategory'] = 'subcategory';

//Category routes
//html
$route['categories/(:any)'] = 'category/view/$1';
$route['categories'] = 'category';
$route['category/(:any)'] = 'category/view/$1';
$route['category'] = 'category';

//Customer routes
//html
$route['customers/(:any)'] = 'customer/view/$1';
$route['customers'] = 'customer';
$route['customer/(:any)'] = 'customer/view/$1';
$route['customer'] = 'customer';

//Advert routes
//xml
//category,subcategory and type filtering
$route['advert/category/(:any).xml'] = 'advert/get_adverts_category_xml/$1';
$route['advert/subcategory/(:any).xml'] = 'advert/get_adverts_subcategory_xml/$1';
$route['advert/type/(:any).xml'] = 'advert/get_adverts_type_xml/$1';

$route['advert/(:any).xml'] = 'advert/write_single_xml/$1';
$route['advert.xml'] = 'advert/write_all_xml';
$route['adverts/(:any).xml'] = 'advert/write_single_xml/$1';
$route['adverts.xml'] = 'advert/write_all_xml';

//json
//category,subcategory and type filtering
$route['advert/category/(:any).json'] = 'advert/get_adverts_category_json/$1';
$route['advert/subcategory/(:any).json'] = 'advert/get_adverts_subcategory_json/$1';
$route['advert/type/(:any).json'] = 'advert/get_adverts_type_json/$1';

$route['advert/(:any).json'] = 'advert/write_single_json/$1';
$route['advert.json'] = 'advert/write_all_json';
$route['adverts/(:any).json'] = 'advert/write_single_json/$1';
$route['adverts.json'] = 'advert/write_all_json';

//html
//ajax page
$route['get_newads/(:any)'] = 'advert/get_adverts/$1';
//category,subcategory and type filtering
$route['advert/category/(:any)'] = 'advert/get_adverts_category/$1';
$route['advert/subcategory/(:any)'] = 'advert/get_adverts_subcategory/$1';
$route['advert/type/(:any)'] = 'advert/get_adverts_type/$1';

$route['adverts/(:any)'] = 'advert/view/$1';
$route['adverts'] = 'advert';
$route['advert/(:any)'] = 'advert/view/$1';
$route['advert'] = 'advert';

$route['(:any)'] = 'advert';
$route['default_controller'] = 'advert';

/* End of file routes.php */
/* Location: ./application/config/routes.php */