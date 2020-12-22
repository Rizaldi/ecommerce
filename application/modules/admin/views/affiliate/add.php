<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Tambah Affiliasi</h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
		</div>
	</div>
	<?php echo form_open($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3)); ?>
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Category</label>
					<select class="form-control" required="required" id="category_select">
						<option>Select Category-</option>

						<?php foreach ($this->db->get('category')->result() as $category): ?>
							<option value="<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Kelas</label>
					<select class="form-control sub_category_select" id="sub_category_select"></select>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>Content</label>
					<select class="form-control sub_category_select" id="sub_category_select"></select>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<button type="submit" class="btn btn-primary float-right">Submit  <i class="fa fa-angle-double-right"></i></button>
				</div>
			</div>
		</div>
		<!-- /.col -->
	</div>
	<?php echo form_close(); ?>
	<!-- /.row -->
</div>
</div>
