<?php

Class Galleries extends Admin_Controller{


public function __construct(){
    parent::__construct();
    $this->load->model('menu_model');
}

/**
 * Gallery::index()
 *
 * @return void
 */
public function index()
{
$data['title'] = 'Trang quản lý album ảnh';
$message = '';
$select_cols = ['gallery_name', 'gallery_title', 'gallery_id', 'menu_title', 'tblmenu.menu_id' ,'gallery_time','type','gallery_image'];
$join = array('tblmenu' => 'tblmenu.menu_id=tblgallery.menu_id','tbllang'=>'tblmenu.lang_id=tbllang.lang_id');
$where = ['tbllang.lang_shortname'=>$this->my_lang,'tblmenu.domain_id'=>$this->domain_id] ;
$url = base_url() . 'admin/galleries.html?';
if ($this->input->get('menu_id')) {$where = array('tblgallery.menu_id' => $this->input->get('menu_id'));$url .= 'menu_id=' . $this->input->get('menu_id') . '&'; }
$data['url'] = $url;
$total  = $this->menu_model->select_query('tblgallery', $select_cols, $where ,$join)->num_rows();
$limit = 20;
$current_page = ($this->input->get('page')) ? $this->input->get('page') : 1;
$start = ($current_page - 1) * $limit;
if ($this->input->post('token') && ($this->input->post('token') == $_SESSION['token']))
{
   $insert_data = $this->input->post();
   $insert_data['gallery_time'] = time();
           $id = $this->menu_model->insert_data('tblgallery', $insert_data,true);
            if ($id) {
               // echo $id;
                $message = admin_success('Thêm mới album ảnh thành công');
            }
        }
   

$data['menus'] = $this->menu_model->load_menu(array('menu_id', 'menu_title') ,array('module_name' => 'gallery_cate','tbllang.lang_shortname'=>$this->my_lang,'tblmenu.domain_id'=>$this->domain_id));
$data['total'] = $total;
$token = md5(uniqid(rand(), true));
$_SESSION['token']=$token;
$data['token']=$token;
$data['page'] = page_count($total,$limit);
$data['message'] = $message;
$data['current_page'] = $current_page;
$data['list_gallery'] = $this->menu_model->select_query('tblgallery', $select_cols, $where, $join, $start, $limit, array('gallery_time' => 'DESC'));
$this->load->view('back_end/gallery/index_gallery',$data);
}

/**
 * Gallery::album()
 *
 * @param mixed $gallery_id
 * @return void
 */
public function album($gallery_id)
{
$album_info = $this->menu_model->select_query('tblgallery', array('gallery_name','type','gallery_desc','gallery_image', 'gallery_id', 'gallery_title', 'tblmenu.menu_id', 'menu_title'), array('gallery_id' => $gallery_id), array('tblmenu' => 'tblmenu.menu_id=tblgallery.menu_id'),false,false,false,true);
$message = '';
if (count($album_info) != 1) {redirect(base_url() . 'admin/gallery');}
if($album_info['0']['type'] == 'panorama'){
    redirect('/admin/galleries/panorama/'.$gallery_id);
}
$data['menus'] = $this->menu_model->load_menu(array('menu_id', 'menu_title') ,array('module_name' => 'gallery_cate','tbllang.lang_shortname'=>$this->my_lang));
$data['title'] = 'Quản lý album ' . $album_info['0']['gallery_title'];
if($this->input->post('token'))
{
    $update_data = $this->input->post();
   
    if ($this->menu_model->update_data('tblgallery', $update_data, array('gallery_id' => $gallery_id))){
        $message= admin_success('Cập nhập thông tin album thành công');
    } else {$message = admin_error('Có lỗi xảy ra, cập nhập thông album ảnh thất bại');}
}

$data['message'] = $message;
$album_info = $this->menu_model->select_query('tblgallery', array('gallery_name','gallery_desc','gallery_image', 'gallery_id', 'gallery_title', 'tblmenu.menu_id', 'menu_title'), array('gallery_id' => $gallery_id), array('tblmenu' => 'tblmenu.menu_id=tblgallery.menu_id'),false,false,false,true);
$data['contents'] = $this->menu_model->select_query('tblmedia',false,['gallery_id' => $gallery_id]);
$data['album'] = $album_info['0'];
$token = md5(uniqid(rand(), true));
$_SESSION['token']=$token;
$data['token']=$token;
$this->load->view('back_end/gallery/album',$data);
}

public function edit_media($id){
    $data['title'] = 'Sửa thông tin nội dung album';
    $media = $this->menu_model->get_row_array('tblmedia',['media_id'=>$id]);
    $message = '';
    if($this->input->post('media_id'))
    {
        $update_data = $this->input->post();
        if($this->menu_model->update_data('tblmedia',$update_data,['media_id'=>$this->input->post('media_id')]))
        {
            flash_data(admin_success('Cập nhập thông tin thành công'));
        } else {
            flash_data(admin_error('Có lỗi xảy ra, cập nhập thông tin thất bại'));
        }
        
    }
    $data['media'] = $media;
    $this->load->view('back_end/gallery/edit_media',$data);
}
/**
 * Gallery::delete_image()
 *
 * @return void
 */
public function delete_image(){
$image = $this->input->get('image');
$files = $this->menu_model->get_by_key('tblmedia','media_url','media_id',$image);
list($file,$type) = explode('.',$files);
$thumb_file = $file . '_120_120.' .  $type;
$temp = substr($thumb_file,13);
$thumb_file = 'upload/images/thumbs' . $temp;
if (file_exists($files)) {unlink($files);}
if (file_exists($thumb_file)) {unlink($thumb_file);}
$this->menu_model->db->delete('tblmedia',['media_id'=>$image]);
//echo $thumb_file;
echo 0;

}

public function delete_album($album_id)
{
$album_name = $this->menu_model->get_by_key('tblgallery','gallery_name', 'gallery_id', $album_id);
$album_dir = 'upload/images/gallery/' .$album_name;
$album_thumb_dir = 'upload/images/thumbs/gallery/' . $album_name;

$this->menu_model->db->delete('tblgallery',array('gallery_id' => $album_id));
if(file_exists($album_dir)){
    delete_files($album_dir,true);
    rmdir($album_dir);
    delete_files($album_thumb_dir,true);
    rmdir($album_thumb_dir);
}
header('location:' . $_SERVER['HTTP_REFERER']);
}



public function upload()
{
 
 if($this->input->post())
 {
    $insert_data = $this->input->post();
    $this->menu_model->insert_data('tblmedia',$insert_data);
 }

    redirect($_SERVER['HTTP_REFERER'].'#gallery');

}


   /**
     * Article::comment()
     *
     * @return void
     */
    public function comment()
    {

        $url = 'admin/galleries/comment.html?';
        $cond = '';
       $where  = [];
        if ($this->input->get('gallery_id'))
        {
            $cond .= "gallery_id=" . $this->input->get('gallery_id') . "&";
            $where = array_merge($where, array('tblgallery.gallery_id' => $this->input->get('gallery_id')));
        }
        if ($this->input->get('from'))
        {
            $cond .= "from=" . $this->input->get('from') . "&";
            list($day, $month, $year) = explode('-', $this->input->get('from'));
            $from_time = mktime(0, 0, 0, $month, $day, $year);
            $where = array_merge($where, array('tblgallerycomment.comment_date > ' => $from_time));
        }
        if ($this->input->get('to'))
        {
            $cond .= "to=" . $this->input->get('to') . "&";
            list($day, $month, $year) = explode('-', $this->input->get('to'));
            $to_time = mktime(23, 59, 59, $month, $day, $year);
            $where = array_merge($where, array('tblgallerycomment.comment_date < ' => $to_time));
        }
        if ($this->input->get('keyword'))
        {
            $cond .= "keyword=" . $this->input->get('keyword') . "&";
            $where = array_merge($where, array('tblgallerycomment.comment_title LIKE ' => '%' . urldecode($this->input->get('keyword')) . '%'));

        }
        if ($this->input->get('limit'))
        {
            $cond .= "limit=" . $this->input->get('limit') . "&";
        }
        $join_array = array('tblgallery' => 'tblgallery.gallery_id=tblgallerycomment.gallery_id');
        $data['title'] = "Quản lý album - Bình luận album";
        $total = $this->menu_model->select_query('tblgallerycomment', 'comment_id', false, $join_array)->num_rows();

        $page = ($this->input->get('page')) ? $this->input->get('page') : 1;
        $limit = ($this->input->get('limit')) ? $this->input->get('limit') : 10;
        $select_array = false;


        $total_page = page_count($total, $limit);
        $data['comments'] = $this->menu_model->select_query('tblgallerycomment', $select_array, $where, $join_array, ($page - 1) * $limit, $limit, array('tblgallerycomment.comment_date' => 'DESC'));
        $data['page'] = $total_page;
        $data['result_from'] = ($page - 1) * $limit;
        $data['result_to'] = $page * $limit;
        $data['total_all'] = $total;
        $data['current_page'] = $page;
        $data['url'] = $url . $cond;

        $this->load->view('back_end/gallery/comment', $data);
        //

    }

    /**
     * Article::view_comment()
     *
     * @param mixed $id
     * @return void
     */
    public function view_comment($id)
    {
        $data['title'] = "Quản lý album - Xem bình luận album";
        $comment_info = $this->menu_model->select_query('tblgallerycomment', false, array('comment_id' => $id), array('tblgallery' => 'tblgallery.gallery_id=tblgallerycomment.gallery_id'));
        if ($comment_info->num_rows() == 0)
        {
            redirect(base_url() . 'admin/gallerties/comment.html');
        }
        $comment = $this->menu_model->get_array($comment_info);
        $data['comment'] = $comment['0'];
        $this->menu_model->db->update('tblgallerycomment', array('comment_read' => 1), array('comment_id' => $id));
        $this->load->view('back_end/gallery/view_comment', $data);

    }

    /**
     * Article::save_comment()
     *
     * @return void
     */
    public function save_comment()
    {
        $this->menu_model->db->update('tblgallerycomment', $this->input->post(), array('comment_id' => $this->input->post('comment_id')));
        echo 0;
    }


    /**
     * Article::delete_comment()
     *
     * @param bool $id
     * @return void
     */
    public function delete_comment($id=FALSE)
    {
        if ($id)
        {
            $this->menu_model->db->delete('tblgallerycomment', array('comment_id' => $id));
            redirect(base_url() . 'admin/galleries/comment.html');
        }

        foreach ($this->input->post() as $key => $value)
        {
            $this->menu_model->db->delete('tblgallerycomment', array('comment_id' => $value));
        }
    }

    /**
     * Article::active_comment()
     *
     * @return void
     */
    public function active_comment()
    {
        foreach ($this->input->post() as $key => $value)
        {
            $this->menu_model->db->update('tblgallerycomment', array('comment_visible' => 1), array('comment_id' => $value));
        }
    }
    /**
     * Article::deactive_comment()
     *
     * @return void
     */
    public function deactive_comment()
    {
        foreach ($this->input->post() as $key => $value)
        {
            $this->menu_model->db->update('tblgallerycomment', array('comment_visible' => 0), array('comment_id' => $value));
        }
    }
    
    public function edit_panorama($album_id)
    {
        $data['title'] = 'Panorama editor';
        
        if($this->input->post('pan'))
        {   
            $pans = $this->input->post('pan');
            $tilts = $this->input->post('tilt');
            $froms = $this->input->post('from');
            $to = $this->input->post('to');
            $captions = $this->input->post('caption');
            $data = [];
            for($i = 0;$i<count($pans);$i++){
                $data[] = ['pan'=>$pans[$i],'tilt'=>$tilts[$i],'from'=>$froms[$i],'to'=>$to[$i],'caption'=>$captions[$i]];
            } 
            $hotspot = json_encode($data);
            $this->menu_model->update_data('tblgallery',['hotspots'=>$hotspot,'default'=>$this->input->post('default')],['gallery_id'=>$album_id]);
            flash_data(admin_success('Cập nhập thành công'));
        }
    if($this->input->post('default') && !$this->input->post('pan'))
    {
          $this->menu_model->update_data('tblgallery',['default'=>$this->input->post('default')],['gallery_id'=>$album_id]);
            flash_data(admin_success('Cập nhập thành công'));
    }
        if($this->input->post('map'))
        {
            $update['map'] = $this->input->post('map');
            if($this->input->post('pano')){
                $panos = $this->input->post('pano');
                $x_coords = $this->input->post('x');
                $y_coords = $this->input->post('y');
                $data = [];
                for($i=0;$i<count($panos);$i++)
                {
                    $data[] = ['pano'=>$panos[$i],'x'=>$x_coords[$i],'y'=>$y_coords[$i]];
                }
                $update['waypoints']=json_encode($data);
            }
            $this->menu_model->update_data('tblgallery',$update,['gallery_id'=>$album_id]);
            flash_data(admin_success('Cập nhập thành công'));
        }
         $album = $this->menu_model->get_row_array('tblgallery',['gallery_id'=>$album_id]);
        $data['hotspots'] = json_decode($album['hotspots']);
         
        $data['pano'] = $album;
        $data['title'] = 'Quản lý album panorama ' . $album['gallery_title'];
        $pano_dir ='upload/panoramas/' . $album['gallery_name']; 
        $items  = array_diff(scandir($pano_dir), array('..', '.'));
        
       $data['dir'] = $pano_dir;
        $map_checker = json_decode($album['waypoints']);
        $data['album'] =  $album;
        $data['items'] = $items;
        $data['waypoints'] = $map_checker; 
   
        $this->load->view('back_end/gallery/panorama/pano_editor',$data);
    }
    
    
public function panorama($album_id)
    {
    
    
    if($this->input->post('token'));
    {
        $update_data = $this->input->post();
       
        if($update_data)
        {
            if ($this->menu_model->update_data('tblgallery', $update_data, array('gallery_id' => $album_id))){
                $message= admin_success('Cập nhập thông tin album thành công');
            } else {$message = admin_error('Có lỗi xảy ra, cập nhập thông album ảnh thất bại');}
        }
    }
    $info = $this->menu_model->get_row_array('tblgallery',['gallery_id'=>$album_id,'type'=>'panorama']);
    $pano_dir ='upload/panoramas/' . $info['gallery_name']; 
    $data['title'] = 'Quản lý album panorama ' . $info['gallery_title'];
    $items  = array_diff(scandir($pano_dir), array('..', '.'));
    $data['items'] = $items;
    $data['album'] = $info;
    $data['dir'] = $pano_dir;
    $token = md5(uniqid(rand(), true));
    $_SESSION['token']=$token;
    $data['token']=$token;
      
    $this->load->view('back_end/gallery/panorama/index',$data);
}
    
    public function generate_pano_config($album_id)
    {
            
            $album = $this->menu_model->get_row_array('tblgallery',['gallery_id'=>$album_id]);
            $info = $album;
            $source_dir = '3rd/SaladoPlayer';
            $map_checker = json_decode($album['waypoints']);
            
            $pano_dir ='upload/panoramas/' . $album['gallery_name']; 
            $items  = array_diff(scandir($pano_dir), array('..', '.'));
            $hotspots = json_decode($album['hotspots']);
            $waypoints = json_decode($album['waypoints']);
            $content = '<?xml version="1.0" encoding="utf-8" ?> 
            <SaladoPlayer> 
           <global debug="true"> 
              <control autorotation="delay:600"/> 
              <panoramas firstPanorama="'.$album['default'].'"/> 
           </global> 
           <panoramas>';
          
   foreach($items as $item){
    
    
    if(is_dir($pano_dir.'/'.$item)){
        
      $content .= '<panorama  id="'.$item.'" path="'.$pano_dir.'/'.$item.'/'.$item.'_f.xml" camera="pan:0" direction="NaN">';
      if(count($hotspots)){
      foreach($hotspots as $hotspot){
        $hotspot = (array)$hotspot;
       
        if($hotspot['from'] == $item){
             $content .='<swf id="'.$hotspot['from'].'_to_'.$hotspot['to'].'" location="pan:'.$hotspot['pan'].',tilt:'.$hotspot['tilt'].'" path="'.$source_dir.'/spots/GrowingSpot-1.0.swf" target="'.$hotspot['to'].'">';
			$content .='	    <settings path="'.$source_dir.'/spots/go_arrow.png"/>';
			    $content .=' </swf>';
             $content .='<image target="'.$hotspot['to'].'" id="'.$hotspot['from'].'_to_'.$hotspot['to'].'_caption" path="'.png_image_create($hotspot['caption']).'" location="pan:'.($hotspot['pan']+3).',tilt:'.($hotspot['tilt']+5).',distance:500" />';
            
        }
      } 
        } 
      $content .= '</panorama>'; 
      }
      }
    $content .= '</panoramas> 
    <modules> 
      <ViewFinder path="'.$source_dir.'/modules/viewfinder/ViewFinder-1.3.swf"/> 
      <InfoBubble path="'.$source_dir.'/modules/infobubble/InfoBubble-1.3.3.swf"> 
         <settings alpha="1.0"/> 
         <bubbles>';if(count($items)){
            foreach($items as $item){
                if(is_dir($pano_dir.'/'.$item)){ 
                    $content .= ' <image id="b'.$item.'" path="'.$pano_dir.'/'.$info['gallery_name'].'/'.$item.'.jpg"/> ';
                }
            }}
           $content .= '</bubbles> 
      </InfoBubble> 
      <ImageButton path="'.$source_dir.'/modules/imagebutton/ImageButton-1.3.swf"> 
        
         <button id="buttonMap" path="'.$source_dir.'/tours/_media/images/buttons/dark_right_open.png" action="mapOpen"> 
            <window align="vertical:middle,horizontal:right" move="horizontal:0,vertical:0" openTween="time:0" closeTween="time:0"/> 
         </button> 
         <button id="buttonMenu" path="'.$source_dir.'/tours/_media/images/buttons/dark_left_open.png" action="menuOpen"> 
            <window align="vertical:middle,horizontal:left" move="horizontal:0,vertical:0" openTween="time:0" closeTween="time:0"/> 
         </button> 
      </ImageButton> 
      <ImageMap path="'.$source_dir.'/modules/imagemap/ImageMap-1.4.3.swf"> 
         <window open="false" onOpen="mapOpened" onClose="mapClosed" maxSize="width:250,height:2000" minSize="width:250,height:200" margin="right:0,top:0,bottom:0" /> 
         <viewer path="'.$source_dir.'/modules/imagemap/skins/navigation_black_20x20.png" style="alpha:0.75"/> 
         <close path="'.$source_dir.'/tours/_media/images/buttons/dark_right_close.png" align="vertical:middle,horizontal:left" move="horizontal:-40"/> 
         <maps> 
            <map id="map1" path="'.$album['map'].'"> 
               <waypoints path="'.$source_dir.'/modules/imagemap/skins/waypoints_bubble_45x45.png" move="horizontal:6,vertical:-22">';
               if(count($waypoints)){
                foreach($waypoints as $point)
                {
                    $content .= '<waypoint target="'.$point->pano.'" position="x:'.$point->x.',y:'.$point->y.'" />';
                }
                }
                 
               $content.='</waypoints> 
            </map> 
         </maps> 
      </ImageMap> 
      <MenuScroller path="'.$source_dir.'/modules/menuscroller/MenuScroller-1.3.3.swf"> 
         <close path="'.$source_dir.'/tours/_media/images/buttons/dark_left_close.png" align="vertical:middle" move="horizontal:40"/> 
         <window open="false" onOpen="menuOpened" onClose="menuClosed" openTween="time:0.5" closeTween="time:0.5"/> 
         <groups> 
            <group id="g1">';
              foreach($items as $item){
                if(is_dir($pano_dir.'/'.$item)){ 
                    $content .='<element target="'.$item.'" path="'.$pano_dir.'/'.$item.'.jpg"/>';
                }
            } 
              
            $content .='</group> 
         </groups> 
      </MenuScroller> 
      <ButtonBar path="'.$source_dir.'/modules/buttonbar/ButtonBar-1.3.swf"> 
         <window align="horizontal:center"/> 
         <buttons path="'.$source_dir.'/modules/buttonbar/skins/buttons_dark_40x40.png"> 
            <button name="out"/> 
            <button name="in"/> 
            <button name="drag"/> 
            <button name="autorotation" /> 
            <button name="fullscreen" /> 
          </buttons> 
      </ButtonBar> 
      <MouseCursor path="'.$source_dir.'/modules/mousecursor/MouseCursor-1.3.swf"> 
         <settings path="'.$source_dir.'/modules/mousecursor/skins/cursors_21x21.png" showLine="true"/> 
      </MouseCursor> 
   </modules> 
   <actions> 
      <action id="mapOpen" content="ImageMap.setOpen(true)"/> 
      <action id="mapClose" content="ImageMap.setOpen(false)"/> 
      <action id="mapOpened" content="ImageButton.setOpen(buttonMap,false)"/> 
      <action id="mapClosed" content="SaladoPlayer.waitThen(0.5,openButtonMap)"/> 
      <action id="openButtonMap" content="ImageButton.setOpen(buttonMap,true)"/> 
      <action id="menuOpen" content="MenuScroller.setOpen(true)"/> 
      <action id="menuClose" content="MenuScroller.setOpen(false)"/> 
      <action id="menuOpened" content="ImageButton.setOpen(buttonMenu,false)"/> 
      <action id="menuClosed" content="SaladoPlayer.waitThen(0.5,openButtonMenu)"/> 
      <action id="openButtonMenu" content="ImageButton.setOpen(buttonMenu,true)"/> 
      <action id="hideBubble" content="InfoBubble.hide()"/> 
      
    </actions> 
</SaladoPlayer>';
           header('Content-Type: text/xml');
               echo $content; 
    }



}
?>