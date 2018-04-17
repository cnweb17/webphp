<div id="login">

		<h2><span class="fontawesome-lock"></span>Đăng nhập</h2>

		<form action="<?php echo base_url('site/login/check_login') ;?>" method="POST">

			<fieldset style="align-content: center;">

				<p><label for="username">Tên đăng nhập</label></p>
				<p><input type="text" name="username" id="username" value="username" onBlur="if(this.value=='')this.value='username'" onFocus="if(this.value=='username')this.value=''"></p> <!-- JS because of IE support; better: placeholder="mail@address.com" -->

				<p><label for="password">Mật khẩu</label></p>
				<p><input type="password" name="password" id="password" value="password" onBlur="if(this.value=='')this.value='password'" onFocus="if(this.value=='password')this.value=''"></p> <!-- JS because of IE support; better: placeholder="password" -->

				<p><input type="submit" name= "submit" value="Đăng nhập"> <a href="#">Đăng kí ngay</a> </p>

			</fieldset>

		</form>
		<?php 
			if (isset($err)) {
				echo "<p>".$err."</p>";
			}
		?>

</div> <!-- end login -->