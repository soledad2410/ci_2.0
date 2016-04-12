<?php
$this->load->view('back_end/header.php');
?>

<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Danh mục quản trị</h5>
 		</div>

                <div class="sub_menu">


                <div class="save">
                <a href="admin/system/menu.html#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/>
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_admincate();"><img src="html/resources/images/delete.png" width="32px" height="32px"/>
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_admincate();"><img src="html/resources/images/edit.png" width="32px" height="32px"/>
                <span>Sửa</span>
                </a>
                </div>
                </div>
  				<!-- end box / title -->
               <div class="table">
					<form id="frm_list_admincate" name="frm_list_admincate">
					<table>
						<thead>
							<tr>
								<th class="left">Tiêu đề</th>
                                <th>Link quản trị</th>
						      	 <th>khối</th>
								<th>Hiển thị</th>
                                <th>Lên</th>
                                <th>Xuống</th>
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>

						<tbody>
          				<?foreach($menus->result_array() as $menu):?>
                        <tr>
								<td ><?=$menu['menu_title']?></td>
                                <td ><?=$menu['menu_url']?></td>
						      	 <td align="center"><?=($menu['menu_block']==0)?'TopMenu':'HomeTask';?></td>
								<td align="center"><img height="16" width="16" src="html/resources/images/icons/active_<?=$menu['menu_visible']?>.gif"/></td>
                                <?$max_queu=$this->menu_model->get_top('tblmenuadmin','menu_queu',array('parent_id'=>0));
                                  $min_queu=$this->menu_model->get_top('tblmenuadmin','menu_queu',array('parent_id'=>0),null,TRUE);
                                ?>
                                <td align="center"><?if($menu['menu_queu']>$min_queu){echo'<a href="javascript:void(0)" onclick="adminmenu_up(\''.$menu['menu_id'].'\')"><img src="html/resources/images/up.png" width="24" height="24" alt="up"/></a>';}?></td>
                                <td align="center"><?if($menu['menu_queu']<$max_queu){echo'<a href="javascript:void(0)" onclick="adminmenu_down(\''.$menu['menu_id'].'\')"><img src="html/resources/images/down.png" width="24" height="24" alt="down"/></a>';}?></td>
								<td class="selected last"><input type="checkbox"  name="<?=$menu['menu_id']?>" value="<?=$menu['menu_id']?>"/></td>
							</tr>
                                <?
                                $menu_child=$this->menu_model->select_query('tblmenuadmin',FALSE,array('parent_id'=>$menu['menu_id']),FALSE,FALSE,FALSE,array('menu_queu'=>'ASC'));
                                foreach($menu_child->result_array() as $child):
                                ?>
                                <tr>
								<td style="padding-left: 20px;" >-----<?=$child['menu_title']?></td>
                                <td ><?=$child['menu_url']?></td>
						      	 <td align="center"><?=($child['menu_block']==0)?'TopMenu':'HomeTask';?></td>
								<td align="center"><img height="16" width="16" src="html/resources/images/icons/active_<?=$child['menu_visible']?>.gif"/></td>
                                <?$max_queu=$this->menu_model->get_top('tblmenuadmin','menu_queu',array('parent_id'=>$menu['menu_id']));
                                  $min_queu=$this->menu_model->get_top('tblmenuadmin','menu_queu',array('parent_id'=>$menu['menu_id']),null,TRUE);
                                ?>
                                <td align="center"><?if($child['menu_queu']>$min_queu){echo'<a href="javascript:void(0)" onclick="adminmenu_up(\''.$child['menu_id'].'\')"><img src="html/resources/images/up.png" width="24" height="24" alt="up"/></a>';}?></td>
                                <td align="center"><?if($child['menu_queu']<$max_queu){echo'<a href="javascript:void(0)" onclick="adminmenu_down(\''.$child['menu_id'].'\')"><img src="html/resources/images/down.png" width="24" height="24" alt="down"/></a>';}?></td>
								<td class="selected last"><input type="checkbox" name="<?=$child['menu_id']?>" value="<?=$child['menu_id']?>"/></td>
							</tr>
                                    <?
                                    $menu_child2=$this->menu_model->select_query('tblmenuadmin',FALSE,array('parent_id'=>$child['menu_id']),FALSE,FALSE,FALSE,array('menu_queu'=>'ASC'));
                                    foreach($menu_child2->result_array() as $child2):
                                    ?>
                                <tr>
								<td style="padding-left: 20px;" >-----------<?=$child2['menu_title']?></td>
                                <td ><?=$child['menu_url']?></td>
						      	 <td align="center"><?=($child2['menu_block']==0)?'TopMenu':'HomeTask';?></td>
								<td align="center"><img height="16" width="16" src="html/resources/images/icons/active_<?=$child['menu_visible']?>.gif"/></td>
                                <?$max_queu=$this->menu_model->get_top('tblmenuadmin','menu_queu',array('parent_id'=>$child['menu_id']));
                                  $min_queu=$this->menu_model->get_top('tblmenuadmin','menu_queu',array('parent_id'=>$child['menu_id']),null,TRUE);
                                ?>
                                <td align="center"><?if($child2['menu_queu']>$min_queu){echo'<a href="javascript:void(0)" onclick="adminmenu_up(\''.$child2['menu_id'].'\')"><img src="html/resources/images/up.png" width="24" height="24" alt="up"/></a>';}?></td>
                                <td align="center"><?if($child2['menu_queu']<$max_queu){echo'<a href="javascript:void(0)" onclick="adminmenu_down(\''.$child2['menu_id'].'\')"><img src="html/resources/images/down.png" width="24" height="24" alt="down"/></a>';}?></td>
								<td class="selected last"><input type="checkbox" name="<?=$child2['menu_id']?>" value="<?=$child2['menu_id']?>"/></td>
							</tr>
                            <?endforeach;?>
                            <?endforeach;?>
                        <?endforeach;?>

						</tbody>
     			    </table>
					<!-- pagination -->

					<!-- end pagination -->
					<!-- table action -->

					<!-- end table action -->
					</form>
				</div>
                <div class="sub_menu">


                <div class="save">
                <a href="admin/system/menu.html#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/>
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_admincate();"><img src="html/resources/images/delete.png" width="32px" height="32px"/>
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_admincate();"><img src="html/resources/images/edit.png" width="32px" height="32px"/>
                <span>Sửa</span>
                </a>
                </div>


                </div>

                <div style="clear: both;"></div>

                </form>

                </div>
                <div class="box" >
				<!-- box / title -->
				<div class="title">
					<h5>Thêm mới danh mục </h5>
				</div>
				<!-- end box / title -->
                 <?=$message?>

				<form id="frm_add_adminmenu" name="frm_add_adminmenu"  method="post" action="<?=base_url()?>admin/system/menu.html">
				<div class="form">
					<div class="fields">
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề danh mục</label>
							</div>
							<div class="input">
								<input type="text" id="menu_title" name="menu_title" class="required_field"  size="40"  />
							</div>
				</div>
                     <div class="field">
							<div class="label">
								<label for="autocomplete">Link quản trị</label>
							</div>
							<div class="input">
								<input type="text" id="menu_url" name="menu_url" class="required_field"  size="60"  />
							</div>
				</div>
                <div class="field">
							<div class="label">
							<label for="autocomplete">Khối danh mục</label>
							</div>
							<div class="input">
							<select id="menu_block" name="menu_block">
                            <option value="0">TopMenu</option>
                             <option value="1">HomeTask</option>
                            </select>
							</div>
				</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Danh mục cha</label>
							</div>
							<div class="input">
							<select id="parent_id" name="parent_id">
                            <option value="0">Danh mục gốc</option>
                             <?foreach ($menu_select->result_array() as $menu):?>
                             <option value="<?=$menu['menu_id']?>"><span style="padding-left: <?=$menu['menu_level']*20?>px;"><?=$menu['menu_title']?></span></option>
                             <?endforeach;?>
                            </select>
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Ảnh đại diện (nếu có)</label>
							</div>
							<div class="input">
								<input type="text" name="menu_image" id="menu_image"  size="40"  />
                                 <input type="button" value="Chọn ảnh" onclick="get_ck('menu_image')" />
							</div>
				        </div>
                        <input type="hidden" name="action" value="add_menu"/>
                        <a name="form"></a>

                        <div class="field">
							<div class="label">
								<label for="autocomplete">Hiển thị </label>
							</div>
							<div class="input">
								<input type="checkbox" id="menu_visible" name="menu_visible" value="1"/>
							</div>
						</div>

						<div class="field">
							<div class="label">
								<label for="autocomplete">Mức truy cập(1-3) </label>
							</div>
							<div class="input">
								<input type="text" class="number_field" name="privilege_access"/>
							</div>
						</div>


					</div>
				</div>
                <div class="sub_menu">

                <div class="save" >
                <a href="javascript:void(0)" onclick="save_add_adminmenu();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>

                </div>


                </div>
				</form>
			</div>
            <div id="frm_edit_menu"></div>
              <a name="frm_edit"></a>
			</div>

<?php
$this->load->view('back_end/footer.php');
?>