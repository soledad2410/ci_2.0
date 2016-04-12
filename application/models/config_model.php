<?php
Class Config_model extends Base_model{

    function __construct(){
        parent::__construct();
        $this->load->helper('form');
    }

    /**
     * Base_model::load_config()
     *
     * @param array $cols
     * @param array $where
     * @return void
     */
    public function load_config($cols=false,$where=false,$return_array=false){
        $col_select=($cols)?(is_array($cols)?implode(',',$cols):$cols):"*";
        $this->db->select($col_select)->from('tblconfig')->where($where);
        $query=$this->db->get();
        if($return_array){
            return $this->get_array($query);
        }
        else{return $query;}

    }

    public function emit_config_field($config_id,$lang){
        
      $config_info=$this->load_config(false,array('tblconfig.config_id'=>$config_id),true);
      $config=$config_info['0'];
      $field='<div class="field">
							<div class="label">
								<label for="autocomplete">'.$config['config_title'].'</label>
						</div>

					';
      switch($config['config_type']){
        case 'textbox':
           $field.='<div class="input" style="margin-left:270px">';
           $field.='<input type="text" size="60" value="'.form_prep($this->get_by_key('tblconfigvalue','config_value',NULL,NULL,array('tblconfigvalue.lang_shortname'=>$lang,'tblconfigvalue.config_id'=>$config_id))).'" id="'.$config['config_id'].'" name="'.$config['config_id'].'">';
           $field.='</div>';
        break;
                case 'number':
           $field.='<div class="input" style="margin-left:270px">';
           $field.='<input type="text" size="20" class="numbered_field" value="'.form_prep($this->get_by_key('tblconfigvalue','config_value',NULL,NULL,array('tblconfigvalue.lang_shortname'=>$lang,'tblconfigvalue.config_id'=>$config_id))).'" id="'.$config['config_id'].'" name="'.$config['config_id'].'">';
           $field.='</div>';
        break;
        case 'textarea':
            $field.='<div class="input" style="margin-left:270px"> ';
            $field.='<textarea name="'.$config['config_id'].'" id="'.$config['config_id'].'" rows="3" cols="70">'.form_prep($this->get_by_key('tblconfigvalue','config_value',NULL,NULL,array('tblconfigvalue.lang_shortname'=>$lang,'tblconfigvalue.config_id'=>$config_id))).'</textarea>';
            $field.='</div>';
        break;
       case 'checkbox':
            $field_array=explode('|',$config['config_prototype']);
           foreach($field_array as $prototype){
            if(trim($prototype)!=''){
            list($label,$value)=explode(':',$prototype);
            $field.='<div class="input" style="margin-left:270px">';
            $field.='<input type="checkbox" id="'.$config['config_id'].'" name="'.$config['config_id'].'" value="'.$value.'" ';
                   //if(form_prep($this->get_by_key('tblconfigvalue','config_value',NULL,NULL,array('tblconfigvalue.lang_shortname'=>$lang,'tblconfigvalue.config_id'=>$config_id)))==$value){
                    $field.='checked="checked"';
                    $field.='disabled="disabled"';
                    //}
            $field.=' />';

         $field.='<span>'.$label.'</span>';
            $field.='</div>';
                }
            }
       break;
       case 'password':
       $field.='<div class="input" style="margin-left:270px">';
       $field.='<input type="password" size="60" value="'.form_prep($this->get_by_key('tblconfigvalue','config_value',NULL,NULL,array('tblconfigvalue.lang_shortname'=>$lang,'tblconfigvalue.config_id'=>$config_id))).'" id="'.$config['config_id'].'" name="'.$config['config_id'].'">';
       $field.='</div>';
       break;
       case 'radio':
            $field_array=explode('|',$config['config_prototype']);
            foreach($field_array as $prototype){
            if(trim($field)!=''){
            list($label,$value)=explode(':',$prototype);
            $field.='<div class="input">';
            $field.='<input type="radio" id="'.$config['config_id'].'" name="'.$config['config_id'].'" value="'.$value.'" ';
                    if(form_prep($this->get_by_key('tblconfigvalue','config_value',NULL,NULL,array('tblconfigvalue.lang_shortname'=>$lang,'tblconfigvalue.config_id'=>$config_id)))==$value){$field.='checked="checked"';}
            $field.=' />';
            $field.='<span>'.$label.'</span>';
            $field.='</div>';
                }
            }
       break;

       case 'filefield':
           $field.='<div class="input" style="margin-left:270px">';
           $field.='<input type="text" size="60" value="'.form_prep($this->get_by_key('tblconfigvalue','config_value',NULL,NULL,array('tblconfigvalue.lang_shortname'=>$lang,'tblconfigvalue.config_id'=>$config_id))).'" id="'.$config['config_id'].'" name="'.$config['config_id'].'">';
           $field.='<input type="button" onclick="get_ck(\''.$config['config_id'].'\')" value="Chọn file">';
           $field.='</div>';
       break;
       case 'ckeditor':
           $field.='<div class="input" style="margin-left:270px">';
           $field.='<textarea name="'.$config['config_id'].'" class="text-editor" id="'.$config['config_id'].'">'.form_prep($this->get_by_key('tblconfigvalue','config_value',NULL,NULL,array('tblconfigvalue.lang_shortname'=>$lang,'tblconfigvalue.config_id'=>$config_id))).'</textarea>';
           $field.='</div>
           <script type="text/javascript">
           initCKeditor(\''.$config['config_id'].'\');

           </script>

           ';
       break;
      }
     $field.='</div>';
     return $field;
    }

    }
?>