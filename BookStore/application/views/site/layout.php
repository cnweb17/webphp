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

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("topbtn").style.display = "block";
    } else {
        document.getElementById("topbtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>
</html>
