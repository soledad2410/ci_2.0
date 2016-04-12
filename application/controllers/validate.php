<?php
Class Validate extends Public_Controller{
    
    
    public function index(){
        $domain=$this->input->get('domain');
        $key=$this->input->get('license');
        $validate='yes';
        $url='';
        $domain_info=$this->config_model->select_query('tbldomain','domain_active',array('domain_name'=>$domain,'domain_key'=>$key));
        if($domain_info->num_rows()<1){
            $validate='no';
            $url=$this->config->item('invalid_domain_license');
       }
        else{
            $info=$this->config_model->get_array($domain_info);
            if($info['0']['domain_active']==0){
                $validate='no';
                $url=$this->config->item('inactive_domain_license');
            }
        }
        header('Content-type: text/xml');
        echo'<?xml version="1.0"?>';
            echo'<domain>';
                echo'<validate>'.$validate.'</validate>';
                echo'<redirect>'.$url.'</redirect>';
            echo'</domain>';
             
    }
}
?>