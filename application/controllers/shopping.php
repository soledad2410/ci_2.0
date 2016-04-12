<?php
Class Shopping extends Public_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('product_model');
		$this->load->library('shop');
	}

	/**
	 * Shopping::index()
	 *
	 * @return void
	 */
	public function index() {
		//  var_dump($_SESSION['cart']);
		//   unset($_SESSION['cart']);
		if (!isset($_SESSION['cart']) || count($_SESSION['cart']) < 1) {redirect(base_url());}
		//        $data['web_title']='Trang d?t hàng';
		//
		$data['carts'] = $this->shop->get_cart();
		// if ((!$this->shop->get_cart())) {
		// 	redirect(base_url());
		// }
		$data['order_info'] = $this->my_config('order_info');
		//  var_dump($_SESSION['cart']);
		$this->view->set_layout('default');
		$this->view->view($data);

	}

	/**
	 * Shopping::add_cart()
	 *
	 * @param mixed $id
	 * @return void
	 */
	public function add_cart() {
		$id = $this->input->get('id');
		$qty = intval($this->input->get('qty')) > 0 ? intval($this->input->get('qty')) : 1;

		$prod_info = $this->product_model->get_row_array('tblproduct', array('product_id' => $id, 'product_visible' => 1, 'domain_id' => $this->domain_id));

		if (($prod_info)) {
			$data['price'] = $prod_info['product_price'];
			if ($prod_info['product_saleoff'] > 0 && $prod_info['product_saleoff'] < $prod_info['product_price']) {
				$data['price'] = $prod_info['product_saleoff'];
			}
			$data['image'] = $prod_info['product_image'];

			$this->shop->add_cart($prod_info['product_id'], $prod_info['product_name'], $qty, $data);
		}

		echo json_encode(array('count' => $this->shop->count_cart(), 'carts' => $this->shop->get_cart()));
		//redirect(base_url().'shopping.html');

	}

	function calculate_price() {
		echo $this->shop->calculate_price();
	}

	/**
	 * Shopping::update_cart()
	 *
	 * @return void
	 */
	public function update_cart() {
		$cart_array = $this->input->post();

		unset($cart_array['submit']);
		// var_dump($cart_array);
		foreach ($cart_array as $id => $qty) {
			if (intval($id) > 0 && intval($qty) >= 0) {
				$this->shop->update_cart($id, $qty);
			}

		}
		redirect(base_url() . 'shopping.html');
	}

	public function change_cart() {
		$id = intval($this->input->get('id'));
		$val = intval($this->input->get('qty'));
		$this->shop->update_cart($id, $val);
		echo json_encode(array('count' => $this->shop->count_cart(), 'carts' => $this->shop->get_cart()));
	}

	public function count_cart() {
		echo $this->shop->count_cart();
	}
	function order() {

		$post = $this->input->post();
		$insert_array = $post;
		$insert_array['domain_id'] = $this->domain_id;
		$insert_array['order_date'] = time();
        $insert_array['currency'] = $this->product_model->get_config('currency',$this->my_lang,$this->domain_id);
		$this->product_model->insert_data('tblorder', $insert_array);
		$order_id = $this->product_model->get_top('tblorder', 'order_id');
		foreach ($this->shop->get_cart() as $prod => $items) {
			$details = array();
			$details['order_id'] = $order_id;
			$details['product_id'] = $prod;
			$details['product_name'] = $items['name'];
			$details['order_quanlity'] = $items['qty'];
			$details['order_price'] = $items['price'];
			$this->product_model->db->insert('tblorderdetails', $details);
		}
		unset($_SESSION['cart']);
		echo json_encode(array('code' => 'success'));

	}

	function unset_cart() {
		$id = $this->input->post('id');
		$this->shop->update_cart($id, 0);
		echo json_encode(array('code' => 'ok'));
	}
}
?>