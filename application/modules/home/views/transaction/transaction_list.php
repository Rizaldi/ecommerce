<br><br><br><br>
<div class="contact-area pb-20">
  <div class="container">
    <div class="row">
      <div class="cart-main-area pb-20">
        <div class="container">
          <form action="#">
            <div class="cart-table table-responsive">
              <?php $item_total = 0; ?>
              <?php $weight_total = 0; ?>
              <?php foreach ($this->db->where_in('transaction_status',array('pending','capture'))->get_where('transaction',array('user_id'=>$this->session->userdata('data_session')->user_id))->result() as $list_transaction): ?>
                
                <table class="cart_item">
                  <thead>
                    <tr>
                      <th class="p-name">No Transaksi</th>
                      <th class="p-amount">No Order</th>
                      <th class="p-quantity">Total Pembayaran</th>
                      <th class="p-total">Tujuan Pembayaran</th>
                      <th class="p-total">Sumber Pembayaran</th>
                      <th class="p-edit">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="p-name"><?php echo $list_transaction->transaction_id; ?></td>
                      <td class="p-amount">
                        <?php echo $list_transaction->order_id; ?>
                      </td>
                      <td class="p-quantity"><?php echo $list_transaction->gross_amount; ?></td>
                      <td class="p-total"><?php echo $list_transaction->bank; ?></td>
                      <td class="p-name"><b>Dari Rekening : </b><br><?php echo $list_transaction->account_name; ?><br><?php echo $list_transaction->account_number; ?></td>
                      <td class="edit"><a href="#" class="open_transaction" data-toggle="modal" data-id="<?php echo $list_transaction->trans_id; ?>" data-target="#transfer_modal"><img src="<?php echo base_url('') ?>/public/img/icon/camera.png" alt=""> Unggah Bukti</a>
                        <br>
                        <a href="#" class="view_transfer" data-toggle="modal" data-id="<?php echo $list_transaction->trans_id; ?>" data-target="#view_transfer"><i class="fa fa-file-image-o"></i> Lihat Bukti</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <br>
              <?php endforeach ?>
              <br>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div style="background-color: transparent;" class="modal fade" id="transfer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="height: 100px;width: 500px;margin-top: 90px;">
    <div class="modal-content" style="padding: 0;margin: 0;height: 370px;">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> --><h6>Unggah Bukti</h6>
        <a href="#"><img src="<?php echo base_url('public/img/icon/cancel.png') ?>"></a>
      </div>
      <div class="modal-body" style="overflow-y: scroll;">
        <input type="hidden" id="trans" class="trans" name="trans" value="">
        <div class="row">
          <div class="col-md-6">
            <label>Upload Bukti Pembayaran</label>
          </div>
          <div class="col-md-12">
            <div class="">
            <div class="">
              <form action="#" method="GET" class="form">
                <div class="upload" data-upload-options='{"action":"<?php echo base_url('transaction/upload') ?>"}'></div>
                <br>
                <div class="filelists">
                  <span>Complete</span>
                  <ol class="filelist complete">
                  </ol>
                  <span>Queued</span>
                  <ol class="filelist queue">
                  </ol>
                </div>
              </form>
            </div>
          </div>
          </div>
          <br><br>
          <div class="col-md-12">
            Verifikasi pembayaran dilakukan maksimal 1x24 jam. Apabila pembayaran Anda belum juga diverifikasi, kami sarankan Anda untuk meng-upload bukti bayar sehingga membantu mempercepat proses verifikasi pembayaran Anda.
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
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
            <label>Bukti Pembayaran</label>
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