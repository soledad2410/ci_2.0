<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

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

$route['default_controller'] = 'home';
$route['index/([a-zA-Z]*)'] = 'home/index/$1';
$route['pro/([a-zA-Z]*)/c(:num)/([a-zA-Z0-9-]*)'] = 'product/cate/$1/$2/$3';
$route['pro/([a-zA-Z]*)/c(:num)/([a-zA-Z0-9-]*)_page(:num)'] = 'product/cate/$1/$2/$3/$4';
$route['pro/([a-zA-Z0-9-]*)_(:num)'] = 'product/details/$1/$2';
$route['sanpham/([a-zA-Z0-9-]*)_(:num)'] = 'product/type/$1/$2';
$route['sanpham/([a-zA-Z0-9-]*)_(:num)_page(:num)'] = 'product/type/$1/$2/$3';
$route['search/product'] = 'search/product';
$route['search/([a-zA-Z]*)'] = 'search/index/$1';
$route['new/([a-zA-Z]*)/c(:num)/([a-zA-Z0-9-]*)'] = 'news/cate/$1/$2/$3';
$route['new/([a-zA-Z]*)/c(:num)/([a-zA-Z0-9-]*)_page(:num)'] = 'news/cate/$1/$2/$3/$4';
$route['new/([a-zA-Z0-9-]*)_(:num)'] = 'news/details/$1/$2';
$route['tags/([a-zA-Z0-9]*)/(:any)'] = 'news/tags/$1/$2';
$route['tags/([a-zA-Z0-9]*)/([a-zA-Z0-9-]*)/(:num)'] = 'news/tags/$1/$2/3';
$route['promo'] = 'promotion';
$route['promo/(:num)'] = 'promotion/$1';
$route['promo/([a-zA-Z]*)/a(:num)/([a-zA-Z0-9-]*)'] = 'promotion/details/$1/$2/$3';

$route['gal/([a-zA-Z]*)/c(:num)/([a-zA-Z0-9-]*)'] = 'gallery/cate/$1/$2/$3';
$route['gallery/([a-zA-Z]*)/a(:num)/([a-zA-Z0-9-]*)'] = 'gallery/albumdetails/$1/$2/$3';
$route['gallery/([a-zA-Z]*)/(:num)/([a-zA-Z0-9-]*)'] = 'gallery/mediadetails/$1/$2/$3';

$route['contact/([a-zA-Z]*)/c(:num)/([a-zA-Z0-9-]*)'] = 'contact/index/$1/$2/$3';
$route['404_override'] = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */