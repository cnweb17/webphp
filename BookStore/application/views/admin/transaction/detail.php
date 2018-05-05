<?php
$this->load->view('admin/transaction/header');

?>

<div class="widget" style="margin-left: 10px; margin-right: 10px;">
		<div class="title">
			<h6>Chi tiết Giao dịch</h6>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			<thead class="filter"><tr><td colspan="9">
				<form class="list_filter form" action="index.php/admin/product_order.html" method="get">
					<table cellpadding="0" cellspacing="0" width="100%"><tbody>
					
						<tr>
							<td class="label" style="width:80px;">Mã giao dịch:</td>
							<td class="item"><?php echo $id_orders;?></td>
							
							<td class="label" style="width:80px;">Thời gian: </td>
							<td class="item"><?php echo $time;?></td>
							
						</tr>
						
						<tr>
						    <td class="label" style="width:80px;">Khách hàng: </td>
						    <td class="item"><?php echo $cus_name;?></td>
						</tr>
						
					</tbody></table>
				</form>
			</td></tr></thead>
			
			<thead>
				<tr>
					<td style="width:60px;">Mã số</td>
					<td style="width:60px;">Mã sách</td>
					<td>Sản phẩm</td>
					<td style="width:120px;">Giá</td>
					<td style="width:80px;">Số lượng</td>
					<td style="width:120px;">Số tiền</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="9">
			
					</td>
				</tr>
			</tfoot>
			
			<tbody class="list_item">
				<?php foreach($list as $row):?>
				<tr class="row_11">
					<td class="textC"><?php echo $row->id_detail;?></td>
					<td class="textC"><?php echo $row->id_book;?></td>
					
					<td>
					<div class="image_thumb">
						<img src="<?php echo public_url('site/images/book/'.$row->link_image);?>" height="50">
						<div class="clear"></div>
					</div>
					
					<a href="<?php echo base_url('admin/book/bookdetails/'.$row->id_book);?>" class="tipS" title="" target="_blank">
					<b><?php echo $row->name?></b>
					</a>	
					</td>
					
					<td class="textR">
					  	 <?php echo number_format($row->price,3);?> VNĐ
                     </td>
					
					<td class="textC"><?php echo $row->quantity;?></td>
					
					<td class="textC" style="color: red;"><?php echo number_format($row->money,3);?> VNĐ</td>
					
					
				</tr>
				<?php endforeach;?>
			</tbody>
			
		</table>
	</div>
<div class="clear mt30"></div>