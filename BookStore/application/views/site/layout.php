<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view("site/head.php");?>
</head>
<body>
	<div id="container">
			<?php $this->load->view("site/menu.php");?>
		<div id="header1">
			<?php $this->load->view("site/header.php");?>
		</div>
		
		<div id="content">
		
			<!-- Cho nay de load Cac trang : trang chu, dang nhap, dang ki, tim kiem -->
			<?php
				$this->load->view($temp);
			?>
		</div>
		<div id="footer">
			<?php $this->load->view("site/footer.php");?>
		</div>
	</div>
</body>
</html>