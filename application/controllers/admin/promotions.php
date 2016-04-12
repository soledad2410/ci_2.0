<?
Class Promotions extends Admin_Controller{
    
    private $_table;
    private $_joins;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
        $this->_table = 'tblpromotions';
        $this->_joins = array('tblproduct' => 'tblproduct.product_id=tblpromotions.product_id');
    }
    
    public function index()
    {
        $data['title'] = 'Quản trị chương trình khuyến mãi sản phẩm';
        $data['products'] = $this->product_model->load_product(array('product_id','product_name'), false, false, false, false, array('tbllang.lang_shortname' => $this->my_lang), false, false, false, array('product_id' => 'DESC'));
        $where = array();
        $message = '';
        $url = 'admin/promotions.html?';
        $total = $this->product_model->select_query($this->_table, false,false, $this->_joins)->num_rows();
        $data['total'] = $total;
        $limit = $this->input->get('limit') ? $this->input->get('limit') : 20;
        if ($this->input->get('product'))
        {
            $where = array_merge($where, array('tblproduct.product_id' => $this->input->get('product')));
            $url .= 'product=' . $this->input->get('product') . '&';
        }
        if ($this->input->get('limit'))
        {
            $url .= 'limit=' . $this->input->get('limit');
        }
        if ($this->input->post('token') && $this->input->post('token') == $_SESSION['token'])
        {
            $insert_data = $this->input->post();
            $insert_data['promot_time'] = time();
            if ($this->product_model->insert_data($this->_table, $insert_data))
            {
                $message = admin_success('Tạo chương trình khuyến mãi thành công');
            }
            else{
                $message = admin_error('Có lỗi xảy ra, tạo chương trình khuyến mãi thất bại');
            }
        }
        $current_page = $this->input->get('page') ? $this->input->get('page') : 1;
        $data['news'] = $this->product_model->select_query($this->_table, false, $where, $this->_joins,
                                                              ($current_page-1) * $limit, $limit, array('promot_time' => 'DESC'));
        $data['page'] = page_count($total, $limit);                                                                  
        $data['url'] = $url;
        $data['current_page'] = $current_page;
        $data['result_from'] = ($current_page-1) * $limit;
        $data['result_to'] = $current_page * $limit > $total ? $total : $current_page * $limit; 
        $data['message'] = $message;
        $token = md5(uniqid(rand(), true));
        $_SESSION['token']=$token;
        $data['token']=$token;
        $this->load->view('back_end/promotions/index_promotions', $data);
    
    }
    
    public function edit($id)
    {
        $data['title'] = 'Sửa thông tin chương trình khuyến mãi';
        $message = '';
        $promotion_info = $this->product_model->select_query($this->_table, false, array('promot_id'=>$id), $this->_joins, false, false, false, true);
        if (count($promotion_info) != 1){
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['promot'] = prep_form($promotion_info['0']);
        if ($this->input->post('token') && $this->input->post('token')== $_SESSION['token'])
        {
            $update_data = $this->input->post();
            if ($this->product_model->update_data($this->_table, $update_data, array('promot_id'=>$id)))
            {
                $message = admin_success('Sửa chương trình khuyến mãi thành công');
            }
            else{
                $message = admin_error('Có lỗi xảy ra, sửa chương trình khuyến mãi thất bại');
            }
        }
        $promotion_info = $this->product_model->select_query($this->_table, false, array('promot_id'=>$id), $this->_joins, false, false, false, true);
        $data['promot'] = prep_form($promotion_info['0']);
        $data['products'] = $this->product_model->load_product(array('product_id','product_name'), false, false, false, false, array('tbllang.lang_shortname' => $this->my_lang), false, false, false, array('product_id' => 'DESC'));
        $data['message'] = $message;
        $token = md5(uniqid(rand(), true));
        $_SESSION['token']=$token;
        $data['token']=$token;
        $this->load->view('back_end/promotions/edit_promotion', $data);
        
    }
    
    function delete($id)
    {
        $this->product_model->db->delete($this->_table, array('promot_id'=>$id));
        header('location:' . $_SERVER['HTTP_REFERER']);
    }    
}
?>