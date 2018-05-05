<?php
$this->load->view('admin/transaction/header');

?>

<div class="widget" style="margin-left: 10px; margin-right: 10px;">
	<?php if(isset($message))
	{ 
		$this->load->view('admin/transaction/message');
	}
	?>
		<div class="title">
			<h6>Danh sách Giao dịch</h6>
		 	<div class="num f12">Tổng số: <b><?php echo $total;?></b></div>
		</div>
		
		<table class="sTable mTable myTable" id="checkAll" width="100%" cellspacing="0" cellpadding="0">
			
			<thead class="filter"><tr><td colspan="9">
				<form class="list_filter form" 
				action="<?php echo base_url('admin/transaction');?>" method="get">
					<table width="100%" cellspacing="0" cellpadding="0"><tbody>
					
						<tr>
							<td class="label" style="width:60px;"><label for="filter_id">Mã giao dịch</label></td>
							<td class="item"><input name="id_orders" value="<?php echo $this->input->get('id_orders');?>" id="filter_id" style="width:95px;" type="text"></td>
							
							<td class="label" style="width:60px;"><label for="filter_type">Trạng thái</label></td>
							<td class="item">
								<select name="status">
									<option value="">Chọn trạng thái</option>
									<option value="10" <?php 
									if($this->input->post('status') == 10)
									{
										echo "selected";
									}?>
									>Đặt hàng</option>
									<option value="11" <?php 
									if($this->input->post('status') == 11)
									{
										echo "selected";
									}?>
									>Đã giao hàng</option>
								</select>
							</td>
							
							<td colspan="2" style="width:60px">
							<input class="button blueB" value="Lọc" type="submit">
							<input class="basic" value="Reset" onclick="window.location.href = '<?php echo base_url('admin/transaction');?>'; " type="reset">
							</td>
							
						</tr>
						
						<tr>
						    <td class="label" style="width:60px;"><label for="filter_user">Thành viên</label></td>
							<td class="item"><input name="id_cus" value="<?php echo $this->input->get('id_cus');?>" id="filter_user" class="tipS" title="Nhập mã thành viên" type="text"></td>
							

							<td class="label"></td>
							<td class="item"></td>
						</tr>
						
					</tbody></table>
				</form>
			</td></tr></thead>
			<thead>
				<tr>
					<td style="width:80px;">Mã giao dịch</td>
					<td style="width: 80px;">Mã khách hàng</td>
					<td style="width:120px;">Số tiền</td>
					<td style="width:120px;">Trạng thái</td>
					<td>Thời gian tạo</td>
					<td style="width: 150px;">Số điện thoại</td>
					<td style="width:100px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="8">
						
					</td>
				</tr>
			</tfoot>
			
			<tbody class="list_item">
				<?php foreach($list as $row):;?>
				 <tr class="row_21">
					
					<td class="textC"><?php echo $row->id_orders;?></td>

					<td class="textC"><?php echo $row->id_cus;?></td>
					
					<td class="textR red"><?php echo number_format($row->total_money,3);?>
						 VNĐ
					</td>
					
					
					<td class="status textC">
						<span class="pending">
							<?php
							if($row->status == 0)
							{
								echo "Đặt hàng";
							}
							else
							{
								echo "Đã giao hàng";
							}
							?>
						</span>
					</td>
					
					<td class="textC"><?php echo $row->time;?></td>
					<td class="textC"><?php echo $row->phone_number;?></td>
					
					<td class="textC">
							<a href="<?php echo base_url('admin/transaction/detail?id='.$row->id_orders.'&id_cus='.$row->id_cus);?>" title="Xem chi tiết" class="lightbox">
								<img src="<?php echo public_url('admin')?>/images/icons/color/view.png">
							</a>
							<a href="<?php echo base_url('admin/transaction/change_status?id_orders='.$row->id_orders.'&status='.$row->status);  ?>" title="Thay đổi trạng thái" class="tipS ">
							<img src="<?php echo public_url('admin'); ?>/images/icons/color/edit.png">
						   <a href="<?php echo base_url('admin/transaction/delete/'.$row->id_orders);?>" title="Xóa" class="tipS verify_action">
						    <img src="<?php echo public_url('admin')?>/images/icons/color/delete.png">
						   </a>
					</td>
				</tr>
			<?php endforeach;?>
						</tbody>
			
		</table>
	</div>
<div class="clear mt30"></div>