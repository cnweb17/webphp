<?php 
	if($total_items==0):
?>
<div style="width: 920px;height: 100px;">
	<p style="font-size: 17px; color: red; margin-top: 30px;" align="center">Giỏ hàng rỗng</p>
</div>
<?php else:?>
<div class="cart_container">
	<div class = "list_book">
		<form action="<?php echo base_url('site/cart/update');?>" method="POST">
			<div class="list_header">
				<div class="list_header_left">
					<p style="margin-left: 10px;margin-top: 10px;font-size: 17px;font-family: Arial;">Có <span><?php echo $total_items;?></span> sách trong giỏ</p>
				</div>
				<div class="list_header_mid">
					<p style="margin-left: 10px;margin-top: 10px;font-size: 17px;font-family: Arial;">Giá</p>
				</div>
				<div class="list_header_right">
					<p style="margin-left: 10px;margin-top: 10px;font-size: 17px;font-family: Arial;">Số lượng</p>
				</div>
			</div>

			<div class="list_body">
		<!-- vong lap o day-->
		<?php $total_amount = 0;?>
		<?php foreach($cart as $row):?>
			<?php $total_amount += $row['subtotal']; ?>
			<div class="list_details">
				<div class="list_details_left">
					<img 
					src="<?php echo public_url('site/images/book/'.$row['link_image']);?>">
					<div class="detail">
						<p style="margin-right: 2px;"><?php echo $row['name'];?></p>
						<p style="font-size: 12px;">Tác giả: 
							<span style="color: blue;"> <?php echo $row['author'];?></span>
						</p>
					</div>
					
				</div>
				<div class="list_details_mid">
					<p style="font-size: 19px;color: red; margin-top: 22px;"><?php echo number_format($row['price'],3)?> VNĐ</p>
				</div>
				<div class="list_details_right">
					
					<select name="qty_<?php echo $row['id'];?>" 
					style="background-color: #f4f9ec; margin-top: 18px; margin-left: 20px; height: 30px; font-size: 19px; text-align: center; width: 60px; border-radius: 4px;" >
						<?php for($i=1; $i<=20; $i++):?>
							<?php if($i == $row['qty']):?>
							<option selected value="<?php echo $i;?>"><?php echo $i;?></option>
							<?php else:?>
								<option value="<?php echo $i;?>"><?php echo $i;?></option>
							<?php endif;?>
						<?php endfor;?>
					</select>
					<div style="margin-left: 30px; margin-top: 20px;">
						<a href="<?php echo base_url('site/cart/del/'.$row['id']);?>">
							<img width="30" height="40" src="<?php echo public_url('site/images/deleteicon.png');?>">
						</a>
					</div>
					
				</div>
			</div>
		<?php endforeach;?>
		</div><!-- end of list body-->
			<!--footer-->
			<div class="list_footer">
				<div class="list_footer_left">
					<input type="submit" name="update_cart" value="Cập nhật giỏ hàng">
				</div>

				<div class="list_footer_right">
					<a href="<?php echo base_url('site/cart/del');?>"><div class="button">Xóa tất cả</div>
					</a>
					
				</div>
			</div>

		</form>
	</div>
	<div class="payment">
		<div class="title">
			<h4 style="color: blue">Thông tin đơn hàng</h4>
		</div>

		<hr style="color: #DDDDDD; margin-top: 20px;">

		<div class="payment_body">
			<div class="line1">
				<div class="text">
					<p>Tạm tính (<span style="color: red"><?php echo $total_items;?></span> sản phẩm): </p>
				</div>
				<div class="price">
					<p><?php echo number_format($total_amount ,3);?> VNĐ</p>
				</div>
			</div>
			<div class="line1">
				<div class="text">
					<p>Phí giao hàng: </p>
				</div>
				<div class="price">
					<p>30.000 VNĐ</p>
				</div>
			</div>
			<div class="line1" style="margin-top: 10px;">
				<div class="text">
					<p>Tổng cộng: </p>
				</div>
				<div class="price">
					<p style="color: red;"><?php echo number_format($total_amount + 30 ,3);?> VNĐ</p>
				</div>
			</div>
		</div>

		<div class="payment_footer">
			<a href="<?php echo base_url('site/order');?>">
				<div style="margin-top: 30px;text-align: center;background-color: #FF9900; 
				border-radius: 4px;height: 30px; color: white;font-weight: none; padding-top: 10px;">
					TIẾN HÀNH THANH TOÁN
				</div>
			</a>
		</div>
	</div>
</div>
<?php endif;?>