<section class="content">
  <div class="row">
    <div class="col-12">
      <?php if ($this->session->flashdata('status') == 1): ?>
        <div class="alert alert-success">
          <strong>Data Success Added!</strong>
        </div>
      <?php endif ?>
      <div class="card">
        <div class="card-header">
          <a href="<?php echo site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/add') ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add Category</a>
        </div>
        <div class="card-body">
          <table id="category" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Category</th>
                <th>Category Slug</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($this->db->get('category')->result() as $category): ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $category->category_name; ?></td>
                <td><?php echo $category->category_slug; ?></td>
                <td><?php echo $category->description; ?></td>
                <td align="center"><a href="" class="btn btn-default"><i class="fa fa-pencil"></i></a> <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
              </tr>
            <?php endforeach ?>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>