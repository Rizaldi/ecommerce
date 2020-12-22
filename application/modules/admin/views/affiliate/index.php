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
          <a href="<?php echo site_url('admin-jb-brg/list-affiliate/add') ?>" class="btn btn-info">Tambah Affiliasi</a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <table id="transaction_capture" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Admin</th>
                    <th>Product Name</th>
                    <th>Link Affiliasi</th>
                    <th>Affiliasi Terpakai</th>
                    <!-- <th>Action</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach ($this->db->order_by('affiliate_id','DESC')->get_where('affiliate',array('status'=>'1'))->result() as $affiliate):
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php $name = $this->db->select('name')->get_where('admin',array('admin_id'=>$affiliate->admin_id))->row(); echo $name->name; ?></td>
                    <td><?php $title = $this->db->select('title')->get_where('product',array('product_id'=>$affiliate->product_id))->row(); echo $title->title; ?></td>
                    <td><?php echo $affiliate->affiliate_link; ?></td>
                    <td><?php echo $affiliate->affiliate_history; ?></td>
                    
                  </tr>
                <?php endforeach ?>
              </tr>
            </tbody>
          </table>
            </div>
          </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<div style="background-color: transparent;" class="modal fade" id="view_transfer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="height: 100px;width: 500px;margin-top: 90px;">
    <div class="modal-content" style="padding: 0;margin: 0;height: 370px;">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> --><h6>Bukti</h6>
        <a href="#"><img src="<?php echo base_url('public/img/icon/cancel.png') ?>"></a>
      </div>
      <div class="modal-body" style="overflow-y: scroll;">
        <input type="hidden" id="trans" class="trans" name="trans" value="">
        <div class="row">
          <div class="col-md-6">
            <label>Update Status Pembayaran</label>
            <select class="form-control transaction_status" name="transaction_status">
              <option value="">Pilih Status</option>
              <option value="cancel">Cancel</option>
              <option value="settlement">Approve</option>
            </select>
            <br><br> 
            <div id="trans_span"></div>
            <div id="img_transfer"></div>
          </div>
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>