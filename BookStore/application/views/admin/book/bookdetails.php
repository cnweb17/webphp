<?php
	$this->load->view('admin/book/header');
?>
<div align="center" style="margin-top: 10px;">
	<h1>Chi tiết sản phẩm</h1>
</div>
<div class= 'container_details' style="border: 1px solid #333; padding: 10px; height: 660px; margin: 30px 15px 15px 30px; ">
	<div class= 'imagebook' style="float: left; width: 400px; height: 600px">
		<img   src="<?php echo public_url('site/images/book/').$info->link_image;?>"
	 width= '400px' height='600px' > 
	</div>
	<div style="float: right; width: 600px; padding: 10px;">
		<h2 style="color: green;"><?php echo $info->name?></h2>
		<p style="font-size: 18px">Tác giả: <?php echo $info->author;?></p>
		<p style="font-size: 16px">Năm phát hành: <?php echo $info->publish_year;?>    &nbsp  Thể loại: <?php echo $type_name;?></p>
		<p style="font-size: 16px; margin-top: 20px; font-family: sans-serif;" >
			<?php echo $info->description;?>
		</p>
		<p style="font-size: 18px">Giá bán: 
			<span style="color: red"><b><?php echo number_format($info->price,3); ?> VNĐ</b>
			</span>
		</p>

	</div>
</div>
