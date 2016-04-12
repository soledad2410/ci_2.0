<?php
Class Breadcrumb_Model extends Base_model{
    
    private $_news;
    private $_product;
    private $_cate;
    public function __construct(){
        parent::__construct();
        $this->load->model('menu_model');
        
    }
    
    
  function emit_breadcrumb(){
    $string='';
    $module=$this->uri->rsegment(1);
    $function=$this->uri->rsegment(2);
    $id=$this->uri->rsegment(3);
    
    $page=$module.'_'.$function;
    if($page=='home_index'){return $string;}
    $check_is_cate_page=($this->get_by_key('tblmodule','module_menu','module_name',$page)==1)?TRUE:FALSE;
    if($check_is_cate_page){return '<ul>'.$this->emit_cate_breadcrumb($id).'</ul>';}
    $string.='<ul>';
    switch($page){
        case 'news_details':
        $news_info=$this->select_query('tblarticle',array('menu_id','article_title'),array('article_id'=>$id),FALSE,FALSE,FALSE,FALSE,TRUE);
        $string.=$this->emit_cate_breadcrumb($news_info['0']['menu_id'],FALSE);
        $string.='<li class="visited"><a href="'.$this->emit_news_url($id).'" title="'.$news_info['0']['article_title'].'">'.$news_info['0']['article_title'].'</a></li>';
        
        break;
        case 'product_details':
        $product_info=$this->select_query('tblproduct',array('menu_id','product_name'),array('product_id'=>$id),FALSE,FALSE,FALSE,FALSE,TRUE);
        $string.=$this->emit_cate_breadcrumb($product_info['0']['menu_id'],FALSE);
        $string.='<li class="visited"><a href="'.$this->emit_product_url($id).'" title="'.$product_info['0']['product_name'].'">'.$product_info['0']['product_name'].'</a></li>';
        break;
        default:
        $string.='<li><a href="'.base_url().'" title="Trang chủ">Trang chủ</a></li>';
        $title=$this->get_by_key('tblmodule','module_description','module_name',$page);
        $string.='<li class="visited"><a href="'.$_SERVER['REQUEST_URI'].'" title="'.$title.'">'.$title.'<a></li>';
    }
    $string.='</ul>';
    
    return $string;
    
    
    
    
}

function emit_cate_breadcrumb($cate_id,$options=TRUE){
    $string='';
   $cate_array=explode($this->obj->menu_model->load_parent_recursion($cate_id));
    $cate_array=array_reverse('|',$cate_array);
    foreach($cate_array as $cate){
    $title='Trang chủ';
    if($cate!=0){$title=$this->menu_model->get_by_key('tblmenu','menu_title','menu_id',$cate);}
    if($cate=$cate_id){    
        $string.='<li class="visited"><a href="'.$this->emit_cate_url($cate).'" title="'.$title.'">'.$title.'</a></li>';
        }else{
            $string.='<li><a href="'.$this->emit_cate_url($cate).'" title="'.$title.'">'.$title.'</a></li>';
        }
    }    
    return $string;
}
}
?>