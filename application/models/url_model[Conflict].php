<?php
Class Url_Model extends Base_model{

    public function __construct(){
        parent::__construct();
        $this->load->model('menu_model');
        $this->load->model('article_model');
        $this->load->model('product_model');

    }


    /**
     * Url_Model::get_cate_url()
     * 
     * @param mixed $cate_items
     * @param bool $page
     * @return void
     * deprecated emit_cate_url
     */
    public function get_cate_url($cate_items,$page = false)
    {   $link = isset($cate_items['menu_url']) ? trim($cate_items['menu_url']) : '';
        if($link != ''){return $link;}
        if(trim($link) != ''){
            return $link;
        }
        if(isset($cate_items['menu_string']))
        {
            list($mod_name,$function)=explode('_',$cate_info['0']['module_name']);
             $url=base_url().trim($cate_info['0']['menu_string']);
             if($page)
             {
                 $url.='_'.$page;
             }
              $url.='.html';
        }
    }


    /**
     * Url_Model::get_news_url()
     * 
     * @param mixed $news_items
     * @param string $lang
     * @return string
     * deprecated emit_news_url
     */
    public function get_news_url($news_items,$lang = 'vi')
    {
        if(isset($news_items['article_title']) && isset($news_items['article_id']))
        {
            $url=base_url().'new/'.$lang.'/a'.$news_items['article_id'].'/'.to_ansi_character($news_items['article_title']).'.html';
            return $url;
        }
    }
    
    /**
     * Url_Model::get_product_url()
     * 
     * @param mixed $product_items
     * @param string $lang
     * deprecated emit_product_url
     * @return void
     */
    public function get_product_url($product_items,$lang = 'vi')
    {
        if(isset($product_items['product_id']) && isset($product_items['product_name']))
        {
            $url=base_url().'pro/'.$lang.'/p'.$product_items['product_id'].'/'.to_ansi_character($product_items['product_name']).'.html';
             return $url;
        }
    }
  public function emit_cate_url($cate_id,$page=false){
        if($cate_id=='0' || $cate_id==''){return base_url();}
        $link = $this->get_by_key('tblmenu','menu_url','menu_id',$cate_id);
        if(trim($link) != ''){
            return $link;
        }
        $cate_info=$this->menu_model->load_menu(array('tblmenu.menu_title','tblmenu.menu_string','tblmodule.module_name','tbllang.lang_shortname'),array('tblmenu.menu_id'=>$cate_id),null,null,null,true);
        if(count($cate_info)==1){
            list($mod_name,$function)=explode('_',$cate_info['0']['module_name']);
            $url=base_url().trim($cate_info['0']['menu_string']);
            if($page){
                $url.='_'.$page;
            }
            $url.='.html';
             //if($cate_info['0']['module_name']=='contact_index'){$url=base_url().'contact/'.$cate_info['0']['lang_shortname'].'/c'.$cate_id.'/'.to_ansi_character($cate_info['0']['menu_title']).'.html';}
            return $url;
        }

    }

    /**
     * Lib::emit_news_url()
     *
     * @param mixed $news_id
     * @return void
     */
    public function emit_news_url($news_id){
        $news_info=$this->article_model->load_article_frontend(array('tblarticle.article_title','tbllang.lang_shortname','tblmodule.module_name'),array('tblarticle.article_id'=>$news_id),FALSE,FALSE,TRUE);
        if(count($news_info)==1){
            $url=base_url().'new/'.$news_info['0']['lang_shortname'].'/a'.$news_id.'/'.to_ansi_character($news_info['0']['article_title']).'.html';
            return $url;
        }

    }

public function emit_media_url($media,$lang = vi)
{
    if(isset($media['media_id']) && isset($media['media_title']))
    {
        return '/gallery/mediadetails/'.$lang.'/'.$media['media_id'].'/'.to_ansi_character($media['media_title']);
    }
}
    /**
     * Url_Model::emit_product_url()
     *
     * @param mixed $product_id
     * @return
     */
    public function emit_product_url($product_id){
        $product_info=$this->product_model->load_product_frontend(array('tblproduct.product_name','tbllang.lang_shortname','tblmodule.module_name'),array('tblproduct.product_id'=>$product_id),FALSE,FALSE,TRUE);
        if(count($product_info)==1){
            $url=base_url().'pro/'.$product_info['0']['lang_shortname'].'/p'.$product_id.'/'.to_ansi_character($product_info['0']['product_name']).'.html';
            return $url;
        }
    }

    /**
     * Url_Model::emit_album_url()
     *
     * @param mixed $gallery_id
     * @return
     */
    public function emit_album_url($gallery_id){
        $join = array('tblmenu' => 'tblmenu.menu_id=tblgallery.menu_id', 'tbllang' => 'tbllang.lang_id=tblmenu.lang_id');
        $where = array('tblmenu.menu_visible' => 1, 'gallery_id' => $gallery_id);
        $select = array ('gallery_id', 'gallery_title', 'lang_shortname');
        $info = $this->menu_model->select_query('tblgallery', $select, $where, $join, 0, 1, false, true);
        
        if(count($info) == 1) {
        $url=base_url().'gallery/'.$info['0']['lang_shortname'].'/a'.$gallery_id.'/'.to_ansi_character($info['0']['gallery_title']).'.html';
        return $url;
        }

    }

    /**
     * Url_Model::emit_page_list()
     *
     * @param bool $cate_id
     * @param mixed $total
     * @param mixed $limit
     * @param mixed $current_page
     * @param bool $url
     * @return
     */
    public function emit_page_list($cate_id=FALSE,$total,$limit,$current_page,$url=FALSE){
    $list='';
    $page=1;
    if($limit>0){
        $page=ceil($total/$limit);
    }
    if($page>1){

        $list.='<ul>';
        for($i=1;$i<=$page;$i++){
            if($i==$current_page){
                if($url){$list.='<li class="current"><a href="'.$url.'page='.$i.'">'.$i.'</a></li>';}else{
                $list.='<li class="current"><a href="'.$this->emit_cate_url($cate_id,$i).'">'.$i.'</a></li>';
                }
            }
            else{
                if($url){$list.='<li><a href="'.$url.'page='.$i.'">'.$i.'</a></li>';}else{
                $list.='<li><a href="'.$this->emit_cate_url($cate_id,$i).'">'.$i.'</a></li>';
                }
            }
        }
        $list.='</ul>';
    }
    return $list;
    }
    /**
  * Url_Model::emit_page_search_list()
  * 
  * @param mixed $total
  * @param mixed $limit
  * @param mixed $current_page
  * @return
  */
 public function emit_page_search_list($total,$limit,$current_page,$url){
    $list='';
    $page=1;
    if($limit>0){
        $page=ceil($total/$limit);
    }
    if($page>1){
        //$url.='?page='.$page;
        $list.='<div class="pages">';
        $list.='<ul class="page">';
        $get_page=$this->input->get('page')?($this->input->get('page')):1;
        if($get_page != 1){$list.='<li><a href="'.$url.'page=1&">'."&lt;&lt;".'</a></li>';}
        if(($get_page -1)>0){
           $list.='<li><a href="'.$url.'page='.($get_page-1).'&">'."&lt;".'</a></li>'; 
        }
        for($i=1;$i<=$page;$i++){
            if($i>($get_page-2) && $i<($get_page+2)){
                if($i==$current_page){
                $list.='<li class="current"><a href="'.$url.'page='.$i.'&">'.$i.'</a></li>';
                }
                else{
                    $list.='<li><a href="'.$url.'page='.$i.'&">'.$i.'</a></li>';
                }   
            }
        }
        if(($get_page +1) <= $page){
           $list.='<li><a href="'.$url.'page='.($get_page+1).'&">'."&gt;".'</a></li>'; 
        }
        if($get_page != $page){$list.='<li><a href="'.$url.'page='.$page.'&">'."&gt;&gt;".'</a></li>';}
        $list.='</ul>'; 
        $list.='</div>';   
    }
    return $list;   
    }
  /**
   * Url_Model::emit_breadcrumb()
   *
   * @return
   */


/**
 * Url_Model::emit_cate_breadcrumb()
 *
 * @param mixed $cate_id
 * @param bool $options
 * @return
 */
function generate_breadcrumb($cate_id){

    $string='';
   $cate_array=explode('|',$this->menu_model->load_parent_recursion($cate_id));
  // var_dump($cate_array);
    $cate_array=array_reverse($cate_array);
   $cate_array=array_unique($cate_array);
    $rs = array();
    foreach($cate_array as $cate) {
        $title = 'Trang chủ';
        if ($cate != 0) {
            $title = $this->menu_model->get_by_key('tblmenu', 'menu_title', 'menu_id', $cate);
        }
        $rs[] = array('title' => $title, 'link' => $this->emit_cate_url($cate));
    }
    return $rs;
}
function emit_sitemap($lang){
    $menu_array=$this->menu_model->load_menu_recursive(array('tblmenu.menu_id','tblmenu.menu_title'),0,array('tbllang.lang_shortname'=>$lang,'tblmenu.menu_visible'=>1),array('tblmenu.menu_queu'=>'DESC'));
    $article_array=$this->article_model->load_article_recursive(array('tblarticle.article_id','tblarticle.article_title'),0,array('tblmenu.menu_visible'=>1,'tbllang.lang_shortname'=>$lang,'tblarticle.article_visible'=>1),false,false,false,false,array('tblarticle.article_queu'=>'DESC'));
    $product_array=$this->product_model->load_product(array('tblproduct.product_id'),false,false,false,false,array('tblmenu.menu_visible'=>1,'tbllang.lang_shortname'=>$lang,'tblproduct.product_visible'=>1),false,false,false,array('tblproduct.product_queu'=>'DESC'));
    
    $output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
                <urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"
                xmlns:image=\"http://www.google.com/schemas/sitemap-image/1.1\"
                xmlns:video=\"http://www.google.com/schemas/sitemap-video/1.1\">";
    foreach($menu_array as $menu){
        $output.="<url><loc>".$this->emit_cate_url($menu['menu_id'])."</loc></url>";
    }
    
    foreach($article_array->result_array() as $news){
        $output.="<url><loc>".$this->emit_news_url($news['article_id'])."</loc></url>";
    }
    
    foreach($product_array->result_array() as $pro){
        $output.="<url><loc>".$this->emit_product_url($pro['product_id'])."</loc></url>";
    }
    
    $output .= "</urlset>";
    $this->creatfile('sitemap.xml',$output);
}

function creatfile($path,$value)
{
    $fp=fopen($path,'w+');
    fwrite($fp,$value);
    fclose($fp);
}
   
function ping_yahoo($url_xml){
    $service="http://search.yahooapis.com/SiteExplorerService/V1/updateNotification?appid=YahooDemo&url={$url_xml}";
    return file_get_contents($service);
}
function ping_bing($url_xml){
    $service="http://www.bing.com/webmaster/ping.aspx?siteMap={$url_xml}";
    return file_get_contents($service);
}

function submit_google_url($url_submit){
    $url=rawurlencode($url_submit);
    $service="http://blogsearch.google.com/ping?url={$url}&btnG=Submit+Blog&hl=en";
    return file_get_contents($service);
    
}

/**
 * Url_Model::auto_tag()
 *
 * @param mixed $tag_array
 * @param mixed $content
 * @param mixed $link
 * @return
 */
function auto_tag($tag_array,$content,$link){

    $char_list=array('À'=>'&Agrave;', 'à'=>'&agrave;', 'Á'=>'&Aacute;', 'á'=>'&aacute;', 'Â'=>'&Acirc;', 'â'=>'&acirc;', 'Ã'=>'&Atilde;', 'ã'=>'&atilde;', 'Ä'=>'&Auml;', 'ä'=>'&auml;', 'Å'=>'&Aring;', 'å'=>'&aring;', 'Æ'=>'&AElig;', 'æ'=>'&aelig;', 'Ç'=>'&Ccedil;', 'ç'=>'&ccedil;', 'Ð'=>'&ETH;', 'ð'=>'&eth;', 'È'=>'&Egrave;', 'è'=>'&egrave;', 'É'=>'&Eacute;', 'é'=>'&eacute;', 'Ê'=>'&Ecirc;', 'ê'=>'&ecirc;', 'Ë'=>'&Euml;', 'ë'=>'&euml;', 'Ì'=>'&Igrave;', 'ì'=>'&igrave;', 'Í'=>'&Iacute;', 'í'=>'&iacute;', 'Î'=>'&Icirc;', 'î'=>'&icirc;', 'Ï'=>'&Iuml;', 'ï'=>'&iuml;', 'Ñ'=>'&Ntilde;', 'ñ'=>'&ntilde;', 'Ò'=>'&Ograve;', 'ò'=>'&ograve;', 'Ó'=>'&Oacute;', 'ó'=>'&oacute;', 'Ô'=>'&Ocirc;', 'ô'=>'&ocirc;', 'Õ'=>'&Otilde;', 'õ'=>'&otilde;', 'Ö'=>'&Ouml;', 'ö'=>'&ouml;', 'Ø'=>'&Oslash;', 'ø'=>'&oslash;', 'Œ'=>'&OElig;', 'œ'=>'&oelig;', 'ß'=>'&szlig;', 'Þ'=>'&THORN;', 'þ'=>'&thorn;', 'Ù'=>'&Ugrave;', 'ù'=>'&ugrave;', 'Ú'=>'&Uacute;', 'ú'=>'&uacute;', 'Û'=>'&Ucirc;', 'û'=>'&ucirc;', 'Ü'=>'&Uuml;', 'ü'=>'&uuml;', 'Ý'=>'&Yacute;', 'ý'=>'&yacute;', 'Ÿ'=>'&Yuml;', 'ÿ'=>'&yuml;');
    foreach($tag_array as $tag){
        foreach($char_list as $key=>$value){
            $tag=str_replace($key,$value,$tag);
        }
      $content=str_replace($tag,'<a href="'.$link.'?tag='.$tag.'" title="'.$tag.'">'.$tag.'</a>',$content);
    }
    return $content;
}

function emit_promotion_url($promot_id)
{
    $info = $this->product_model->select_query('tblpromotions', false, array('promot_id' => $promot_id),
                                                array('tblproduct'=>'tblproduct.product_id=tblpromotions.product_id'),
                                                false,false, false, true);
    if(count($info) != 1){redirect(base_url());}
    else {
        return base_url() . 'promo/vi/a' . $promot_id . '/' . to_ansi_character($info['0']['promot_title']) . '.html';
    }                                                
}

}
?>