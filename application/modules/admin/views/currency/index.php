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
          <table id="currency" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>currency from</th>
                <th>currency to</th>
                <th>rates</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($this->db->get('currency_converter')->result() as $currency): ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $currency->from; ?></td>
                <td><?php echo $currency->to; ?></td>
                <td id="price:<?php echo $currency->id; ?>" contentEditable="true"><?php echo $currency->rates; ?></td>
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