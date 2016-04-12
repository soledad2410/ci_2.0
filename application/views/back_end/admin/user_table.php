<table>
						<thead>
							<tr>
								<th class="left">Tên đầy đủ</th>
								<th>Tên truy cập</th>
								<th>Lần truy cập cuối</th>
								<th>Nhóm quản trị</th>
                                <th>Lên</th>
                                <th>Xuống</th>
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                        
						<tbody>
                        <?foreach($users->result_array() as $user):
                         if($user['group_name']!='super_admin'):
                         ?>
            				<tr>
								<td class="title" style="padding: 10px;"><?= $user['user_fullname'] ?></td>
								<td class="price" style="padding: 10px;"><?= $user['user_name'] ?></td>
								<td class="date" style="padding: 10px;" id="dp1307331808406"><?= date('H:m d-m-Y',$user['last_login']) ?></td>
								<td class="category" style="padding: 10px;"><?= $user['group_name'] ?></td>
                                <td class="queu" style="padding: 10px;"></td>
                                <td class="queu" style="padding: 10px;"></td>
								<td class="selected last" style="padding: 10px;"><input type="checkbox" id="<?= $user['user_name'] ?>" value="<?= $user['user_name'] ?>"/></td>
							</tr>
                           <?endif;
                            endforeach; ?> 
						</tbody>
</table>