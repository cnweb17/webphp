<?php
if(isset($message) && $message)
	{
		echo "<script>alert('".$message."');</script>";
	}
?>

<div class="form_container">
	<div class="form_header">
		<p>Thông tin giao hàng</p>
	</div>
<form action="<?php echo base_url('site/order/checkout');?>" method="post">
	<div class="form_body">
			<div class="form_body_name">
				<div>
					<label for="name" class="label">
						Tên: <span style="color: red;">*</span>
					</label>
					<input id="name" type="text" name="name" class="input" placeholder="Vui lòng nhập tên của bạn" value="<?php echo $info->name;?>">
				</div>
				<div class="order_error">
					<?php echo form_error('name');?>
				</div>
			</div>	
		<!---->
			<div class="form_body_phone_number">
				<div>
					<label for="phone_number" class="label">
						Số điện thoại: <span style="color: red;">*</span>
					</label>
					<input id="phone_number" type="text" name="phone_number" class="input" placeholder="Vui lòng nhập số điện thoại của bạn" value="<?php echo $info->phone_number;?>">
				</div>
				<div class="order_error">
					<?php echo form_error('phone_number');?>
				</div>
			</div>
			<div class="form_body_address">
				<div>
					<label for="address" class="label">
						Địa chỉ nhận hàng: <span style="color: red;">*</span>
					</label>
					<input id="address" type="text" name="address" class="input" placeholder="Vui lòng nhập địa chỉ của bạn" >
				</div>
				<div class="order_error">
					<?php echo form_error('address');?>
				</div>
			</div>	
	</div>
	<div class="form_footer">
		<input type="submit" name="Save" value="LƯU" style="width: 150px;height: 40px;border-radius: 4px;background-color: #3366CC; color: white;margin-left: 20px;font-weight: bold;">
	</div>
</form>
</div>

