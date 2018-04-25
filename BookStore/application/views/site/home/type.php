<?php $this->load->view('site/home/left');?>
<div id="content_right">
            <h3><?php echo $type->name;?></h3>
			<div class="products">
				<ul>
					<?php foreach($list as $row):?>
					<li>
						<div class="product">
							<a href="#" class="info">
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
	
</div> <!-- end of content right -->