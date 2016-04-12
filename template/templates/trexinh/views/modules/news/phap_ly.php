<div class="list-paper">
                    <div class="content">
                        <?foreach($articles->result_array() as $news):?>
                        <div class="paper">
                            <div class="paper-content">
                                <h2><?=$news['article_title']?></h2>
                                <?=$news['article_content']?>
                            </div>
                            <div class="paper-footer">
                                <span class="icon icon-paper"></span><?=$news['article_title']?>
                            </div>
                        </div>
                        <?endforeach;?>
                        
                    </div>
                </div>