<?php
	$this->load->view('admin/book/header');

?>
				
<div class="wrapper" id="main_product">
	<div class="widget">
	<?php if(isset($message))
	{ 
		$this->load->view('admin/admin/message');
	}
	?>
		<div class="title">
			
			<h6>
				Danh sách sản phẩm			</h6>
		 	<div class="num f12">Số lượng: <b><?php echo $total;?> </b></div>
		</div>
		<div class='pagination'>
					   <?php echo $this->pagination->create_links();?>  
		</div>	
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
			
			<thead class="filter"><tr><td colspan="6">
				<form class="list_filter form" action="<?php echo base_url('admin/book/index');?>" method="get">
					<table cellpadding="0" cellspacing="0" width="80%"><tbody>
					
						<tr>
							<td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
							<td class="item"><input name="id" 
								value="<?php echo $this->input->get('id');?>" id="filter_id" type="text" style="width:55px;" /></td>
							
							<td class="label" style="width:40px;"><label for="filter_id">Tên</label></td>
							<td class="item" style="width:155px;" ><input name="name" 
								value="<?php echo $this->input->get('name');?>" id="filter_iname" type="text" style="width:155px;" /></td>
							
							<td class="label" style="width:60px;"><label for="filter_status">Thể loại</label></td>
							<td class="item">
								<select name="type">
									<option value="">Lựa chọn thể loại</option>
									<?php foreach($types as $t): ?>
									    <?php if($this->input->get('type') == $t->id_type )
									    	{
									        echo '<option value="'.$t->id_type.'" selected>
									        	'.$t->name;'.
									        </option>';
									    	}
									    	else
									    	{
									    		echo '<option value="'.$t->id_type.'" >
									        	'.$t->name;'.
									        	</option>';
									    	}
									        ?>
									    <?php endforeach;?>
								</select>
							</td>
							
							<td style='width:150px'>
							<input type="submit" class="button blueB" value="Lọc" />
							<input type="reset" class="basic" value="Reset" onclick="window.location.href = '<?php echo base_url('admin/book')?>'; ">
							</td>
							
						</tr>
					</tbody></table>
				</form>
			</td></tr></thead>
			
			<thead>
				<tr>
					<td style="width:60px;">Mã Số</td>
					<td>Tên</td>
					<td>Tác Giả</td>
					<td>Năm phát hành</td>
					<td>Thể loại</td>
					<td>Giá</td>
					<td style="width:120px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">

				<tr>
					<td colspan="6">
						 
					</td>
				</tr>
			</tfoot>
			
			<tbody class="list_item">
				<?php foreach($list as $row): ?>
			    <tr class='row_9'>
					
					<td class="textC"><?php echo $row->id_book; ?></td>
					
					<td>
					<div class="image_thumb">
						<img src="<?php echo public_url('site/images/book/').$row->link_image;?>" height="50">
						<div class="clear"></div>
					</div>
					
					<a href="<?php echo base_url('admin/book/bookdetails/').$row->id_book;?>" class="tipS" title="" target="_blank">
					<b><?php echo $row->name ;?></b>
					</a>
					
						
					</td>
					<td><span title="<?php echo $row->author ;?>" class="tipS">
							<?php echo $row->author ;?> </span></td>

					<td class="textC"><?php echo $row->publish_year ;?></td>

					<td><span title="<?php echo $row->id_type ;?>" class="tipS">
							<?php echo $row->id_type ;?> </span></td>
					<td class="textR">
                        <?php echo number_format($row->price, 3). " VND"; ?>	
					</td>

					
					
					
					<td class="option textC">
						<a  href="<?php echo base_url('admin/book/bookdetails/').$row->id_book;?>" target='_blank' class='tipS'
						 title="Xem chi tiết sản phẩm">
							<img src="<?php echo public_url('admin')?>/images/icons/color/view.png" />
						 </a>
						 <a href="<?php 
						 echo base_url('admin/book/load_edit_view/').$row->id_book;?>" title="Chỉnh sửa" class="tipS">
							<img src="<?php echo public_url('admin')?>/images/icons/color/edit.png" />
						</a>
						
						<a href="<?php echo base_url('admin/book/delete/').$row->id_book;?>" title="Xóa" class="tipS verify_action" >
						    <img src="<?php echo public_url('admin')?>/images/icons/color/delete.png" />
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
		        </tbody>
			
		</table>
	</div>

	