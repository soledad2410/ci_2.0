  <a href="/news/tags/vi/<?=str_replace(' ','-',$tag)?>"><h2>Trang tags bài viết : <strong><?=$tag?></strong></h2></a>
                    <div class="list-events list-news">
                        <?foreach($articles->result_array() as $item):?>
                            <div class="event-item item-news">
                                <div class="item-photo">
                                    <a href="<?=$this->url_model->get_news_url($item)?>"><img width="172" src="<?=$item['article_image']?>" alt=""/></a>
                                </div>
                                <div class="item-caption">
                                    <h6><a href="<?=$this->url_model->get_news_url($item)?>"><?=$item['article_title']?></a></h6>
                                    <p><?=advance_substr(50,$item['article_header'])?></p>
                                    <p class="readmore"><a href="<?=$this->url_model->get_news_url($item)?>">Chi tiết <span class="icon icon-triangle-right" aria-hidden="true"></span></a></p>
                                </div>
                            </div>
                            
                            <?endforeach;?>
                    </div>
                    
                        