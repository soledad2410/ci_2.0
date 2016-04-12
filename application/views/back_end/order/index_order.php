<?php
$this->load->view('back_end/header.php'); 
?>
<script type="text/javascript">
$(document).ready(function(){
    $("#floor_date").attr('value','<?= $this->input->get('from')?>')
    $("#ceil_date").attr('value','<?= $this->input->get('to')?>')
})
</script>
<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Danh sách bài viết</h5>
                    
                    <div class="search">
						
							<div class="input">
								<input type="text" id="search" name="search" value="<?= $this->input->get('name') ?>" />
							</div>
							<div class="button">
								<input type="submit" name="submit" value="Xác nhận" onclick="load_order()" />
							</div>
						
					</div>
                    <div class="search">
						
							<div class="input">
								<select id="status">
                                <option value="4" <?if($this->input->get('status')=='4'){echo'selected="selected"';}?>>Tất cả</option>
                                <option value="0" <?if($this->input->get('status')=='0'){echo'selected="selected"';}?>>Chưa tiến hành</option>
                                <option value="1" <?if($this->input->get('status')=='1'){echo'selected="selected"';}?>>Đang tiến hành</option>
                                <option value="2" <?if($this->input->get('status')=='2'){echo'selected="selected"';}?>>Hoàn tất</option>
                                <option value="3" <?if($this->input->get('status')=='3'){echo'selected="selected"';}?>>Đã hủy</option>
                                
                                </select>
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
                <div class="sub_menu-notice" style="margin-top: 10px;">Các đơn hàng được hiển thị theo thứ tự ngày tháng mới nhất</div>
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_order();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                
                </div>
  		             
				<!-- end box / title -->
                
                <div class="table">
					<form id="frm_list_order" name="frm_list_order">
					<table>
						<thead>
							<tr>
								<th class="left">Tên khách hàng</th>
                                <th>Mã đơn hàng</th>
								<th>Số lượng sản phẩm</th>
								<th>Tổng giá trị</th>
								<th>Ngày đặt hàng</th>
                                <th>Trạng thái</th>
                                <th>Xem</th>
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                        
						<tbody>
                        <?php
                        foreach($orders->result_array() as $order):
                        
                        // calculate total product in cart
                              
                        $this->product_model->db->select_sum('order_quanlity')->from('tblorderdetails')->where('order_id',$order['order_id']);
                        $query=$this->product_model->db->get();
                        $result=$query->result_array();
                        $order['order_qty']=$result['0']['order_quanlity'];
                         // calculate total price in cart
                         
                        $query=$this->product_model->db->query("SELECT SUM( order_quanlity * order_price ) AS order_value FROM vnvic_tblorderdetails WHERE order_id=".$order['order_id']."");
                        
                        $result=$query->result_array();
                        $order['order_value']=$result['0']['order_value'];
                        $id=$order['order_id'];
                        if($order['order_id']<10){$id='000'.$order['order_id'];}
                        if($order['order_id']>=10 && $order['order_id']<100){$id='00'.$order['order_id'];}
                        if($order['order_id']>=100 && $order['order_id']<1000){$id='0'.$order['order_id'];}
                       
                        $status='';
                        switch($order['order_status']){
                            case '0':
                            $status='Chưa tiến hành';
                            break;
                            case '1':
                            $status='Đang tiến hành';
                            break;
                            case '2':
                            $status='Hoàn tất';
                            break;
                            case '3':
                            $status='Đã hủy';
                            break;
                        }
                            
                             
                        ?>
              
							<tr>
								<td class="title" style="width: 20%;"><?= str_replace($this->input->get('name'),'<strong>'.$this->input->get('name').'</strong>',$order['cus_name']) ?></td>
                                <td class="name" style="width: 10%;text-align: center;"><?= 'DH-'.$id ?></td>
								<td class="price" style="width: 15%;color:red;"><?= $order['order_qty'] ?></td>
								<td class="date" id="dp1307331808406" style="color: red;"><?= number_format($order['order_value'],0,'.','.') ?>VNĐ</td>
								<td class="category"><?= date('H:m d-m-Y',$order['order_date']) ?></td>
                                <td class="queu" style="width: 10%;"><?= $status ?></td>
                                <td class="queu"><a href="admin/order/view/<?=$order['order_id']?>.html"><img src="html/resources/images/icons/read_<?=$order['order_read']?>.png" width="24" height="24" alt="up"/></a></td>
								<td class="selected last" style="width: 10%;"><input type="checkbox" id="<?= $order['order_id'] ?>" name="<?= $order['order_id'] ?>" value="<?= $order['order_id'] ?>"/></td>
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
                <a href="javascript:void(0)" onclick="delete_order();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
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
					<h5>Tuỳ chọn module đặt hàng</h5>
				</div>
				<!-- end box / title -->
                 
                        
				<form id="frm_order_config" name="frm_order_config">
				<div class="form">
					<div class="fields">
			          <?
                      foreach($order_config->result_array() as $config):?>
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