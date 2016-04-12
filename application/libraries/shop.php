<?php
Class Shop{
    protected $domain_id;
    protected $lang;
    public function __construct(){
      $this->domain_id = $_SESSION['domain_id'];
      $this->lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'vi';
    }
    
    /**
     * Shop::insert()
     * 
     * @param mixed $id
     * @return void
     */
    public function add_cart($id,$name,$qty = 1, $data=false){
      if(!isset($_SESSION['cart'][$this->domain_id][$this->lang][$id])){$_SESSION['cart'][$this->domain_id][$id]['qty']=0;$_SESSION['cart'][$this->domain_id][$id]['name']='';}
        $_SESSION['cart'][$this->domain_id][$this->lang][$id]['qty'] += $qty;
        $_SESSION['cart'][$this->domain_id][$this->lang][$id]['name']=$name;
        if($data){
            foreach($data as $key=>$value){
                $_SESSION['cart'][$this->domain_id][$this->lang][$id][$key]=$value;
            }
        }
    
    }
    
    /**
     * Shop::update_cart()
     * 
     * @param mixed $id
     * @param mixed $qty
     * @return void
     */
    public function update_cart($id,$qty){
        $_SESSION['cart'][$this->domain_id][$this->lang][$id]['qty']=$qty;
        if($_SESSION['cart'][$this->domain_id][$this->lang][$id]['qty']<=0){unset($_SESSION['cart'][$this->domain_id][$id]);}
    }
    
    /**
     * Shop::get_cart()
     * 
     * @return
     */
    public function get_cart(){
        return $_SESSION['cart'][$this->domain_id][$this->lang];
    }
    
    public function count_cart(){
      
        $total=0;
        if(isset($_SESSION['cart'][$this->domain_id][$this->lang])){
            foreach($_SESSION['cart'][$this->domain_id][$this->lang] as $id=>$items){
                $total+=$items['qty'];
            }
        }
        return $total;
    }
    
    public function calculate_price(){
        $price=0;
        if(isset($_SESSION['cart'][$this->domain_id][$this->lang])){
            foreach($_SESSION['cart'][$this->domain_id][$this->lang] as $id=>$items){
                $price = isset($items['price']) ? $items['price'] : 0;
                $price+=$items['qty']*$price;
            }
          
        } 
          return number_format($price,0,'.','.');
    }
    
}
?>