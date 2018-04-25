
<div id="content_left">
        	<div class="content_left_section">
            	<h3>Thể Loại</h3>
                <ul>
                    <?php foreach ($types as $row): ?>
                    <li><a href="<?php echo base_url('home/type/'.$row->id_type);?>"><?php echo $row->name;?></a></li>
                    <?php endforeach; ?>

            	</ul>
            </div>
</div> <!-- end of content left -->