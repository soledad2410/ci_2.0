<?php
Class Admin_model extends Base_model{

    function __construct(){
        parent::__construct();

    }

    /**
     * Admin_model::load_admin()
     *
     * @param array $columns
     * @param array $where
     * @param bool $return_array
     * @return mysql resource or array
     */
    public function load_admin($columns=false,$where=false,$return_array=false){

        $column_select=($columns)?(is_array($columns)?implode(',',$columns):$columns):"*";
        $this->db->select($column_select)->from('tbluser');
        $this->db->join('tblgroup','tbluser.group_id=tblgroup.group_id');

        if($where){
            $this->db->where($where);
            }
        $query=$this->db->get();
          if($return_array==true){return $this->get_array($query);}else{return $query;}
    }



    /**
     * Admin_model::load_group()
     *
     * @param bool $return_array
     * @return mysql resource or array
     */
    public function load_group($return_array=false ,$where = false){
        return $this->select_query('tblgroup', false, $where, false, false, false, false, $return_array);
    }

    /**
     * Admin_model::check_permission()
     *
     * @param mixed $group_id
     * @param mixed $role
     * @return
     */
    public function check_permission($group_id, $role)
    {
        $role_array = $this->select_query('tblgroupprivilege', 'privilege_name', array('group_id' => $group_id), false, false,false,false, true);
        $roles = array();
        foreach ($role_array as $key) {
            array_push($roles, $key['privilege_name']);
        }
        if (in_array($role,$roles)) { return true ;}
        return false;
    }
    }
?>