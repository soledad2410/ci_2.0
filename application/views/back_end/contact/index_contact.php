<?php
$this->load->view('back_end/header.php');
?>
<script type="text/javascript">
$(document).ready(function(){
    $("#floor_date").attr('value','<?= $this->input->get('from')?>');
    $("#ceil_date").attr('value','<?= $this->input->get('to')?>');
})
</script>
<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Danh sách liên hệ website</h5>

                    <div class="search">

							<div class="input">
								<input type="text" id="search" name="search" value="<?= $this->input->get('name') ?>" />
							</div>
							<div class="button">
								<input type="submit" name="submit" value="Xác nhận" onclick="load_contact()" />
							</div>

					</div>

                <div class="search">

							<div class="input">
							<span style="color: white;">Tới ngày</span> <input type="text" id="ceil_date" class="date"  />
							</div>
				</div>
                <div class="search">

							<div class="input">
							<span style="color: white;">Từ ngày</span> <input type="text" id="floor_date" class="date" />
							</div>
				</div>
				</div>

                <div class="sub_menu">

                <div class="sub_menu-notice"><img src="html/resources/images/icons/notice.png" width="32" height="32"/></div>
                <div class="sub_menu-notice" style="margin-top: 10px;">Các liên hệ được hiển thị theo thứ tự ngày tháng mới nhất</div>

                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_contact();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>

                </div>

				<!-- end box / title -->

                <div class="table">
					<form id="frm_list_contact" name="frm_list_contact">
					<table>
						<thead>
							<tr>
								<th class="left">Tên khách hàng</th>
                                <th>Điện thoại</th>
								<th>Địa chỉ email</th>
								<th>Ngày tháng</th>
	                            <th>Địa chỉ ip</th>
                                <th>Phòng ban</th>
                                <th>Xem</th>
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>

						<tbody>
                        <?php
                        foreach($contacts->result_array() as $contact):


                        ?>

							<tr>
								<td class="title" style="width: 20%;"><?= str_replace($this->input->get('name'),'<strong>'.$this->input->get('name').'</strong>',$contact['contact_user']) ?></td>
                                <td class="name" style="width: 10%;text-align: center;"><?=$contact['contact_phone']?></td>
								<td class="price" style="width: 15%;color:red;"><?=$contact['contact_email']?></td>
								<td class="date" id="dp1307331808406" style="color: red;"><?= date('H:m d-m-Y',$contact['contact_datetime']) ?></td>
								<td class="category"><?=$contact['ip_address']?></td>
                                <td class=""><?=$this->config_model->get_by_key('tbldepartment','department_name','department_id',$contact['department_id'])?></td>
                                <td class="queu"><a href="admin/contacts/view/<?=$contact['contact_id']?>.html"><img src="html/resources/images/icons/read_<?=$contact['contact_read']?>.png" width="24" height="24" alt="up"/></a></td>
								<td class="selected last" style="width: 5%;"><input type="checkbox" id="<?=$contact['contact_id']?>" name="<?=$contact['contact_id']?>" value="<?=$contact['contact_id']?>"/></td>
							</tr>
                           <?php endforeach; ?>
						</tbody>
     			    </table>
					<!-- pagination -->
					<div class="pagination pagination-left">
						<div class="results">
							<span>Hiển thị kết quả từ  <?= $result_from?>-<?= $result_to ?> của tổng <?= $total ?></span>
						</div>

						  <span style="float: left;margin-left: 10px;"><select id="num-page" onchange="view_article_page()">
                          <option value="10">10</option>
                          <option value="20" <?php if($this->input->get('limit')==20){echo'selected="selected"';} ?>>20</option>
                          <option value="30" <?php if($this->input->get('limit')==30){echo'selected="selected"';} ?>>30</option>
                          <option value="40" <?php if($this->input->get('limit')==40){echo'selected="selected"';} ?>>40</option>
                          </select></span>
						<ul class="pager">
					   <?php
                          if($page>1){
                            for($i=1;$i<=$page;$i++){
                                if($current_page==$i){
                                    echo'<li class="current" >'.$i.'</li>';
                                }else{
                                echo'<li ><a href="'.$url.'page='.$i.'">'.$i.'</a></li>';
                                }
                            }
                          }
                           ?>

						</ul>
					</div>
					<!-- end pagination -->
					<!-- table action -->

					<!-- end table action -->
					</form>
				</div>
                <div class="sub_menu">



                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_contact();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>

                </div>
                <div style="clear: both;"></div>

                </form>

                </div>
                <div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Tuỳ chọn module liên hệ</h5>
				</div>
				<!-- end box / title -->


				<form id="frm_order_config" name="frm_order_config">
				<div class="form">
					<div class="fields">
			          <?
                      foreach($contact_config->result_array() as $config):?>
                      <?=$this->config_model->emit_config_field($config['config_id'],$_SESSION['lang_admin'])?>
                      <?endforeach;?>

					</div>
				</div>

				</form>

                <div class="sub_menu">

                <div class="save" >
                <a href="javascript:void(0)" onclick="save_config('frm_order_config');"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>

                </div>


                </div>

			</div>
			</div>

<?php
$this->load->view('back_end/footer.php');
?>