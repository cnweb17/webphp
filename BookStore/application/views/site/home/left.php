<div id="content_left">
	<div class="content_left_section">
		<h3>Tìm kiếm</h3>

    <ul>
			<li>
				<form class="form-wrapper" action="<?php echo base_url('site/search');?>" method="GET">
					<div>
						<input type="text" id="search_input" name= "query" placeholder="Search for..." required
									value="<?php echo $this->input->get('query');?>" >
						<button type="submit" id="search_button" name="button"><i class="fa fa-search"></i></button>
					</div>
				</form>
			</li>
    </ul>
  </div>

  <div class="content_left_section">
    <h3>Thể Loại</h3>
    <ul>
      <?php foreach ($types as $row): ?>
      <li><a href="<?php echo base_url('home/type/'.$row->id_type);?>"><?php echo $row->name;?></a>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
