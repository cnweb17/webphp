<div id="login">

		<h2><span class="fontawesome-lock"></span>Đăng nhập</h2>

		<form action="<?php echo base_url('site/login/check_login'); ?>" method="POST">

			<fieldset style="align-content: center;">

				<p><label for="username">Tên đăng nhập</label></p>
				<p><input type="text" name="username" id="username"
				 placeholder="username" required
				 value="<?php echo $this->input->post('username');?>" >
				</p>

				<p><label for="password">Mật khẩu</label></p>
				<p><input type="password" name="password" id="password"
					placeholder="password" required
					value="<?php echo $this->input->post('password');?>">
				</p>

					<input type="submit" name= "submit" value="Đăng nhập">
					<p  id="signuplink"><a href="<?php echo base_url('site/signup');?>">Đăng kí ngay</a><p>

				<div class="error" align="center" style="font-size: 20px;">
					<?php
						if(isset($error) && $error)
						{
							echo "<p>".$error."</p>";
						}
					?>
				</div>

			</fieldset>

		</form>


</div> <!-- end login -->
