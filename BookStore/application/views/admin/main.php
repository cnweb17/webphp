<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('admin/head'); ?>
</head>
<body>
	<div id="left_content">
		<?php $this->load->view('admin/left.php') ;?>
	</div>
	<div id="rightSide">
		<?php $this->load->view('admin/top'); ?>
		<!-- Cho nay load  mấy cái bang -->
		<?php 
			if(isset($records))
			{
				$this->load->view($temp,$records);
			}
			else
			{
				$this->load->view($temp);
			}
		?>
		<div class="clear mt30"></div>
		<div class="clear mt30"></div>
		<div class="clear"></div>
		<div id="footer" style="position: absolute;" >
	        <?php $this->load->view('admin/footer'); ?>
	    </div>
	    <div class="clear"></div>

	</div>
</body>
</html>