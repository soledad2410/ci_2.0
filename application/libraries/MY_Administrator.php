<?php
Class MY_Administrator extends CI_Controller{
    public function MY_Administrator(){
        parent::__construct();
        $this->load->helper('url');
        if(!isset($_SESSION['admin'])){redirect('CI_Admin/index');}
    }
    
    
 
} 
?>