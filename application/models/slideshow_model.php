<?php

Class Slideshow_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        
    
    }
    
    
    /**
     * Slideshow_model::load_image()
     * 
     * @param int $plugin_id
     * @param mixed $cols
     * @param array $where
     * @param int $start
     * @param int $limit
     * @param array $order
     * @param bool return array
     * @return void
     */
    public function load_images($plugin_id=false,$cols=false,$where=false,$start=false,$limit=false,$order=false,$return_array=false){
         $column_select=($cols)?(is_array($cols)?implode(',',$cols):$cols):"*";
         $this->db->select($column_select)->from('tblimages');
         if($plugin_id){
            $this->db->where('plugin_id',$plugin_id);
         }
         if($where){
            $this->db->where($where);
         }
         if($start){
            if($limit){$this->db->limit($limit,$start);}
         }
         if($order){
            foreach($order as $key=>$value){
                $this->db->order_by($key,$value);
            }
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