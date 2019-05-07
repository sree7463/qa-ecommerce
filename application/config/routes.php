<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller']		= 'Home';
$route['404_override']					= 'User/f04';
$route['translate_uri_dashes']	= FALSE;

/*
	URL HANDLING
*/

# FIRST GET URL PARTS - REMOVE EMPTY ELEMENTS
$url = $_SERVER['REQUEST_URI'];
$url_parts_unfiltered = explode('/', $url);
$url_parts = array();
foreach($url_parts_unfiltered as $part) {
	if (!empty($part)) {
		array_push($url_parts, $part);
	}
}

# IF THERE IS ONLY ONE ELEMENT IN AN ARRAY
if ( isset( $url_parts[0] ) && ! isset( $url_parts[1] ) ) {

	$option = $url_parts[0];

	switch ( $option ) {
		case '404':
		$route['404'] = 'User/f04';
		break;

		case 'nojs':
		$route['nojs'] = 'User/nojs';
		break;

		case 'login':
		$route['login'] = 'User/login';
		break;

		// case 'admin_login':
		// $route['admin_login'] = 'admin/Admin/login';
		// break;

		case 'register':
		$route['register'] = 'User/register';
		break;

		case 'home':
		$route['home'] = 'User/home';
		break;

		case 'admin':
		$route['admin'] = 'admin/Admin';
		break;

		case 'orders':
		$route['orders'] = 'order/orders';
		break;

		case 'index.php':
		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
    	$link = "https"; 
		else
    	$link = "http"; 
		$link .= "://"; 
		$link .= $_SERVER['HTTP_HOST']; 
		$link .= '/404'; 
		header('Location: ' . $link);exit;
		break;

		default:
	  $lastIndex = strripos($option, '-');
	  $id = substr($option, ++$lastIndex, strlen($option));
	  $slug = substr($option, 0, --$lastIndex);
	  $GLOBALS['slug'] = $slug;
	  // var_dump($slug);exit;
	  $first_id = strtolower(substr($id, 0, 1));
	  $second_id = strtolower(substr($id, 1, strlen($id)));

		if ( $first_id == 1 ) {

			$route[$option] = "category/view/$second_id";
			$GLOBALS['option'] = $option;

		} else if ( $first_id == 2 ) {

			$route[$option] = "product/view/$second_id";

		} else {

			$route['404'] = 'User/f04';

		}
		break;
	}

# IF THERE ARE ATLEAST TWO ELEMENTS IN ARRAY
} else if ( isset( $url_parts[0] ) && isset( $url_parts[1] ) ) {

	$route['admin/add_category']	= 'admin/Admin/add_category';
	$route['admin/category_list']	= 'admin/Admin/category_list';
	$route['admin/add_product']		= 'admin/Admin/add_product';
	$route['admin/product_list']	= 'admin/Admin/product_list';
	$route['admin/user_list']			= 'admin/Admin/user_list';
	$route['admin/order_list']		= 'admin/Admin/order_list';
	$route['admin/logout']				= 'admin/Admin/logout';
	$route['admin/setting']				= 'admin/Admin/setting';
	$route['admin/approve_order/(:any)'] = 'admin/Admin/approve_order/$1';
	$route['admin/disapprove_order/(:any)'] = 'admin/Admin/disapprove_order/$1';
	$route['admin/edit_category/(:any)'] = 'admin/Admin/edit_category/$1';
	$route['search/(:any)'] = 'Product/search/' . $url_parts[1];

} else if ( false ) {

	$route[$url_parts[0]] = "admin/testing/Testing/testingout/$url_parts[0]";

}

/*
	QAISAR ROUTES
*/

