<?php
/**
 * User
 *
 * @package CI
 * @author syhung_it
 * @copyright 2011
 * @version 1.0
 * @access public
 */
Class User extends Admin_Controller{


    public function User(){
        parent::__construct();
     $this->load->model('admin_model');

    }


    /**
     * User::index()
     *
     * @return void
     */
    public function index(){
        if($_SESSION['user']['group_level'] >2)
        {
           redirect(base_url() . 'admin/admin/errorpermission.html');
        }
        $data['title'] = "Quản trị thành viên hệ thống";
        $message='';
        if($this->input->post()){
          $insert_data=$this->input->post();
          if(!$this->admin_model->check_unique('tbluser','user_name',$insert_data['user_name'])){
            $message=admin_error("Tên đăng nhập này đã tồn tại");
            }
            if(!$this->admin_model->check_unique('tbluser','user_email',$insert_data['user_email'])){
            $message=admin_error("Địa chỉ email này đã tồn tại");
            }
            if($message==''){
                $insert_data['user_birthdate']=mktime_date_vi($insert_data['user_birthdate'],'-');
                if($insert_data['user_birthdate'] === null){
                    $insert_data['user_birthdate'] = 0;
                }
                $insert_data['date_created']=time();
                $insert_data['user_pwd']=md5($insert_data['user_pwd']);
                unset($insert_data['re_user_pwd']);
                if($this->admin_model->db->insert('tbluser',$insert_data)){
                    $message=admin_success("Thêm mới thành viên thành công");
                }else{
                    $message=admin_error("Có lỗi xảy ra,thêm mới thành viên thất bại");
                }
            }
            }
        $data['message']=$message;
        $data['groups'] = $this->admin_model->select_query("tblgroup",false,array('tblgroup.group_level > '=>$this->user['group_level']));
        $data['users'] = $this->admin_model->load_admin(FALSE,array('tblgroup.group_level > ' =>1));
        $this->load->view('back_end/admin/index_admin',$data);


    }
    /**
     * User::delete_admin()
     *
     * @return void
     */
    public function delete_admin(){

        foreach($this->input->post() as $key=>$value){

          $user_info=$this->admin_model->load_admin(false,array('tbluser.user_name '=>$value),TRUE);

          if(count($user_info)==1){
          if($user_info['0']['group_level']>$this->user['group_level']){
            $this->admin_model->db->delete('tbluser',array('user_name'=>$value));
          }
          }
        }
    }

    /**
     * User::update_user()
     *
     * @param mixed $user_name
     * @return void
     */
    public function update_user($user_name){
        $message='';
        $user_name=$user_name;

        $data['current_user']=$this->user;
        $data['message']=$message;


        if($this->input->post()){
            $update_data=$this->input->post();
            //var_dump($update_data);
            $update_data['user_birthdate']=mktime_date_vi($update_data['user_birthdate'],'-');
            $update_data['user_block']=isset($update_data['user_block'])?1:0;
            if(isset($update_data['check_change_pwd'])){
                $update_data['user_pwd']=md5($update_data['user_pwd']);
                unset($update_data['check_change_pwd']);

            }else{
                unset($update_data['user_pwd']);
            }
            unset($update_data['re_user_pwd']);
            if($this->admin_model->db->update('tbluser',$update_data,array('user_name'=>$user_name))){
                $message=admin_success("Cập nhập thông tin thành viên thành công");
            }else{
                $message=admin_error("Có lỗi xảy ra,cập nhập thông tin thành viên thất bại");
            }
        }
        $user_info=$this->admin_model->load_admin(false,array('tbluser.user_name '=>$user_name),TRUE);
        if($user_info['0']['group_level']<$this->user['group_level'] || ($user_info['0']['group_level']==$this->user['group_level'] && $user_name!=$this->user['user_name'])){
            $message=admin_error('Nhóm tài khoản của bạn không có quyền sửa thông tin tài khoản này');
        }else{
            $data['groups'] = $this->admin_model->select_query("tblgroup",false,array('tblgroup.group_level > '=>$this->user['group_level']));
            $data['user']=prep_form($user_info['0']);
        }
        $data['message']=$message;

        $data['title']='Trang quản lý thành viên quản trị -Sửa thông tin thành viên quản trị';
        $this->load->view('back_end/admin/update_admin',$data);

    }

    /**
     * User::save_update_admin()
     *
     * @return
     */
    public function save_update_admin(){
       $full_name=$this->input->post('fullname');
        $user_name=$this->input->post('user_name');
        $password=$this->input->post('password');
        $group=$this->input->post('group');
        $block=$this->input->post('block');
        $email=$this->input->post('email');
        if($this->admin_model->get_by_key('tbluser','user_name','user_email',$email)!=false && $this->admin_model->get_by_key('tbluser','user_name','user_email',$email)!=$user_name )
        {
            echo 1;
            return;
        }

        $update_array=array('user_pwd'=>md5($password),'user_fullname'=>$full_name,'user_email'=>$email,'group_name'=>$group,'user_block'=>$block);
        if($password == '0')
        {
        $update_array=array('user_fullname'=>$full_name,'user_email'=>$email,'group_name'=>$group,'user_block'=>$block);
        }
        if($this->admin_model->db->update('tbluser',$update_array,array('user_name'=>$user_name)))
        {
            echo 0;

        }
        else{
            echo 2;
            return;
        }

    }
    /**
     * User::load_user_table()
     *
     * @return void
     */
    public function load_user_table(){
        $data['users'] = $this->admin_model->load_admin();

        echo $this->load->view('back_end/admin/user_table',$data,TRUE);
    }
}
?>