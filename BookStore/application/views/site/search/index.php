<?php
	$this->load->view('site/home/left');
?>

<div id="content_right">

            <h3>Books</h3>

            <?php 
				if(empty($list)) 
				{
					echo "<p style='color:red;font-size:18px;'>
					Không có sách theo yêu cầu</p>";
				} 
			?>
			<div class="products">
				<ul>
					<?php foreach($list as $row):?>
					<li>
						<div class="product">
							<a href="<?php echo base_url('site/book/index?id='.$row->id_book);?>" class="info">
								<span class="holder">
									<img src="<?php echo public_url('site/images/book/').$row->link_image;?>" alt="" />
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