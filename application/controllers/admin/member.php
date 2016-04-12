<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



Class Member extends Admin_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('admin_model');
    }
    
    
    
    public function index(){
        
        $select_array=array('member_id','member_email','member_fullname','member_active','group_name','date_reg');
        $join_array=array('tblmembergroup'=>'tblmember.group_id=tblmembergroup.group_id');
        $total=$this->admin_model->select_query('tblmember',$select_array,FALSE,$join_array)->num_rows();
        $message='';
        $data['total']=$total;
        if($this->input->post()){
            $message=$this->save_member($this->input->post());
        }
        $where=array();
        $url=base_url().'admin/member.html?';
        if($this->input->get('phrase')){
            $where=array_merge($where,array('member_fullname LIKE '=>'%'.$this->input->get('phrase').'%'));
            $url.='phrase='.$this->input->get('phrase').'&';
        }
        if($this->input->get('group')){
            $where=array_merge($where,array('tblmembergroup.group_id'=>$this->input->get('group')));
            $url.='group='.$this->input->get('group').'&';
        }
        if($this->input->get('from')){
            $time=mktime_date_vi($this->input->get('from'),'-');
            $where=array_merge($where,array('date_reg > '=>$time));
            $url.='from='.$this->input->get('from').'&';
        }
        if($this->input->get('to')){
            $time=mktime_date_vi($this->input->get('to'),'-',59,58,23);
            $url.='to='.$this->input->get('to').'&';
        }
        $limit=$this->input->get('limit')?$this->input->get('limit'):20;
        $url.='limit='.$limit.'&';
        $current_page=$this->input->get('page')?$this->input->get('page'):1;
        $members=$this->admin_model->select_query('tblmember',$select_array,$where,$join_array,($current_page-1)*$limit,$limit,array('tblmember.date_reg'=>'DESC'));
        $data['title']='Quản trị thành viên website';
        $data['result_from']=($current_page-1)*$limit;
        $data['result_to']=($current_page*$limit);
        $data['message']=$message;
        $data['members']=$members;
        $data['url']=$url;
        $data['page']=page_count($total,$limit);
        $data['current_page']=$current_page;
        $data['groups']=$this->admin_model->select_query('tblmembergroup');
        $this->load->view('back_end/member/index_member',$data);
        
    }
    
    /**
     * Member::save_member()
     * 
     * @param mixed $post_data
     * @return void
     */
    public function save_member($post_data){
        $insert_array=$post_data;
        $message='';
        $insert_array['member_birthdate']=mktime_date_vi($post_data['member_birthdate'],'-');
        if(!$this->admin_model->check_unique('tblmember','member_email',$post_data['member_email'])){
            $message=admin_error('Địa chỉ email đăng ký này đã tồn tại');return $message;
        }
        if($insert_array['member_password']!=$insert_array['re_member_password']){
            $message=admin_error('Mật khẩu nhập lại không đúng');return $message;
        }
        
        unset($insert_array['re_member_password']);
        $insert_array['date_reg']=time();
        if($this->admin_model->db->insert('tblmember',$insert_array)){
            $message=admin_success('Thêm mới thành viên thành công');
            
        }else{
            $message=admin_error('Có lỗi xảy ra,thêm mới thành viên thất bại');
        }

        
        return $message;
        
    }
    
    
    /**
     * Member::edit_member()
     * 
     * @param mixed $member_id
     * @return
     */
    public function edit_member($member_id){
        $message='';
        if($this->input->post()){
            $post_data=$this->input->post();
            $update_array=$post_data;
         $update_array['member_birthdate']=mktime_date_vi($post_data['member_birthdate'],'-');
        if($this->admin_model->select_query('tblmember','member_id',array('member_email'=>$post_data['member_email'],'member_id NOT LIKE '=>$post_data['member_id']))->num_rows()>0){
            $message=admin_error('Địa chỉ email đăng ký này đã tồn tại');
        }
        if($update_array['member_password']!=$update_array['re_member_password']){
            $message=admin_error('Mật khẩu nhập lại không đúng');
        }
        unset($update_array['re_member_password']);
        $update_array['member_active']=isset($post_data['member_active'])?1:0;
        if($message==''){
        if($this->admin_model->db->update('tblmember',$update_array,array('member_id'=>$post_data['member_id']))){
            $message=admin_success('Cập nhập thông tin thành viên thành công');
            
        }else{
            $message=admin_error('Có lỗi xảy ra,cập nhập thông tin thành viên thất bại');
        }   
        }
        }
        $member_info=$this->admin_model->select_query('tblmember',false,array('member_id'=>$member_id),array('tblmembergroup'=>'tblmember.group_id=tblmembergroup.group_id'));
        if($member_info->num_rows()!=1){redirect(base_url().'admin/member.html');}
        $info=$member_info->result_array();
        $data['member']=prep_form($info['0']);
        $data['groups']=$this->admin_model->select_query('tblmembergroup');
        $data['message']=$message;
        $data['title']='Quản trị thành viên website-Sửa thông tin thành viên';
        $this->load->view('back_end/member/edit_member',$data);
    }
    
    /**
     * Member::delete_member()
     * 
     * @param bool $member_id
     * @return void
     */
    public function delete_member($member_id=FALSE){
        if($member_id){
            $this->admin_model->db->delete('tblmember',array('member_id'=>$member_id));
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        foreach($this->input->post() as $key=>$value){
            $this->admin_model->db->delete('tblmember',array('member_id'=>$value));
        }        
    }
    
    
}



?>