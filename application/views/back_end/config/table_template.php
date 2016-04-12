<?php foreach($templates->result_array() as $template):?>
                    <div class="template" style="<?if($template['template_default']==1){echo'border: 1px solid silver;';}?>">
                    <a onclick="default_template('<?=$template['template_id']?>')"  href="javascript:void(0)"><img src="<?=scale_image('template/templates/' . $template['template_name'] . '/thumb.png', 150, 150, 'template', $template['template_name'])?>"  height="150"/></a><br />
                    <p class="template-title"><?=$template['template_title']?></p>
                    
                        <?if($template['template_default']!=='1'):?>
                        <div class="option-template"><img src="html/resources/images/icons/close.png" width="20" height="20" title="Xóa giao diện" onclick="delete_template('<?=$template['template_id']?>')"/></div>
                        <?endif;?>
                    </div>
<?php endforeach;?>
                    