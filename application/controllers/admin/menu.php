<?php

/**
 * Menu
 *
 * @package CI
 * @author syhung_it
 * @copyright 2011
 * @version 1.0
 * @access public
 */
class Menu extends Admin_Controller
{

    public function Menu(){
          parent::__construct();
        $this->load->helper('url');
        $this->load->helper('libs');
        $this->menu_model = new Menu_model();
        $this->load->model('product_model');
        $this->load->model('article_model');
        $this->load->model('url_model');
        $this->load->model('plugin_model');
    }



    /**
     * Menu::index()
     *
     * @return void
     */
    public function index(){
        $data['title']='Quản trị danh mục';
        $message='';
        if($this->input->post()){
            $message=$this->add_menu($this->input->post());
        }
        $data['groups']=$this->menu_model->select_query('tblgroup',false,array('tblgroup.group_level > '=>3));
        
        $data['message']=$message;
        $view='back_end/menu/table_menu1';
        $data['menu_table']=$this->menu_model->menu_recursive(0,$view,array('tblmenu.menu_id','menu_string','template_id','layout_name','module_description','menu_string','tblmodule.module_name','tblmenu.menu_title','tblmenu.menu_queu','tblmenu.parent_id','tblmenu.menu_level','tblmenu.menu_visible','tblmenu.module_id','tblmenu.menu_url'),array('tbllang.lang_shortname'=>$this->my_lang,'tblmenu.domain_id'=>$this->domain_id));
        //$data['menu_table']=$this->menu_model->table_menu_recursion(0,array('tblmenu.menu_id','module_description','tblmodule.module_name','tblmenu.menu_title','tblmenu.menu_queu','tblmenu.parent_id','tblmenu.menu_level','tblmenu.menu_visible'),array('tblmodule.module_active'=>1,'tbllang.lang_shortname'=>$_SESSION['lang_admin']));
      $data['menu'] = $this->menu_model->menu_recursion(0, array('menu_id','template_id','layout_name','menu_string','menu_title', 'menu_level', 'tblmenu.parent_id'), array('tblmodule.module_active ' =>1,'tbllang.lang_shortname'=>$_SESSION['lang_admin'],'tblmenu.domain_id'=>$this->domain_id));
      $data['total']=$this->menu_model->load_menu('tblmenu.menu_id',array('tbllang.lang_shortname'=>$this->my_lang,'tblmenu.domain_id'=>$this->domain_id,'tblmodule.module_active ' =>1))->num_rows();
     $data['modules']=$this->menu_model->select_query('tblmodule',false,array('module_active'=>1,'module_menu'=>1));
     $this->load->view('back_end/menu/index_menu',$data);
    }


    /**
     * Menu::add_menu()
     *
     * @param mixed $post_data
     * @return
     */
    public function add_menu($post_data){
        $insert_array=$post_data;
        $insert_array['domain_id'] = $this->domain_id;
        if(isset($post_data['menu_privilege'])){$insert_array['menu_privilege']=implode('|',$post_data['menu_privilege']);}
        $parent_id=$insert_array['parent_id'];
        $menu_level=1;
          if($parent_id!=0){
            $parent_level=$this->menu_model->get_by_key('tblmenu','menu_level','menu_id',$parent_id);
            $menu_level=$parent_level+1;
        }

        $menu_queu=1;
        $menu_queu =$this->menu_model->get_top('tblmenu','menu_queu',array('parent_id'=>$parent_id))+1;
        $insert_array['menu_level']=$menu_level;
        if($this->input->post('menu_filter')){
        $insert_array['menu_filter'] = implode('|', $this->input->post('menu_filter'));
        }else{$insert_array['menu_filter']='';}
        $insert_array['menu_queu']=$menu_queu;
        $insert_array['menu_visible']=isset($post_data['menu_visible'])?1:0;
        $insert_array['menu_home']=isset($post_data['menu_home'])?1:0;
        $insert_array['lang_id']=$this->menu_model->get_by_key('tbllang','lang_id','lang_shortname',$_SESSION['lang_admin']);
        if($this->menu_model->select_query('tblmenu',false, array('menu_string'=>$insert_array['menu_string'],'domain_id'=>$this->domain_id))->num_rows() >0){
            return admin_error('Tên danh mục này đã tồn tại');
        }
       if($this->menu_model->db->insert('tblmenu',$insert_array)){
        $this->url_model->emit_sitemap($_SESSION['lang_admin']);
        return admin_success("Thêm mới danh mục thành công");
        }
       else{
        return admin_error("Có lỗi xảy ra,thêm mới danh mục thất bại");
       }
    }

    public function load_menu_table(){
        $view='back_end/menu/table_menu1';
        $data['menu_table']=$this->menu_model->menu_recursive(0,$view,array('tblmenu.menu_id','module_description','tblmodule.module_name','tblmenu.menu_title','tblmenu.menu_queu','tblmenu.parent_id','tblmenu.menu_level','tblmenu.menu_visible'),array('tblmodule.module_active'=>1,'tbllang.lang_shortname'=>$this->my_lang));
         $this->load->view('back_end/menu/table_menu',$data);

    }

    public function delete_menu($id=false){

        foreach($this->input->post() as $key=>$value){

                 $menu_childs=$this->menu_model->load_menu('tblmenu.menu_id',array('tblmenu.parent_id'=>$value));
                 $product=$this->product_model->load_product('tblproduct.product_id',$value);
                 $articles=$this->article_model->load_article(array('tblarticle.article_id'),array('tblarticle.menu_id'=>$value));
                if($menu_childs->num_rows()==0 AND $product->num_rows()==0 AND $articles->num_rows() ==0){
                $this->menu_model->db->delete('tblmenu',array('menu_id'=>$value));


            }


        }

    }

    /**
     * Menu::up_cate()
     *
     * @return void
     */
    public function up_cate(){
        $menu_id=$this->input->get('id');
        $this->menu_model->up_menu($menu_id);
    }

    /**
     * Menu::down_cate()
     *
     * @return void
     */
    public function down_cate(){
        $menu_id=$this->input->get('id');
        $this->menu_model->down_menu($menu_id);
    }


      /**
     * Product::edit_cate()
     *
     * @return void
     */
    public function edit_cate($id){
        if(!$id){redirect($_SERVER['HTTP_REFERER']);}
        $cols_info = array('tblmenu.parent_id',
        'menu_id', 'menu_title', 'template_id', 'module_description', 'menu_metatitle', 'menu_image', 'menu_keyword',
        'menu_description', 'menu_details','menu_h1', 'menu_visible', 'menu_home',
        'menu_tags','menu_privilege','layout_name','module_name','menu_url','tblmenu.module_id'
        );

        $menu_info=$this->menu_model->load_menu($cols_info,array('tblmenu.menu_id'=>$id),null,null,null,true);
        if(count($menu_info)==0){redirect(base_url().'admin/menu.html');}
        $message='';
        if($this->input->post()){
            $update_array=$this->input->post();
            $update_array['menu_visible']=$this->input->post('menu_visible')?1:0;
            $update_array['menu_home']=$this->input->post('menu_home')?1:0;
            $update_array['menu_privilege']=$this->input->post('menu_privilege')?implode('|',$this->input->post('menu_privilege')):'';
          if($this->menu_model->select_query('tblmenu',false, array('menu_string'=>$update_array['menu_string'],'domain_id'=>$this->domain_id, 'menu_id NOT LIKE ' => $id))->num_rows() >0){
            $message =  admin_error('Tên danh mục này đã tồn tại');
        } else {
            if($this->menu_model->db->update('tblmenu',$update_array,array('menu_id'=>$id))){
                $this->url_model->emit_sitemap($_SESSION['lang_admin']);
                flash_data(admin_success("Sửa danh mục thành công"));
                header('location:admin/menu.html');
            }else{
                $message=admin_error('Có lỗi xảy ra,sửa thông tin danh mục thất bại');
            }
            }
        }
         $menu_info=$this->menu_model->load_menu($cols_info,array('tblmenu.menu_id'=>$id),null,null,null,true);
        $data['groups']=$this->menu_model->select_query('tblgroup',false,array('tblgroup.group_level > '=>3));
        $data['message']=$message;
        $parent_id = $menu_info['0']['parent_id'];
        $data['title']='Trang quản trị danh mục-Sửa thông tin danh mục';
          $data['parent'] =($this->menu_model->get_by_key('tblmenu','parent_id','menu_id',$id)==0)?'Danh mục gốc':$this->menu_model->get_by_key('tblmenu','menu_title','menu_id',$parent_id);
          $data['modules']=$this->menu_model->select_query('tblmodule',false,array('module_active'=>1,'parent_id >'=>0,'module_menu'=>1));
          
          
          
           $menu_info=$this->menu_model->load_menu(false,array('tblmenu.menu_id'=>$id),null,null,null,true);
          $data['menu_info']=prep_form($menu_info['0']);
          $this->load->view('back_end/menu/edit_menu',$data);
    }





    /**
     * Menu::load_template()
     *
     * @return
     */
    function load_template(){
        $id=$this->input->get('id');
        if(!$id){return;}
        $templates=$this->menu_model->load_layout_cate_template($id);
        $return='<div class="field">
				    <div class="label">
								<label for="autocomplete">Kiểu hiển thị</label>
							</div>
							<div class="input">
                            <select name="template_id" id="template_id" style="width:300px;">
                            <option value="0">Chọn kiểu hiển thị</option>
                            ';
                            foreach($templates as $temp):
                            $return.='<option value="'.$temp['file'].'">'.$temp['title'].'</option>';
							endforeach;
							$return.='</select></div>
						</div>';
                        echo $return;
    }
    
    public function to_ansi()
    {
        $str = $this->input->get('str');
        echo trim(to_ansi_character($str));
    }

      public function swap_position()
    {
        $id1 = $this->input->post("id");
        $queu = $this->input->post('queu');
        $parent = $this->input->post('parent');
        $queu_1 = $this->menu_model->get_by_key('tblmenu','menu_queu','menu_id',$id1);
        $id2 = $this->menu_model->get_by_key('tblmenu','menu_id',null,null,array('parent_id'=>$parent,'menu_queu'=>$queu));
        $this->menu_model->update_data('tblmenu',array('menu_queu'=>$queu),array('menu_id'=>$id1));
        if($id2){
            $this->menu_model->update_data('tblmenu',array('menu_queu'=>$queu_1),array('menu_id'=>$id2));
            echo json_encode(array('code'=>'success','swapped_id'=>$id2,'queu'=>$queu_1));
            return;    
        }
        echo json_encode(array('code'=>'success'));
        return;
    }

}

?>