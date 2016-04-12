<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/**
 * MY_Loader Class
 *
 * Custom Loader class that extends the base CI_Loader to override the location
 * of the views directory.
 */
class MY_Loader extends CI_Loader {

	function __construct() {
	   
		parent::__construct();
		$CI = &get_instance();
		$rs = $CI->uri->rsegment_array();

		$module = $rs['1'];

		$frontend_modules = array('home', 'news', 'contact', 'product', 'gallery', 'shopping', 'search');
		if (in_array($module, $frontend_modules) && ($CI->uri->segment(1) != 'admin' || ($CI->uri->segment(1) == 'admin' && !$CI->uri->segment(2)))) {

			$this->_ci_view_path = 'template/templates/';

		}
        

	}
}