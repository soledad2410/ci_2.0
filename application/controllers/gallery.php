<?php
Class Gallery extends Public_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index()
    {

    }
    public function cate($lang = false, $id = false, $title = false,$page=false)
    {   
      
        $data=array();
        if(!$id){redirect(base_url());}
        $limit = 20;
        $page = intval($page) >0 ? $page : 1;
        $list_gallery = $this->menu_model->select_query('tblgallery', false, array('menu_id' => $id), false,false,false,['gallery_time'=>'DESC']);
        $total = count($list_gallery);
        $menu_info = $this->menu_model->load_menu_frontend(array('menu_id', 'menu_string','menu_title','sub_title', 'template_id','layout_name'), array('menu_id' =>$id), false, false, true);
        if (count($menu_info)!=1) {redirect(base_url());}
        $data['menu'] = $menu_info['0'];
        $data['albums'] = $this->menu_model->select_query('tblgallery', false, array('menu_id' => $id), false,($page-1)*$limit,$limit,['gallery_time'=>'DESC']);
        
        $this->view->set_extra_data(['breadcrumbs' => $this->url_model->generate_breadcrumb($menu_info['0']['menu_id'])]);
        $layout = trim($menu_info['0']['layout_name']) == '' ? 'default' :  $menu_info['0']['layout_name'];
    $data['breadcrumbs'] = $this->url_model->generate_breadcrumb($menu_info['0']['menu_id']);
        $this->view->set_layout($layout);
        if(trim($menu_info['0']['template_id']) != ''){
            $this->view->set_view($menu_info['0']['template_id']);
        }
        $data['page_list'] = $this->url_model->emit_page_list($id,$total,$limit,$page);
        /** Media **/
        $data['medias'] = $this->menu_model->select_query('tblmedia',false,['tblgallery.menu_id'=>$id],['tblgallery'=>'tblgallery.gallery_id=tblmedia.gallery_id'],($page-1)* $limit,$limit);
        $data['total_media'] = $this->menu_model->select_query('tblmedia',false,['tblgallery.menu_id'=>$id],['tblgallery'=>'tblgallery.gallery_id=tblmedia.gallery_id'])->num_rows();
        $data['limit'] = $limit;
        $data['page'] = $page;
        $this->view->view($data);

    }
    public function albumdetails($lang = false, $id)
    {
        //var_dump($id);
        $album_info = $this->menu_model->get_row_array('tblgallery',array('gallery_id'=>$id));
       if(!$album_info){redirect(base_url());}
        
        $data['album'] = $album_info;
        $medias = $this->menu_model->select_query('tblmedia',false,['gallery_id'=>$id]);
        $data['medias'] = $medias;
        $data['menu'] = $this->menu_model->get_row_array('tblmenu',['menu_id'=>$album_info['menu_id']]);
          $this->view->set_extra_data(['breadcrumbs' => $this->url_model->generate_breadcrumb( $data['menu']['menu_id'])]);
        $this->view->view($data);
    }
    
    public function mediadetails($lang = false, $id)
    {
      
        $media_info = $this->menu_model->get_row_array('tblmedia',['media_id'=>$id]);
        $album = $this->menu_model->get_row_array('tblgallery',['gallery_id'=>$media_info['gallery_id']]);
        $data['media'] = $media_info;
       
        $data['album'] = $album;
        $data['menu'] = $this->menu_model->get_row_array('tblmenu',['menu_id'=>$album['menu_id']]);
        $this->view->view($data);
    }
    
    public function generate_pano_config($album_id)
    {
            $map = $this->input->get('map');
            $thumbnail = $this->input->get('thumbnail');
            
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
           <global debug="false"> 
              <control autorotation="delay:600"/> 
              <panoramas firstPanorama="'.$album['default'].'"/> 
           </global> 
           <panoramas>';
          
                   foreach($items as $item){
                    if(is_dir($pano_dir.'/'.$item)){
                       $content .= '<panorama  id="'.$item.'" path="'.$pano_dir.'/'.$item.'/'.$item.'_f.xml" camera="pan:-90" direction="NaN" view="pan:-90,tilt:0,fov:120">';
                      if(count($hotspots)){
                      foreach($hotspots as $hotspot){
                        $hotspot = (array)$hotspot;
                       if($hotspot['from'] == $item){
                           $content .='<swf id="'.$hotspot['from'].'_to_'.$hotspot['to'].'" location="pan:'.$hotspot['pan'].',tilt:'.$hotspot['tilt'].'" path="'.$source_dir.'/spots/GrowingSpot-1.0.swf" target="'.$hotspot['to'].'">';
	           		$content .='	    <settings path="'.$source_dir.'/spots/go_arrow.png"/>';
			              $content .=' </swf>';
                            $content .='<image target="'.$hotspot['to'].'" id="'.$hotspot['from'].'_to_'.$hotspot['to'].'_caption" path="'.png_image_create($hotspot['caption']).'" location="pan:'.($hotspot['pan']).',tilt:'.($hotspot['tilt']+5).',distance:500" />';
                        }
                      } 
                      }
                      $content .= '</panorama>'; 
                      }
                      }
                    $content .= '</panoramas> 
                    <modules> 
                      <InfoBubble path="'.$source_dir.'/modules/infobubble/InfoBubble-1.3.3.swf"> 
                         <settings alpha="1.0"/> 
                         <bubbles>';
                            foreach($items as $item){
                                if(is_dir($pano_dir.'/'.$item)){ 
                                    $content .= ' <image id="b'.$item.'" path="'.$pano_dir.'/'.$album['gallery_name'].'/'.$item.'.jpg"/> ';
                                }
                            }
                           $content .= '</bubbles> 
                      </InfoBubble> 
                      <ImageButton path="'.$source_dir.'/modules/imagebutton/ImageButton-1.3.swf">'; 
                        if($map && intval($map)==1){
                        $content.='<button id="buttonMap" path="'.$source_dir.'/tours/_media/images/buttons/dark_right_open.png" action="mapOpen"> 
                            <window align="vertical:middle,horizontal:right" move="horizontal:0,vertical:0" openTween="time:0" closeTween="time:0"/> 
                         </button>';
                        $content.='<button id="buttonMenu" path="'.$source_dir.'/tours/_media/images/buttons/dark_left_open.png" action="menuOpen"> 
                            <window align="vertical:middle,horizontal:left" move="horizontal:0,vertical:0" openTween="time:0" closeTween="time:0"/> 
                         </button>';
                          }
                      $content.='</ImageButton>';
                      
                       $content.='<ImageMap path="'.$source_dir.'/modules/imagemap/ImageMap-1.4.3.swf"> 
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
                      </ImageMap>';
                     $content.='<MenuScroller path="'.$source_dir.'/modules/menuscroller/MenuScroller-1.3.3.swf"> 
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
                      </MenuScroller>';
                    
                      $content.='<ButtonBar path="'.$source_dir.'/modules/buttonbar/ButtonBar-1.3.swf"> 
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