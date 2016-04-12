<?php
class Contact extends Public_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('email_model');
	}

	public function index($lang = FALSE, $id) {
		if (!$id) {redirect(base_url());}
		$token = md5(uniqid(rand(), true));
		$alert = '';
		$data['contact_info'] = $this->my_config('contact_info');
		$menu_info = $this->layout_model->select_query('tblmenu', '*', array('menu_id' => $id), FALSE, FALSE, FALSE, FALSE, TRUE);
		$data['menu'] = $menu_info['0'];
		$data['lang'] = $this->my_lang;
		if ($this->input->post('token') && $this->input->post('token') == $_SESSION['token']) {
			$alert .= '';
			$insert_data = $this->input->post();
			$insert_data['ip_address'] = $_SERVER['REMOTE_ADDR'];
			$insert_data['contact_datetime'] = time();

			if ($this->menu_model->insert_data('tblcontact', $insert_data)) {
				$from = $insert_data['contact_email'];
				$name = $insert_data['contact_user'];
				$email_to = $this->menu_model->get_config('contact_email', 'vi');
				$subject = 'Liên hệ gửi từ website ' . base_url();

				$message = '<strong>Tên khách hàng: </strong>' . $insert_data['contact_user'] . ' <br />';

				$message .= '<strong>Điện thoại liên hệ: </strong>' . $insert_data['contact_phone'] . ' <br />';
				$message .= '<strong>Nội dung: </strong>' . $insert_data['contact_content'] . ' <br /><br />';
				$message .= '<strong>Website: </strong><a href=\"' . base_url() . '\" title=\"' . base_url() . '\">' . base_url() . '</a>';

				$this->email_model->smtp_sendmail($from, $name, $email_to, $subject, $message, true);

				$alert .= '<span class="contact-success">Thông tin của bạn đã được gửi. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất!</span>';
			}
			$alert .= '';
		}

		$data['message'] = $alert;
		$_SESSION['token'] = $token;
		$data['token'] = $token;
		$this->view->set_layout($menu_info['0']['layout_name']);
		$this->view->set_extra_data(array('menu' => $menu_info['0'], 'web_title' => $menu_info['0']['menu_title'], 'breadcrumbs' => $this->url_model->generate_breadcrumb($menu_info['0']['menu_id'])));
		$this->view->view($data);

	}

	public function send_contact() {
		$insert_array = $this->input->post();
		$insert_array['contact_datetime'] = time();
		$insert_array['ip_address'] = $_SERVER['REMOTE_ADDR'];
		unset($insert_array['captcha']);
		$this->layout_model->db->insert('tblcontact', $insert_array);
		echo '1';

	}

	public function send_comment() {
		$id = $this->input->get('id');
		$insert_data = array('comment_title' => $this->input->post('contact_title'),
			'product_id' => $id,
			'cus_name' => $this->input->post('contact_user'),
			'cus_email' => $this->input->post('contact_email'),
			'comment_content' => $this->input->post('contact_user'),
			'comment_date' => time(),
			'ip_address' => $_SERVER['SERVER_ADDR'],
		);

		$this->layout_model->insert_data('tblproductcomment', $insert_data);
		echo '1';
	}

}
?>