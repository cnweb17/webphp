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
			<h6>Danh sách Thành viên</h6>
		 	<div class="num f12">Tổng số: <b><?php echo $total;?></b></div>
		</div>
		
		<form action="" method="get" class="form" name="filter">
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:80px;">Mã số</td>
					<td>Tài Khoản</td>
					<td>Họ Tên</td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot>
				<tr>
					<td colspan="7">
					
					</td>
				</tr>
			</tfoot>
 			
			<tbody>
				<!-- Filter -->
				<?php  foreach ($list as $row): ?>
					<tr>
						
						<td class="textC"><?php echo $row->id_admin ;?></td>
						
						
						<td><span title="<?php echo $row->username ;?>" class="tipS">
							<?php echo $row->username ;?> </span></td>

						<td><span title="<?php echo $row->name ;?>" class="tipS">
							<?php echo $row->name ;?> </span></td>
						
						<td class="option">
							 <a href="<?php echo base_url('admin/admin/load_edit/'.$row->id_admin);  ?>" title="Chỉnh sửa" class="tipS ">
							<img src="<?php echo public_url('admin'); ?>/images/icons/color/edit.png">
							</a>
							
							<a href="<?php echo base_url('admin/admin/del/'.$row->id_admin);  ?>" title="Xóa" class="tipS verify_action">
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