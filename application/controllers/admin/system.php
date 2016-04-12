<?php
/**
 * System
 *
 * @package CI
 * @author syhung_it
 * @copyright 2011
 * @version 1.0
 * @access public
 */
Class System extends Admin_Controller{

    /**
     * System::System()
     *
     * @return void
     */
    public function System(){

        parent::__construct();
        if($this->user['group_level']>1){redirect(base_url()."admin.html");}
        $this->load->model('template_model');
        $this->load->model('plugin_model');
        $this->load->helper('xml2array');
    }

    /**
     * System::layout()
     *
     * @return void
     */
    public function layout(){

        $data['title']='Quản trị template layout website';
        $data['layouts']=$this->template_model->load_layout();
        $this->load->view('back_end/system/index_layout',$data);
    }

    /**
     * System::table_layout()
     *
     * @return void
     */
    public function table_layout(){
        $data['layouts']=$this->template_model->load_layout();
        $this->load->view('back_end/system/table_layout',$data);
    }

    /**
     * System::language()
     *
     * @return void
     */
    public function language(){
        $data['title']='Quản trị ngôn ngữ website';
        $data['languages']=$this->template_model->select_query('tbllang');
        $message='';

        if($this->input->post()){
            if($this->input->post('token')==$_SESSION['token']){

                $lang_shortname=$this->input->post('lang_shortname');
                if(!$this->template_model->check_unique('tbllang','lang_shortname',$lang_shortname)){
                    $message=admin_error('Ngôn ngữ này đã tồn tại');
                }else{
                    if($this->template_model->insert_data('tbllang',$this->input->post())){
                        $message=admin_success('Thêm mới ngôn ngữ thành công');
                    }else{
                        $message=admin_error('Có lỗi xảy ra,thêm mới ngôn ngữ thất bại');
                    }
                }
            }
        }
        $token = md5(uniqid(rand(), true));
        $_SESSION['token']=$token;
        $data['token']=$token;

          // Keyword

       $data['keywords']=$this->template_model->select_query('tblkeyword');
        $data['message']=$message;
        $this->load->view('back_end/system/index_lang',$data);

    }

    /**
     * System::edit_lang()
     *
     * @param mixed $lang_id
     * @return void
     */
    public function edit_lang($lang_id){
       $data['title']='Sửa thông tin ngôn ngữ';
       $lang_info=$this->template_model->select_query('tbllang',FALSE,array('lang_id'=>$lang_id),FALSE,FALSE,FALSE,FALSE,TRUE);
       $message='';
       $data['lang']=prep_form($lang_info['0']);
       if($this->input->post()){
        $update_data=$this->input->post();
        $update_data['lang_active']=$this->input->post('lang_active')?1:0;
        if($this->template_model->db->update('tbllang',$update_data,array('lang_id'=>$lang_id))){
            $message=admin_success('Sửa thông tin ngôn ngữ thành công');
        }else{
            $message=admin_error('Có lỗi xảy ra,sửa thông tin thất bại');
        }

       }
       $lang_info=$this->template_model->select_query('tbllang',FALSE,array('lang_id'=>$lang_id),FALSE,FALSE,FALSE,FALSE,TRUE);
        $data['lang']=prep_form($lang_info['0']);
       $data['message']=$message;


       $this->load->view('back_end/system/edit_lang',$data);
    }

    /**
     * System::delete_lang()
     *
     * @param mixed $lang_id
     * @return void
     */
    public function delete_lang($lang_id){

    }

    /**
     * System::add_keyword()
     *
     * @return void
     */
    public function add_keyword(){
      $keyword_name=$this->input->post('keyword_name');
      if(!$this->template_model->check_unique('tblkeyword','keyword_name',$keyword_name)){
        echo 1;
      }else{
        if($this->template_model->insert_data('tblkeyword',$this->input->post())){
            echo 0;
        }
      }

    }

    public function table_keyword(){
        $data['keywords']=$this->template_model->select_query('tblkeyword');

        $this->load->view('back_end/system/table_keyword',$data);
    }
    /**
     * System::save_layout()
     *
     * @return
     */
    public function save_layout(){
        $insert_array=$this->input->post();
        $layout_name=$insert_array['layout_name'];
        if(!$this->template_model->check_unique('tbllayout','layout_name',$layout_name)){
            echo 1;
            return;
        }
        if(!file_exists('template/templates/'.$layout_name.'/views/layouts/default.php')){
            echo 2;return;
        }

        $this->template_model->db->insert('tbllayout',$insert_array);
        echo 0;
    }

    /**
     * System::delete_layout()
     *
     * @return
     */
    public function delete_layout(){
        $layout=$this->input->get('layout');
        if($this->template_model->get_by_key('tbltemplate','layout_name','template_default',1)==$layout){echo 1;return;}
        $this->template_model->db->delete(array('tbllayout','tbltemplate'),array('layout_name'=>$layout));
    }

    /**
     * System::shop()
     *
     * @return void
     */
    public function shop(){
        $data['title']='Quản trị cấu hình gian hàng';
        $message='';

        if($this->input->post()){
          if($this->input->post('token')==$_SESSION['token']){
              $config_name=$this->input->post('shopconfig_name');
               if(!$this->template_model->check_unique('tblshopconfig','shopconfig_name',$config_name)){
                $message=admin_error('Tên cấu hình này đã tồn tại');
               }else{
                if($this->template_model->insert_data('tblshopconfig',$this->input->post())){
                    $message=admin_success('Thêm mới cấu hình gian hàng thành công');
                }else{
                    $message=admin_error('Có lỗi xảy ra,thêm mới cấu hình gian hàng thất bại');
                }
               }
            }
        }
        $token = md5(uniqid(rand(), true));
        $_SESSION['token']=$token;

        $data['token']=$token;
        $data['message']=$message;
        $data['configs']=$this->template_model->select_query('tblshopconfig',FALSE,FALSE,FALSE,FALSE,FALSE,array('shopconfig_id'=>'DESC'));
        $this->load->view('back_end/system/index_shopconfig',$data);
    }

    /**
     * System::edit_layout()
     *
     * @return void
     */
    public function edit_layout(){
        $layout=$this->input->get('layout');
        $layout_info=$this->template_model->load_layout(array('layout_name'=>$layout),true);
        $data['layout']=$layout_info['0'];
       $this->load->view('back_end/system/edit_layout',$data);
    }

    /**
     * System::save_edit_layout()
     *
     * @return
     */
    public function save_edit_layout(){
        $update_array=$this->input->post();
        if($this->template_model->get_by_key('tbltemplate','layout_name','template_default',1)==$update_array['layout_name']){echo 1;return;}
        if(!file_exists('application/views/web_layout/'.$update_array['layout_name'].'/layout.php')){
            echo 2;return;
        }
        $this->template_model->db->update('tbllayout',$update_array,array('layout_name'=>$update_array['layout_name']));
        echo 0;

    }

    /**
     * System::plugin()
     *
     * @return void
     */
    public function plugin(){
     $data['title']='Quản trị block nội dung website';
     $data['plugin_types']=$this->plugin_model->load_plugin_type();
     $this->load->view('back_end/system/index_plugin',$data);
    }




    /**
     * System::module()
     *
     * @return void
     */
    public function module(){
        $data['title']='Quản trị module website';
        $data['modules']=$this->template_model->select_query('tblmodule');
        $this->load->view('back_end/system/index_module',$data);
    }
    /**
     * System::table_module()
     *
     * @return void
     */
    public function table_module(){
       $data['modules']=$this->template_model->select_query('tblmodule');
        $this->load->view('back_end/system/table_module',$data);
    }

    /**
     * System::save_add_module()
     *
     * @return
     */
    public function save_add_module(){
        $insert_array=$this->input->post();
        $module_name=$insert_array['module_name'];
        if(!$this->template_model->check_unique('tblmodule','module_name',$module_name)){echo '1';return;}
        $this->template_model->db->insert('tblmodule',$insert_array);
        echo 0;
    }

    /**
     * System::delete_module()
     *
     * @return void
     */
    public function delete_module(){
        foreach($this->input->post() as $key=>$value){
           $module_id=$value;
           if($this->template_model->select_query('tblmenu','menu_id',array('module_id'=>$module_id))->num_rows()==0){
            $this->template_model->db->delete('tblmodule',array('module_id'=>$module_id));
           }

        }
    }

    /**
     * System::edit_module()
     *
     * @return void
     */
    public function edit_module(){
        $module_id=$this->input->get('id');
        $module_info=$this->template_model->select_query('tblmodule',false,array('module_id'=>$module_id),false,false,false,false,true);
        $data['info']=$module_info['0'];
        $data['modules']=$this->template_model->select_query('tblmodule');
        $this->load->view('back_end/system/edit_module',$data);
    }

    /**
     * System::save_edit_module()
     *
     * @return void
     */
    public function save_edit_module(){
        $update_array=$this->input->post();
        $this->template_model->db->update('tblmodule',$update_array,array('module_id'=>$update_array['module_id']));
        echo '0';
    }

    /**
     * System::save_add_plugintype()
     *
     * @return void
     */
    function save_add_plugintype(){
        $insert_array=$this->input->post();
        
        $insert_array['pluginconfig_name']=implode('|',$this->input->post('pluginconfig_name'));
         $insert_array['field_type'] = implode('|',$this->input->post('field_type'));   
        $insert_array['pluginconfig_title']=implode('|',$this->input->post('pluginconfig_title'));
          $insert_array['field_value'] = implode('|',$this->input->post('field_value'));
       
       $this->template_model->db->insert('tblplugintype',$insert_array);
        echo json_encode(array('code'=>'success'));
    }

    /**
     * System::edit_plugintype()
     *
     * @return void
     */
    function edit_plugintype(){
        $plugintype_id=$this->input->get('id');
        $plugintype_info=$this->plugin_model->select_query('tblplugintype',false,array('plugintype_id'=>$plugintype_id),false,false,false,false,true);
        $data['plugin']=$plugintype_info['0'];
        $titles=explode('|',$plugintype_info['0']['pluginconfig_title']);
        $names=explode('|',$plugintype_info['0']['pluginconfig_name']);

        $config=array();
        if(count($titles)>0){
            for($i=0;$i<count($titles);$i++){
                $config[$titles[$i]]=$names[$i];
            }
        }

        $data['config_type']=$config;
        $this->load->view('back_end/system/edit_plugintype',$data);
    }

    /**
     * System::save_edit_plugintype()
     *
     * @return void
     */
    public function save_edit_plugintype(){
         $update_array=$this->input->post();
        $update_array['pluginconfig_name']=implode('|',$this->input->post('pluginconfig_name'));
        $update_array['pluginconfig_name']=substr(strstr($update_array['pluginconfig_name'],'|'),1);
        $update_array['pluginconfig_title']=implode('|',$this->input->post('pluginconfig_title'));
        $update_array['pluginconfig_title']=substr(strstr($update_array['pluginconfig_title'],'|'),1);
        $this->template_model->db->update('tblplugintype',$update_array,array('plugintype_id'=>$update_array['plugintype_id']));
        echo 0;
    }

    /**
     * System::delete_plugintype()
     *
     * @return void
     */
  public function delete_plugintype(){
        foreach($this->input->post() as $key=>$value){

                $this->plugin_model->db->delete(array('tblplugintype','tblplugin'),array('plugintype_id'=>$value));


        }
    }

    /**
     * System::cate_template()
     *
     * @return void
     */
    public function cate_template(){
        $data['title']='Quản trị template danh mục';
        $data['cate_templates']=$this->plugin_model->select_query('tblmenutemplate',false,array('tblmenutemplate.layout_name'=>$this->layout),array('tblmodule'=>'tblmenutemplate.module_name=tblmodule.module_name'));
        $data['modules']=$this->plugin_model->select_query('tblmodule',false,array('module_active'=>1,'module_menu'=>1,'parent_id > '=>0));
        $data['current_layout']=$this->layout;
        $this->load->view('back_end/system/index_cate_template',$data);
    }

    public function save_add_catetemplate(){
        $insert_array=$this->input->post();
        $template_name=$insert_array['template_name'];
        $current_layout=$this->template_model->get_by_key('tbltemplate','layout_name','template_default',1);
        if(!$this->template_model->check_unique('tblmenutemplate','template_name',$template_name)){
            echo 1;
            return;
        }
        if(!file_exists('application/views/web_layout/'.$current_layout.'/contents/'.$template_name.'.php')){
            echo 2;return;
        }
       // $insert_array['layout_name']=$this->layout;
        $this->template_model->db->insert('tblmenutemplate',$insert_array);
        echo 0;
    }

    /**
     * System::edit_catetemplate()
     *
     * @return void
     */
    public function edit_catetemplate(){
        $template_id=$this->input->get('id');
        $template_info=$this->template_model->select_query('tblmenutemplate',false,array('tblmenutemplate.template_id'=>$template_id),array('tblmodule'=>'tblmenutemplate.module_name=tblmodule.module_name'),false,false,false,true);
        $data['template']=$template_info['0'];
        $this->load->view('back_end/system/edit_catetemplate',$data);
    }

    public function save_edit_catetemplate(){
        $update_array=$this->input->post();
        $this->template_model->db->update('tblmenutemplate',$update_array,array('template_id'=>$update_array['template_id']));
        echo 0;
    }

    public function delete_catetemplate(){
        foreach($this->input->post() as $key=>$value){
            if($this->template_model->select_query('tblmenu','menu_id',array('template_id'=>$value))->num_rows()==0){
                $this->template_model->db->delete('tblmenutemplate',array('template_id'=>$value));
            }

        }
    }
    /**
     * System::config()
     *
     * @return void
     */
    public function config(){
        $data['title']='Quản lý cấu hình website';
        $data['configs']=$this->menu_model->select_query('tblconfig',false,array('tblconfig.domain_id'=>$this->domain_id));
        $data['config_modules']=$this->menu_model->db->select('config_module')->from('tblconfig')->distinct()->get();
        $this->load->view('back_end/system/index_config',$data);
    }

    /**
     * System::save_add_config()
     *
     * @return
     */
    public function save_add_config(){
        $insert_array=$this->input->post();
        if(!$this->menu_model->check_unique('tblconfig','config_name',$insert_array['config_name'])){echo 1;return;}

        if($this->input->post('add_new_module')=='1'){
            $insert_array['config_module']=$this->input->post('new_module');


        }

        unset($insert_array['add_new_module']);
        unset($insert_array['new_module']);

        $this->menu_model->db->insert('tblconfig',$insert_array);
        $id=$this->menu_model->get_top('tblconfig','config_id');
        $langs=$this->menu_model->select_query('tbllang','lang_shortname',false,false,false,false,false,true);
        foreach($langs as $lang){
            $this->menu_model->db->insert('tblconfigvalue',array('config_id'=>$id,'lang_shortname'=>$lang['lang_shortname']));
        }
        echo 0;

    }

    /**
     * System::delete_config()
     *
     * @return void
     */
    public function delete_config(){
        foreach($this->input->post() as $key=>$value){
            $this->menu_model->db->delete(array('tblconfig','tblconfigvalue'),array('config_id'=>$value));
        }
    }

    public function edit_config(){
        $config_id=$this->input->get('id');
        $config_info=$this->menu_model->select_query('tblconfig',false,array('config_id'=>$config_id),false,false,false,false,true);
        $data['config']=$config_info['0'];
        $data['config_modules']=$this->menu_model->db->select('config_module')->from('tblconfig')->distinct()->get();
        $this->load->view('back_end/system/edit_config',$data);
    }

    public function save_edit_config(){
        $update_array=$this->input->post();
        if($this->input->post('add_new_module')=='1'){
            $update_array['config_module']=$this->input->post('new_module');


        }

        unset($update_array['add_new_module']);
        unset($update_array['new_module']);
        $this->menu_model->db->update('tblconfig',$update_array,array('config_id'=>$update_array['config_id']));
        echo 0;

    }

    public function menu(){
        $message='';
        switch($this->input->post('action')){
            case 'add_menu':
                $result=$this->save_menu($this->input->post());
                    switch($result){
                        case TRUE:
                        $message=admin_success('Thêm mới danh mục quản trị thành công');
                        break;
                        default:
                        $message=admin_error('Có lỗi xảy ra,thêm mới danh mục thất bại');
                        break;
                    }
            break;
            default:break;
        }
      $data['message']=$message;
      $data['title']='Quản trị hệ thống-quản lý danh mục quản trị';
      $data['menus']=$this->menu_model->select_query('tblmenuadmin',FALSE,array('parent_id'=>0),FALSE,FALSE,FALSE,array('menu_queu'=>'ASC'));
      $data['menu_select']=$this->menu_model->select_query('tblmenuadmin',FALSE,array('menu_level < '=>3),FALSE,FALSE,FALSE,array('menu_queu'=>'ASC'));

      $this->load->view('back_end/system/index_menu',$data);

    }
    /**
     * System::save_menu()
     *
     * @param mixed $array_insert
     * @return
     */
    private function save_menu($array_insert){
        $menu_level=1;
        $menu_queu=1;
        if($array_insert['parent_id']!=0){
            $menu_level=$this->menu_model->get_by_key('tblmenuadmin','menu_level','menu_id',$array_insert['parent_id'])+1;
            $menu_queu=$this->menu_model->get_top('tblmenuadmin','menu_queu',array('parent_id'=>$array_insert['parent_id']))+1;
        }

        $array_insert['menu_queu']=$menu_queu;
        $array_insert['menu_level']=$menu_level;
        unset($array_insert['action']);
        $this->menu_model->db->insert('tblmenuadmin',$array_insert);
        return  TRUE;

    }

    /**
     * System::edit_menu()
     *
     * @param mixed $id
     * @return void
     */
    public function edit_menu($id){
        $message='';
        if($this->input->post('action')){

            $update_array=$this->input->post();
            unset($update_array['action']);
            $update_array['menu_visible']=($this->input->post('menu_visible'))?1:0;
            if($this->menu_model->db->update('tblmenuadmin',$update_array,array('menu_id'=>$id))){
                $message=admin_success('Sửa thông tin danh mục quản trị thành công');
            }else{
                $message=admin_error('Có lỗi xảy ra,sửa thông tin danh muc thất bại');
            }
        }
        $data['message']=$message;
        $info=$this->menu_model->select_query('tblmenuadmin',FALSE,array('menu_id'=>$id),FALSE,FALSE,FALSE,FALSE,TRUE);
        $data['menu']=$info['0'];
        $data['menus']=$this->menu_model->select_query('tblmenuadmin',FALSE,array('menu_level < '=>3),FALSE,FALSE,FALSE,array('menu_queu'=>'ASC'));
        $this->load->view('back_end/system/edit_menu',$data);
    }

    /**
     * System::up_menu()
     *
     * @param mixed $id
     * @return void
     */
    /**
     * System::up_menu()
     *
     * @param mixed $id
     * @return void
     */
    public function up_menu($id){
        $current_queu=$this->menu_model->get_by_key('tblmenuadmin','menu_queu','menu_id',$id);
        $parent_id=$this->menu_model->get_by_key('tblmenuadmin','parent_id','menu_id',$id);

        $next_menu=$this->menu_model->select_query('tblmenuadmin',array('menu_id','menu_queu'),array('menu_queu < '=>$current_queu,'parent_id'=>$parent_id),FALSE,0,1,array('menu_queu'=>'DESC'),true);

        if(count($next_menu)==1){
           $this->menu_model->db->update('tblmenuadmin',array('menu_queu'=>$next_menu['0']['menu_queu']),array('menu_id'=>$id));
            $this->menu_model->db->update('tblmenuadmin',array('menu_queu'=>$current_queu),array('menu_id'=>$next_menu['0']['menu_id']));

        }
       redirect($_SERVER['HTTP_REFERER']);

    }

    /**
     * System::down_menu()
     *
     * @param mixed $id
     * @return void
     */
    public function down_menu($id){
        $current_queu=$this->menu_model->get_by_key('tblmenuadmin','menu_queu','menu_id',$id);
        $parent_id=$this->menu_model->get_by_key('tblmenuadmin','parent_id','menu_id',$id);

        $next_menu=$this->menu_model->select_query('tblmenuadmin',array('menu_id','menu_queu'),array('menu_queu > '=>$current_queu,'parent_id'=>$parent_id),FALSE,0,1,array('menu_queu'=>'ASC'),true);

        if(count($next_menu)==1){
           $this->menu_model->db->update('tblmenuadmin',array('menu_queu'=>$next_menu['0']['menu_queu']),array('menu_id'=>$id));
            $this->menu_model->db->update('tblmenuadmin',array('menu_queu'=>$current_queu),array('menu_id'=>$next_menu['0']['menu_id']));

        }
       redirect($_SERVER['HTTP_REFERER']);

    }

    /**
     * System::delete_admincate()
     *
     * @return void
     */
    public function delete_admincate(){
        foreach($this->input->post() as $key=>$value){
            $this->menu_model->db->delete('tblmenuadmin',array('menu_id'=>$value));
            if($value!=0){
                $this->menu_model->db->delete('tblmenuadmin',array('parent_id'=>$value));
            }
        }
    }

    /**
     * System::domain()
     * @update 04/09/2011
     * @return void
     */
    public function domain(){
        $message='';
        if($this->input->post()){
            $domain=$this->input->post('domain_name');
            if(!$this->menu_model->check_unique('tbldomain','domain_name',$domain)){
                $message=admin_error('Tên miền này đã tồn tại');
            }else{
                $insert_array=$this->input->post();
                $insert_array['domain_active']=($this->input->post('domain_active'))?1:0;
                $insert_array['date_create']=time();
                $this->menu_model->db->insert('tbldomain',$insert_array);
                $message=admin_success('Thêm mới domain thành công');
            };
        }
        $data['title']='Quản trị domain khách hàng';
        $data['domains']=$this->menu_model->select_query('tbldomain');
        $data['message']=$message;
        $this->load->view('back_end/system/index_domain',$data);


    }

    /**
     * System::edit_domain()
     *
     * @param mixed $id
     * @return void
     */
    public function edit_domain($id){
        $message='';
        if($this->input->post()){
            $update_array=$this->input->post();
            $update_array['domain_active']=$this->input->post('domain_active')?1:0;
            if($this->menu_model->select_query('tbldomain','domain_id',array('domain_name'=>$update_array['domain_name'],'domain_id NOT LIKE '=>$update_array['domain_id']))->num_rows()>0){
                $message=admin_error('Tên domain này đã có trong danh sách domain');

            }
            else{
        if($this->menu_model->db->update('tbldomain',$update_array,array('domain_id'=>$update_array['domain_id']))){
            $message=admin_success('Cập nhập thông tin domain thành công');
        }
        else{
          $message=admin_error('Có lỗi xảy ra,cập nhập thông tin domain thất bại');
        }
        }
        }
        $data['message']=$message;
        $domain_info=$this->menu_model->select_query('tbldomain',FALSE,array('domain_id'=>$id),FALSE,FALSE,FALSE,FALSE,TRUE);
        $data['domain']=$domain_info['0'];
        $this->load->view('back_end/system/edit_domain',$data);

    }

    public function delete_domain(){
        foreach($this->input->post() as $key=>$value){
            $this->menu_model->db->delete('tbldomain',array('domain_id'=>$value));
        }
    }


    public function privilege()
    {
        $data['title'] = 'Quản trị phân quyền module website';
        $path = APPPATH . 'config/webcfg.xml';
        $xmlarray = xmlstr_to_array($path);
        var_dump($xmlarray);
    }



}
?>