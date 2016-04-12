<?php

class Config extends Admin_Controller
{
    public function Config()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->model('config_model');
        $this->load->model('admin_model');
        $this->load->model('menu_model');
        $this->load->model('template_model');
        $this->load->helper('file');
    }

    public function index()

    {
    
        $data['title'] = 'Cấu hình hệ thống';
        $data['config_home'] = $this->config_model->load_config('tblconfig.config_id', array('config_active' => 1, 'tblconfig.config_module' => 'home','tblconfig.domain_id' =>$this->domain_id));
        $data['config_email'] = $this->config_model->load_config('tblconfig.config_id', array('config_active' => 1, 'tblconfig.config_module' => 'email','tblconfig.domain_id' =>$this->domain_id));
        $this->load->view('back_end/config/index_config', $data);
    }

    public function save_config()
    {
        foreach ($this->input->post() as $key => $value)
        {   if($this->menu_model->select_query('tblconfigvalue','config_value',array('config_id'=>$key,'lang_shortname'=>$this->my_lang))->num_rows()==0){
                $this->menu_model->db->insert('tblconfigvalue',array('config_id'=>$key,'lang_shortname'=>$this->my_lang,'config_value'=>$value));
            }else{
            $this->menu_model->db->update('tblconfigvalue', array('config_value' => $value), array('config_id' => $key, 'lang_shortname' => $_SESSION['lang_admin']));
            }
        }
        echo 0;
    }

    /**
     * Config::template()
     * 
     * @return void
     */
    public function template()
    {
        $data['title'] = 'Quản trị giao diện website';
        $data['templates'] = $this->template_model->load_template(false,array('domain_id'=>$this->domain_id));
        $data['layouts'] = $this->template_model->load_layout();
        $this->load->view('back_end/config/index_template', $data);
    }

    /**
     * Config::default_template()
     * 
     * @return void
     */

    public function default_template()
    {
        $template_id = $this->input->get('id');
        $this->menu_model->db->update('tbltemplate', array('template_default' => 0),array('domain_id'=>$this->domain_id));
        $this->menu_model->db->update('tbltemplate', array('template_default' => 1), array('template_id' => $template_id,'domain_id'=>$this->domain_id));
        redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * Config::table_template()
     * 
     * @return void
     */
    public function table_template()
    {
        $data['templates'] = $this->template_model->load_template(false,array('domain_id'=>$this->domain_id));
        $this->load->view('back_end/config/table_template', $data);
    }

    /**
     * Config::delete_template()
     * 
     * @return void
     */
    public function delete_template()
    {
        $template_id = $this->input->get('id');
        $layout_name = $this->menu_model->get_by_key('tbltemplate', 'template_name', 'template_id', $template_id);
        
        $template_dir = 'template/templates/' . $layout_name;
        if($layout_name && is_dir($template_dir)){
        $this->menu_model->db->delete('tbltemplate', array('template_id' => $template_id));
       // delete_files($template_dir . '/', true);
        rmdir($template_dir);
        echo json_encode(array('code'=>'success'));
        }


    }
    
    public function clean_cache()
    {
        $this->cache->clean();
    }
    
    
    /**
     * Config::lang_active()
     * 
     * @param mixed $lang_id
     * @return void
     */
    public function lang_active($lang_id){
        $active=$this->menu_model->get_by_key('tbllang','lang_active','lang_id',$lang_id);
        $default=$this->menu_model->get_by_key('tbllang','lang_default','lang_id',$lang_id);
        $update_active=($active==0)?1:0;
        if($default==0){
        $this->menu_model->db->update('tbllang',array('lang_active'=>$update_active),array('lang_id'=>$lang_id));
        }
        header('location:'.$_SERVER['HTTP_REFERER']);        
    }
    
    public function lang_default($lang_id){
        $this->menu_model->db->update('tbllang',array('lang_default'=>0));
        $this->menu_model->db->update('tbllang',array('lang_default'=>1,'lang_active'=>1),array('lang_id'=>$lang_id));
        header('location:'.$_SERVER['HTTP_REFERER']);
    }

    /**
     * Config::add_template()
     * 
     * @return
     */
    public function add_template()
    {
        $template_name = $this->input->post('template_name');
      
        if ($this->menu_model->get_by_key('tbltemplate', 'template_id', 'template_name', $template_name) != false)
        {
            echo 1;
            return;
        }
        if (!is_file('template/templates/' . $template_name . '/thumb.png') )
        {
           
            return;
        }
        $insert_data = $this->input->post();
        $insert_data['domain_id'] = $this->domain_id;
        $this->menu_model->db->insert('tbltemplate', $insert_data);
        echo 0;
    }

    function choose_template()
    {
        $data['templates'] = $this->template_model->load_template();
        $this->load->view('back_end/config/web_choose_template', $data);
    }
    
    /**
     * Config::language()
     * 
     * @return void
     */
    public function language(){
        $data['title']='Quản trị ngôn ngữ website';
        $message='';
        $data['languages']=$this->template_model->select_query('tbllang');
        $data['keywords']=$this->template_model->select_query('tblkeyword');
         $lang_id=$this->template_model->get_by_key('tbllang','lang_id','lang_shortname',$this->my_lang);
        if($this->input->post()){
            if($this->input->post('token')==$_SESSION['token']){
                $update_data=$this->input->post();
                unset($update_data['token']);
                foreach($update_data as $key=>$value){
                   if($this->template_model->select_query('tbllangkeyword','keyword_value',array('lang_id'=>$lang_id,'keyword_id'=>$key))->num_rows()==0){
                    $this->template_model->db->insert('tbllangkeyword',array('lang_id'=>$lang_id,'keyword_id'=>$key,'keyword_value'=>$value));
                   }else{
                    $this->template_model->db->update('tbllangkeyword',array('keyword_value'=>$value),array('lang_id'=>$lang_id,'keyword_id'=>$key));
                   } 
                }
                $message=admin_success('Cập nhập từ điển thành công');
            }
        }
        $data['message']=$message;
        
        $token = md5(uniqid(rand(), true));
        $_SESSION['token']=$token;
        $data['token']=$token;
       
        $data['lang_id']=$lang_id;
        $this->load->view('back_end/config/index_lang',$data);
    }
    
    public function change_lang($lang_shortname){
        $this->my_lang=$lang_shortname;
        header('location:'.base_url().'admin/admin/index.html');
    }
    

}

?>