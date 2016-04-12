<?
foreach($group_menu->result_array() as $cate):
$news = $this->article_model->load_article_frontend_recursive($cate['menu_id'],false,false,0,8);
?>
                        <a href="<?=$this->url_model->get_cate_url($cate)?>"><h2><?=$cate['menu_title']?></h2></a>
                        <div class="list-video">
                        <?foreach($news->result_array() as $item):?>
                            <div class="post-item">
                                <a href="<?=$this->url_model->get_news_url($news)?>"><img alt="no-image" src="<?=$news['article_image']?>"/></a>
                                <span class="icon icon-video"></span>
                                <span class="cover"></span>
                                
                                <p class="post-title"><a href="<?=$this->url_model->get_news_url($news)?>"><?=$news['article_title']?></a></p>
                            </div>
                            <?endforeach;?>
                        </div>
                        <hr/>
<?endforeach;?>                        
                      