<div class="pro-cate">
    <div class="breadcrumb">
        <ul>
           
                <li><a href="/" title="Trang chủ">Trang chủ </a></li>
          
        </ul>
    </div>
    
    <div class="pro-list">
       <div class="header">
                    <a class="header-title text-left" title="Trang kết quả tìm kiếm" href="">Trang kết quả tìm kiếm</a>
                  
                </div>
                <p class="total-search">
                    Tìm được <span><?=$total?></span> Kết quả
                </p>
                <div class="list-item">
                    <?
                    $sticky = '';
                    foreach($products->result_array() as $p):
                    switch($p['product_home']){
                        case 1:
                        $sticky = 'new';
                        break;
                        case 2:
                        $sticky = 'hot';
                        break;
                        case 3:
                        $sticky = 'sale';
                        break;                        
                    }
                    $price = $p['product_price']/1000000;
                    $city_name = $this->product_model->get_by_key('tblregion','region_name','region_id',$p['city_id']);
                    ?>
                    <div class="item-pro">
                        <div class="item-img">
                            <a href="<?=$this->url_model->emit_product_url($p['product_id'])?>" title="<?=$p['product_image']?>"><img src="<?=scale_image($p['product_image'],160,120)?>" width="160" height="120" title="<?=$p['product_name']?>" alt="<?=$p['product_name']?>"/></a>
                            <span class="pro-sticky small <?=$sticky ?> "></span>
                        </div>
                        
                        <div class="pro-info text-left">
                        <a class="pro-name" href="" title=""><?=$p['product_name']?></a>
                            <p>Loại BĐS: <strong><?=$p['producttype_name']?></strong></p>
                            <p>Giá: <strong><?=$price?> triệu VNĐ/m2</strong></p>
                            
                            <p>Tỉnh/TP: <?=$city_name?></p>
                            
                            <p>Chủ đầu tư: <?=$p['investor']?></p>
                        </div>
                    </div>
                    <?endforeach;?>
                </div>
            </div>
    
    <div class="paginator"></div>
</div>