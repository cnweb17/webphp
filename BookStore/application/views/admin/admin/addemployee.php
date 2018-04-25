<?php $this->load->view('admin/admin/header'); ?>
<div class="wrapper">

	<fieldset>
		<div class="widget">
			<div class="title">
				<img src="<?php echo public_url('admin'); ?>/images/icons/dark/add.png" class="titleIcon" />
				<h6>Thêm mới Admin</h6>
			</div>
		</div>
		<form class="form" id="form" action="<?php echo base_url('admin/admin/add');?> " method="post" enctype="multipart/form-data">
				<div class="formRow">
					<label class="formLeft" for="param_username">Tên đăng nhập:<span class="req">*</span></label>
					<div class="formRight">
					<span class="oneTwo"><input name="username" id="param_username" _autocheck="true" type="text" value="<?php echo set_value('username'); ?>" ></span>
						<div name="username_error" class="clear error" >
							<?php echo form_error('username'); ?>
						</div>
					</div>

					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_password">Mật khẩu:<span class="req">*</span></label>
					<div class="formRight">
					<span class="oneTwo"><input name="password" id="param_password" _autocheck="true" type="password" value="<?php echo set_value('password'); ?>" ></span>
					<div name="password_error" class="clear error">
						<?php echo form_error('password');?></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_repassword">Nhập lại mật khẩu:<span class="req">*</span></label>
					<div class="formRight">
					<span class="oneTwo"><input name="repassword" id="param_repassword" _autocheck="true" type="password" value="<?php echo set_value('repassword'); ?>"></span>
					<div name="repassword_error" class="clear error">
						<?php echo form_error('repassword'); ?></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="formRow">
					<label class="formLeft" for="param_name">Họ tên:<span class="req">*</span></label>
					<div class="formRight">
					<span class="oneTwo"><input name="name" id="param_name" _autocheck="true" type="text" value="<?php echo set_value('name'); ?>"></span>
					<div name="name_error" class="clear error">
						<?php echo form_error('name'); ?></div>
					</div>
					<div class="clear"></div>
				</div>
				
					<div class="clear"></div>
				</div>
				<div class="formSubmit">
	           			<input type="submit" value="Thêm mới" class="redB">
	           			<input type="reset" value="Hủy bỏ" class="basic">
	           	</div>
		</form>
	</fieldset>
	</form>
</div>