<?php $this->load->view('admin/type/header'); ?>

<div class="wrapper">
	<?php if(isset($message))
	{ 
		$this->load->view('admin/admin/message');
	}
	?>
	<div class="widget">
		<div class="title">
			
			<h6>Danh sách Thể Loại</h6>
		 	<div class="num f12">Tổng số: <b><?php echo $total;?></b></div>
		</div>
		
		<form action="" method="get" class="form" name="filter">
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					
					<td style="width:200px;">Mã</td>
					<td>Tên thể loại</td>
					<td style="width:150px;">Hành động</td>
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
						
						
						<td class="textC"><?php echo $row->id_type ;?></td>

						<td><span title="<?php echo $row->name ;?>" class="tipS">
							<?php echo $row->name ;?> </span></td>
						
						<td class="option">
							 <a href="<?php echo base_url('admin/type/load_edit/'.$row->id_type);  ?>" title="Chỉnh sửa" class="tipS ">
							<img src="<?php echo public_url('admin'); ?>/images/icons/color/edit.png">
							</a>
							
							<a href="<?php echo base_url('admin/type/delete/'.$row->id_type);  ?>" title="Xóa" class="tipS verify_action">
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