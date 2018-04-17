<?php
	$this->load->view('admin/admin/header');

?>

<div class="wrapper">
	<?php if(isset($message))
	{ 
		$this->load->view('admin/admin/message');
	}
	?>
	<div class="widget">
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck"></span>
			<h6>Danh sách Thành viên</h6>
		 	<div class="num f12">Tổng số: <b><?php echo $total;?></b></div>
		</div>
		
		<form action="" method="get" class="form" name="filter">
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:10px;"><img src="<?php echo public_url('admin'); ?>/images/icons/tableArrows.png"></td>
					<td style="width:80px;">Mã số</td>
					<td>Tài Khoản</td>
					<td>Họ Tên</td>
					<td>Địa Chỉ</td>
					<td>Email</td>
					<td>Số điện thoại</td>
					<td>Vị trí</td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot>
				<tr>
					<td colspan="7">
					     <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="user/del_all.html">
									<span style="color:white;">Xóa hết</span>
								</a>
						 </div>
							
					     <div class="pagination">
			               			            </div>
					</td>
				</tr>
			</tfoot>
 			
			<tbody>
				<!-- Filter -->
				<?php  foreach ($list as $row): ?>
					<tr>
						<td><input type="checkbox" name="id[]" value="<?php echo $row->idemployee ;?>"></td>
						
						<td class="textC"><?php echo $row->idemployee ;?></td>
						
						
						<td><span title="<?php echo $row->username ;?>" class="tipS">
							<?php echo $row->username ;?> </span></td>

						<td><span title="<?php echo $row->Name ;?>" class="tipS">
							<?php echo $row->Name ;?> </span></td>

							<td><span title="<?php echo $row->address ;?>" class="tipS">
							<?php echo $row->address ;?> </span></td>

							<td><span title="<?php echo $row->email ;?>" class="tipS">
							<?php echo $row->email ;?> </span></td>

							<td><span title="<?php echo $row->phonenumber ;?>" class="tipS">
							<?php echo $row->phonenumber ;?> </span></td>

						<td><span title="<?php echo $row->position ;?>" class="tipS">
							<?php echo $row->position ;?></span></td>
						
						<td class="option">
							 <a href="<?php echo base_url('admin/admin/load_edit/'.$row->idemployee);  ?>" title="Chỉnh sửa" class="tipS ">
							<img src="<?php echo public_url('admin'); ?>/images/icons/color/edit.png">
							</a>
							
							<a href="user/del/19.html" title="Xóa" class="tipS verify_action">
							    <img src="<?php echo public_url('admin'); ?>/images/icons/color/delete.png">
							</a>
						</td>
					</tr>
				<?php endforeach ;?>
			</tbody>
		</table>
		</form>
	</div>
</div>

<div class="clear mt30"></div>