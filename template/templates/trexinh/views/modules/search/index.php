<div class="container">
    <div class="breadcrumb">
        <a href="<?php echo base_url();?>">Trang chủ</a> &raquo;
        <a href="<?php echo current_url();?>">Tìm kiếm</a> &raquo;
    </div>
</div>
<section class="products-block">
    <div class="container">
        <ul class="products-list">
        <?foreach ($products->result_array() as $p): ?>
            <li class="col-xs-12 col-sm-4 col-md-3 col-lg-3 no-padding">
                <figure>
                    <a href="<?=$this->url_model->get_product_url($p)?>">
                        <img src="<?=$p['product_image']?>" alt="<?=$p['product_name']?>"/>
                        <span class="details">Chi tiết</span>
                    </a>
                    <h5><a href="<?=$this->url_model->get_product_url($p)?>"><?=$p['product_name']?></a></h5>
                    <p class="price"><?=number_format($p['product_price'], 0, '.', ',')?> vnđ</p>
                    <div class="product-btn">
                            <a href="<?=$this->url_model->get_product_url($p)?>">
                                <div class="row">
                                    <div class="btn-buy">
                                        <img src="/template/templates/trexinh/img/icons/btn-buy.png" alt="<?=$p['product_name']?>">
                                    </div>
                                    <p class="txt-buy-now">Mua Ngay</p>

                                    <div class="btn-love">
                                        <img src="/template/templates/trexinh/img/icons/btn-love.png" alt="<?=$p['product_name']?>">
                                    </div>
                                </div>
                            </a>
                        </div>
                </figure>
            </li>
            <?endforeach;?>
        </ul>
    </div>
</section>
<section class="list-news">
    <div class="container">
    <?foreach ($articles->result_array() as $news): ?>
        <article class="col-xs-6 col-sm-6 col-md-6 col-lg-6 no-padding">
            <section class="image">
                <a href="<?=$this->url_model->get_news_url($news)?>">
                    <img width="234" height="176" alt="" src="<?=$news['article_image']?>">
                </a>
            </section>
            <section class="details">
                <header>
                    <h2><a href="<?=$this->url_model->get_news_url($news)?>"><?=advance_substr(16, $news['article_title'])?></a></h2>
                </header>
                <p><?=advance_substr(40, $news['article_header'])?></p>
            </section>
        </article>
        <?endforeach;?>
    </div>
</section>