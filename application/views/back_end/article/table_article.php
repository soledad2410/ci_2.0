<table>
                <thead>
							<tr>
								<th class="left">Tiêu đề</th>
                                <th>Thành viên</th>
								<th>Nguồn</th>
								<th>Ngày cập nhập</th>
								<th>Danh mục</th>
                                <th>Hiển thị</th>
                                <th>Lên</th>
                                <th>Xuống</th>
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                        
						<tbody>
                        <?php foreach($articles->result_array() as $article): ?>
              
							<tr>
								<td class="title" style="width: 35%;"><a href="admin/article/edit_article/<?=$article['article_id']?>.html"><?= $article['article_title'] ?></a></td>
                                <td class="name" style="width: 10%;text-align: center;"><?= $article['user_name'] ?></td>
								<td class="price"><?= $article['article_author'] ?></td>
								<td class="date" style="width: 15%;" id="dp1307331808406"><?= date('H:m d-m-Y',$article['article_datetime']) ?></td>
								<td class="category"><a href="admin/article.html?cate=<?= $article['menu_id'] ?>"><?= $article['menu_title'] ?></a></td>
                                <td class="queu"><img src="html/resources/images/icons/active_<?=$article['article_visible']?>.gif" width="16" height="16" alt="visible"/></td>
                                <td class="queu"><?php if($article['article_queu']<$this->article_model->get_top('tblarticle','article_queu',array('menu_id'=>$article['menu_id']),null)){ echo'<a href="javascript:void(0)" onclick="article_up(\''.$article['article_id'].'\')"><img src="html/resources/images/up.png" width="24" height="24" alt="up"/></a>';}?></td>
                                <td class="queu"><?php if($article['article_queu']>$this->article_model->get_top('tblarticle','article_queu',array('menu_id'=>$article['menu_id']),null,true)){ echo'<a href="javascript:void(0)" onclick="article_down(\''.$article['article_id'].'\')"><img src="html/resources/images/down.png" width="24" height="24" alt="down"/></a>';}?></td>
								<td class="selected last"><input type="checkbox"  name="<?= $article['article_id'] ?>" value="<?= $article['article_id'] ?>"/></td>
							</tr>
                           <?php endforeach; ?> 
						</tbody>
     			    </table>