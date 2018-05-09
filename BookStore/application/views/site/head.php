<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>The Book Store</title>
<link href="<?php echo public_url('site'); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<link href="<?php echo public_url('site'); ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo public_url('site'); ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo public_url('site'); ?>/css/stylelogin.css" rel="stylesheet" type="text/css" />
<link href="<?php echo public_url('site'); ?>/css/stylesignup.css" rel="stylesheet" type="text/css" />
<link href="<?php echo public_url('site'); ?>/css/bookstyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
		function isNumberKey(evt)
	      {
	         var charCode = (evt.which) ? evt.which : event.keyCode
	         if (charCode > 31 && (charCode < 48 || charCode > 57))
	            return false;

	         return true;
	      }

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
