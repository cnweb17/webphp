<?php $this->load->view('site/home/left');
	if(isset($message) && $message)
	{
		echo "<script>alert('".$message."');</script>";
	}
?>
<div id="content_right">
  <h3>Books</h3>
	<div class="products">
		<ul>
			<?php foreach($list as $row):?>
			<li class="product">
					<div class="holder">
						<a href="<?php echo base_url('site/book/index?id='.$row->id_book);?>" class="info">
							<img src="<?php echo public_url('site/images/book/').$row->link_image;?>" alt="" />
							<span class="book-name"><?php echo $row->name;?></span>
							<span class="author"><?php echo $row->author;?></span>
						</a>
						<span class="price"><strong><?php echo $row->price.".000Đ" ;?></strong></span>
						<span>
							<button class="addbtn" onclick="addItem(<?php echo $row->id_book;?>)">
								<i class="fa fa-cart-arrow-down"></i>
							</button>
						</span>
					</div>
			</li>
			<?php endforeach;?>
		</ul>
	</div>

	<div class='pagination'>
		<?php echo $this->pagination->create_links();?>
	</div>
</div>
