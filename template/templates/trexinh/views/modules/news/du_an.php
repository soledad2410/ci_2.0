<div class="tabs with-icon">
                        <?foreach($group_menu->result_array() as $cate):
                       
                        ?>
                        <div class="item">
                            <a href="<?=$this->url_model->get_cate_url($cate)?>"><img src="<?=$cate['menu_image']?>"/><br /><?=$cate['menu_title']?></a>
                            </div>
                        
                        <?endforeach;?>
              
                    </div>
<style type="text/css">
.tabs .item,.tabs .item a{text-align: center;}
</style>                    