<?php
class Menu_model extends Base_model{
     function __construct(){
        parent::__construct();

    }


    /**
     * Menu_model::load_menu()
     *
     * @param array $cols
     * @example array('menu_id','module_id')
     * @param array $where
     * @example array('tblmenu.menu_id='=>1,'tblmodule.module_id='=)
     * @param int $start
     * @param int $limit
     * @param boolean $option(true:return array,false:return mysql resource)
     * @return array
     */
    public function load_menu($cols=false,$where=null,$start=null,$limit=null,$order=null,$option=false,$groups=false){
        $column_select=($cols)?(is_array($cols)?implode(',',$cols):$cols):"*";
        $this->db->select($column_select)->from('tblmenu')->join('tblmodule','tblmenu.module_id=tblmodule.module_id','left')->join('tbllang','tblmenu.lang_id=tbllang.lang_id');
        if(isset($where)){
          $this->db->where($where);
        }
        if(isset($order)){
            foreach($order as $key=>$value){
                $this->db->order_by($key,$value);
            }
        }
        if(isset($limit)){$this->db->limit($limit,$start);}
        if($groups){
            foreach($groups as $group){
                $this->db->group_by($group);
            }
        }
        $query=$this->db->get();
        if($option ==true){
        return $this->get_array($query);
        }else{

        return $query;
        }
    }


     /**
      * Menu_model::load_cate_template_layout()
      *
      * @param bool $module
      * @return array
      */
     public function load_layout_cate_template($module=FALSE){

        $current_layout=$this->get_by_key('tbltemplate','layout_name','template_default',1);
        if(!file_exists(LAYOUT_DIR.$current_layout.'/elements.xml')){
                return;
                }
        $xml_read=new DOMDocument();
        $xml_read->load(LAYOUT_DIR.$current_layout.'/elements.xml');
        $templates=array();
        $nodes=$xml_read->getElementsByTagName('cate_template');
        foreach($nodes as $template){
            $title=$template->getElementsByTagName('title')->item('0')->nodeValue;
            $file=$template->getElementsByTagName('file')->item('0')->nodeValue;
            $description=$template->getElementsByTagName('description')->item('0')->nodeValue;
            $module_cate=$template->getElementsByTagName('module')->item('0')->nodeValue;
          //  var_dump($title);
            $temp=array();
            if($module){
                if($module==$module_cate){
                $temp['title']=$title;
                $temp['file']=$file;
                $temp['description']=$description;
                $temp['module']=$module_cate;
                $templates[]=$temp;
                }
            }else{
                $temp['title']=$title;
                $temp['file']=$file;
                $temp['description']=$description;
                $temp['module']=$module_cate;
                $templates[]=$temp;
                }
        }

        return $templates;

    }


    /**
     * Menu_model::menu_recursion()
     *
     * @param int $root_id
     * @param array $cols
     * @param array $where
     * @param string $type
     * @param int $cate_id
     * @return string
     */
    public function menu_recursion($root_id,$cols=null,$where=null,$type='select_box',$cate_id=null){
        $content='';
       
          $column_select=(isset($cols))?implode(',',$cols):'*';
          $column_select = $column_select !='*' ? $column_select.',menu_string' : $column_select;
        $this->db->select($column_select)->from('tblmenu')->join('tblmodule','tblmenu.module_id=tblmodule.module_id')->join('tbllang','tblmenu.lang_id=tbllang.lang_id');
        if(isset($where)){
          $this->db->where($where);
        }
        $this->db->where('tblmenu.parent_id',$root_id);
        if(isset($limit)){$this->db->limit($limit,$start);}
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $content.='<option value="'.$rows['menu_id'].'"';
            if($this->input->get('cate')==$rows['menu_id']){$content.='selected="selected"';}
            if(isset($cate_id) AND ($rows['menu_id']==$cate_id)){$content.='selected="selected"';}
            $content.='">';
            switch($rows['menu_level']){
                case'2':$content.='---| ';
                break;
                case '3':$content.='------| ';
                break;
                case '4':$content.='---------| ';
                break;
                case '5':$content.='------------| ';
                break;
                default:break;
            }
            $content.=$rows['menu_title'].'-('.$rows['menu_string'].')</option>';
            $content.=$this->menu_recursion($rows['menu_id'],$cols,$where,$type,$cate_id);

        }
        return $content;

    }

    /**
     * Menu_model::menu_recursive()
     *
     * @param mixed $root_id
     * @param mixed $view
     * @param bool $cols
     * @param bool $where
     * @param mixed $menu_array
     * @return void
     */
    public function menu_recursive($root_id,$template,$cols=false,$where=false,$menu_array=false){
      $content='';
      $column_select=(isset($cols))?implode(',',$cols):'*';
      $this->db->select($column_select)->from('tblmenu')->join('tblmodule','tblmenu.module_id=tblmodule.module_id','left')->join('tbllang','tblmenu.lang_id=tbllang.lang_id');
             if($where){
          $this->db->where($where);
        }
        $this->db->where('tblmenu.parent_id',$root_id);
        $this->db->order_by('tblmenu.menu_queu','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
                $data['menu']=$rows;
                $data['menu_array']=$menu_array;
            $content.=$this->load->view($template,$data,true);
            $content.=$this->menu_recursive($rows['menu_id'],$template,$cols,$where,$menu_array);
        }

        return $content;
    }

    /**
     * Menu_model::load_menu_frontend()
     *
     * @param bool $cols
     * @param bool $where
     * @param bool $start
     * @param bool $limit
     * @param bool $return_array
     * @return
     */
    public function load_menu_frontend($cols=FALSE,$where=FALSE,$start=FALSE,$limit=FALSE,$return_array=FALSE){
        $column_select=($cols)?(is_array($cols)?implode(',',$cols):$cols):"*";
        $this->db->select($column_select)->from('tblmenu')->join('tblmodule','tblmenu.module_id=tblmodule.module_id','left')->join('tbllang','tblmenu.lang_id=tbllang.lang_id');
        $this->db->where('tblmodule.module_active',1);
        $this->db->where('tbllang.lang_active',1);
        $this->db->where('tblmenu.menu_visible',1);
        if(isset($where)){
          $this->db->where($where);
        }
        $this->db->order_by('tblmenu.menu_queu','ASC');
        if(isset($limit)){$this->db->limit($limit,$start);}
         $query=$this->db->get();
        if($return_array){
        return $this->get_array($query);
        }else{
       return $query;
        }
    }
    
    public function get_menu($id)
    {
        $info = $this->load_menu_frontend(false,array('menu_id'=>$id),0,1,true);
        if(count($info)==1){
            $rs=$info['0'];
            $rs['link'] = trim($rs['menu_url'])!='' ? trim($rs['menu_url']) : $this->url_model->emit_cate_url($id);
            return $rs;
        }
        return false;
    }

    /**
     * Menu_model::menu_recursive_frontend()
     *
     * @param mixed $root_id
     * @param bool $cols
     * @param bool $where
     * @param bool $order
     * @return
     */
    public function menu_recursive_frontend($root_id,$cols=FALSE,$where=FALSE,$order=FALSE){
        $col_selects=($cols)?(is_array($cols)?implode(',',$cols):$cols):"*";
        $this->db->select($col_selects)->where(array('tblmenu.parent_id'=>$root_id));
        $this->db->from('tblmenu');
        if($where){
            $this->db->where($where);
        }
        $this->db->join('tblmodule','tblmenu.module_id=tblmodule.module_id');
        $this->db->join('tbllang','tbllang.lang_id=tblmenu.lang_id');
        $this->db->where('tblmodule.module_active',1);
        $this->db->where('tbllang.lang_active',1);
        $this->db->where('tblmenu.menu_visible',1);
        if($order){
            foreach($order as $key=>$value){
                $this->db->order_by($key,$value);
            }
        }

       $query=$this->db->get();
       $menu_array=$this->get_array($query);
       foreach($menu_array as $parent){
        $menu_array=array_merge($menu_array,$this->load_menu_recursive($cols,$parent['menu_id'],$where,$order));
       }

       return $menu_array;

    }



    /**
     * Menu_model::table_menu_recursion()
     *
     * @param mixed $root_id
     * @param bool $cols
     * @param bool $where
     * @return
     */
    public function table_menu_recursion($root_id,$cols=false,$where=false)
    {
          $content='';
          $column_select=($cols)?(is_array($cols)?implode(',',$cols):$cols):'*';
        $this->db->select($column_select)->from('tblmenu')->join('tblmodule','tblmenu.module_id=tblmodule.module_id')->join('tbllang','tblmenu.lang_id=tbllang.lang_id');
        if(($where)){
          $this->db->where($where);
        }
        $this->db->where('tblmenu.parent_id',$root_id);
        $this->db->order_by('tblmenu.menu_queu','ASC');
        $query=$this->db->get();
        foreach($query->result_array() as $rows){
            $content.='<tr><td class="title-cate" style="width:50%">';
               switch($rows['menu_level']){
                case'2':$content.='---| ';
                break;
                case '3':$content.='------| ';
                break;
                case '4':$content.='---------| ';
                break;
                case '5':$content.='------------| ';
                break;
                default:break;
            }
 			$content.=$rows['menu_title'];
            $content.='</td>';
            $content.='<td class="title-module" style="width:29%">'.$rows['module_description'].'</td>';
			$content.='<td class="visible-cate" style="text-align:center;"><img src="html/resources/images/icons/active_'.$rows['menu_visible'].'.gif" width="16" height="16"/></td>';
                $max=$this->get_top('tblmenu','menu_queu',array('parent_id'=>$root_id));

                $min=$this->get_top('tblmenu','menu_queu',array('parent_id'=>$root_id),null,true);

            $content.='<td class="queu">';

            if($rows['menu_queu']>$min){
            $content.='<a href="javascript:void(0)" onclick="cate_up(\''.$rows['menu_id'].'\')"><img src="html/resources/images/up.png" width="24" height="24" alt="up"/></a>';
            }
            $content.='</td>
                       <td class="queu">';
                if($rows['menu_queu']<$max){
                    $content.='<a href="javascript:void(0)" onclick="cate_down(\''.$rows['menu_id'].'\')"><img src="html/resources/images/down.png" width="24" height="24" alt="up"/></a>';
                }
            $content.='</td>
			            <td class="selected last"><input type="checkbox" name="'.$rows['menu_id'].'" value="'.$rows['menu_id'].'"  /></td>
                       </tr>';

            $content.=$this->table_menu_recursion($rows['menu_id'],$cols,$where);
        }
        return $content;

    }


    /**
     * Menu_model::load_menu_recursive()
     *
     * @param bool $cols
     * @param mixed $parent_id
     * @param bool $where
     * @param bool $order
     * @return
     */
    public function load_menu_recursive($cols=false,$parent_id,$where=false,$order=false){
        $col_selects=($cols)?(is_array($cols)?implode(',',$cols):$cols):"*";
        $this->db->select($col_selects)->where(array('tblmenu.parent_id'=>$parent_id));
        $this->db->from('tblmenu');
        if($where){
            $this->db->where($where);
        }
        $this->db->join('tblmodule','tblmenu.module_id=tblmodule.module_id');
        $this->db->join('tbllang','tbllang.lang_id=tblmenu.lang_id');
        if($order){
            foreach($order as $key=>$value){
                $this->db->order_by($key,$value);
            }
        }

       $query=$this->db->get();
       $menu_array=$this->get_array($query);
       foreach($menu_array as $parent){
        $menu_array=array_merge($menu_array,$this->load_menu_recursive($cols,$parent['menu_id'],$where,$order));
       }

       return $menu_array;

    }
    /**
     * Menu_model::up_menu()
     *
     * @param int $menu_id
     * @return void
     * @uses push up menu
     */
    public function up_menu($menu_id){
        $current_queu=$this->get_by_key('tblmenu','menu_queu','menu_id',$menu_id);
        $parent_id=$this->get_by_key('tblmenu','parent_id','menu_id',$menu_id);

        $next_menu=$this->load_menu(array('tblmenu.menu_id','tblmenu.menu_queu'),array('tblmenu.menu_queu < '=>$current_queu,'tblmenu.parent_id'=>$parent_id),0,1,array('tblmenu.menu_queu'=>'DESC'),true);

        if(count($next_menu)==1){
            $this->db->update('tblmenu',array('menu_queu'=>$next_menu['0']['menu_queu']),array('menu_id'=>$menu_id));
            $this->db->update('tblmenu',array('menu_queu'=>$current_queu),array('menu_id'=>$next_menu['0']['menu_id']));
        }

    }

    /**
     * Menu_model::down_menu()
     *
     * @param int $menu_id
     * @return void
     * @uses push down menu
     */
    public function down_menu($menu_id){
        $current_queu=$this->get_by_key('tblmenu','menu_queu','menu_id',$menu_id);
        $parent_id=$this->get_by_key('tblmenu','parent_id','menu_id',$menu_id);

        $next_menu=$this->load_menu(array('tblmenu.menu_id','tblmenu.menu_queu'),array('tblmenu.menu_queu > '=>$current_queu,'tblmenu.parent_id'=>$parent_id),0,1,array('tblmenu.menu_queu'=>'ASC'),true);
        if(count($next_menu)==1){
            $this->db->update('tblmenu',array('menu_queu'=>$next_menu['0']['menu_queu']),array('menu_id'=>$menu_id));
            $this->db->update('tblmenu',array('menu_queu'=>$current_queu),array('menu_id'=>$next_menu['0']['menu_id']));
        }
    }

    /**
     * Menu_model::update_child_menu_recursion()
     *
     * @param int $cate_id
     * @param string $column
     * @param mixed $value
     * @return void
     * @uses Update menu with all child with same value
     */
    public function update_child_menu_recursion($cate_id,$column,$value){
        $childs=$this->load_menu(array('tblmenu.menu_id'),array('tblmenu.parent_id'=>$cate_id),null,null,null,TRUE);
        $this->db->update('tblmenu',array($column=>$value),array('menu_id'=>$cate_id));
        foreach($childs as $child){
            $this->update_child_menu_recursion($child['menu_id'],$column,$value);
        }
    }

       /**
        * Menu_model::update_parent_menu_recursion()
        *
        * @param int $cate_id
        * @param string $column
        * @param mixed $value
        * @return void
        * @uses Update menu with all parents with same value
        */
       public function update_parent_menu_recursion($cate_id,$column,$value){


        $this->db->update('tblmenu',array($column=>$value),array('menu_id'=>$cate_id));
        $parent=$this->get_by_key('tblmenu','parent_id','menu_id',$cate_id);
        if($parent!=0){
            $this->update_parent_menu_recursion($parent,$column,$value);
        }

        }

        public function load_parent_recursion($cate_id){
            $result=$cate_id.'|';
            $parent=$this->get_by_key('tblmenu','parent_id','menu_id',$cate_id);
            if(!empty($parent) && $parent!='0'){$result.=$this->load_parent_recursion($parent).'|';}



            return $result;

        }

        public function get_parent_cate($cate_id,$root_level)
        {
            $level = $this->get_by_key('tblmenu','menu_level','menu_id',$cate_id);
            $parent = $this->get_by_key('tblmenu','parent_id','menu_id',$cate_id);
            if($level <= $root_level){
                return $cate_id;
            }
            else {return $this->get_parent_cate($parent,$root_level);}

        }
        
        function get_id($menu_id)
		{
			$query = $this->db->get_where('tblmenu',array('menu_id'=>$menu_id));
			return $query->row();
		}
        
    /**
     * Menu_model::build_locations_tree()
     * 
     * @param mixed $elements
     * @param integer $parentId
     * @return tree array
     */
    public function build_cate_tree(array $elements,$parentId = 0)
    {
        $cate = array();
        foreach ($elements as $element)
        {
            if ($element['parent_id'] == $parentId) {
                $children = $this->build_cate_tree($elements, $element['menu_id']);
                if ($children)
                {
                    $element['childs'] = $children;
                }
                $cate[] = $element;
            }
        }
        return $cate;
    }        
    
    
  public function get_trees($parentId = 0, $where = false){
    
    $cates = $this->load_menu_recursive(array('menu_id','menu_string','menu_title'),$parentId,$where,array('menu_queu'=>'ASC'));
    return $this->build_cate_tree($cates, $parentId);
  } 
  } 

?>