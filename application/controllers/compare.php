<?php
Class compare extends Public_Controller{
    
     public function __construct(){
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('menu_model');
    }
    
    public function index(){
        if(count($_SESSION['compare'])<2){echo 0;return;}
        
        
        $data=array();
        foreach($_SESSION['compare'] as $key=>$value){
        
            $prod_info=$product_info=$this->product_model->load_product(false,false,false,false,false,array('tblproduct.product_id'=>$key),false,false,TRUE);
            $data[$value][]=$prod_info['0'];
        }
        $view['compare']=$data;
        $view['template']=$this->template;
        $this->load->view('web_layout/'.$this->layout.'/contents/compare.php',$view);
        
        
    }
    
    public function add_compare(){
    $id=$this->input->get('id');
    $value=$this->input->get('value');
    if($value>0){
        $_SESSION['compare'][$id]=$value;
    }
    if($value==0){
        if($_SESSION['compare'][$id]){unset($_SESSION['compare'][$id]);}
    }
     var_dump($_SESSION['compare']);
    }
   
}
?>