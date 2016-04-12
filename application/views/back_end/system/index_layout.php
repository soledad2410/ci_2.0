<?php
$this->load->view('back_end/header.php'); 
?>

<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Layout website</h5>
            		</div>
               <div class="sub_menu">
               <div class="save" >
                <a href="javascript:void(0)" onclick="edit_layout();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                <div class="save" >
                <a href="<?=$_SERVER['REQUEST_URI']?>#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_layout();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa </span>
                </a>
                </div>
               </div>
  		             
				<!-- end box / title -->
                
                <div class="table">
					<form id="frm_list_layout" name="frm_list_layout">
					<table>
						<thead>
							<tr>
								<th class="left"  >Tiêu đề layout</th>
						      	 <th>Tên layout</th>
								<th>Hiển thị</th>
                             
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
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
					<!-- pagination -->
					
					<!-- end pagination -->
					<!-- table action -->
					
					<!-- end table action -->
					</form>
				</div>
                <div class="sub_menu">
               <div class="save" >
                <a href="javascript:void(0)" onclick="edit_layout();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                <div class="save" >
                <a href="<?=$_SERVER['REQUEST_URI']?>#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_layout();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa </span>
                </a>
                </div>
               </div>
                <div style="clear: both;"></div>
            
                </div>
                
            <div class="box" >
				<!-- box / title -->
				<div class="title">
					<h5>Thêm mới layout</h5>
				</div>
				<!-- end box / title -->
                 
                        
				<form id="frm_add_layout" name="frm_add_layout">
				<div class="form">
					<div class="fields">
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Tên layout</label>
							</div>
							<div class="input">
								<input type="text" name="layout_name" class="required_field"  size="40"  />(*Trùng tên layout trong thư mục layout website)
							</div>
						</div>
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề layout</label>
							</div>
							<div class="input">
								<input type="text" id="layout_title" name="layout_title" class="required_field"  size="40"  />
							</div>
						</div>
                        <a name="form" ></a>
                        
                        
                        
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Hiển thị </label>
							</div>
							<div class="input">
								<input type="checkbox" id="layout_visible" value="1" name="layout_visible"/>
							</div>
						</div>
                        
						
					</div>
				</div>
                <div class="sub_menu">
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="add_layout();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                
                </div>
         
                
                </div>
				</form>
			</div>
              
			</div>

<?php
$this->load->view('back_end/footer.php'); 
?>