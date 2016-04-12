<?php
Class Email_Model extends Base_model{
    function __construct(){
        parent::__construct();
    
    }
    
    public function smtp_sendmail($from,$name,$to,$subject,$message,$html_body = false){
        $mailtype = 'text';
        if($html_body){
            $mailtype = 'html';
        }
        
        /*
        $config = Array(
            'protocol' => 'smtp',
                    'smtp_host' => 'smtp.gmail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'vietddbk@gmail.com',
                    'smtp_pass' => '127Viet@',
                    'mailtype'  => $mailtype, 
                    'charset' => 'utf-8',
                    'wordwrap' => TRUE
            
                );
        $this->load->library('email',$config);
        */
        
        $config = Array('protocol' => 'smtp');
        $this->email->set_mailtype($mailtype);
                    
        $this->load->library('email',$config);   
        $this->email->from($from, $name);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        
        $this->email->send();
        
        //echo $this->email->print_debugger();
    }
    
    public function php_sendmail($from,$to,$subject,$message,$html_body=false){
        $header='';
        if($html_body){
            $header = "Content-type: text/html; charset=utf-8\r\nFrom: $from\r\nReply-to: $from";
        }
        
        mail($to,$subject,$message,$header);
    }
    
}
?>