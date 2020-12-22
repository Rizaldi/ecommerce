<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Select2</h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
		</div>
	</div>
	<?php echo form_open_multipart($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3)); ?>
	<div class="card-body">
		<div class="row add-image">
			<div class="col-md-6">
				<div class="form-group">
					<label>Title Product</label>
					<input type="text" class="form-control" id="title" name="title" class="title" placeholder="Enter Title.." required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Title Slug</label>
					<input type="text" class="form-control" class="title_slug_disabled" style="text-transform: lowercase;" id="title_slug_disabled" name="title_slug_disabled" placeholder="" disabled="disabled" required>
					<input type="hidden" class="form-control" class="title_slug" style="text-transform: lowercase;" id="title_slug" name="title_slug" placeholder="" required>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Category</label>
					<select class="form-control category_select" name="category">
						<?php foreach ($this->db->get('category')->result() as $category): ?>
							<option value="<?php echo $category->category_id; ?>"> <?php echo $category->category_name; ?> </option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Sub Category</label>
					<select class="form-control sub_category_select" name="sub_category">
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Short Description</label>
					<textarea name="short_description" class="form-control" placeholder="" required></textarea>
				</div>
			</div>
			<div class="col-md-2">
				<label>Weight</label>
				<div class="input-group mb-1">
	              <input type="number" name="weight" class="form-control" style="width: 10%;">
	              <div class="input-group-append">
	                <span class="input-group-text">Gram</span>
	              </div>
	            </div>
			</div>
			<div class="col-md-1">
				<label>Stock</label>
				<div class="input-group mb-1">
	              <input type="number" name="current_stock" class="form-control" style="width: 1%;">
	            </div>
			</div>
			<div class="col-md-1">
				<label>On Sale</label>
				<div class="input-group mb-1">
	              <input type="checkbox" name="on_sale" class="form-control" style="width: 1%;">
	            </div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<label>Description</label>
					<textarea id="desc_froala" name="description" class="form-control" placeholder="Enter Description.." required></textarea>
				</div>
			</div>
			<div class="col-md-6">
				<label>Sale Price</label>
				<div class="input-group mb-1">
	              <input type="text" name="sale_price" id="sale_price" class="form-control" style="width: 10%;">
	              <div class="input-group-append">
	                <span class="input-group-text">Rp</span>
	              </div>
	            </div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Product Front Image</label>
		              <input type="file" id="front_img" name="front_img" class="form-control">
	            </div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Image Product</label>
		              <input type="file" id="img_product" name="img_product[]" class="form-control">
	            </div>
	            <a id="other_image" class="btn btn-default float-right">Add Other Image <i class="fa fa-file"></i></a>
			</div>
			<div class="col-md-12 subm">
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