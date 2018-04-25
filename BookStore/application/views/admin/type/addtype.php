<?php $this->load->view('admin/type/header');?>
<div class="wrapper">
    
	   	<!-- Form -->
		<form class="form" id="form" action="<?php echo base_url('admin/type/add');?>" method="post" enctype="multipart/form-data">
			<fieldset>
				<div class="widget">
				    <div class="title">
						<img src="<?php echo public_url("admin");?>/images/icons/dark/add.png" class="titleIcon" />
						<h6>Thêm mới Thể loại</h6>
					</div>
					
					<div class="tab_container">
					     <div id='tab1' class="tab_content pd0">


<div class="formRow">
	<label class="formLeft" for="param_id">Mã thể loại:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo">
			<input name="id_type" id="param_id" _autocheck="true" type="text" />
		</span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error">
			<?php echo form_error('id_type'); ?>
		</div>
	</div>
		<div class="clear"></div>
	</div>
	<div class="formRow hide"></div>
</div>


<div class="formRow">
	<label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
	<div class="formRight">
		<span class="oneTwo">
			<input name="name" id="param_name" _autocheck="true" type="text"  />
		</span>
		<span name="name_autocheck" class="autocheck"></span>
		<div name="name_error" class="clear error">
			<?php echo form_error('name'); ?>
		</div>
	</div>
		<div class="clear"></div>
	</div>
	<div class="formRow hide"></div>
</div>

					<!-- End tab_container-->
	        		
	        		<div class="formSubmit">
	           			<input type="submit" name="submit" value="Thêm mới" class="redB" />
	           			<input type="reset" value="Hủy bỏ" class="basic" />
	           		</div>
	        		<div class="clear"></div>
				</div>
			</fieldset>
		</form>
</div>