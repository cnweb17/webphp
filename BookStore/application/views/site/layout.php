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
		<div class="search-form" style="position: absolute; right: 250px; size:100px ">
					<form method="get" action="/tim-kiem.html">
						<input type="search" id="search_query" placeholder="Tìm kiếm..." value="" name="search_query" class="search-input">
						<input type="submit" value="Search" name="submit" class="search-submit">
					</form>
					<div class="auto_suggest"></div>
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