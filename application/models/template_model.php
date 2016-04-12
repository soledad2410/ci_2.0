<?php
Class Template_model extends Base_model{
    
    function __construct(){
        parent::__construct();
    
    }
    
    
    /**
     * Template_model::load_template()
     * 
     * @param bool $cols
     * @param bool $where
     * @param bool $return_array
     * @return void
     */
    public function load_template($cols=false,$where=false,$return_array=false){
    $column_select=($cols)?(is_array($cols)?implode(',',$cols):$cols):"*";
    $this->db->select($column_select)->from('tbltemplate');
    if($where){
        $this->db->where($where);
    }
    $query=$this->db->get();
    if($return_array){
        return $this->get_array($query);
    }else{return $query;}        
    }
    
    /**
     * Template_model::load_layout()
     * 
     * @param bool $return_array
     * @param mixe $where
     * @return
     */
    public function load_layout($where=false,$return_array=false){
        $this->db->select()->from('tbllayout');
        if($where){
            $this->db->where($where);
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