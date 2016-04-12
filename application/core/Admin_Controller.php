<?php
Class Admin_Controller extends MY_Controller{

    public $my_lang;
    public $domain_id;
    public function __construct(){
        parent::__construct();
        $current_domain = isset($_SESSION['current_domain']) ? $_SESSION['current_domain'] : $_SESSION['domain_id'];
        $_SESSION['current_domain'] = $current_domain;
        $this->domain_id = $current_domain;
        $module = $this->uri->rsegment(1);
        $function = $this->uri->rsegment(2);
        $role = $module . '|' . $function;
        if(!isset($this->user) || $this->user['group_level']>3){redirect(base_url().'admin/login/');}
        $this->my_lang=&$_SESSION['lang_admin'];
        $this->load->library('lib');
        $this->load->model('admin_model');
        $this->load->helper('xml2array');
    if  ($this->admin_model->select_query('tbluser','user_name',array('user_name'=>$this->user['user_name'],'user_block'=>0))->num_rows()!=1){
            unset($_SESSION['user']);
            redirect(base_url().'admin/login/');
    }
    if (!$this->admin_model->check_permission($this->user['group_id'],$role) && $this->user['group_level']>2 && $role!='admin|errorpermission' && $role!='admin|logout') {
        redirect(base_url() . 'admin/admin/errorpermission.html');
    }
  delete_files(APPPATH.'/cache');

}

}
?>