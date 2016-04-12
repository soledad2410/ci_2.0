<?php
Class Contacts extends Admin_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('config_model');
    }
    
    public function index(){
        
        $data['title']="Quản trị liên hệ website";
          $limit=($this->input->get('limit'))?$this->input->get('limit'):20;
    $page=($this->input->get('page'))?($this->input->get('page')):1;
      $data['result_from']=$limit*($page-1)+1;
        $data['result_to']=$limit*$page;
        // Emit url
      $url='admin/contact.html?';
        $cond='';

        if($this->input->get('from')){
            $cond.="from=".$this->input->get('from')."&";
        }
        if($this->input->get('to')){
            $cond.="to=".$this->input->get('to')."&";
        }
        if($this->input->get('keyword')){
            $cond.="name=".$this->input->get('name')."&";
        }
        if($this->input->get('limit')){
            $cond.="limit=".$this->input->get('limit')."&";
        }
        // Emit where condition
    $from=false;
    $to=false;
   
    if($this->input->get('from')){list($day,$month,$year)=explode('-',$this->input->get('from'));$from=mktime(0,0,0,$month,$day,$year);}
    if($this->input->get('to')){list($day,$month,$year)=explode('-',$this->input->get('to'));$to=mktime(0,0,0,$month,$day,$year);}
    $where=array('contact_datetime >= '=>$from,'contact_datetime <= '=>$to,'contact_user LIKE '=> $this->input->get('name')?('%'.urlencode($this->input->get('name')).'%'):false);
    foreach($where as $key=>$value){if(!is_string($value) && (!$value)){unset($where[$key]);}}
    
    $url=$url.$cond;
    $total_contact=$this->config_model->select_query('tblcontact',array('contact_id','contact_user'),$where)->num_rows();
    $data['page']=page_count($total_contact,$limit);
    $data['url']=$url;
    $data['current_page']=$page;
    $data['total']=$total_contact;
  $contacts=$this->config_model->select_query('tblcontact',FALSE,
    $where,
    false,($page-1)*$limit,$limit,array('contact_datetime'=>'DESC'));
    $data['contacts']=$contacts;
    
    // Config module
    $data['contact_config']=$this->config_model->load_config('tblconfig.config_id',array('config_active'=>1,'tblconfig.config_module'=>'contact','tblconfig.domain_id'=>$this->domain_id));
  //  var_dump($data['order_config']->result_array());
    $this->load->view('back_end/contact/index_contact',$data);
        
    }
    
    public function delete_contact(){
        if($this->input->get('id')){$this->config_model->db->delete(array('tblcontact'),array('contact_id'=>$this->input->get('id')));redirect($_SERVER['HTTP_REFERER']);}
         foreach($this->input->post() as $key=>$value){
        $this->config_model->db->delete(array('tblcontact'),array('contact_id'=>$value));
    } 
    }
    
    public function view($id){
        
        $contact_info=$this->config_model->select_query('tblcontact',false,array('contact_id'=>$id),FALSE,FALSE,FALSE,FALSE,TRUE);
        if(count($contact_info)<1){redirect(base_url().'admin/contact.html');}
        $data['title']='Quản trị liên hệ webste - Xem thông tin liên hệ';
        $this->config_model->db->update('tblcontact',array('contact_read'=>1),array('contact_id'=>$id));
        $data['contact']=$contact_info['0'];
        $this->load->view('back_end/contact/view_contact',$data);
        
    }
    
    public function department()
    {
        $data['title'] = 'Phòng ban liên hệ';
        $data['departments'] = $this->config_model->select_query('tbldepartment');
        $message = '';
        if ($this->input->post())
        {
            $insert_data = $this->input->post();
            if ($this->config_model->insert_data('tbldepartment', $insert_data))
            {
                $message = admin_success('Thêm mới phòng ban thành công');
            }
            else{
                $message = admin_error('Thêm mới phòng ban thất bại');
            }
        }
        $data['message'] = $message;
        $data['departments'] = $this->config_model->select_query('tbldepartment');
        $this->load->view('back_end/contact/department_contact', $data);  
    }
    
    public function delete_department()
    {
        foreach($this->input->post() as $key=>$value)
        {
            $this->config_model->db->delete('tbldepartment', array('department_id'=>$value));
        }
    }
    
    public function update_department()
    {
        foreach($this->input->post() as $key => $value){
            $this->config_model->update_data('tbldepartment', array('department_name'=>$value), array('department_id'=>$key));
        }
        redirect('admin/contact/department');
    }
}
?>