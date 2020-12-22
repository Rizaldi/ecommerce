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
          <a href="<?php echo site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/add') ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add Sub Category</a>
        </div>
        <div class="card-body">
          <table id="sub_category" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Category</th>
                <th>Sub Category</th>
                <th>Sub Category Slug</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($this->db->get('sub_category')->result() as $sub_category): ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $this->db->get_where('category',array('category_id'=>$sub_category->category))->row()->category_name; ?></td>
                <td><?php echo $sub_category->sub_category_name; ?></td>
                <td><?php echo $sub_category->sub_category_slug; ?></td>
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