<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Shop_model extends Base_model{
    
    
    /**
     * Shop_model::__construct()
     * 
     * @return void
     */
    function __construct(){
        parent::__construct();
    }
   
    /**
     * Shop_model::load_shop()
     * 
     * @param array $where
     * @param array $select_column
     * @param array $order
     * @param int $start
     * @param int $limit
     * @param bool $return_array
     * @return
     */
    public function load_shop($where=FALSE,$select_column=FALSE,$order=FALSE,$start=FALSE,$limit=FALSE,$return_array=FALSE){
        $column_select = ($select_column) ? (is_array($select_column) ? implode(',', $select_column) : $select_column) : "*";
        $join=array(
        'tbluser'=>'tblshop.user_id=tbluser.user_id','tblshoptemplate'=>'tblshoptemplate.shoptemplate_id=tblshop.shoptemplate_id',
        'tblshoppackage'=>'tblshoppackage.package_id=tblshop.package_id'
        );
        $this->db->select($column_select)->from('tblshop');
        foreach($join as $key=>$value){
            $this->db->join($key,$value);
        }
        if($order){
            foreach($order as $key=>$value){
                $this->db->order_by($key,$value);
                            }
        }
        if($limit){
            $this->db->limit($limit,$start);
        }
        $query=$this->db->get();
        if($return_array){
            return $this->get_array($query);
        }else{
            return $query;
        }
    }
    
}



?>