<?php

Class Rss extends Public_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('article_model');
        $this->load->model('menu_model');
        $this->load->model('url_model');
        $this->load->model('counter_model');
        $this->load->model('gallery_model');
        $this->load->library('session');
    }
    
    public function news(){
        $articles_array = $this->article_model->load_article(array('article_id','article_title','article_header'),array('article_visible'=>1),array('tblarticle.article_queu'=>'DESC'),false,false,false,300,0);
        $output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
            <rss version=\"2.0\">
                    <channel>
                        <title>".$this->my_config('web_title')." - Tin Tức</title>
                        <link>".base_url()."</link>
                        <description>".$this->my_config('meta_description')."</description>
                        <docs>http://backend.userland.com/rss092</docs>
                        <language>vi</language>\n";
                        
                        foreach($articles_array->result_array() as $article){
                            $output.="<item><title>".htmlety($article['article_title'])."</title>
                                            <link>".$this->url_model->emit_news_url($article['article_id'])."</link>
                                            <description>".$article['article_header']."</description></item>";
                        }
                        
        $output.="</channel></rss>";
        header("Content-Type: application/rss+xml");
        echo $output;
    }
    
    public function album(){
        $albums_array = $this->menu_model->select_query('tblgallery',array('gallery_id','gallery_title','gallery_description'),false,false,false,false,array('tblgallery.gallery_id'=>'DESC'));
        $output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
            <rss version=\"2.0\">
                    <channel>
                        <title>".$this->my_config('web_title')." - Thu viện Ảnh</title>
                        <link>".base_url()."</link>
                        <description>".$this->my_config('meta_description')."</description>
                        <docs>http://backend.userland.com/rss092</docs>
                        <language>vi</language>\n";
                        
                        foreach($albums_array->result_array() as $album){
                            $output.="<item><title>".htmlety($album['gallery_title'])."</title>
                                            <link>".$this->url_model->emit_album_url($album['gallery_id'])."</link>
                                            <description>".$album['gallery_description']."</description></item>";
                        }
                        
        $output.="</channel></rss>";
        header("Content-Type: application/rss+xml");
        echo $output;
    }
}
?>