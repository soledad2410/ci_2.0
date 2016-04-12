<?php
$this->load->view('back_end/header.php');
?>

<link rel="stylesheet" type="text/css" href="html/resources/scripts/contextmenu/jquery.contextMenu.css"/>
<script type="text/javascript" src="3rd/SaladoPlayer/viewer/embed/swfobject.js"></script>
<script type="text/javascript">
			var flashvars = {};
			flashvars.xml = "/admin/galleries/generate_pano_config/<?=$album['gallery_id']?>";
			var params = {};
			params.menu = "false";
			params.quality = "high";
			params.allowfullscreen = "true";
			swfobject.embedSWF("3rd/SaladoPlayer/viewer/SaladoPlayer-1.3.5.swf", "SaladoPlayer", "100%", "590px", "10.1.0", null, flashvars, params);
		</script>
        <style>
        #map-thumb{display:inline-block;position:relative;margin:0 auto;cursor:crosshair}
        #map-thumb img{width:auto!important;height:auto!important}
        
        </style>
<div id="content">
			<!-- table -->
			
            <div class="box" id="box-tabs">
				<!-- box / title -->
				<div class="title">
					<h5>PANORAMA VIEWER</h5>
                    
                </div>
                    <?=flash_data()?>
                
                
                <div class="album-list-image" id="album-list-image" style="height: 600px;">
              <div id="SaladoPlayer"></div>
			</div>
        	</div>
            
            <div class="box" id="box-tabs">
				<!-- box / title -->
				<div class="title">
					<h5>Cấu hình virtual tour</h5>
                    <ul class="links">
						<li rel="#box-config"><a  href="javascript:;">Virtual tour</a></li>
                        <li rel="#box-map"><a href="javascript:;">Bản đồ</a></li>
					</ul>
                </div>
                <div class="box" id="box-config" style="width: 100%;">
                <div class="sub_menu">
                   <div style="margin-top: 10px;" class="sub_menu-notice">Danh sách Pano trong album</div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_config_panorama').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>

                </div>

                <div class="save" >
                <a href="admin/galleries.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>

                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="addPanoConfigField();"><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm</span>
                </a>

                </div>
                </div>
                <?=flash_data()?>
                <form id="frm_config_panorama" name="frm_config_panorama" action="" method="post" onsubmit="return validate_form('frm_config_panorama')">
				<div class="form">
                <div class="album-list-image" id="album-list-image" style="height: 160px;">
                <?
                 foreach($items as $item):
                if(is_dir($dir .'/' . $item)):
               ?>
                <div style="height: 100px;width:160px" class="image-info <?=$album['default']==$item?'active':'';?>" title="<?=$item?>" album="<?=$album['gallery_id']?>" >
                    <a class="fancybox" longdesc="" rel="gallery" href="<?=$dir .'/' . $item .'.jpg'?>"><img src="<?=$dir .'/' . $item. '.jpg'?>" style="height: 80px;" height="20px"/></a>
                    <p class="file-info" style="font-size: 14px!important;"><strong><?=$item?></strong></p>
                </div>
                 <?
                endif;endforeach;?>
                </div>
                
					<div class="fields">
                    <div class="field">
                        <div class="label">
                            <label>Chọn pano mặc định</label>
                        </div>
                        <div class="input">
                            <select name="default" data="<?=$album['default']?>">
                                    <?foreach($items as $item):
                                    if(is_dir($dir.'/'.$item)):
                                    ?>
                                        <option value="<?=$item?>"><?=$item?></option>
                                    <?endif;endforeach;?>                                
                            </select>
                        </div>
                    </div>
                    <?
                    if(count($hotspots)):
                    foreach($hotspots as $hotspot):?>
				    <div class="field">
							
							<div class="input-txt">
								<input value="<?=$hotspot->pan?>" size="30" type="text" placeholder="pan" name="pan[]" value="" class="required_field"   />
							</div>
                            <div class="input-txt">
								<input value="<?=$hotspot->tilt?>" size="30" type="text" placeholder="tilt" name="tilt[]" value="" class="required_field"   />
							</div>
                            <div class="input-txt">
                            
                                <select name="from[]" class="required_field" data="<?=$hotspot->from?>">
                                    <option value="">From</option>
                                    <?foreach($items as $item):
                                    if(is_dir($dir.'/'.$item)):
                                    ?>
                                        <option value="<?=$item?>"><?=$item?></option>
                                    <?endif;endforeach;?>
                                    </select>
                            </div>
                            <div class="input-txt">
                            
                                <select name="to[]" class="required_field" data="<?=$hotspot->to?>">
                                    <option value="">To</option>
                                    <?foreach($items as $item):
                                    if(is_dir($dir.'/'.$item)):
                                    ?>
                                        <option value="<?=$item?>"><?=$item?></option>
                                    <?endif;endforeach;?>
                                    </select>
                            </div>
                            <div class="input-txt">
								<input value="<?=$hotspot->caption?>" size="30" type="text" placeholder="Caption" name="caption[]" value="" class="required_field"   />
							</div>
                             <div class="input-txt">
                             <a href="javascript:;" onclick="$(this).parent().parent().remove()">[Xóa]</a>
                            </div>                            
                            </div>
                            <?endforeach;endif;?>
                        </div>
                   </div>
                </form>
                <div class="sub_menu">

                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_config_panorama').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>

                </div>

                <div class="save" >
                <a href="admin/galleries.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>

                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="addPanoConfigField();"><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm</span>
                </a>

                </div>
                </div>
                </div>
                <div class="box" id="box-map">
                        <div class="sub_menu">
    
                    <div class="save" >
                    <a href="javascript:void(0)" onclick="$('form#frm_map_panorama').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                    <span>Lưu</span>
                    </a>
    
                    </div>
                </div>
                <form id="frm_map_panorama" name="frm_map_panorama" action="" method="post" onsubmit="return validate_form('frm_map_panorama')">
				<div class="form">
                <div id="map-thumb">
                    <?if(count($waypoints)):foreach($waypoints as $point):?>
                        <span title="<?=$point->pano?>" class="map-loc" style="top: <?=$point->y-32?>px;left:<?=$point->x-16?>px"></span>
                    <?endforeach;endif;?>
                        <img src="<?=$album['map']?>"/>
                </div>
                
					<div class="fields">
                        <div class="field">
                        <div class="label">
                        <label>Ảnh bản đồ</label>
                        </div>
                        <div class="input">
                            <input type="text" name="map" id="map" value="<?=$album['map']?>" />
                            <input type="button" onclick="get_ck('map')" value="Chọn ảnh" class="button browse"/>
                        </div>
                        </div>
                        <?if(count($waypoints)):foreach($waypoints as $point):?>
                        <div class="field" top="<?=$point->y?>" left="<?=$point->x?>"><div class="input-txt"><input readonly="" type="text" class="required_field" value="<?=$point->x?>" name="x[]" placeholder="X" size="30">			</div>          
                        <div class="input-txt"><input type="text" readonly="" class="required_field" value="<?=$point->y?>" name="y[]" placeholder="Y" size="30"/>			</div>
                        <div class="input-txt">
                             <select class="required_field" name="pano[]" data="<?=$point->pano?>">
                                    <option value="">Chọn Pano</option>
                                    <?foreach($items as $item):
                                    if(is_dir($dir.'/'.$item)):
                                    ?>
                                        <option value="<?=$item?>"><?=$item?></option>
                                    <?endif;endforeach;?>
                                    </select>
                            </div>
                        </div>                        
                        <?endforeach;endif;?>
                   </div>
                   </div>
                </form>
                <div class="sub_menu">
            <div class="save" >
                    <a href="javascript:void(0)" onclick="$('form#frm_map_panorama').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                    <span>Lưu</span>
                    </a>
                </div>
                 </div>
                </div>
                </div>
            <div class="pano-map-field">
                        <div class="input-txt">
                             <select name="pano[]" class="required_field">
                                    <option value="">Chọn Pano</option>
                                    <?foreach($items as $item):
                                    if(is_dir($dir.'/'.$item)):
                                    ?>
                                        <option value="<?=$item?>"><?=$item?></option>
                                    <?endif;endforeach;?>
                             </select>
                            </div>
                        </div>
                        <div class="pano-config-field">
							<div class="input-txt">
								<input size="30" type="text" placeholder="pan" name="pan[]" value="" class="required_field"   />
							</div>
                            <div class="input-txt">
								<input size="30" type="text" placeholder="tilt" name="tilt[]" value="" class="required_field"   />
							</div>
                            <div class="input-txt">
                            
                                <select name="from[]" class="required_field">
                                    <option value="">Từ Pano</option>
                                    <?foreach($items as $item):
                                    if(is_dir($dir.'/'.$item)):
                                    ?>
                                        <option value="<?=$item?>"><?=$item?></option>
                                    <?endif;endforeach;?>
                                    </select>
                            </div>
                            <div class="input-txt">
                            <select name="to[]" class="required_field">
                                    <option value="">Tới Pano</option>
                                    <?foreach($items as $item):
                                    if(is_dir($dir.'/'.$item)):
                                    ?>
                                        <option value="<?=$item?>"><?=$item?></option>
                                    <?endif;endforeach;?>
                                  
                                    </select>
                            </div>
                            <div class="input-txt">
								<input size="30" type="text" placeholder="Caption" name="caption[]" value="" class="required_field"   />
							</div>
                             <div class="input-txt">
                             <a href="javascript:;" onclick="$(this).parent().parent().remove()">[Xóa]</a>
                            </div>                            
                            </div>
<style type="text/css">
.input-txt{float:left;margin-left:15px}
.pano-config-field{display:none}
.pano-map-field{display:none}
.map-loc{cursor:pointer;z-index:999}
</style>
<script type="text/javascript">
$(function(){
    $('.map-loc').on('click',function(){
        var check = confirm('Xóa điểm bản đồ');
        if(check)
        {
            var top = parseFloat($(this).css('top').replace('px',''))+32;
            var left = parseFloat($(this).css('left').replace('px',''))+16;
            console.log(top);
            $('#frm_map_panorama').find('.field').each(function(){
               if($(this).attr('top') == top && $(this).attr('left') == left){
                $(this).remove();
               } 
            });
            $(this).remove();
        }
    });
    $("ul.links").tab();
    $('#map-thumb img').on('click',function(e){
         var parentOffset = $(this).offset(); 
         var relX = e.pageX - parentOffset.left;
         var relY = e.pageY - parentOffset.top;
         var x = relX-16;
         var y = relY-32;
         
         $('#map-thumb').append('<span class="map-loc" style="top:'+y+'px;left:'+x+'px"></span>');
         var    content = '<div class="field" top="'+y+'" left="'+x+'"><div class="input-txt">';
				content +='<input  size="30" type="text" readonly="" placeholder="X" name="x[]" value="'+relX+'" class="required_field"   />';
				content +='			</div>';
                content +='          <div class="input-txt">';
				content +='		<input  size="30" type="text" readonly="" placeholder="Y" name="y[]" value="'+relY+'" class="required_field"   />';
				content +='			</div>';
                content += $('.pano-map-field').html();            
                content += '</div>';
                
                $('#frm_map_panorama').find('.fields').append(content);
    });
});
function addPanoConfigField()
{
    var content = $('.pano-config-field').html();
    content = '<div class="field">' + content +'</div>';
    $('#frm_config_panorama').find('.fields').append(content);
    
}
</script>
<?php
$this->load->view('back_end/footer.php');
?>