<table>
						<thead>
							<tr>
                             	<th class="left">Tiêu đề từ khóa</th>
                                 <th>Tên từ khóa</th>
						      	 <th>Loại trường</th>
							
                                <th>Xóa</th>
								
							</tr>
						</thead>
                        
						<tbody>
                        <?foreach($keywords->result_array() as $keyword):?>
                        <tr>
                            <td class="title-cate" style="width: 38%!important;padding-left:40px;"><?=$keyword['keyword_title']?></td>
                            <td class="title-module" style="width: 20%;"><?=$keyword['keyword_name']?></td>
                            <td class="title-module" style="width: 10%;"><?=$keyword['keyword_type']?></td>
                            <td class="selected last"><a href="javascript:void(0)" onclick="delete_keyword('<?=$keyword['keyword_id']?>')"><img src="html/resources/images/icons/delete.png"/></a></td>
                        </tr>
                         <? endforeach;?>
                      </tbody>
</table>