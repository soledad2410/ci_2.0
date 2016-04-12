<?php
Class Order extends Admin_Controller{


 public function __construct(){
    parent::__construct();
    $this->load->model('product_model');
     $this->load->model('config_model');
 }

 public function index(){


    $data['title']='Trang quản lý đơn hàng';
    $limit=($this->input->get('limit'))?$this->input->get('limit'):20;
    $page=($this->input->get('page'))?($this->input->get('page')):1;
      $data['result_from']=$limit*($page-1)+1;
        $data['result_to']=$limit*$page;
        // Emit url
      $url='admin/order.html?';
        $cond='';
        if($this->input->get('status')){
            $cond.="status=".$this->input->get('status')."&";
        }
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
    $where=array('domain_id'=>$this->domain_id,'order_status'=>is_string($this->input->get('status'))?(($this->input->get('status')=='0')?'0':$this->input->get('status')):$this->input->get('status'),'order_date >= '=>$from,'order_date <= '=>$to,'cus_name LIKE '=> $this->input->get('name')?('%'.$this->input->get('name').'%'):false);
    foreach($where as $key=>$value){if(!is_string($value) && (!$value)){unset($where[$key]);}}

    $url=$url.$cond;
    $total_orders=$this->product_model->select_query('tblorder',array('order_id','cus_name','order_status'),$where)->num_rows();
    $data['page']=page_count($total_orders,$limit);
    $data['url']=$url;
    $data['current_page']=$page;
    $data['total']=$total_orders;
  $orders=$this->product_model->select_query('tblorder',array('order_id','cus_name','order_status','order_date','order_read'),
    $where,
    false,($page-1)*$limit,$limit,array('order_date'=>'DESC'));
    $data['orders']=$orders;

    // Config module
    $data['order_config']=$this->config_model->load_config('tblconfig.config_id',array('config_active'=>1,'tblconfig.config_module'=>'order','tblconfig.domain_id'=>$this->domain_id));
  //  var_dump($data['order_config']->result_array());
    $this->load->view('back_end/order/index_order',$data);


 }

 function delete_order(){
    foreach($this->input->post() as $key=>$value){
        $this->product_model->db->delete(array('tblorder','tblorderdetails'),array('order_id'=>$value));
    }
 }

 public function view($id){
    $this->product_model->db->update('tblorder',array('order_read'=>1),array('order_id'=>$id));
    $order_info=$this->product_model->select_query('tblorder',false,array('tblorder.order_id'=>$id),FALSE,FALSE,FALSE,FALSE,TRUE);
    $data['title']='Trang quản lý đơn hàng - Thông tin đơn đặt hàng';
    $order_details_info=$this->product_model->select_query('tblorderdetails',false,array('order_id'=>$id));
    $data['order']=$order_info['0'];
    $data['order_details']=$order_details_info;

    $this->load->view('back_end/order/view_order',$data);

 }
 public function save_edit_order(){
    $update_array=$this->input->post();
    $order_id=$update_array['order_id'];
    $order_status=$update_array['order_status'];

    unset($update_array['order_id']);
    unset($update_array['order_status']);
    foreach($update_array as $key=>$value){
      list($cols_update,$id)=explode('-',$key);
      if($value<1){
        $this->product_model->db->delete('tblorderdetails',array('product_id'=>$id));
      }else{
        $value=str_replace('.','',$value);
        $this->product_model->db->update('tblorderdetails',array($cols_update=>$value),array('product_id'=>$id));
      }
    }
    $this->product_model->db->update('tblorder',array('order_status'=>$order_status,'last_update'=>time(),'user_name'=>$this->user['user_name']));
    echo '0';


 }

}
?>