<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Select2</h3>

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
					<label>Category Name</label>
					<input type="text" class="form-control" id="category_name" name="category_name" class="category_name" placeholder="Enter Category.." required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Category Slug</label>
					<input type="text" class="form-control" class="category_slug_disabled" style="text-transform: lowercase;" id="category_slug_disabled" name="category_slug_disabled" placeholder="" disabled="disabled" required>
					<input type="hidden" class="form-control" class="category_slug" style="text-transform: lowercase;" id="category_slug" name="category_slug" placeholder="" required>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>Description Category</label>
					<textarea name="description" class="form-control" placeholder="Enter Description.." required></textarea>
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