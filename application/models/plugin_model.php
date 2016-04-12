<?php
Class Plugin_model extends Base_model{
    
    function __construct(){
        parent::__construct();
        $this->load->model('counter_model');
        }
        
        /**
         * Plugin_model::load_plugin()
         * 
         * @param array $cols
         * @param array $where
         * @param int $start
         * @param int $limit
         * @param int $return_array
         * @return void
         */
        public function load_plugin($cols=false,$where=false,$start=false,$limit=false,$order=false,$return_array=false){
           $column_select=($cols)?(is_array($cols)?implode(',',$cols):$cols):"*";
           $this->db->select($column_select)->from('tblplugin')->join('tblplugintype','tblplugintype.plugintype_id=tblplugin.plugintype_id')->join('tbllang','tblplugin.lang_id=tbllang.lang_id');
           if($order){
            foreach($order as $key=>$value){
                $this->db->order_by($key,$value);
            }
           }
           
           
           if($where){
            $this->db->where($where);
           }
           if($limit and $limit){
            $this->db->limit($limit,$start);
           }
           
           $query=$this->db->get();
           if($return_array==true){
            return $this->get_array($query);
           }else{
            return $query;
           }
        }
        
        /**
         * Plugin_model::load_plugin_position()
         * 
         * @param array $where
         * @param mixed $cols
         * @param bool $return_array
         * @return void
         */
        public function load_plugin_position($current_template = false){
        $current_layout=$this->plugin_model->get_by_key('tbltemplate','layout_name','template_default',1);
            if($current_template){
                $current_layout = $current_template;
            }
        if(!file_exists(LAYOUT_DIR.$current_layout.'/elements.xml')){
                return;
                }
        $xml_read=new DOMDocument();
        $web_position=array();
        $xml_read->load(LAYOUT_DIR.$current_layout.'/elements.xml');
        $positions=$xml_read->getElementsByTagName('position');
        foreach($positions as $position){
        $position_name=$position->getElementsByTagName('name')->item('0')->nodeValue;
        $position_title=$position->getElementsByTagName('title')->item('0')->nodeValue;
        $web_position[$position_name]=$position_title;
        }
       
       return $web_position; 
        
        }
       
    /**
     * Plugin_model::load_template_layouts()
     * 
     * @param string $template
     * @param bool $layout
     * @return
     */
    public function load_template_layouts($template,$layout= false){
        $current_templates=$this->get_by_key('tbltemplate','layout_name','template_default',1);
        $config_file = LAYOUT_DIR.$template.'/elements.xml';
        if(!file_exists($config_file)){
                return;
            }
       $configs  = xmlstr_to_array($config_file);

       $layouts = $configs['layouts'];
        $rs = $layouts['layout'];
      if(isset($layouts['layout']['name']))
      {
        $rs= array($layouts['layout']);
       }
        
       if($layout){
     
        foreach($rs as $temp){
        
            if(isset($temp['name']) &&$temp['name'] == $layout) {
            return $temp;
            };
        }
      
       }
    
      return $rs;
    
    }
    
    
    /**
     * Plugin_model::load_layout_plugin_template()
     * 
     * @param bool $type
     * @param bool $template_details
     * @return
     */
    public function load_layout_plugin_template($type=FALSE,$template = false){
        
        if($template){
            $config_file = LAYOUT_DIR.$template.'/elements.xml';
            if(!file_exists($config_file))
            {
                    return false;
            }
            $serializes = xmlstr_to_array($config_file);
            
            $tmps = $serializes['block_templates']['block_template'];
            
            $rs = array();
           
            if($type){
                if(isset($tmps['type']) && $tmps['type'] == $type)
                {
                    return array($tmps);
                }
                if(isset($tmps['type']) && $tmps['type'] != $type)
                {
                    return array();
                }                
                foreach($tmps as $item){
                    
                    if($item['type'] == $type)
                    {
                        $rs[] = $item;
                    }
                    
                }
                return $rs;
            }
            return $tmps;
            
        }
  
                   
    }
    
        
        /**
         * Plugin_model::load_plugin_content()
         * 
         * @param mixed $table
         * @param bool $plugin_id
         * @param bool $cols
         * @param bool $where
         * @param bool $start
         * @param bool $limit
         * @param bool $order
         * @param bool $return_array
         * @return
         */
        public function load_plugin_content($table,$plugin_id=false,$cols=false,$where=false,$start=false,$limit=false,$order=false,$return_array=false){
               $column_select=($cols)?(is_array($cols)?implode(',',$cols):$cols):"*";
         $this->db->select($column_select)->from($table);
         if($plugin_id){
            $this->db->where('plugin_id',$plugin_id);
         }
         if($where){
            $this->db->where($where);
         }
         if($limit){
            $this->db->limit($limit,$start);
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
        
        /**
         * Plugin_model::load_plugin_type()
         * 
         * @param mixed $cols
         * @param array $where
         * @param bool $return_array
         * @return
         */
        public function load_plugin_type($cols=false,$where=false,$return_array=false){
          $column_select=($cols)?(is_array($cols)?implode(',',$cols):$cols):"*";
          $this->db->select($column_select)->from('tblplugintype');
             if($where){
                $this->db->where($where);
             }
             $query=$this->db->get();
             if($return_array){
                return $this->get_array($query);
             }else{return $query;}
            
        }
        
        /**
         * Plugin_model::load_plugin_template()
         * 
         * @param mixed $cols
         * @param mixed $where
         * @param bool $return_array
         * @return
         */
        public function load_plugin_template($cols=false,$where=false,$return_array=false)
        {
            $column_select=($cols)?(is_array($cols)?implode(',',$cols):$cols):"*";
          $this->db->select($column_select)->from('tblplugintemplate');
             if($where){
                $this->db->where($where);
             }
             $query=$this->db->get();
             if($return_array){
                return $this->get_array($query);
             }else{return $query;}    
        }
        
        
       /**
        * Plugin_model::load_support()
        * 
        * @param bool $plugin_id
        * @param bool $cols
        * @param bool $where
        * @param bool $start
        * @param bool $limit
        * @param bool $order
        * @param bool $return_array
        * @return
        */
       public function load_support($plugin_id=false,$cols=false,$where=false,$start=false,$limit=false,$order=false,$return_array=false){
         $column_select=($cols)?(is_array($cols)?implode(',',$cols):$cols):"*";
         $this->db->select($column_select)->from('tblsupport');
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
     
     
     /**
      * Plugin_model::emit_position()
      * 
      * @param mixed $position
      * @return array
      */
     public function load_by_position($cols=false,$position,$where=false,$order=false,$start=false,$limit=false){
       
        $col_selects=($cols)?(is_array($cols)?implode(',',$cols):$cols):'*';
        $this->db->select($col_selects)->from('tblplugin');
        $this->db->join('tblplugintemplate','tblplugintemplate.plugintemplate_id=tblplugin.plugintemplate_id');
        $this->db->join('tblplugintype','tblplugin.plugintype_id=tblplugintype.plugintype_id');
        $this->db->join('tbllang','tbllang.lang_id=tblplugin.lang_id');
        if($where){$this->db->where($where);}
        $this->db->where('tblplugin.position_name',$position);
        if($order){
            $this->db->order_by($order);
        }
        if($limit){
            $this->db->limit($limit,$start);
        }
        $query=$this->db->get();
        
        $plugin_array=$this->get_array($query);
        return $plugin_array;
     }
     
     /**
      * Plugin_model::display_front_end_block_config()
      * 
      * @param mixed $plugin_id
      * @return
      */
     public function display_frontend_block_config($plugin_id){
        $plugin_title=$this->get_by_key('tblplugin','plugin_title','plugin_id',$plugin_id);
        $string='<div class="config"><select class="block-config" name="'.$plugin_id.'" onchange="setting_block(this.value,$(this).attr(\'name\'))">
            <option  value="0" title="template/scripts/move.png">'.$plugin_title.'</option>
            <option  value="edit" title="template/scripts/edit.png">Sửa</option>
            <option value="delete" title="template/scripts/delete.png">Xóa</option>
             <option value="up" title="template/scripts/up.png">Lên</option>
             <option value="down" title="template/scripts/down.png">Xuống</option>
             <option  value="update" title="template/scripts/update.png">Cập nhập nội dung</option>
            </select></div>';
            return $string;
     }   
        
}
         
?>