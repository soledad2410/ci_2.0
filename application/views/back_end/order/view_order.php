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
					<h5>Thông tin đơn hàng</h5>
                    
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
                <div class="save" >
                <a href="<?=base_url()?>admin/order.html" ><img src="html/resources/images/icons/cancel.png" width="32px" height="32px"/><br />
                <span>Hủy</span>
                </a>
                
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="save_order();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_order(<?=$order['order_id']?>);"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                
                </div>
  		             
				<!-- end box / title -->
                
                <div class="table">
                <?php
               
                        
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
					
				</div>
                
                <form id="frm_order_details" name="frm_order_details">
				<div class="form">
                <div class="fields">
                <div class="field">
							<p align="center"><strong>Thông tin đơn hàng</strong></p>
				        </div>
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Mã đơn hàng</label>
							</div>
							<div class="input">
								<strong><?= 'DH-'.$id ?></strong>
							</div>
				        </div>
                        <input type="hidden" name="order_id" value="<?=$order['order_id']?>" />
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Tên khách hàng</label>
							</div>
							<div class="input">
								<strong><?=$order['cus_name']?></strong>
							</div>
				        </div>
         
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Địa chỉ email</label>
							</div>
							<div class="input">
								<strong><?=$order['cus_email']?></strong>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Số điện thoại</label>
							</div>
							<div class="input">
								<strong><?=$order['cus_phone']?></strong>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Ngày đặt hàng</label>
							</div>
							<div class="input">
								<strong><?= date('H:m d-m-Y',$order['order_date']) ?></strong>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Thông tin đặt hàng</label>
							</div>
							<div class="input">
								<strong><?=$order['order_info']?></strong>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Tổng giá trị đơn hàng</label>
							</div>
							<div class="input" style="color: red;">
								<strong><?= number_format($order['order_value'],0,'.','.') ?> VNĐ</strong>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Lần cập nhập cuối</label>
							</div>
							<div class="input" style="color: red;">
								<strong><?= date('H:m d-m-Y',$order['last_update']) ?> </strong>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Thành viên cập nhập</label>
							</div>
							<div class="input" style="color: red;">
								<strong><?= $order['user_name'] ?> </strong>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Trạng thái</label>
							</div>
							<div class="input">
								<input type="radio" name="order_status" value="0" <?if($order['order_status']==0){echo'checked="checked"';}?> />Chưa tiến hành
							</div>
                            <div class="input">
								<input type="radio" name="order_status" value="1" <?if($order['order_status']==1){echo'checked="checked"';}?> />Đang tiến hành
							</div>
                            <div class="input">
								<input type="radio" name="order_status" value="2" <?if($order['order_status']==2){echo'checked="checked"';}?> />Hoàn tất
							</div>
                            <div class="input">
								<input type="radio" name="order_status" value="3" <?if($order['order_status']==3){echo'checked="checked"';}?> />Hủy bỏ
							</div>
				        </div>
                        <div class="field">
							<p align="center"><strong>Thông tin mặt hàng</strong></p>
				        </div>
                        
                	</div>
                    
				</div>
                <table>
						<thead>
							<tr>
								<th class="left">Tên mặt hàng</th>
                                <th>Giá đặt hàng</th>
								<th>Số lượng sản phẩm</th>
								<th>Tổng giá trị</th>
							</tr>
						</thead>
                   	<tbody>
                        
                            <?foreach($order_details->result_array() as $detail):?>
							<tr>
								<td class="title" style="width: 20%;"><?= $detail['product_name'] ?></td>
                                <td class="name" style="width: 10%;text-align: center;color:red;"><input type="text" name="order_price-<?=$detail['product_id']?>" value="<?= number_format($detail['order_price'],0,'.','.') ?>" /> VNĐ</td>
								<td class="price" style="width: 15%;color:red;"><input type="text" name="order_quanlity-<?=$detail['product_id']?>" value="<?= $detail['order_quanlity'] ?>" /></td>
								<td class="date" id="dp1307331808406" style="color: red;"><?= number_format($detail['order_quanlity']*$detail['order_price'],0,'.','.') ?>VNĐ</td>
			         		</tr>
                            <?endforeach;?>
                            
						</tbody>
     			    </table>
                <div class="sub_menu">
                <div class="save" >
                <a href="<?=base_url()?>admin/order.html" ><img src="html/resources/images/icons/cancel.png" width="32px" height="32px"/><br />
                <span>Hủy</span>
                </a>
                
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="save_order();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                
                </div>
         <div class="save" >
                <a href="javascript:void(0)" onclick="delete_order('<?=$order['order_id']?>');"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                
                </div>
				</form>
                
                <div style="clear: both;"></div>
                             
                
                
                </div>
                
			</div>

<?php
$this->load->view('back_end/footer.php'); 
?>