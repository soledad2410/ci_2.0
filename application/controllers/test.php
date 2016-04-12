<?php
Class Test extends Public_Controller{
    
    public function index(){
       if(@file_get_contents(base_url().'validate.html')){
        
        
        $doc=new DOMDocument();
        $doc->load(base_url().'validate.html');
        $domains=$doc->getElementsByTagName('domain');
        foreach($domains as $domain){
        $validates=$domain->getElementsByTagName('validate');
        $validate=$validates->item(0)->nodeValue;
        $notices=$domain->getElementsByTagName('notice');
        $notice=$notices->item(0)->nodeValue;
        }
        echo $notice;
        echo $validate;
       
       };
      
    }
    
}
?>