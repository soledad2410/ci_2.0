<?php
class Product extends Admin_Controller
{

    /**
     * Product::Product()
     *
     * @return void
     */
    public function Product()
    {
        parent::__construct();
        $this->load->model(array('menu_model','product_model','config_model','url_model','location_model'));        
        $this->config->load('idjland');
    }


    /**
     * Product::index()
     *
     * @return void
     */
    public function index()
    {
        
        $url = 'admin/product/index.html?';
        $cond = '';
        if ($this->input->get('cate')) {
            $cond .= "cate=" . $this->input->get('cate') . "&";
        }
        if ($this->input->get('min')) {
            $cond .= "min=" . str_replace('.', '', $this->input->get('min')) . "&";
        }
        if ($this->input->get('max')) {
            $cond .= "max=" . str_replace('.', '', $this->input->get('max')) . "&";
        }
        if ($this->input->get('keyword')) {
            $cond .= "keyword=" . $this->input->get('keyword') . "&";
        }
        if ($this->input->get('limit')) {
            $cond .= "limit=" . $this->input->get('limit') . "&";
        }
        $data['all_product'] = $this->product_model->load_product_recursive(false, 0, false, false, false, false,
            array('tbllang.lang_shortname' => $this->my_lang,'tblmenu.domain_id'=>$this->domain_id))->num_rows();
        $total_product_query = $this->product_model->load_product_recursive(false, $this->
            input->get('cate'), $this->input->get('keyword'), str_replace('.', '', $this->
            input->get('min')), str_replace('.', '', $this->input->get('max')), false, array
            ('tbllang.lang_shortname' => $this->my_lang,'tblmenu.domain_id'=>$this->domain_id), false, false, false,
            array('tblmenu.menu_queu' => 'ASC', 'tblproduct.product_queu' => 'DESC'));
        $data['config_product'] = $this->config_model->load_config('tblconfig.config_id',
            array('config_active' => 1, 'tblconfig.config_module' => 'product','tblconfig.domain_id'=>$this->domain_id));

        $data['total'] = $total_product_query->num_rows();
        $data['title'] = "Trang quản trị sản phẩm";
        $data['menu'] = $this->menu_model->menu_recursion(0, array('menu_id',
            'menu_title', 'menu_level', 'tblmenu.parent_id'), array('tblmodule.parent_id = ' =>
            '3','tblmenu.domain_id'=>$this->domain_id));
        $current_page = ($this->input->get('page')) ? $this->input->get('page') : 1;
        $limit = ($this->input->get('limit')) ? $this->input->get('limit') : 10;
        $data['products'] = $this->product_model->load_product_recursive(false, $this->
            input->get('cate'), $this->input->get('keyword'), str_replace('.', '', $this->
            input->get('min')), str_replace('.', '', $this->input->get('max')), false, array
            ('tbllang.lang_shortname' => $this->my_lang,'tblmenu.domain_id'=>$this->domain_id), $limit, ($current_page -
            1) * $limit, false, array('tblproduct.product_queu' => 'DESC'));

        $data['result_from'] = $limit * ($current_page - 1) + 1;
        $data['result_to'] = $limit * $current_page;
        $data['page'] = page_count($total_product_query->num_rows(), $limit);
        $data['url'] = $url . $cond;
        $data['current_page'] = $current_page;
        $this->load->view('back_end/product/index_product', $data);
    }

    /**
     * Product::add_product()
     *
     * @return void
     */
    public function add_product()
    {

        $data['title'] = "Trang quản trị sản phẩm - Thêm mới sản phẩm";
        $data['copy'] = false;
        $data['field_config'] = '';
        $cate = false;
        // Copy product
        $data['groups']=$this->product_model->select_query('tblgroup',false,array('tblgroup.group_level > '=>3));
        $message='';
        // Add product
        if($this->input->post()){
            $insert_data = $this->input->post();
            $product_code = $this->input->post('product_code');
            if (!$this->product_model->check_unique('tblproduct','product_code',$product_code))
            {
                $message = admin_error('Mã sản phẩm đã tồn tại');
            }
            $insert_data['domain_id'] = $this->domain_id;
            $insert_data['product_date'] = (trim($this->input->post('product_date'))=='')?time():mktime_date_vi($this->input->post('product_date'),'-');
            $insert_data['product_queu'] = $this->product_model->get_top('tblproduct','product_queu')+1;
            $insert_data['product_price'] = str_replace('.', '', $insert_data['product_price']);
            $insert_data['product_saleoff'] = isset($insert_data['product_saleoff']) ? str_replace('.', '', $insert_data['product_saleoff']) : 0;
            $insert_data['product_nhasx'] = ($this->input->post('input_new') == 1) ? $this->input->post('new_nhasx') : $this->input->post('product_nhasx');
            $insert_data['product_warranty'] = $this->input->post('other_product_warranty') ? $this->input->post('other_product_warranty') : $this->input->post('product_warranty');
            $insert_data['lang'] = $this->my_lang;
     
        // Insert new product
            if($message==''){
           // Fix insert new producttype directly
                
                if($this->input->post('other_producttype') && trim($this->input->post('other_producttype')) !='')
                {
                    $insert_data['producttype_id']  = $this->product_model->insert_data('tblproducttype',array('producttype_name' => $this->input->post('other_producttype')),true);
                }
                $product_id = $this->product_model->insert_data('tblproduct', $insert_data, true);
                if ($product_id) {
                // Insert product attribute
                    $type_id = $this->input->post('producttype_id');
                    $attrs = $this->product_model->select_query('tblproductypeproperties','property_id', array('producttype_id' => $type_id));
                    $attr_cols_name = array('property_id', 'product_id', 'property_value');
                    $attr_val = array();
                    $product_attr = $this->input->post('product_attr');
                    if(is_array($product_attr)){
                        foreach ($product_attr as $attr)
                        {
                            array_push($attr_val, array($attr, $product_id, ''));
                        }
                    }
                    if (count($attr_val)>0){
                    $this->product_model->multiple_insert('tblproductproperties', $attr_cols_name, $attr_val);
                    }
                // Insert setcolors and image
                    if ($this->input->post('setcolors')){
                    $colors = $this->input->post('setcolors');
                    $images = $this->input->post('setimage');
                    $set_images = array_combine($colors, $images);
                    $set_images_data = array();
                        for ($i=0; $i < count($colors); $i++ )
                        {
                            array_push($set_images_data, array($colors[$i], $product_id, $images[$i]));
                        }

                      $this->product_model->multiple_insert('tblproductcolors', array('color_hexa', 'product_id', 'product_images'), $set_images_data);
                      }
                    $url=$this->url_model->emit_product_url($product_id);
                    $this->url_model->emit_sitemap($_SESSION['lang_admin']);
                    $message=admin_success('Thêm mới sản phẩm thành công');
                }else{
                    $message=admin_error('Có lỗi xảy ra,thêm mới sản phẩm thất bại');
                }
            }
        }
        // End add product
         // Product list
        $data['all_product'] = $this->product_model->load_product_recursive(false, 0, false, false, false, false,
            array('tbllang.lang_shortname' => $_SESSION['lang_admin']))->num_rows();
        $total_product_query = $this->product_model->load_product_recursive(false, $this->
            input->get('cate'), $this->input->get('keyword'), str_replace('.', '', $this->
            input->get('min')), str_replace('.', '', $this->input->get('max')), false, array
            ('tbllang.lang_shortname' => $_SESSION['lang_admin']), false, false, false,
            array('tblmenu.menu_queu' => 'ASC', 'tblproduct.product_queu' => 'DESC'));
        $data['total'] = $total_product_query->num_rows();

        $current_page = ($this->input->get('page')) ? $this->input->get('page') : 1;
        $limit = ($this->input->get('limit')) ? $this->input->get('limit') : 10;
        $data['products'] = $this->product_model->load_product_recursive(false, $this->
            input->get('cate'), $this->input->get('keyword'), str_replace('.', '', $this->
            input->get('min')), str_replace('.', '', $this->input->get('max')), false, array
            ('tbllang.lang_shortname' => $_SESSION['lang_admin']), $limit, ($current_page -
            1) * $limit, false, array('tblproduct.product_queu' => 'DESC'));

        $data['page'] = page_count($total_product_query->num_rows(), $limit);
        $data['current_page'] = $current_page;
        //End product list
        
        //
        $data['cities'] = $this->menu_model->select_query('tblregion', array('region_id','region_name'), array('region_type'=>'city'));
        $data['direction'] = $this->config->item('direction');
        $data['current_lang'] = $this->my_lang;
        $data['message']=$message;
        $data['types'] = $this->product_model->select_query('tblproducttype');
        $data['nhasxs'] = $this->product_model->load_nhasx(true);
        $cate_array = $this->menu_model->load_menu(array('menu_id','tblmenu.parent_id','tblmodule.module_name','menu_title','menu_string'),array('tbllang.lang_shortname'=>$this->my_lang,'tblmenu.domain_id'=>$this->domain_id),null,null,null,true);
        $data['trees'] = $this->menu_model->build_cate_tree($cate_array);
        
        $data['menu'] = $this->menu_model->menu_recursion(0, array('menu_id',
            'menu_title', 'menu_level','menu_string' ,'tblmenu.parent_id'), array('tblmodule.module_name ' =>
            'product_cate', 'tbllang.lang_shortname' => $this->my_lang,'tblmenu.domain_id'=>$this->domain_id));
        $this->load->view('back_end/product/add_product', $data);
    }


/**
     * Product_model::edit_product()
     *
     * @return void
     */
    public function edit_product($id)
    {
        $product_id = $id;
        $product_info = $this->product_model->load_product(false, false, false, false, false,array('tblproduct.product_id' => $product_id), false, false, true);
        if (count($product_info) != 1){redirect(base_url() . 'admin/product/index.html');}
        $data['groups']=$this->product_model->select_query('tblgroup',false,array('tblgroup.group_level > '=>3));
        $albums = $this->product_model->select_query('tblproductcolors', 'color_id' , array('product_id' => $id));
        $attachs = $this->product_model->select_query('tblproductattachment', 'prodattachment_id', array('product_id' => $product_id));
        $attrs = $this->product_model->select_query('tblproductypeproperties', 'property_id', array('producttype_id' => $product_info['0']['producttype_id']));
        $message='';

            $data['title'] = 'Trang quản trị sản phẩm-Sửa thông tin sản phẩm';
            // Edit product
            if($this->input->post()){
        $update_data = $this->input->post();
        $update_data['product_date'] = mktime_date_vi($update_data['product_date'],'-');
        $update_data['product_price'] = str_replace('.', '', $update_data['product_price']);
        $update_data['product_saleoff'] = isset($update_data['product_saleoff']) ? str_replace('.', '', $update_data['product_saleoff']) :0;
        $update_data['product_nhasx'] = ($this->input->post('input_new') == 1) ? $this->input->post('new_nhasx') : $this->input->post('product_nhasx');
        $update_data['product_visible']=isset($update_data['product_visible'])?1:0;
        $update_data['product_home']=isset($update_data['product_home'])?$update_data['product_home']:0;
        $update_data['product_bestsell']=isset($update_data['product_bestsell'])?1:0;

        if ($this->product_model->update_data('tblproduct', $update_data, array('product_id' => $id)))
             {
                // Update product set colors
                foreach($albums->result_array() as $value)
                {
                    $colors = array('color_hexa' => $this->input->post('setcolors_' . $value['color_id']),
                                     'product_images' => $this->input->post('setimage_'. $value['color_id'])
                                    );
                    $this->product_model->update_data('tblproductcolors', $colors, array('color_id' => $value['color_id']));
                }

                // Update Or insert product attachment


            // Update product attribute
            $this->product_model->db->delete('tblproductproperties', array('product_id'=>$id));
            $product_id = $id;
                $attr_cols_name = array('property_id', 'product_id', 'property_value');
                    $attr_val = array();
                    $product_attr = $this->input->post('product_attr');
                 if(is_array($product_attr)){
                        foreach ($product_attr as $attr)
                        {

                            array_push($attr_val, array($attr, $product_id, ''));

                        }
                 }
                    if (count($attr_val)>0){
                    $this->product_model->multiple_insert('tblproductproperties', $attr_cols_name, $attr_val);
                    }
            $url=$this->url_model->emit_product_url($product_id);
            $this->url_model->emit_sitemap($_SESSION['lang_admin']);
            $message=admin_success('Cập nhập thông tin sản phẩm thành công');
        }else{
            $message=admin_error('Có lỗi xảy ra,cập nhập thông tin sản phẩm thất bại');
        }
      }

            // End edit product
            $product_info = $this->product_model->load_product(false, false, false, false, false,array('tblproduct.product_id' => $product_id), false, false, true);
            $data['message']=$message;
            $data['product'] = prep_form($product_info['0']);
            $data['attachments'] = explode('|', $product_info['0']['product_attachment']);
            $albums = $this->product_model->select_query('tblproductcolors', false, array('product_id' => $id));
            $data['album'] = $albums;
            $data['attachments'] = $this->product_model->select_query('tblproductattachment', false, array('product_id' => $product_id));
            $data['nhasxs'] = $this->product_model->load_nhasx(true);
            $data['types'] = $this->product_model->select_query('tblproducttype');
            $data['menu'] = $this->menu_model->menu_recursion(0, array('menu_id',
                'menu_title', 'menu_level', 'tblmenu.parent_id','menu_string'), array('tblmodule.module_name ' =>
                'product_cate', 'tbllang.lang_shortname' => $this->my_lang,'tblmenu.domain_id'=>$this->domain_id), null, $product_info['0']['menu_id']);
            $data['attrs'] = $this->load_product_attribute($product_info['0']['producttype_id'], $id, true);

            // List product
       
                $data['cities'] = $this->menu_model->select_query('tblregion', array('region_id','region_name'), array('region_type'=>'city'));
                $city_id = $this->menu_model->get_by_key('tblregion','parent_id','region_id',$product_info['0']['location_id']);
                if($city_id != 0)
                {
                    $data['districts'] = $this->location_model->load_by_parent($city_id);
                }
                $data['city'] = $city_id;
        $cate_array = $this->menu_model->load_menu(array('menu_id','tblmenu.parent_id','tblmodule.module_name','menu_title','menu_string'),array('tbllang.lang_shortname'=>$this->my_lang,'tblmenu.domain_id'=>$this->domain_id),null,null,null,true);
        $data['trees'] = $this->menu_model->build_cate_tree($cate_array);                
        $data['direction'] = $this->config->item('direction');
        $data['current_lang'] = $this->my_lang;
        $current_page = ($this->input->get('page')) ? $this->input->get('page') : 1;
     
        $data['current_page'] = $current_page;


            $this->load->view('back_end/product/edit_product', $data);



    }



    /**
     * Product::load_product_attribute()
     *
     * @return void
     */
    function load_product_attribute($type_id,$product_id = false, $return = false)
    {
        $attrs = $this->product_model->select_query('tblproductypeproperties',false, array('producttype_id'=>$type_id,'property_level'=>1));
        $content = '';
        foreach($attrs->result_array()  as $attr){
        $content .= '<div class="field">
							<div class="label">
								<label for="select">Chọn thuộc tính sản phẩm</label>
							</div>
							<div class="input">
								<input type="text" disabled="disabled" value="'.$attr['property_name'].'"/>
							</div>
                            
							<div class="label" style="margin-left: 500px;">
								<label for="select">giá trị</label>
							</div>';
       $attrs = $this->product_model->select_query('tblproductypeproperties',false, array('producttype_id'=>$type_id,'property_parent_id'=>$attr['property_id']));
        $content.='<div class="select">
								<select  name="product_attr[]"  >';
                                
                                foreach($attrs->result_array() as $attr){
                                   
                                    
                                    if ($product_id)
                                    {
                                        $attr_id = $this->product_model->get_by_key('tblproductproperties','property_id',null,null,array('property_id'=>$attr['property_id'],'product_id'=>$product_id));
                                        $content .= '<option value="'.$attr['property_id'].'" ';
                                        if($attr_id == $attr['property_id']){$content .= 'selected="selected"';}
                                        $content.='>'.$attr['property_name'].'</option>';
                                    }
                                    else{
                                    $content .= '<option value="'.$attr['property_id'].'">'.$attr['property_name'].'</option>';    
                                    }
                                    
                                }
								
								$content.='</select>
							</div>
						</div>';
                        }
                        if ($return){
                            return $content;
                        }
                        else{
       echo $content;
       }
    }
    /**
     * Product::up_product()
     *
     * @return void
     */
    public function up_product()
    {
        $product_id = $this->input->get('id');
        $menu_id=$this->product_model->get_by_key('tblproduct','menu_id','product_id',$product_id);
        $current_queu=$this->product_model->get_by_key('tblproduct','product_queu','product_id',$product_id);
        $new_queu=1;
        $next_product=$this->product_model->load_product(array('tblproduct.product_id','tblproduct.product_queu'),$menu_id,false,false,false,array('tblproduct.product_queu > '=>$current_queu),1,0,TRUE,array('tblproduct.product_queu '=>'ASC'));
        if(count($next_product)==1){

        $new_queu=$next_product['0']['product_queu'];
        $this->product_model->db->update('tblproduct',array('product_queu'=>$new_queu),array('product_id'=>$product_id));
        $this->product_model->db->update('tblproduct',array('product_queu'=>$current_queu),array('product_id'=>$next_product['0']['product_id']));
        echo $next_product['0']['product_id'];
        }else{
            echo '0';
        }
    }

    /**
     * Product::down_product()
     *
     * @return void
     */
    public function down_product()
    {
        $product_id = $this->input->get('id');
        $menu_id=$this->product_model->get_by_key('tblproduct','menu_id','product_id',$product_id);
        $current_queu=$this->product_model->get_by_key('tblproduct','product_queu','product_id',$product_id);
        $new_queu=1;
        $next_product=$this->product_model->load_product(array('tblproduct.product_id','tblproduct.product_queu'),$menu_id,false,false,false,array('tblproduct.product_queu < '=>$current_queu),1,0,TRUE,array('tblproduct.product_queu '=>'DESC'));
        if(count($next_product)==1){

        $new_queu=$next_product['0']['product_queu'];
        $this->product_model->db->update('tblproduct',array('product_queu'=>$new_queu),array('product_id'=>$product_id));
        $this->product_model->db->update('tblproduct',array('product_queu'=>$current_queu),array('product_id'=>$next_product['0']['product_id']));
        echo $next_product['0']['product_id'];
        }else{echo 0;}
    }


    /**
     * Product::list_product_ajax()
     *
     * @return void
     */
    public function table_product()
    {
        $current_page = ($this->input->get('page')) ? $this->input->get('page') : 1;
        $limit = ($this->input->get('limit')) ? $this->input->get('limit') : 10;
        $data['products'] = $this->product_model->load_product_recursive(false, $this->
            input->get('cate'), $this->input->get('keyword'), str_replace('.', '', $this->
            input->get('min')), str_replace('.', '', $this->input->get('max')), false, array
            ('tbllang.lang_shortname' => $this->my_lang), $limit, ($current_page -
            1) * $limit, false, array('tblmenu.menu_queu' => 'ASC',
            'tblproduct.product_queu' => 'DESC'));
        $this->load->view('back_end/product/table_product', $data);

    }

    public function table_product3()
    {
            $cate = ($this->input->get('cate_id') == 0) ? false : $this->input->get('cate_id');
                 $limit = 10;
                 $current_page = $this->input->get('page') ? $this->input->get('page') : 1;
        $total_product_query = $this->product_model->load_product_recursive(false, $cate
        , false, false, false, false, array
            ('tbllang.lang_shortname' => $_SESSION['lang_admin']), false, false, false,
            array('tblmenu.menu_queu' => 'ASC', 'tblproduct.product_queu' => 'DESC'));

        $data['products'] = $this->product_model->load_product_recursive(false, $cate, false, false, false, false, array
            ('tbllang.lang_shortname' => $_SESSION['lang_admin']), $limit, ($current_page -
            1) * $limit, false, array('tblproduct.product_queu' => 'DESC'));
            $data['attachment'] = explode('|', $this->input->get('products'));
        $this->load->view('back_end/product/table_product3', $data);

    }
    public function page_product()
    {
        $limit = 10;
        $cate = ($this->input->get('cate_id') == 0) ? false : $this->input->get('cate_id');
        $total_product = $this->product_model->load_product_recursive(false, $cate
        , false, false, false, false, array
            ('tbllang.lang_shortname' => $_SESSION['lang_admin']), false, false, false,
            array('tblmenu.menu_queu' => 'ASC', 'tblproduct.product_queu' => 'DESC'))->num_rows();
        $page = page_count($total_product, $limit);
        $content = '';
        $current_page = $this->input->get('page')?$this->input->get('page'):1;
            if($page>1){
                            for($i=1;$i<=$page;$i++){
                                if($current_page==$i){
                                    $content .= '<li class="current" >'.$i.'</li>';
                                }else{
                                    $content .= '<li ><a href="javascript:void(0)" onclick="showProductPage(\'' . $i . '\')">'.$i.'</a></li>';
                                }
                            }
                          }

        echo $content;
    }
 public function table_product2($block_id){

    $url = 'admin/product/table_product2/'.$block_id.'.html?';
        $cond = '';
        if ($this->input->get('cate')) {
            $cond .= "cate=" . $this->input->get('cate') . "&";
        }
        if ($this->input->get('min')) {
            $cond .= "min=" . str_replace('.', '', $this->input->get('min')) . "&";
        }
        if ($this->input->get('max')) {
            $cond .= "max=" . str_replace('.', '', $this->input->get('max')) . "&";
        }
        if ($this->input->get('keyword')) {
            $cond .= "keyword=" . $this->input->get('keyword') . "&";
        }
        if ($this->input->get('limit')) {
            $cond .= "limit=" . $this->input->get('limit') . "&";
        }
        $data['all_product'] = $this->product_model->load_product_recursive(false, 0, false, false, false, false,
            array('tbllang.lang_shortname' => $this->my_lang))->num_rows();
        $total_product_query = $this->product_model->load_product_recursive(false, $this->
            input->get('cate'), $this->input->get('keyword'), str_replace('.', '', $this->
            input->get('min')), str_replace('.', '', $this->input->get('max')), false, array
            ('tbllang.lang_shortname' => $this->my_lang), false, false, false,
            array('tblmenu.menu_queu' => 'ASC', 'tblproduct.product_queu' => 'DESC'));
        $data['total'] = $total_product_query->num_rows();
        $data['plugin_id']=$block_id;
        $data['menu'] = $this->menu_model->menu_recursion(0, array('menu_id',
            'menu_title', 'menu_level', 'tblmenu.parent_id'), array('tblmodule.parent_id = ' =>
            '3'));
        $current_page = ($this->input->get('page')) ? $this->input->get('page') : 1;
        $limit = ($this->input->get('limit')) ? $this->input->get('limit') : 10;
        $data['products'] = $this->product_model->load_product_recursive(false, $this->
            input->get('cate'), $this->input->get('keyword'), str_replace('.', '', $this->
            input->get('min')), str_replace('.', '', $this->input->get('max')), false, array
            ('tbllang.lang_shortname' => $this->my_lang), $limit, ($current_page -
            1) * $limit, false, array('tblproduct.product_queu' => 'DESC'));
            $data['block_id_array']=explode('|',trim($this->product_model->get_by_key('tblplugin','block_product','plugin_id',$block_id)));
        $data['product_in_block']=$this->product_model->select_query('tblproduct',array('product_id','product_name'),FALSE,FALSE,FALSE,FALSE,FALSE,FALSE,array('product_id'=>$data['block_id_array']));
        $data['block_content']=$this->product_model->get_by_key('tblplugin','block_product','plugin_id',$block_id);
        $data['result_from'] = $limit * ($current_page - 1) + 1;
        $data['result_to'] = $limit * $current_page;
        $data['page'] = page_count($total_product_query->num_rows(), $limit);
        $data['url'] = $url . $cond;
        $data['current_page'] = $current_page;
        $this->load->view('back_end/product/table_product2', $data);

 }


    /**
     * Product::price()
     *
     * @return void
     */
    public function price()
    {
        $data['title'] = "Trang quản trị sản phẩm - Cập nhập giá";
        $url = 'admin/product/price.html?';
        $cond = '';
        if ($this->input->get('cate')) {
            $cond .= "cate=" . $this->input->get('cate') . "&";
        }
        if ($this->input->get('min')) {
            $cond .= "min=" . str_replace('.', '', $this->input->get('min')) . "&";
        }
        if ($this->input->get('max')) {
            $cond .= "max=" . str_replace('.', '', $this->input->get('max')) . "&";
        }
        if ($this->input->get('keyword')) {
            $cond .= "keyword=" . $this->input->get('keyword') . "&";
        }
        if ($this->input->get('limit')) {
            $cond .= "limit=" . $this->input->get('limit') . "&";
        }
        $total_product_query = $this->product_model->load_product(false, $this->input->
            get('cate'), $this->input->get('keyword'), $this->input->get('min'), $this->
            input->get('max'), array('tbllang.lang_shortname' => $this->my_lang), false, false, false,
            array('tblmenu.menu_queu' => 'ASC', 'tblproduct.product_queu' => 'ASC'));
        $data['product_page'] = $this->menu_model->get_config('product_per_page', $this->my_lang);
        $data['currency'] = $this->menu_model->get_config('currency', $this->my_lang);
        $data['usd_rate'] = $this->menu_model->get_config('usd_rate', $this->my_lang);
        $data['show_style'] = $this->menu_model->get_config('show_product_style', $this->my_lang);
        $data['other_product'] = $this->menu_model->get_config('other_product', $this->my_lang);
        $data['total'] = $total_product_query->num_rows();

        $data['menu'] = $this->menu_model->menu_recursion(0, array('menu_id',
            'menu_title', 'menu_level', 'tblmenu.parent_id'), array('tblmodule.module_name = ' =>
            'product_cate'));
        $current_page = ($this->input->get('page')) ? $this->input->get('page') : 1;
        $limit = ($this->input->get('limit')) ? $this->input->get('limit') : 10;
        $data['products'] = $this->product_model->load_product_recursive(false, $this->
            input->get('cate'), $this->input->get('keyword'), str_replace('.', '', $this->
            input->get('min')), str_replace('.', '', $this->input->get('max')), false, array
            ('tbllang.lang_shortname' => $this->my_lang), $limit, ($current_page -
            1) * $limit, false, array('tblmenu.menu_queu' => 'ASC',
            'tblproduct.product_queu' => 'ASC'));
        $data['result_from'] = $limit * ($current_page - 1) + 1;
        $data['result_to'] = $limit * $current_page;
        $data['page'] = page_count($total_product_query->num_rows(), $limit);
        $data['url'] = $url . $cond;
        $data['current_page'] = $current_page;
        $this->load->view('back_end/product/quick_update_product', $data);
    }

    /**
     * Product::update_price_ajax()
     *
     * @return void
     */
    function update_price_ajax()
    {

        foreach ($this->input->post() as $key => $value) {
            list($type, $product_id) = explode('_', $key);
            $value = str_replace('.', '', $value);
            if ($value > 0) {
                $this->product_model->db->update('tblproduct', array('product_' . $type => $value),
                    array('tblproduct.product_id' => $product_id));
            }
        }
        echo 0;

    }

    /**
     * Product::save_edit_product()
     *
     * @return void
     */
    public function save_edit_product()
    {
        $insert_data = $this->input->post();
        list($date, $month, $year) = explode('-', $this->input->post('product_date'));
        $time = mktime(date('H'), date('m'), date('s'), $month, $date, $year);
        $insert_data['product_date'] = $time;
        $product_id = $insert_data['product_id'];
        $insert_data['product_price'] = str_replace('.', '', $insert_data['product_price']);
        $insert_data['product_saleoff'] = str_replace('.', '', $insert_data['product_saleoff']);
        $insert_data['product_nhasx'] = ($this->input->post('input_new') == 1) ? $this->
            input->post('new_nhasx') : $this->input->post('product_nhasx');
        $menu_config = '';

        $product_type = $insert_data['producttype_id'];
        $product_attr = $this->product_model->select_query('tblproductypeproperties',
            'property_id', array('producttype_id' => $product_type));
        $insert_attr = array();
        foreach ($product_attr->result_array() as $attr) {
            unset($insert_data['property_id_' . $attr['property_id']]);
        }

        unset($insert_data['new_nhasx']);
        unset($insert_data['input_new']);
        unset($insert_data['product_id']);
        if ($this->product_model->db->update('tblproduct', $insert_data, array('product_id' =>
            $product_id))) {
            foreach ($product_attr->result_array() as $attr) {
                if ($this->product_model->select_query('tblproductproperties', 'product_id',
                    array('product_id' => $product_id, 'property_id' => $attr['property_id']))->
                    num_rows() == 0) {
                    $this->product_model->db->insert('tblproductproperties', array('property_id' =>
                        $attr['property_id'], 'property_value' => $this->input->post('property_id_' . $attr['property_id']),
                        'product_id' => $product_id));

                } else {
                    $this->product_model->db->update('tblproductproperties', array('property_value' =>
                        $this->input->post('property_id_' . $attr['property_id'])), array('product_id' =>
                        $product_id, 'property_id' => $attr['property_id']));
                }
            }

            echo 0;
        }
    }

    /**
     * Product::delete_product()
     *
     * @param mixed $id
     * @return void
     */
    public function delete_product($id)
    {
        if ($id) {
            $this->product_model->db->delete(array('tblproduct', 'tblproductproperties'),
                array('product_id' => $id));
            header('location:' . $_SERVER['HTTP_REFERER']);
        } else {
            foreach ($this->input->get() as $key => $value) {

                $this->product_model->db->delete(array('tblproduct', 'tblproductproperties'),
                    array('product_id' => $value));

            }
            echo 0;
        }
    }

    /**
     * Product::delete_product_properties()
     *
     * @return void
     */
    public function delete_product_properties()
    {
        $config_id = $this->input->get('id');
        $this->product_model->db->delete(array('tblmenuconfig', 'tblproductconfig'),
            array('config_id' => $config_id));
        echo 0;

    }

    /**
     * Product::properties()
     *
     * @return void
     */
    public function properties()
    {
        $data['title'] = "Trang quản trị sản phẩm - Thuộc tính sản phẩm";
        $data['producttype'] = $this->product_model->select_query('tblproducttype');

        $message = '';
        if ($this->input->post('token') && $this->input->post('token') == $_SESSION['token'])
        {
            $producttype_name = $this->input->post('producttype_name');
            $producttype_description = $this->input->post('producttype_description');
            $prod_id = $this->product_model->insert_data('tblproducttype', array('producttype_name' => $producttype_name, 'producttype_description' => $producttype_description), true);
            $attr_data = $this->input->post();
            unset($attr_data['producttype_name']);
            unset($attr_data['producttype_description']);
            unset($attr_data['token']);
            $result = array();

            foreach($attr_data as $key => $value)
            {
                $pattern = explode('_', $key);
                if(!isset($pattern['1']))
                {
                    $result[$key] = array();
                }

            }
            foreach($attr_data as $key => $value)
            {
                $pattern = explode('_', $key);
                if(!isset($pattern['2']) && isset($pattern['1']))
                {

                    $result[$pattern['0']][$key] = array();
                }
            }
            foreach($attr_data as $key => $value)
            {
                $pattern = explode('_', $key);
                if(isset($pattern['2']))
                {
                    $result[$pattern['0']][$pattern['0'] . '_' . $pattern['1']][] = $key;
                    //array_push($result[$pattern['0']][$pattern['1']], $pattern['2']);
                }
            }
        foreach($result as $key => $value)
        {
            $lv1 = $this->product_model->insert_data('tblproductypeproperties', array('property_name' => $attr_data[$key], 'producttype_id' => $prod_id, 'property_parent_id' => 0, 'property_level' => 1), true);
            foreach ($value as $key2 => $value2)
            {
                $lv2 = $this->product_model->insert_data('tblproductypeproperties', array('property_name' => $attr_data[$key2], 'producttype_id' => $prod_id, 'property_parent_id' => $lv1, 'property_level' => 2), true);
                foreach ($value2 as $key3 => $value3)
                {
                  $this->product_model->insert_data('tblproductypeproperties', array('property_name' => $attr_data[$value3], 'producttype_id' => $prod_id, 'property_parent_id' => $lv2, 'property_level' => 3), true);
                }
            }
        }
        $message = admin_success('Thêm mới loại sản phẩm thành công');

        }
        $token = md5(uniqid(rand(), true));
        $_SESSION['token']=$token;
        $data['token']=$token;
        $data['message'] = $message;
        $this->load->view('back_end/product/product_properties', $data);
    }

    /**
     * Product::save_add_properties()
     *
     * @return void
     */
    public function save_add_properties()
    {
        $insert_data = $this->input->post();
        if ($this->input->post('property_group')) {
            unset($insert_data['property_group']);
            unset($insert_data['property_name']);
        }
        $this->db->insert('tblproducttype', $insert_data);
        $type_id = $this->product_model->get_top('tblproducttype', 'producttype_id');

        if ($this->input->post('property_group')) {

            $property_groups = implode('|', $this->input->post('property_group'));
            $property_names = implode('|', $this->input->post('property_name'));
            $property_group_array = explode('|', $property_groups);
            $property_name_array = explode('|', $property_names);

            for ($i = 0; $i < count($property_name_array); $i++) {
                if (!isset($property_group_array[$i])) {
                    $property_group_array[$i] = '';
                }
                if ($property_name_array[$i] != 'undefined') {

                    $this->product_model->db->insert('tblproductypeproperties', array('property_name' =>
                        $property_name_array[$i], 'property_group' => $property_group_array[$i],
                        'producttype_id' => $type_id));
                }

            }


        }
        echo 0;
    }
    /**
     * Product::edit_productype()
     *
     * @return void
     */
    function edit_productype($id)
    {
        $type_id = $id;

        $type = $this->product_model->select_query('tblproducttype', false, array('producttype_id' =>
            $type_id), false, false, false, false, true);
        $data['title'] = 'Sửa thông tin loại sản phẩm';
        if ($this->input->post())
        {
            // Update product brand data
            $update_array = array();
            $update_array['producttype_name'] = $this->input->post('producttype_name');
            $update_array['producttype_description'] = $this->input->post('producttype_description');
            $this->product_model->db->update('tblproducttype', $update_array, array('producttype_id' =>$type_id));
            // Update product type attr data
            $attrs = $this->product_model->select_query('tblproductypeproperties', array('property_id', 'property_level'), array('producttype_id' => $id));
            foreach ($attrs->result_array() as $attr)
            {
                if ($this->input->post('attr_'.$attr['property_id'])) {
                    //echo $this->input->post('attr_'.$attr['property_id']);
                    $this->product_model->db->update('tblproductypeproperties', array('property_name' => $this->input->post('attr_'.$attr['property_id'])), array('property_id' => $attr['property_id']));
                }
                if (is_array($this->input->post('parent_' . $attr['property_id'])))
                {
                    //$this->input->post('parrent_' . $attr['property_id']);
                   $vals = $this->input->post('parent_' . $attr['property_id']);
                        foreach ($vals as $key=>$vaue)
                        {
                            $this->product_model->insert_data('tblproductypeproperties', array('property_name' => $vaue, 'property_parent_id' => $attr['property_id'], 'producttype_id' => $id, 'property_level' => $attr['property_level']+1));
                        }
                }
            }

            if (is_array($this->input->post('parent_0')))
                {
                    //$this->input->post('parrent_' . $attr['property_id']);
                   $vals = $this->input->post('parent_0');
                        foreach ($vals as $key=>$vaue)
                        {
                            $this->product_model->insert_data('tblproductypeproperties', array('property_name' => $vaue, 'property_parent_id' => 0, 'property_level' => 1, 'producttype_id' => $id));
                        }
                }


       }

        $data['type'] = $type['0'];
        $data['properties'] = $this->product_model->select_query('tblproductypeproperties', false,
            array('producttype_id' => $type_id), false, false, false, false, true);
        $this->load->view('back_end/product/edit_type', $data);

    }

    /**
     * Product::save_edit_producttype()
     *
     * @return void
     */
    function save_edit_producttype()
    {
        $type_id = $this->input->post('producttype_id');
        $update_array = array();
        $update_array['producttype_name'] = $this->input->post('producttype_name');
        $update_array['producttype_description'] = $this->input->post('producttype_description');
        $this->product_model->db->update('tblproducttype', $update_array, array('producttype_id' =>
            $type_id));
        // Update old product attribute
        $properties = $this->product_model->select_query('tblproductypeproperties',
            'property_id', array('producttype_id' => $type_id), false, false, false, false, true);
        foreach ($properties as $property) {
            if ($this->input->post('property_name_' . $property['property_id'])) {
                $this->product_model->db->update('tblproductypeproperties', array('property_name' =>
                    $this->input->post('property_name_' . $property['property_id']),
                    'property_group' => $this->input->post('property_group_' . $property['property_id'])),
                    array('property_id' => $property['property_id']));
            }
        }
        // Insert new attribute
        if ($this->input->post('property_group')) {

            $property_groups = implode('|', $this->input->post('property_group'));
            $property_names = implode('|', $this->input->post('property_name'));
            $property_group_array = explode('|', $property_groups);
            $property_name_array = explode('|', $property_names);

            for ($i = 0; $i < count($property_name_array); $i++) {
                if (!isset($property_group_array[$i])) {
                    $property_group_array[$i] = '';
                }
                if ($property_name_array[$i] != 'undefined') {

                    $this->product_model->db->insert('tblproductypeproperties', array('property_name' =>
                        $property_name_array[$i], 'property_group' => $property_group_array[$i],
                        'producttype_id' => $type_id));
                }

            }


        }
        echo 0;
    }

    /**
     * Product::delete_product_attribute()
     *
     * @return void
     */
    function delete_product_attribute()
    {
        $id = $this->input->get('id');
        $this->product_model->delete_product_attr_recursive($id);
       echo 0;
    }

    /**
     * Product::delete_product_type()
     *
     * @return void
     */
    function delete_product_type()
    {
        $id = $this->input->get('id');
        $products = $this->product_model->select_query('tblproduct', 'product_id', array
            ('producttype_id' => $id));
        foreach ($products->result_array() as $product) {
            $this->product_model->delete('tblproductproperties', array('product_id' => $product['product_id']));
        }
        $this->product_model->db->delete(array('tblproduct', 'tblproducttype',
            'tblproductypeproperties'), array('producttype_id' => $id));
        echo 0;
    }

    function comment(){
        $url = 'admin/product/comment.html?';
        $cond = '';
        $where = array('tbllang.lang_shortname' => $this->my_lang);
        if ($this->input->get('product_id'))
        {
            $cond .= "product_id=" . $this->input->get('product_id') . "&";
            $where = array_merge($where, array('tblproduct.product_id' => $this->input->get('product_id')));
        }
        if ($this->input->get('from'))
        {
            $cond .= "from=" . $this->input->get('from') . "&";
            list($day, $month, $year) = explode('-', $this->input->get('from'));
            $from_time = mktime(0, 0, 0, $month, $day, $year);
            $where = array_merge($where, array('tblproductcomment.comment_date > ' => $from_time));
        }
        if ($this->input->get('to'))
        {
            $cond .= "to=" . $this->input->get('to') . "&";
            list($day, $month, $year) = explode('-', $this->input->get('to'));
            $to_time = mktime(23, 59, 59, $month, $day, $year);
            $where = array_merge($where, array('tblproductcomment.comment_date < ' => $to_time));
        }
        if ($this->input->get('keyword'))
        {
            $cond .= "keyword=" . $this->input->get('keyword') . "&";
            $where = array_merge($where, array('tblproductcomment.comment_title LIKE ' => '%' . urldecode($this->input->get('keyword')) . '%'));

        }
        if ($this->input->get('limit'))
        {
            $cond .= "limit=" . $this->input->get('limit') . "&";
        }
        $join_array = array('tblproduct' => 'tblproduct.product_id=tblproductcomment.product_id', 'tblmenu' => 'tblmenu.menu_id=tblproduct.menu_id', 'tbllang' => 'tblmenu.lang_id=tbllang.lang_id');
        $data['title'] = "Quản lý bài viết-Bình luận bài viết";
        $total = $this->product_model->select_query('tblproductcomment', 'comment_id', false, $join_array)->num_rows();

        $page = ($this->input->get('page')) ? $this->input->get('page') : 1;
        $limit = ($this->input->get('limit')) ? $this->input->get('limit') : 10;
        $select_array = array('tblproduct.product_name', 'tblproduct.product_id', 'tblproductcomment.comment_id', 'tblproductcomment.comment_title', 'tblproductcomment.comment_date',
            'tblproductcomment.cus_name', 'tblproductcomment.comment_read', 'tblproductcomment.comment_visible', 'tblproductcomment.ip_address');


        $total_page = page_count($total, $limit);
        $data['comments'] = $this->product_model->select_query('tblproductcomment', $select_array, $where, $join_array, ($page - 1) * $limit, $limit, array('tblproductcomment.comment_date' => 'DESC'));
        $data['page'] = $total_page;
        $data['result_from'] = ($page - 1) * $limit;
        $data['result_to'] = $page * $limit;
        $data['total_all'] = $total;
        $data['current_page'] = $page;
        $data['url'] = $url . $cond;

        $this->load->view('back_end/product/comment', $data);
        //
    }

    function view_comment($id)
    {
        $data['title'] = 'Xem bình luận sản phẩm';
        $this->product_model->update_data('tblproductcomment', array('comment_read' => 1), array('comment_id' => $id));
        $join_array = array('tblproduct' => 'tblproduct.product_id=tblproductcomment.product_id', 'tblmenu' => 'tblmenu.menu_id=tblproduct.menu_id', 'tbllang' => 'tblmenu.lang_id=tbllang.lang_id');
         $comments = $this->product_model->select_query('tblproductcomment', false, array('tblproductcomment.comment_id' => $id), $join_array, false, false, false, true);
        $data['comment'] = $comments['0'];
        $this->load->view('back_end/product/view_comment', $data);
    }
    
      public function swap_position()
    {
        $id1 = $this->input->post("id");
        $queu = $this->input->post('queu');
        $queu_1 = $this->product_model->get_by_key('tblproduct','product_queu','product_id',$id1);
        $id2 = $this->product_model->get_by_key('tblproduct','product_id','product_queu',$queu);
        $this->product_model->update_data('tblproduct',array('product_queu'=>$queu),array('product_id'=>$id1));
        if($id2){
            $this->product_model->update_data('tblproduct',array('product_queu'=>$queu_1),array('product_id'=>$id2));
            echo json_encode(array('code'=>'success','swapped_id'=>$id2,'queu'=>$queu_1));
            return;    
        }
        echo json_encode(array('code'=>'success'));
        return;
    }


}


?>