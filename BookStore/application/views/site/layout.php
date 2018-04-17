<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view("site/head.php");?>
</head>
<body>
	<div id="container">
		<div id="menu">
			<?php $this->load->view("site/menu.php");?>
		</div>
		<div id="header">
			<?php $this->load->view("site/header.php");?>
		</div>
		<div id="content">
			<!-- Cho nay de load Cac trang : trang chu, dang nhap, dang ki, tim kiem -->
			<?php
				/*if(isset($temp))
				{	
					if (isset($err)) {
						$this->load->view($temp,$err);
					}
					else
					{
						$this->load->view($temp);
					}
				}*/
				$this->load->view($temp);
			?>
		</div>
		<div id="footer">
			<?php $this->load->view("site/footer.php");?>
		</div>
	</div>
</body>
</html>