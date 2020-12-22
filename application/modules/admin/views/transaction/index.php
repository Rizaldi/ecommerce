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
          <span class="btn btn-info">Dibayar</span>
        </div>
        <div class="card-body">
          <table id="transaction_capture" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>No. Order</th>
                <th>No. Transaction</th>
                <th>Buyer</th>
                <th>Transaction Date</th>
                <th>Total</th>
                <th>Delivery Status</th>
                <th>Payment Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($this->db->order_by('trans_id','DESC')->get_where('transaction',array('transaction_status'=>'capture'))->result() as $transaction): ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $transaction->order_id; ?></td>
                <td><?php echo $transaction->transaction_id; ?></td>
                <td><?php $name = $this->db->select('username')->get_where('user',array('user_id'=>$transaction->user_id))->row(); echo $name->username; ?></td>
                <td><?php echo date("d-m-Y", strtotime($transaction->transaction_time)); ?></td>
                <td>Rp <?php echo number_format($transaction->gross_amount,0,",","."); ?></td>
                <td>
                  <?php 
                  $track = $this->db->get_where('tracking',array('transaction'=>$transaction->trans_id)); 
                  if (!$track->num_rows() > 0) {
                    echo "Belum di input";
                    // echo '<a href="'.site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/tracking/'.$this->mycrypt->encryptIt($transaction->trans_id)).'" class="btn btn-primary">Input No Resi</a>';
                  }else{
                    if ($track->row()->status == 0) {
                      echo "Sedang Dalam Proses Pengecekan";
                      echo '<a href="'.site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/tracking/'.$this->mycrypt->encryptIt($transaction->trans_id)).'" class="btn btn-default">Update Status Barang</a>';
                    }elseif ($track->row()->status == 1) {
                      echo "Order Telah Dikonfirmasi";
                      echo '<a href="'.site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/tracking/'.$this->mycrypt->encryptIt($transaction->trans_id)).'" class="btn btn-default">Update Status Barang</a>';
                    }elseif ($track->row()->status == 2) {
                      echo "Cek Kualitas Barang";
                      echo '<a href="'.site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/tracking/'.$this->mycrypt->encryptIt($transaction->trans_id)).'" class="btn btn-default">Update Status Barang</a>';
                    }elseif ($track->row()->status == 3) {
                      echo "Barang Sedang Dikirim";
                      echo '<a href="'.site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/tracking/'.$this->mycrypt->encryptIt($transaction->trans_id)).'" class="btn btn-default">Update Status Barang</a>';
                    }elseif ($track->row()->status == 4) {
                      echo "Dispatched Item delivery";
                      echo '<a href="'.site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/tracking/'.$this->mycrypt->encryptIt($transaction->trans_id)).'" class="btn btn-default">Update Status Barang</a>';
                    }else{
                      echo "Product Telah Sampai";
                    }
                  }
                  ?>
                </td>
                <td>
                  <?php 
                  if ($transaction->transaction_status == 'pending') {
                    echo "Belum Dibayar";
                  }elseif ($transaction->transaction_status == 'settlement') {
                    echo "Sudah Dibayar";
                  }elseif ($transaction->transaction_status == 'expired') {
                    echo "Pembayaran Sudah Kadaluarsa";
                  }elseif ($transaction->transaction_status == 'capture') {
                    echo "Silahkan Cek Pembayaran";
                  }
                  ?><br> <a href="#" class="view_transfer" data-toggle="modal" data-id="<?php echo $transaction->trans_id; ?>" data-target="#view_transfer"><i class="fa fa-file-image-o"></i> Lihat Bukti</a>
                </td>
                <td align="center"><a href="<?php echo site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/detail/'.$this->mycrypt->encryptIt($transaction->trans_id)) ?>" class="btn btn-dark">Detail Transaction</a></td>
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
<div class="col-12">
      <?php if ($this->session->flashdata('status') == 1): ?>
        <div class="alert alert-success">
          <strong>Data Success Added!</strong>
        </div>
      <?php endif ?>
      <div class="card">
        <div class="card-header">
          <span class="btn btn-success">Lunas</span>
        </div>
        <div class="card-body">
          <table id="transaction_settlement" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>No. Order</th>
                <th>No. Transaction</th>
                <th>Buyer</th>
                <th>Transaction Date</th>
                <th>Total</th>
                <th>Delivery Status</th>
                <th>Payment Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($this->db->order_by('trans_id','DESC')->get_where('transaction',array('transaction_status'=>'settlement'))->result() as $transaction): ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $transaction->order_id; ?></td>
                <td><?php echo $transaction->transaction_id; ?></td>
                <td><?php $name = $this->db->select('username')->get_where('user',array('user_id'=>$transaction->user_id))->row(); echo $name->username; ?></td>
                <td><?php echo date("d-m-Y", strtotime($transaction->transaction_time)); ?></td>
                <td>Rp <?php echo number_format($transaction->gross_amount,0,",","."); ?></td>
                <td>
                  <?php 
                  $track = $this->db->get_where('tracking',array('transaction'=>$transaction->trans_id)); 
                  if (!$track->num_rows() > 0) {
                    echo "Belum di input";
                    echo '<a href="'.site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/tracking/'.$this->mycrypt->encryptIt($transaction->trans_id)).'" class="btn btn-primary">Input No Resi</a>';
                  }else{
                    if ($track->row()->status == 0) {
                      echo "Sedang Dalam Proses Pengecekan";
                      echo '<a href="'.site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/tracking/'.$this->mycrypt->encryptIt($transaction->trans_id)).'" class="btn btn-default">Update Status Barang</a>';
                    }elseif ($track->row()->status == 1) {
                      echo "Order Telah Dikonfirmasi";
                      echo '<a href="'.site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/tracking/'.$this->mycrypt->encryptIt($transaction->trans_id)).'" class="btn btn-default">Update Status Barang</a>';
                    }elseif ($track->row()->status == 2) {
                      echo "Cek Kualitas Barang";
                      echo '<a href="'.site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/tracking/'.$this->mycrypt->encryptIt($transaction->trans_id)).'" class="btn btn-default">Update Status Barang</a>';
                    }elseif ($track->row()->status == 3) {
                      echo "Barang Sedang Dikirim";
                      echo '<a href="'.site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/tracking/'.$this->mycrypt->encryptIt($transaction->trans_id)).'" class="btn btn-default">Update Status Barang</a>';
                    }elseif ($track->row()->status == 4) {
                      echo "Dispatched Item delivery";
                      echo '<a href="'.site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/tracking/'.$this->mycrypt->encryptIt($transaction->trans_id)).'" class="btn btn-default">Update Status Barang</a>';
                    }else{
                      echo "Product Telah Sampai";
                    }
                  }
                  ?>
                </td>
                <td>
                  <?php 
                  if ($transaction->transaction_status == 'pending') {
                    echo "Belum Dibayar";
                  }elseif ($transaction->transaction_status == 'settlement') {
                    echo "Sudah Dibayar";
                  }elseif ($transaction->transaction_status == 'expired') {
                    echo "Pembayaran Sudah Kadaluarsa";
                  }
                  ?> 
                </td>
                <td align="center"><a href="<?php echo site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/detail/'.$this->mycrypt->encryptIt($transaction->trans_id)) ?>" class="btn btn-dark">Detail Transaction</a></td>
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
<div class="col-12">
  <div class="card">
    <div class="card-header">
      <span class="btn btn-dark">Pending</span>
    </div>
    <div class="card-body">
      <table id="transaction_pending" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>No. Order</th>
            <th>No. Transaction</th>
            <th>Buyer</th>
            <th>Transaction Date</th>
            <th>Total</th>
            <th>Delivery Status</th>
            <th>Payment Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($this->db->order_by('trans_id','DESC')->get_where('transaction',array('transaction_status'=>'pending'))->result() as $transaction): ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $transaction->order_id; ?></td>
            <td><?php echo $transaction->transaction_id; ?></td>
            <td><?php $name = $this->db->select('username')->get_where('user',array('user_id'=>$transaction->user_id))->row(); echo $name->username; ?></td>
            <td><?php echo date("d-m-Y", strtotime($transaction->transaction_time)); ?></td>
            <td>Rp <?php echo number_format($transaction->gross_amount,0,",","."); ?></td>
            <td>
              <?php 
              $track = $this->db->get_where('tracking',array('transaction'=>$transaction->trans_id)); 
              if (!$track->num_rows() > 0) {
                echo "Belum di input";
              }else{
                if ($track->row()->status == 0) {
                  echo "Sedang Dalam Proses Pengecekan";
                }elseif ($track->row()->status == 1) {
                  echo "Order Telah Dikonfirmasi";
                }elseif ($track->row()->status == 2) {
                  echo "Cek Kualitas Barang";
                }elseif ($track->row()->status == 3) {
                  echo "Barang Sedang Dikirim";
                }elseif ($track->row()->status == 4) {
                  echo "Dispatched Item delivery";
                }else{
                  echo "Product Telah Sampai";
                }
              }
              ?>
            </td>
            <td>
              <?php 
              if ($transaction->transaction_status == 'pending') {
                echo "Belum Dibayar";
              }elseif ($transaction->transaction_status == 'settlement') {
                echo "Sudah Dibayar";
              }elseif ($transaction->transaction_status == 'expired') {
                echo "Pembayaran Sudah Kadaluarsa";
              }elseif ($transaction->transaction_status == 'capture') {
                echo "Silahkan Cek Pembayaran";
              }
              ?> 
            </td>
            <td align="center"><a href="<?php echo site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/detail/'.$this->mycrypt->encryptIt($transaction->trans_id)) ?>" class="btn btn-dark">Detail Transaction</a></td>
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
<div class="col-12">
  <div class="card">
    <div class="card-header">
      <span class="btn btn-warning">Expired</span>
    </div>
    <div class="card-body">
      <table id="transaction_expired" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>No. Order</th>
            <th>No. Transaction</th>
            <th>Buyer</th>
            <th>Transaction Date</th>
            <th>Total</th>
            <th>Delivery Status</th>
            <th>Payment Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach ($this->db->order_by('trans_id','DESC')->get_where('transaction',array('transaction_status'=>'expired'))->result() as $transaction): ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $transaction->order_id; ?></td>
            <td><?php echo $transaction->transaction_id; ?></td>
            <td><?php $name = $this->db->select('username')->get_where('user',array('user_id'=>$transaction->user_id))->row(); echo $name->username; ?></td>
            <td><?php echo date("d-m-Y", strtotime($transaction->transaction_time)); ?></td>
            <td>Rp <?php echo number_format($transaction->gross_amount,0,",","."); ?></td>
            <td>
              <?php 
              $track = $this->db->get_where('tracking',array('transaction'=>$transaction->trans_id)); 
              if (!$track->num_rows() > 0) {
                echo "Belum di input";
              }else{
                if ($track->row()->status == 0 || $track->row()->status == '' || $track->row()->status == null) {
                  echo "Sedang Dalam Proses Pengecekan";
                }elseif ($track->row()->status == 1) {
                  echo "Order Telah Dikonfirmasi";
                }elseif ($track->row()->status == 2) {
                  echo "Cek Kualitas Barang";
                }elseif ($track->row()->status == 3) {
                  echo "Barang Sedang Dikirim";
                }else{
                  echo "Product Telah Sampai";
                }
              }
              ?>
            </td>
            <td>
              <?php 
              if ($transaction->transaction_status == 'pending') {
                echo "Belum Dibayar";
              }elseif ($transaction->transaction_status == 'settlement') {
                echo "Sudah Dibayar";
              }elseif ($transaction->transaction_status == 'expired') {
                echo "Pembayaran Sudah Kadaluarsa";
              }
              ?> 
            </td>
            <td align="center"><a href="<?php echo site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/detail/'.$this->mycrypt->encryptIt($transaction->trans_id)) ?>" class="btn btn-dark">Detail Transaction</a></td>
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