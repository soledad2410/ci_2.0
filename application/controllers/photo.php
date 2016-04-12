<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photo extends Public_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index($path) {
		$this->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['source_image'] = FCPATH . $path;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 75;
		$config['height'] = 50;

		$this->image_lib->clear();
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
	}

}

/* End of file photo.php */
/* Location: ./application/controllers/photo.php */