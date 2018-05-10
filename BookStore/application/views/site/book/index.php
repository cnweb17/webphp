<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view("site/head.php");?>
</head>
<style>
.carousel-inner .carousel-item.active,
.carousel-inner .carousel-item-next,
.carousel-inner .carousel-item-prev {
	display: flex;
}

.carousel-inner .carousel-item-right.active,
.carousel-inner .carousel-item-next {
	transform: translateX(25%);
}

.carousel-inner .carousel-item-left.active,
.carousel-inner .carousel-item-prev {
	transform: translateX(-25%);
}

.carousel-inner .carousel-item-right,
.carousel-inner .carousel-item-left{
	transform: translateX(0);
}
</style>
<body>
	<button onclick="topFunction()" id="topbtn" title="Go to top"><i class="fa fa-arrow-up"></i></button>
	<div id="container">
			<?php $this->load->view("site/menu.php");?>
		<div id="content">

			<div class="book_container">
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
						<?php echo $shortcut." ... ";?>
						<a data-toggle="collapse" href="#details">Xem chi tiết</a>
					</div>

					<div style="width: 200px;height: 30px;">
						<a href="<?php echo base_url('site/cart/add/'.$info->id_book);?>" style="color: green" target="_blank" >
						<button type="button" id="addbtn">
							<i class="fa fa-cart-arrow-down"></i>
							THÊM VÀO GIỎ HÀNG
						</button>
						</a>
					</div>
				</div>
			</div>

			<div id="details" class="collapse">
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
			</div>


			<!--Các sản phẩm tương tự-->
			<div class="relation">
				<h2 id = "title" align="center" style="color: blue;">CÁC SẢN PHẨM TƯƠNG TỰ CÙNG THỂ LOẠI</h2>
				<div class="books">
					<?php
					 	$first = $list[0];
						$list = array_slice($list, 1);
					?>

					<div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
				    <div class="carousel-inner w-100" role="listbox">
			        <div class="carousel-item active">
								<div class="item-holder">
									<a href="<?php echo base_url('site/book/index?id='.$first->id_book);?>" class="info">
										<img src="<?php echo public_url('site/images/book/').$first->link_image;?>" alt="" />
										<span class="book-name"><?php echo $first->name;?></span>
										<span class="author"><?php echo $first->author;?></span>
									</a>
								</div>
			        </div>
							<?php foreach($list as $row):?>
								<div class="carousel-item">
									<div class="item-holder">
										<a href="<?php echo base_url('site/book/index?id='.$row->id_book);?>" class="info">
											<img src="<?php echo public_url('site/images/book/').$row->link_image;?>" alt="" />
											<span class="book-name"><?php echo $row->name;?></span>
											<span class="author"><?php echo $row->author;?></span>
										</a>
									</div>
				        </div>
							<?php endforeach;?>
						</div>

				    <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
				        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				        <span class="sr-only">Previous</span>
				    </a>
				    <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
				        <span class="carousel-control-next-icon" aria-hidden="true"></span>
				        <span class="sr-only">Next</span>
				    </a>
					</div>
				</div>
			</div>

		</div>
		<div id="footer">
			<?php $this->load->view("site/footer.php");?>
		</div>
	</div>
</body>

<script>

$('#demo').carousel({
	interval: 2000
})

$('#recipeCarousel').carousel({
	interval: 450
})

$('.carousel .carousel-item').each(function(){
	var next = $(this).next();
	if (!next.length) {
	next = $(this).siblings(':first');
	}
	next.children(':first-child').clone().appendTo($(this));

	for (var i=0;i<2;i++) {
			next=next.next();
			if (!next.length) {
				next = $(this).siblings(':first');
			}

			next.children(':first-child').clone().appendTo($(this));
		}
});
// AJAX
function addItem(id_book) {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200) {
						document.getElementById("total_items").innerHTML = "(" + this.responseText + ")";
				}
		};

		xmlhttp.open("GET", "<?php echo base_url('site/cart/addToCart?id='); ?>" + id_book, true);
		xmlhttp.send();

}
</script>
</html>
