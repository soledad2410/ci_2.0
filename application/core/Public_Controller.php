<?php

/**
 * Public_Controller
 *
 * @package vstar
 * @author syhung_it
 * @copyright 2011
 * @version 1.0
 * @access public
 */
class Public_Controller extends MY_Controller {
	protected $my_lang;
	protected $page;
	protected $cate;
	protected $my_config;
	/* @var  $view_model Layout_Model */
	protected $view;
	public $domain_id;

	public function __construct() {
    parent::__construct();
    $this->domain_id = $_SESSION['domain_id'];
    $this->load->model('layout_model');
    $this->view = $this->layout_model;
    $this->load->model('config_model');
    $lang_active = $this->layout_model->get_by_key('tbllang', 'lang_shortname', 'lang_default', 1);
  
    $_SESSION['lang'] = isset($_SESSION['lang']) ? $_SESSION['lang'] : $lang_active;
    if($this->input->get('lang')){
       $lang_active = $this->input->get('lang');
        
    }
    $segments = $this->uri->rsegment_array();
    if(isset($segments['2']) && isset($segments['3']) && ($segments['2'] == 'cate' || $segments['2'] == 'index')){
        $lang_active = $segments['3'];
    }
    
    if(isset($segments['2']) && $segments['2'] == 'details' && isset($segments['4']) && intval($segments['4']) > 0){
        $id = $segments['4'];
        switch($segments['1']){
            case 'product':
                $lang_active = $this->layout_model->get_by_key('tblproduct','lang','product_id',$id);
            break;
            case 'news' :
            $lang_active = $this->layout_model->get_by_key('tblarticle','lang','article_id',$id);
            break;
            case 'gallery':
             $lang_active = $this->layout_model->get_by_key('tblgallery','lang','gallery_id',$id);
            break;
            default:
            break;
        }
    }
    
    $this->my_lang=$lang_active;
    
    if($this->uri->segment(1) == 'news' && $this->uri->segment(2) == 'details' && intval($this->uri->segment(3)) >0)
    {
        $this->my_lang = $this->layout_model->get_by_key('tblarticle', 'lang', 'article_id', $this->uri->segment(3));
    }
    if($this->uri->segment(1) == 'product' && $this->uri->segment(2) == 'details' && intval($this->uri->segment(3)) >0)
    {
        $this->my_lang = $this->layout_model->get_by_key('tblproduct', 'lang', 'product_id', $this->uri->segment(3));
    }    
    // Init layout setting
   
    $this->view->set_layout($this->layout);
    $this->view->set_template($this->template);
    $this->view->set_lang($this->my_lang);
    $_SESSION['lang'] = $lang_active;
   

    // Init email setting
   // $config['protocol'] = $this->view->get_config('smtp_protocol', $this->my_lang);
//    $config['port'] = $this->view->get_config('smtp_port', $this->my_lang);
//    $config['smtp_host'] = $this->view->get_config('smtp_server', $this->my_lang);
//    $config['smtp_user'] = $this->view->get_config('smtp_acc', $this->my_lang);
//    $config['smtp_pass'] = $this->view->get_config('smtp_pwd', $this->my_lang);
    $group=isset($this->user['group_id'])?$this->user['group_id']:'0';
    $level=isset($this->user['group_level'])?$this->user['group_level']:'';
    $this->view->set_group($group,$level);
  //  $this->email->initialize($config);
     if(ENVIRONMENT == 'development'){
        clean_cache_file();
        if(isset($_GET['m']) && $_GET['m'] == 'profiler'){
            $this->output->enable_profiler(TRUE);
        }
     } else {
        $this->output->cache(3600);
     }
        
}

	public function my_config($config_name) {
		return $this->view->get_config($config_name, $this->my_lang, $this->domain_id);
	}
}

?>