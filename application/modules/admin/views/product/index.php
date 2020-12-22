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
          <a href="<?php echo site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/add') ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add Product</a>
        </div>
        <div class="card-body">
          <table id="products" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Category</th>
                <th>Category Sub</th>
                <th>Title</th>
                <th>short_description</th>
                <th>description</th>
                <th>weight</th>
                <th>sale_price</th>
                <th>purchase_price</th>
                <th>front_image</th>
                <th>current_stock</th>
                <th>on_sale</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($this->db->get('product')->result() as $product): ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $product->title; ?></td>
                <td><?php echo $product->title_slug; ?></td>
                <td><?php echo $product->short_description; ?></td>
                <td><?php echo $this->db->get_where('category',array('category_id'=>$product->category))->row()->category_name; ?></td>
                <td><?php echo ($this->db->get_where('sub_category',array('category'=>$product->category))->num_rows() > 0 ) ? $this->db->get_where('sub_category',array('category'=>$product->category))->row()->sub_category_name : '' ; ?></td>
                <td><?php echo $product->weight; ?></td>
                <td><?php echo $product->sale_price; ?></td>
                <td><?php echo $product->purchase_price; ?></td>
                <td><?php echo $product->front_image; ?></td>
                <td><?php echo $product->current_stock; ?></td>
                <td><?php echo $product->on_sale; ?></td>
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