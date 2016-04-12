<?php

class Home extends Public_Controller {

	public function __construct() {
		parent::__construct();
		// $this->output->enable_profiler(TRUE);

		$this->load->model('product_model');
		$this->load->model('article_model');
		$this->load->model('menu_model');
		//phpinfo();
	}

	public function place($lang = false) {
		$this->load->library('booking_api');
		var_dump($this->booking_api->resultFlights());
	}
	public function index($lang = FALSE) {

		$data = array();

		$menu_home_product = $this->menu_model->load_menu_frontend(array('menu_id', 'menu_title', 'sub_title'),
			array(
				'menu_home' => 1, 'tbllang.lang_shortname' => $this->my_lang,
				'module_name' => 'product_cate',
			)
		);
		$menu_home_news = $this->menu_model->load_menu_frontend(array('menu_id', 'menu_level', 'tblmenu.parent_id', 'menu_image', 'menu_details', 'menu_title'),
			array(
				'menu_home' => 1, 'tbllang.lang_shortname' => $this->my_lang,
				'module_name' => 'news_cate',
			)
		);
		$data['menu_product'] = $menu_home_product;
		$data['menu_news'] = $menu_home_news;

		$this->view->set_layout('home');
		$this->view->view($data);
	}

	public function new_products() {
		$data = array();
		$new_product = $this->product_model->load_product_frontend(array('product_id', 'product_name', 'product_image', 'product_price'), false, 0, 10, false, false);
		$data['new_product'] = $new_product;
		$this->view->view($data);
	}

	public function product_keyword() {
		$keyword = $this->input->get('key');
		if (!$keyword) {
			return;
		}
		$product_result = $this->product_model->load_product('tblproduct.product_name', false, $keyword, false, false,
			array('tblmenu.menu_visible' => 1, 'tblproduct.product_visible' => 1));
		if ($product_result->num_rows() < 1) {
			return;
		}
		$return = '<ul class="result-text">';
		$count = 0;
		foreach ($product_result->result_array() as $product) {
			if ($count % 2 == 0) {
				$return .= '<li onclick="result_phrase(this)" title="' . $product['product_name'] .
				'" class="phrase-0">' . str_replace($keyword, '<b>' . $keyword . '</b>', $product['product_name']) .
				'</li>';
			} else {
				$return .= '<li onclick="result_phrase(this)" title="' . $product['product_name'] .
				'" class="phrase-1">' . str_replace($keyword, '<b>' . $keyword . '</b>', $product['product_name']) .
				'</li>';
			}
			$count++;
		}
		$return .= '</ul>';

		echo $return;
	}

	public function get_weather_forcast() {
		$link = 'http://vnexpress.net/ListFile/Weather/';
		if ($this->input->get('cty')) {

			switch ($this->input->get('cty')) {
			case 1:
				$link = $link . 'Sonla.xml';
				break;
			case 2:
				$link = $link . 'Viettri.xml';
				break;
			case 3:
				$link = $link . 'Haiphong.xml';
				break;
			case 4:
				$link = $link . 'Hanoi.xml';
				break;
			case 5:
				$link = $link . 'Vinh.xml';
				break;
			case 6:
				$link = $link . 'Danang.xml';
				break;
			case 7:
				$link = $link . 'Nhatrang.xml';
				break;
			case 8:
				$link = $link . 'Pleicu.xml';
				break;
			case 9:
				$link = $link . 'HCM.xml';
				break;
			default:
				$link = $link . 'Hanoi.xml';
				break;
			}

			$content = file_get_contents($link);
			$p = @xml_parser_create();
			@xml_parse_into_struct($p, $content, $xml);
			@xml_parser_free($p);
			echo '<img src="http://vnexpress.net/Images/Weather/' . $xml[1]['value'] . '" align="left" />';
			echo '<img src="http://vnexpress.net/Images/Weather/' . $xml[3]['value'] . '" align="left" />';
			echo '<img src="http://vnexpress.net/Images/Weather/' . $xml[5]['value'] . '" align="left" /><p>';
			echo $xml[13]['value'];
		}
	}

	function image_product() {
		$id = $this->input->get('id');

		$images = explode('|', $this->product_model->get_by_key('tblproductcolors', 'product_images', null, null, array('color_id' => $id)));
		//var_dump($images);
		if (isset($images['0'])) {
			$content = '<a class="jqzoom" rel="gal1" href="' . $images['0'] . '" title="Click vào để xem slideshow ảnh nguyên bản">
                                    <img alt="Thiết kế phòng giám đốc" src="' . $images['0'] . '" width="" height="" />
                                </a>';
			echo $content;
		}

	}

	function download() {
		$file = $this->input->get('file');

		$file = base64_decode(rawurldecode($file));
		if (startsWith('/', $file)) {
			$file = substr($file, 0, 1);
		}

		if (!is_file($file)) {redirect(base_url());}
		$file_name = basename($file);
		// MIME files
		$known_mime_types = array(
			"pdf" => "application/pdf",
			"txt" => "text/plain",
			"html" => "text/html",
			"htm" => "text/html",
			"exe" => "application/octet-stream",
			"zip" => "application/zip",
			"doc" => "application/msword",
			"xls" => "application/vnd.ms-excel",
			"ppt" => "application/vnd.ms-powerpoint",
			"gif" => "image/gif",
			"png" => "image/png",
			"jpeg" => "image/jpg",
			"jpg" => "image/jpg",
			"php" => "text/plain",
		);

		//
		$file_extension = strtolower(substr(strrchr($file_name, "."), 1));
		if (array_key_exists($file_extension, $known_mime_types)) {
			$mime_type = $known_mime_types[$file_extension];
		} else {
			$mime_type = "application/force-download";
		};
		header('Content-Description: File Transfer');
		header('Content-Type: ' . $mime_type);
		header('Content-Disposition: attachment; filename=' . $file_name);
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		//header('Content-Length: ' . $size_of_file);

		echo readfile($file);

	}

	function sitemap($lang = false) {
		$menu_root = $this->menu_model->load_menu_recursive(false, 0, array('tblmenu.menu_visible' => 1, 'tbllang.lang_shortname' => $this->my_lang));
		$data['cates'] = $menu_root;
		$this->layout_model->view('contents/sitemap', $data);

	}

	public function png_generator($txt) {

		$string = $txt;
		$width = 200;
		$height = 50;
		$font = 'asset/captcha/segoeui_0.ttf';
		$image = imagecreate($width, $height);
		$black = imagecolorallocate($image, 0, 0, 0); // text color

		imagecolortransparent($image, $black);
		$white = imagecolorallocate($image, 255, 255, 255); // background color
		$silver = imagecolorallocate($image, 204, 204, 204);
		$gray = imagecolorallocate($image, 155, 155, 155);
		imagettftext($image, 20, 0, 10, 25, $gray, $font, $string);
		header("Content-type: image/png");
		imagepng($image);
	}
}

?>