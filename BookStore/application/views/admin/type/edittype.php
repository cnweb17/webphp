<?php $this->load->view('admin/type/header'); ?>
<div class="wrapper">

	<fieldset>
		<div class="widget">
			<div class="title">
				<img src="<?php echo public_url('admin'); ?>/images/icons/dark/add.png" class="titleIcon" />
				<h6>Chỉnh sửa thông tin Thể loại</h6>
			</div>
		</div>
		<form class="form" id="form" action="<?php echo base_url('admin/type/edit/'.$info->id_type);?> " method="post" enctype="multipart/form-data">
				<div class="formRow">
					<label class="formLeft" for="param_id_type">Mã:<span class="req">*</span></label>
					<div class="formRight">
					<span class="oneTwo"><input name="id_type" id="param_id_type" _autocheck="true" type="text" value="<?php echo $info->id_type; ?>" ></span>
						<div name="id_type_error" class="clear error" >
							<?php echo form_error('id_type'); ?>
						</div>
					</div>

					<div class="clear"></div>
				</div>

				<div class="formRow">
					<label class="formLeft" for="param_name">Tên thể loại:<span class="req">*</span></label>
					<div class="formRight">
					<span class="oneTwo"><input name="name" id="param_name" _autocheck="true" type="text" value="<?php echo $info->name; ?>"></span>
					<div name="name_error" class="clear error">
						<?php echo form_error('name'); ?></div>
					</div>
					<div class="clear"></div>
				</div>
				
					<div class="clear"></div>
				</div>
				<div class="formSubmit">
	           			<input type="submit" value="Cập nhật" class="redB">
	           			<input type="reset" value="Hủy bỏ" class="basic">
	           	</div>
		</form>
	</fieldset>
	</form>
</div>