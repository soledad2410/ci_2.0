<?php

Class Promotion extends Public_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
       
    }
    
    public function index($page = false)
    {
        $total = $this->product_model->select_query('tblpromotions', false, false, array('tblproduct'=>'tblproduct.product_id=tblpromotions.product_id'))->num_rows();
        $limit = 20;
        $current_page = $page ? $page : 1;
        $news = $this->product_model->select_query('tblpromotions', false, false, array('tblproduct'=>'tblproduct.product_id=tblpromotions.product_id'), ($current_page-1) * $limit, $limit, array('promot_time'=>'DESC'));
        $data['news'] = $news;
        $data['current_page'] = $current_page;
        $data['total_page'] = page_count($total,$limit);
        $this->layout_model->view('contents/promotion_index', $data);
        
    }
    
    public function details($lang = false, $id,$title = false)
    {
        $promot_info = $this->product_model->select_query('tblpromotions', false, array('promot_id'=>$id),
        array('tblproduct'=>'tblpromotions.product_id=tblproduct.product_id'), false, false, false, true
        );
        
        if (count($promot_info)!=1){redirect(base_url());}
        $data['promot'] = $promot_info['0'];
        
        $data['others'] = $this->product_model->select_query('tblpromotions', false, 
        array('tblproduct.product_id'=>$promot_info['0']['product_id'], 'promot_id NOT LIKE ' => $id),
        array('tblproduct'=>'tblpromotions.product_id=tblproduct.product_id'), false, false, array('promot_time'=>'DESC')
        
        );
       
        $this->layout_model->view('contents/promotion_details', $data);
    }
}

