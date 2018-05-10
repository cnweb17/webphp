<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view("site/head.php");?>
</head>
<body>
	<button onclick="topFunction()" id="topbtn" title="Go to top"><i class="fa fa-arrow-up"></i></button>
	<div id="container">
			<?php $this->load->view("site/menu.php");?>
		<div id="banner">
			<?php $this->load->view("site/banner.php");?>
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

<script>

$('#demo').carousel({
	interval: 2000
})

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
