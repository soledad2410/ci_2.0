
<div class="page-content">
                            <h2 class="heading"><?=$menu['menu_title']?></h2>
                            <div class="product-list two-col">
                            <?foreach($group_menu->result_array() as $cate):?>                            
                                <div class="item">
                                    <a title="<?=$cate['menu_title']?>" href="<?=$this->url_model->get_cate_url($cate)?>" class="item-image"><img src="<?=$cate['menu_image']?>" alt="no-image"></a>
                                    <p class="item-title"><a href="<?=$this->url_model->get_cate_url($cate)?>"><?=$cate['menu_title']?></a></p>
                                </div>
                             <?endforeach;?>   
                            </div>
                        </div>