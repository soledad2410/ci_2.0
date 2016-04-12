<div class="table">
					<form id="frm_list_layout" name="frm_list_layout">
					<table>
						<thead>
							<tr>
								<th class="left"  >Tiêu đề layout</th>
						      	 <th>Tên layout</th>
								<th>Hiển thị</th>
                             
								<th class="selected last"><input type="checkbox" class="checkall" value="-1"/></th>
							</tr>
						</thead>
                        
						<tbody>
                        <?foreach($layouts->result_array() as $layout):?>
                        <tr>
        <td class="title-cate" style="width: 78%!important;"><?=$layout['layout_title']?></td>
        <td class="title-module"><a href="admin/system/template/<?=$layout['layout_name']?>.html"><?=$layout['layout_name']?></a></td>
        <td style="text-align: center;" class="visible-cate"><img height="16" width="16" src="html/resources/images/icons/active_<?=$layout['layout_visible']?>.gif"/></td>
        <td class="selected last"><input type="checkbox" value="<?=$layout['layout_name']?>" name="<?=$layout['layout_name']?>"/></td>
        </tr>
        <?endforeach;?>
                      
						</tbody>
     			    </table>

					</form>
</div>