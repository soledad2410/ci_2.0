<?php

/**
 * Admin
 *
 * @package CI
 * @author syhung_it
 * @copyright 2011
 * @version 1.0
 * @access public
 */
class Admin extends Admin_Controller
{


    public function Admin()
    {
        parent::__construct();
        $this->load->model(array('admin_model','counter_model','url_model','article_model','product_model','menu_model'));
        
    }

    public function info()
    {

    }
    
    public function change_domain(){
        if(!!($domain_id = $this->input->post('domain_id')))
        {
            if($this->admin_model->get_row_array('tbldomain',array('domain_id'=>$domain_id,'domain_active'=>1)))
            {
                $_SESSION['current_domain'] = $domain_id;
                echo json_encode(array('code'=>'success'));
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user']))
        {
            //var_dump($this->user);
            //var_dump($_SESSION['user']);
            unset($_SESSION['user']);
            //$this->url_model->emit_sitemap($this->my_lang);
            $this->url_model->emit_sitemap($this->my_lang);
            redirect(base_url().'admin/login.html');

        }


    }

    public function index()
    {
        if ($this->input->get('lang_admin') != '')
        {
            $_SESSION['lang_admin'] = $this->input->get('lang_admin');
        }
        $data['title'] = "Bảng điều khiển trang quản trị";
        $data['visit'] = $this->counter_model->get_visit();
        $data['total_news'] = $this->article_model->load_article()->num_rows();
        $data['total_product'] = $this->product_model->load_product(false,false,false,false,false,array('tblmenu.domain_id'=>$this->domain_id))->num_rows();
        $data['total_cate'] = $this->menu_model->load_menu()->num_rows();
        $data['total_contact'] = $this->menu_model->select_query('tblcontact')->num_rows();
        $data['total_user'] = $this->menu_model->select_query('tbluser',array(),array('group_id >' => 1))->num_rows();
        $data['latest_news'] = $this->article_model->load_article(array('article_id','article_title','article_datetime'),array('tblmenu.domain_id'=>$this->domain_id),array('article_datetime'=>'desc'),false,false,false,5,0);
        $data['latest_product'] = $this->product_model->load_product(array('product_image','product_id','product_name','product_date'),false,false,false,false,array('tblmenu.domain_id'=>$this->domain_id),5,0);
        $data['latest_contact'] = $this->product_model->select_query('tblcontact',false,array('contact_read' => 0),false,0,5,array('contact_datetime'=>'desc'));
        //   echo $_SESSION['lang_admin'];
        $this->load->view('back_end/login/dashboard', $data);


    }
    public function add_user()
    {

        $full_name = $this->input->post('fullname');
        $user_name = $this->input->post('user_name');
        $password = $this->input->post('password');
        $group = $this->input->post('group');
        $block = $this->input->post('block');
        $email = $this->input->post('email');

        if (!$this->admin_model->check_unique('tbluser', 'user_name', $user_name))
        {
            echo 1;
            return;
        }
        if (!$this->admin_model->check_unique('tbluser', 'user_email', $email))
        {
            echo 2;
            return;
        }

        $time = mktime(date('H'), date('m'), date('s'), date('m'), date('d'), date('Y'));
        if ($this->admin_model->db->insert('tbluser', array('user_name' => $user_name, 'user_pwd' => md5($password), 'user_fullname' => $full_name, 'user_email' => $email, 'group_name' => $group, 'user_block' =>
            $block, 'date_created' => $time)))
        {
            echo 0;
        } else
        {
            echo 3;
        }


    }



    public function update_user($user_name)
    {

        $user_info = $this->admin_model->load_admin(false, array('tbluser.user_name ' => $user_name), true);
        $data['groups'] = $this->admin_model->load_group();
        $data['user'] = $user_info['0'];
        $data['title'] = 'Trang quản lý thành viên quản trị -Sửa thông tin thành viên quản trị ';
        $this->load->view('back_end/admin/update_admin', $data);

    }

    public function update_ajax()
    {
        $full_name = $this->input->post('fullname');
        $user_name = $this->input->post('user_name');
        $password = $this->input->post('password');
        $group = $this->input->post('group');
        $block = $this->input->post('block');
        $email = $this->input->post('email');
        if ($this->admin_model->get_by_key('tbluser', 'user_name', 'user_email', $email) != false && $this->admin_model->get_by_key('tbluser', 'user_name', 'user_email', $email) != $user_name)
        {
            echo 1;
            return;
        }

        $update_array = array('user_pwd' => md5($password), 'user_fullname' => $full_name, 'user_email' => $email, 'group_name' => $group, 'user_block' => $block);
        if ($password == 0)
        {
            $update_array = array('user_fullname' => $full_name, 'user_email' => $email, 'group_name' => $group, 'user_block' => $block);
        }
        if ($this->admin_model->db->update('tbluser', $update_array, array('user_name' => $user_name)))
        {
            echo 0;
            return;
        } else
        {
            echo 2;
        }

    }
    public function load_user_table()
    {
        $data['users'] = $this->admin_model->load_admin();

        echo $this->load->view('back_end/admin/user_table', $data, true);
    }

    /**
     * Admin::group()
     *
     * @return void
     */
    public function group(){
        $data['title'] = 'Quản trị nhóm thành viên website';
        $data['groups'] = $this->admin_model->load_group(false, array('group_level' => 3));
        $path = APPPATH . 'config/webcfg.xml';
        $message = '';
        if($this->input->post('token') && $this->input->post('token') == $_SESSION['token']
        )
        {
            $group_name = $this->input->post('group_name');
            $insert_data = $this->input->post();
            $insert_data['group_level'] = 3;
            if (!$this->admin_model->check_unique('tblgroup','group_name',$group_name)){
                $message = admin_error('Tên nhóm thành viên này đã tồn tại');
            } else {
                unset($insert_data['group_privilege']);
                $check = $this->admin_model->insert_data('tblgroup', $insert_data, true);
                if ($check) {
                    if ($this->input->post('group_privilege')) {
                        $privilege_insert = $this->input->post('group_privilege');
                        array_walk($privilege_insert, create_function('&$value','$value = array(' . $check . ', $value, 1);'));
                        $col_insert = array('group_id', 'privilege_name', 'privilege_permissio');
                        if ($this->admin_model->multiple_insert('tblgroupprivilege', $col_insert, $privilege_insert)){
                            $message = admin_success('Thêm mới nhóm quản trị thành viên thành công');
                        } else {
                            $message = admin_success('Có lỗi xảy ra, thêm mới nhóm thành viên thất bại');
                        }
                    }
                }
            }

        }
        $xmlarray = xmlstr_to_array($path);
        $data['roles'] = $xmlarray['module'];
        $data['message'] = $message;
        $token = md5(uniqid(rand(), true));
        $_SESSION['token']=$token;
        $data['token']=$token;
        $this->load->view('back_end/admin/group',$data);
    }

    function edit_group($group_id)
    {
        $message = '';
        $group_info = $this->admin_model->load_group(true, array('group_id'=>$group_id));
        if (count($group_info) != 1) {redirect(base_url() . 'admin/group.html');}
        $data['title'] = 'Sửa thông tin nhóm quản trị';
        $path = APPPATH . 'config/webcfg.xml';
        $xmlarray = xmlstr_to_array($path);
        $roles = $xmlarray['module'];
        $privilege_info = $this->admin_model->select_query('tblgroupprivilege', 'privilege_name', array('group_id' => $group_id, 'privilege_permission' => 1), false, false, false, false, true);
        $privilege_array = array();
       // var_dump($privilege_info);
        foreach($privilege_info as $key => $value)
        {
            array_push($privilege_array,$value['privilege_name']);
        }
        $data['privilege_array'] = $privilege_array;
       // var_dump($privilege_array);

        if ($this->input->post('token') && $this->input->post('token') == $_SESSION['token']
        )
        {
            $update_data = array();
            $update_data['group_block'] = $this->input->post('group_block') ? 0 : 1;
            $update_data['group_description'] = $this->input->post('group_description');
            $update_data['group_name'] = $this->input->post('group_name');
            if ($this->admin_model->select_query('tblgroup' ,'group_id', array('group_id' =>$group_id, 'group_name NOT LIKE ' => $group_info['0']['group_name']))->num_rows() >0)
            {
               $message = admin_error('Tên nhóm này đã có');
            } else{
                if ($this->admin_model->db->update('tblgroup', $update_data, array('group_id' => $group_id)))
                {   $role_array = array();

                    foreach ($roles as $key => $value)
                    {   $module = $value['name'];
                        foreach($value['roles']['role'] as $role){
                            array_push($role_array, $module . '|' . $role['name']);
                        }
                    }
                    foreach ($role_array as $role)
                    {

                        if ($this->input->post('group_privilege_' . $role)){
                            if ($this->admin_model->select_query('tblgroupprivilege','privilege_id', array('group_id' => $group_id,'privilege_name' => $role)) -> num_rows() ==0)
                             {
                                $this->admin_model->insert_data('tblgroupprivilege', array('group_id' => $group_id, 'privilege_name' => $role, 'privilege_permission' => 1));
                            }
                        } else {
                            $this->admin_model->db->delete('tblgroupprivilege',array('group_id' => $group_id,'privilege_name' => $role));

                        }
                    }
                    $message = admin_success('Cập nhập thông tin nhóm quản trị thành công');
                  }
            }

        }

        $privilege_info = $this->admin_model->select_query('tblgroupprivilege', 'privilege_name', array('group_id' => $group_id, 'privilege_permission' => 1), false, false, false, false, true);
        $privilege_array = array();
       // var_dump($privilege_info);
        foreach($privilege_info as $key => $value)
        {
            array_push($privilege_array,$value['privilege_name']);
        }
        $data['privilege_array'] = $privilege_array;
        $group_info = $this->admin_model->load_group(true, array('group_id'=>$group_id));
        $data['group'] = prep_form($group_info['0']);

        $data['roles'] = $xmlarray['module'];
        $data['message'] = $message;
        $token = md5(uniqid(rand(), true));
        $_SESSION['token']=$token;
        $data['token']=$token;
        $this->load->view('back_end/admin/edit_group',$data);
    }
    /**
     * Admin::delete_group()
     *
     * @param mixed $id
     * @return void
     */
    public function delete_group($id)
    {
        $this->admin_model->db->delete(array('tblgroup', 'tblgroupprivilege', 'tbluser'), array('group_id' => $id));
        header('location:' . $_SERVER['HTTP_REFERER']);
    }

    /**
     * Admin::active_group()
     *
     * @param mixed $id
     * @param mixed $stt
     * @return void
     */
    public function active_group($id, $stt)
    {

        $update = ($stt == 0) ? 1 : 0;
        $this->admin_model->db->update('tblgroup', array('group_block' => $update), array('group_id' => $id));
        header('location:' . $_SERVER['HTTP_REFERER']);
    }
    public function change_skin()
    {
        $skin = $this->input->post('skin');
        $_SESSION['skin']=$skin;

    }

    public function errorpermission()
    {
        if(!isset($_SERVER['HTTP_REFERER'])){
            redirect(base_url() . 'admin/admin/logout');
        }
        $data['title'] = 'Access denied';
        $data['message'] = admin_warning('Bạn không được phép thực hiện tác vụ này, vui lòng liên hệ quản trị để biết thêm chi tiết');
        $this->load->view('back_end/admin/deniedpermission',$data);
    }
    
    public function clean_cache()
    {
        $cache_dir = 'application/cache';
        $files = glob($cache_dir .'/*'); // get all file names
        foreach($files as $file){ // iterate files
        if(is_file($file))
            unlink($file); // delete file
        }
        echo json_encode(array('code'=>'ok','msg'=>'Xóa cache thành công'));
    }
    
}

?>