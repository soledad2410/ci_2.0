<?php

class Customer extends Admin_Controller
{
    public function __construct()
    {
         parent::__construct();
       $this->load->model('base_model'); 
    }
    
    public function index()
    {

        $data['title'] = 'Quản trị danh sách khách hàng đăng ký';
        $current_page = ($this->input->get('page')) ? $this->input->get('page') : 1;
        $limit = ($this->input->get('limit')) ? $this->input->get('limit') : 10;
        
        if($this->input->post())
        {
            $insert_data = $this->input->post();
            $insert_data['created_date'] = time();
            if(!$this->base_model->check_unique('tblcustomer','email',$insert_data['email'])){
                flash_data(admin_error('Địa chỉ email này đã được đăng ký'));
            } else{
                if($this->base_model->insert_data('tblcustomer',$insert_data)){
                    flash_data(admin_success('Đăng ký mới khách hàng thành công'));
                } else{
                    flash_data(admin_success('Có lỗi xảy ra, đăng ký mới thất bại'));
                }
            }
            
        }
        $start = ($current_page - 1) * $limit;
        $total = $this->base_model->select_query('tblcustomer')->num_rows();
        $data['customers']  = $this->base_model->select_query('tblcustomer',false,false,false,$start,$limit);
        $data['total'] = $total;
        $this->load->view('back_end/customer/index', $data);
    }
    
    public function delete()
    {
        $ids = $this->input->post('cus_select');
        foreach($ids as $id)
        {
            $this->base_model->db->delete('tblcustomer',['id'=>$id]);
        }
    }
    
    public function edit($cus_id)
    {
            if($this->input->post())
            {
                $update_data = $this->input->post();
                if($this->base_model->db->update('tblcustomer',$update_data, ['id' => $cus_id]))
                {
                    flash_data(admin_success('Sửa thông tin thành công'));
                } else {
                    flash_data(admin_error('Có lỗi xảy ra, sửa thông tin thất bại'));
                }           
            }
            $info = $this->base_model->select_query('tblcustomer',false,['id'=>$cus_id],false,0,1,false,true);
            $data['cus'] = $info['0'];
            $this->load->view('back_end/customer/edit', $data); 
            
            
        
    }
    
    public function exportexcel()
    {       
        $label = ['Email','Tài Khoản','Tên đầy đủ','Điện thoại liên lạc', 'Địa chỉ','Ngày đăng ký'];
           $cus_lists = $this->base_model->select_query('tblcustomer',false,false,false,false,false,false,true);
           $data = [];
           foreach($cus_lists as $item){
            $data[] = [$item['email'],$item['username'],$item['fullname'],$item['phone'],$item['address'],datetime_vi($item['created_date'])];
           }
           export_excel($label,$data);
           
    }
}
?>