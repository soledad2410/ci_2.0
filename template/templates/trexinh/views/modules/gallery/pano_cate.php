<div class="page-body no-border no-padding products">
    <a href="javascript:;"><h2><?=$menu['sub_title']?></h2></a>
    <div class="gallery-list">

        <?foreach ($albums->result_array() as $album): ?>
        <div class="project-item">
            <a class="project-img" href="<?=$this->url_model->get_cate_url($menu)?>?album=<?=$album['gallery_id']?>"><img src="<?=$album['gallery_image']?>" alt="no-image"/></a>
            <a href="<?=$this->url_model->get_cate_url($menu)?>?album=<?=$album['gallery_id']?>" class="cover"></a>
            <p class="post-text">
                <i class="icon icon-image"></i>
                <?if ($album['type'] == 'panorama'): ?>
                <span class="text">Panorama 360°</span>
                <?endif;?>
            </p>
            <p class="post-title"><a href="<?=$this->url_model->get_cate_url($menu)?>?album=<?=$album['gallery_id']?>"><?=$album['gallery_title']?></a></p>
        </div>
        <?endforeach;?>

    </div>
    <div class="page-navigation">
        <?=$page_list?>
    </div>
</div>

<style type="text/css">
   .project-img{display:inline-block;height:131px;overflow:hidden;width:100%;}
   .project-img img{width:100%;min-height:131px;}
   a.cover{display:inline-block;}
</style>