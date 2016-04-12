<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Shop
 * 
 * @package kecho
 * @author syhung_it
 * @copyright 2011
 * @version $Id$
 * @access public
 */
Class Shop extends Admin_Controller{
    
    /**
     * Shop::__construct()
     * 
     * @return void
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('shop_model');
    }
    
    
    /**
     * Shop::index()
     * 
     * @return void
     */
    public function index(){
      $data['title']='Trang quản trị gian hàng';
      $col_select=array('tblshop.shop_id','tblshop.shop_name','tblshop.shop_datecreate','tbluser.user_name','tblshoppackage.package_name');
      $where=array('tblshop.shop_deleted'=>0);
      $total_record=$this->shop_model->load_shop($where,$col_select,array('tblshop.shop_datecreate'=>'DESC'))->num_rows();
      $limit=$this->input->get('limit')?$this->input->get('limit'):20;
      $current_page=$this->input->get('page')?$this->input->get('page'):1;
       $total_page=page_count($total_record,$limit);
      $url=base_url().'admin/shop.html?';
      if($this->input->get('from')){
        $time=mktime_date_vi($this->input->get('from'),'-',0,0,0);
        $where=array_merge($where,array('tblshop.shop_datecreate > '=>$time));
        $url.='from='.$time.'&';
      }
      
      if($this->input->get('to')){
        $to=mktime_date_vi($this->input->get('to'),'-',59,59,23);
        $where=array_merge($where,array('tblshop.shop_datecreate < '=>$to));
        $url.='to='.$to.'&';
      }
      if($this->input->get('phrase')){
        $phrase=$this->input->get('phrase');
        $where=array_merge($where,array('tblshop.shop_name LIKE '=>'%'.$phrase.'%'));
        $url.='phrase='.$phrase.'&';
      }
      $data['result_from']=($current_page-1)*$limit;
      $data['result_to']=($current_page*$limit>$total_record)?$total_record:$current_page*$limit;
      $data['total']=$total_record;
      $data['total_page']=$total_page;
      $data['current_page']=$current_page;
      $data['url']=$url;
      $data['packages']=$this->shop_model->select_query('tblshoppackage',array('package_id','package_name'));
      $data['shops']=$this->shop_model->load_shop($where,$col_select,array('tblshop.shop_datecreate'=>'DESC'),($current_page-1)*$limit,$limit);
      $message='';
      $this->load->view("back_end/shop/index_shop",$data);
     }
    
    /**
     * Shop::packet()
     * 
     * @return void
     */
    public function packet(){
        
    }
    
    /**
     * Shop::template()
     * 
     * @return void
     */
    public function template(){
        
    }
    
    /**
     * Shop::config()
     * 
     * @return void
     */
    public function config(){
        $data['title']='Quản trị cấu hình gian hàng';
        
        $this->load->view('back_end/shop/config_shop',$data);
    }
    
    /**
     * Shop::statics()
     * 
     * @return void
     */
    public function statics(){
        
    }
    
    /**
     * Shop::add_shop()
     * 
     * @return void
     */
    public function add(){
         $data['title']='Trang quản trị gian hàng';
         $message='';
         
         
         $data['message']=$message;
        $this->load->view("back_end/shop/add_shop",$data);
    }
    
    /**
     * Shop::edit_shop()
     * 
     * @param mixed $id
     * @return void
     */
    public function edit($id){
        
    }
    
    /**
     * Shop::delete_shop()
     * 
     * @param bool $id
     * @return void
     */
    public function delete($id=false){
        
    }
}
?>