<div class= "book_container">
	<div class= "book_image">
		<img id='image' src="<?php echo public_url('site/images/book/'.$info->link_image);?>">
	</div>

	<div class= "book_content">
			<h2 id ="title">
				<?php echo $info->name;?>
			</h2>
		<div class = "author">
			<p>
				<span style="color: #4F4F4F">Tác giả: </span> <?php echo $info->author?>
				    &nbsp
				<span style="color: #4F4F4F">Thể loại: </span> <a style="color: blue;font-weight: normal;" href="<?php echo base_url('home/type/'.$info->id_type);?>"><?php echo $type_name;?></a>
				    &nbsp
				<span style="color: #4F4F4F">Năm xuất bản: </span><?php echo $info->publish_year;?>
			</p>
		</div>

		<hr style="color: #DDDDDD">

		<div class="other">
			<div id="price">
				<?php echo number_format($info->price,3);?> <u>VNĐ</u>
			</div>
		</div>

		<div class="description">
			<?php echo $shortcut." ... ";?><span><a  href="#details" style="color: blue;font-weight: normal;">Xem chi tiết</a></span>
		</div>

		<div style="width: 200px;height: 30px;">
			<a href="<?php echo base_url('site/cart/add/'.$info->id_book);?>" style="color: green" target="_blank" >
			<div class="button">
				THÊM VÀO GIỎ HÀNG
			</div>
			</a>
		</div>

	</div>

</div>
<!--Các sản phẩm tương tự-->
<div class="relation">
	<h2 id = "title" align="center" style="color: blue;">CÁC SẢN PHẨM TƯƠNG TỰ CÙNG THỂ LOẠI</h2>	
	<div class="books">
		<ul>
			<?php foreach($list as $row):?>
			<li>
				<div class="book">
					<a href="<?php echo base_url('site/book/index?id='.$row->id_book);?>" class="info">
					<span class="holder">
						<img src="<?php echo public_url('site/images/book/'.$row->link_image);?>" alt="" />
						<span class="book-name"><?php echo $row->name;?></span>
						<span class="author"><?php echo $row->author;?></span>
					</span>
					</a>
				</div>
			</li>
		<?php endforeach;?>

		</ul>
	</div>
</div>
<div class="details" id="details">
	<h2 id="title" align="center" style="color: blue">GIỚI THIỆU SÁCH</h2>
	<div class="book_name">
		<p><b><?php echo $info->name;?></b></p>
	</div>
	<div class="description" style="font-size: 17px;">
		<?php echo $info->description;?>
	</div>


	<hr style="color: #DDDDDD;">

	<div class="detail" >
		<div style="font-size: 18px;color: red;">Thông tin chi tiết</div>
		<div style="margin-top: 10px;">
			<span style="color: #4F4F4F">Tác giả: </span> <?php echo $info->author?>
		</div>
		<div>
			<span style="color: #4F4F4F">Thể loại: </span> <a style="color: blue;font-weight: normal;" href="<?php echo base_url('home/type/'.$info->id_type);?>"><?php echo $type_name;?></a>
		</div>
		<div><span style="color: #4F4F4F">Năm xuất bản: </span><?php echo $info->publish_year;?></div>
	</div>
	<div align= "right" style="margin-top: 30px;">
		<a href="#title"><img width="50px" height="50px" src="<?php echo public_url('site/images/backtotop.png'); ?>"></a>
	</div>
</div>
