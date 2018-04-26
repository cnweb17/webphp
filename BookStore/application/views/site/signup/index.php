<div class="loginbox radius">
  <h2 style="color:#141823; text-align:center;">Welcome to Our Website</h2>
  <div class="loginboxinner radius">
    <!--loginheader-->
    <div class="loginform">
      <form id="login" action="<?php echo base_url('site/signup/signup');?>" method="post">
        <!-- -->
        <p>
          <input type="text" id="name" name="name" placeholder="Họ tên" 
          value="<?php echo $this->input->post('name');?>" class="radius" />
          <div name="email_error" class="clear error" style="float: left; padding-left:20px;font-size: 15px;color: red; " >
            <?php echo form_error('name');?>
          </div>
        </p>

        <p>
          
            <input type="date" id="birthday" name="birthday" placeholder="" value="" class="radius" <?php echo $this->input->post('birthday');?> />
          <div name="email_error" class="clear error" style="float: left; padding-left:20px;font-size: 15px;color: red; " >
            <?php echo form_error('birthday');?>
          </div>
        </p>

        <p>
          <input type="text" id="username" name="username" placeholder="Tên đăng nhập" class="radius" value = "<?php echo $this->input->post('username');?>" />
          <div name="email_error" class="clear error" style="float: left; padding-left:20px;font-size: 15px;color: red; " >
        	<?php echo form_error('username');?>
		  </div>
        </p>

        <p>
          <input type="password" id="password" name="password" placeholder="Mật khẩu" class="radius" value = "<?php echo $this->input->post('password');?>" />

          <div name="password_error" class="clear error" style="float: left; padding-left:20px;font-size: 15px;color: red; " >
        	 <?php echo form_error('password');?>
		      </div>
        </p>
        <p>
          <input type="password" id="repassword" name="repassword" placeholder="Nhập lại mật khẩu" class="radius" value= "<?php echo $this->input->post('repassword');?>" />
          <div name="repassword_error" class="clear error" 
          style="float: left; padding-left:20px;font-size: 15px;color: red; " >
          <?php echo form_error('repassword');?>
        	
		</div>
        </p>
        <p>
          <input type="text" id="address" name="address" placeholder="Địa chỉ" 
          value="<?php echo $this->input->post('address');?>" class="radius" />
          <div name="address_error" class="clear error" 
          style="float: left; padding-left:20px;font-size: 15px;color: red; ">
        	<?php echo form_error('address');?>
		</div>
        </p>
        <p>
          <input type="text" id="phone_number" name="phone_number" placeholder="Số điện thoại" value="<?php echo $this->input->post('phone_number');?>" class="radius" />
        <div name="phone_number_error" class="clear error"
         style="float: left; padding-left:20px;font-size: 15px;color: red; " >
         <?php echo form_error('phone_number');?>
		</div>
        </p>
        <p>
          <button class="radius title" name="signup">Đăng kí</button>
        </p>
      </form>
    </div>
    <!--loginform-->
  </div>
  <!--loginboxinner-->
</div>