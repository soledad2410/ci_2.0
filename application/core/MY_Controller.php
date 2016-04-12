<?php

Class MY_Controller extends CI_Controller {

	protected $layout;
	protected $template;
	public $user = array();
	public function __construct() {
         
		parent::__construct();
        
		$this->load->model('base_model');
		$domain = $_SERVER['SERVER_NAME'];
       
		$query = "SELECT domain_id FROM vnvic_tbldomain WHERE (domain_name = '$domain' OR alias = '$domain') AND domain_active = 1";
		$rs = $this->base_model->db->query($query)->first_row();

		if (empty($rs)) {
			die('<h4 style="text-align:center">DOMAIN IS NOT VALID!</h4>');
		}
		$domain_id = $rs->domain_id;
		$_SESSION['domain_id'] = $domain_id;
		$this->user = &$_SESSION['user'];
		$template_default = $this->base_model->get_by_key('tbltemplate', 'template_name', null, null, array('template_default' => 1, 'domain_id' => $domain_id));

		$this->template = $template_default;
		$this->layout = $this->base_model->get_by_key('tbltemplate', 'layout_name', null, null, array('template_default' => 1, 'domain_id' => $domain_id));


	}

}

?>