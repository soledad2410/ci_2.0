<ul class="cates">
    <li class="heading"><?=$plugin['plugin_title']?></li>
    <?$types = $this->product_model->select_query('tblproducttype');?>
    <?foreach ($types->result_array() as $type): ?>
    
    
    <li><a href="<?=$this->url_model->get_producttype_url($type)?>"><?=$type['producttype_name']?></a></li>
    
    <?endforeach;?>
</ul>