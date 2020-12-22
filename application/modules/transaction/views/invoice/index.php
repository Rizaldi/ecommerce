<?php $this->load->view('include/breadcumb'); ?>

<div class="shop-details-area pb-30">
    <div class="container">
        <div class="row">
            <h5>Detail Transaksi</h5>
            <hr>
            <div class="col-md-12 effect7 box" style="padding: 20px;">
                <div class="row">
                    <div class="col-md-1">
                        <img src="<?php echo base_url('public/img/icon/jaminan.png') ?>">
                    </div>
                    <div class="col-md-9">
                        <h6>Selalu waspada terhadap pihak tidak bertanggung jawab</h6>
                        <ul>
                            <br>
                            <li>- Jangan lakukan pembayaran dengan nominal yang berbeda dengan yang tertera pada tagihan kamu.</li>
                            <br>
                            <li>- Jangan lakukan transfer di luar nomor rekening atas nama Jual Beli Produk.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-7" style="padding: 20px;border: solid 1px #DDD;margin-top: 2%;">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Petunjuk Pembayaran</h6>
                        <hr>
                        Lakukan pembayaran dengan detail sebagai berikut :
                        <br><br>
                        <?php if ($transaction->payment_type == 'bank_transfer'): ?>
                            <?php if ($transaction->status_trans == 1): ?>
                                <div style="height: 1000px;">
                                <object style="width: 100%;height: 100%;" data="<?php echo $transaction->pdf_url ?>" type="application/pdf"></object>
                            <?php else: ?>
                                <div style="height: 800px;border-left:solid 5px #ea3a3c;padding: 20px;">
                                    <label> <?php echo $transaction->account_name; ?></label>
                                    <br><br>
                                    <span style="color: #ea3a3c;">Transaction Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;</span>
                                    <span><?php echo date("d F Y h:i", strtotime($transaction->transaction_time)); ?></span>
                                    <hr style="color: #ea3a3c;background-color: #ea3a3c;">
                                    <span style="color: #ea3a3c;">Order ID  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;</span>
                                    <span><?php echo $transaction->order_id; ?></span>
                                    <br><br>
                                    <span style="color: #ea3a3c;">Payment Due   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;</span>
                                    <span><?php echo date('d F Y h:i', strtotime('+1 day', strtotime($transaction->transaction_time))); ?></span>
                                    <br><br>
                                    <span style="color: #ea3a3c;">Total Amount   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;</span>
                                    <span><?php echo 'Rp '.number_format($transaction->gross_amount,0,",","."); ?></span>
                                    <hr style="color: #ea3a3c;background-color: #ea3a3c;">
                                    <b>Payment Step By Step</b>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-4" align="center">
                                            <img src="<?php echo base_url('public/img/icon/atm.png') ?>">
                                            <br>
                                            <b>1.</b><span> Transfer dapat melalui <b>ATM, SMS / M-Banking,</b> dan <b>E-Banking.</b></span>
                                        </div>
                                        <div class="col-md-1">
                                            <img src="<?php echo base_url('public/img/icon/right-arrow.png') ?>" style="margin-top: 40px;">
                                        </div>
                                        <div class="col-md-4" align="center">
                                            <img src="<?php echo base_url('public/img/icon/atm.png') ?>">
                                            <br>
                                            <b>2.</b><span> Masukkan <b>nomor rekening Jual Beli Produk.</b></span>
                                        </div>
                                        <div class="col-md-1">
                                            <img src="<?php echo base_url('public/img/icon/right-arrow.png') ?>" style="margin-top: 40px;">
                                        </div>
                                        <br><br><br><br><br><br><br><br><br><br><br><br><br>
                                        <div class="col-md-4" align="center">
                                            <img src="<?php echo base_url('public/img/icon/atm.png') ?>">
                                            <br>
                                            <b>3.</b><span>Masukkan <b>jumlah bayar</b> tepat hingga <b>3 digit terakhir.</b></span>
                                        </div>
                                        <div class="col-md-1">
                                            <img src="<?php echo base_url('public/img/icon/right-arrow.png') ?>" style="margin-top: 40px;">
                                        </div>
                                        <div class="col-md-4" align="center">
                                            <img src="<?php echo base_url('public/img/icon/atm.png') ?>">
                                            <br>
                                            <b>4.</b><span> Simpan <b>bukti transfer</b> yang kamu dapatkan.</span>
                                        </div>
                                    </div>
                                    <br><br><br><br><br><br><br>
                                    <b>Pembayaran dapat dilakukan ke rekening a/n Generasi Juara berikut:</b>
                                    <br><br><br><br>
                                    <div class="col-md-12" align="center">
                                        <img src="<?php echo base_url('public/img/icon/bri.png') ?>" width="200">
                                        <br><br>
                                        <span>Bank BRI, Jakarta</span>
                                        <br>
                                        <h6>119 501 010 639 504</h6>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="col-md-45" style="height:auto;padding: 20px;border: solid 1px #DDD;margin-top: 2%;margin-left: 1%;">
                <div class="row">
                    <div class="col-md-12">
                        <label>No Tagihan</label>
                        <h6><?php echo $transaction->order_id; ?></h6>
                        <hr>
                        <label>Status Tagihan</label>
                        <?php if ($transaction->transaction_status == 'pending'): ?>
                            <br>
                            <span style="background-color: #ffc53e;color:#FFF;font-weight:bold;padding: 5px;">Menunggu pembayaran</span>
                        <?php elseif($transaction->transaction_status == 'expired'): ?>
                            <br>
                            <span style="background-color: #cbcbcb;color:#FFF;font-weight:bold;padding: 5px;">Pembayaran Expired</span>
                        <?php elseif($transaction->transaction_status == 'settlement'): ?>
                            <br>
                            <span style="background-color: #28c14d;color:#FFF;font-weight:bold;padding: 5px;">Pembayaran Berhasil , Barang anda akan segera di proses</span>
                        <?php endif ?>
                        <hr>
                        <label>Metode Pembayaran</label>
                        <?php if (!empty($transaction->va_numbers)): ?>
                            <h6>Transfer Virtual Account</h6>
                        <?php else: ?>
                            <h6>Transfer Bank</h6>
                        <?php endif ?>
                        <hr>
                        <label>Total Pembayaran</label>
                        <h6><?php echo 'Rp '.number_format($transaction->gross_amount,0,",","."); ?></h6>
                        <a class="float-right" href="#" id="detail_payment">Lihat Rincian</a>
                        <div class="list_payment">
                            <hr>
                            <label>Rincian Pembayaran</label>
                            <br><br>
                            <span style="font-weight: 700;">Harga Barang</span><span class="float-right"><?php echo 'Rp '.number_format($transaction->net_amount,0,",","."); ?></span>
                            <br><br>
                            <span style="font-weight: 700;">Biaya Pengiriman</span><span class="float-right"><?php echo 'Rp '.number_format($transaction->shipping_cost,0,",","."); ?></span>
                            <hr>
                            <span style="font-weight: 700;">Total Pembayaran</span><span class="float-right"><?php echo 'Rp '.number_format($transaction->gross_amount,0,",","."); ?></span>
                        </div>
                        <hr>
                        <h6>Alamat Pengiriman</h6>
                        <br>
                        <span><?php echo $transaction->address1; ?></span>
                        <hr>
                        <label>No Transaksi</label>
                        <h6><?php echo $transaction->transaction_id; ?></h6>
                        <br>
                        <div class="card">
                          <div class="card-header">
                            <h6>Daftar Pembelian</h6>
                        </div>
                        <div class="card-body">
                            <?php foreach ($purchase->result() as $pur): ?>
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="<?php echo base_url('public/img/product/'.$pur->front_image) ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <b><?php echo $pur->title; ?></b>
                                        <span>Jumlah : <?php echo $pur->qty; ?></span><br>
                                        <span>Berat : <?php echo $pur->weight * $pur->qty; ?> Gram</span><br>
                                        <b><?php echo 'Rp '.number_format($pur->total,0,",","."); ?></b>
                                    </div>
                                </div>
                                <hr>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12" style="padding: 20px;" align="center" >
                <div class="content1">
                    <h2>Order Status</h2>
                </div>
                <div class="content2">
                    <div class="content2-header1">
                        <p>Status : <span>
                            <?php if ($transaction->status == 0) {
                                echo "Process transaction";
                            }elseif ($transaction->status == 1) {
                                echo "Confirmed Order";
                            }elseif ($transaction->status == 2) {
                                echo "Processing Order";
                            }elseif ($transaction->status == 3) {
                                echo "Checking Quality";
                            }elseif ($transaction->status == 4) {
                                echo "Dispatched Item";
                            }else{
                                echo "Product Delivered";
                            } ?>
                        </span></p>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="content3" align="center">
                    <div class="shipment">
                        <div class="process">
                            <div class="imgcircle" <?php echo ($transaction->status >= 0) ? ' style="background-color:#98D091;"' : '' ; ?>>
                                <img src="<?php echo base_url('') ?>public/img/icon/process.png" alt="process order">
                            </div>
                            <span class="line" <?php echo ($transaction->status >= 0) ? ' style="background-color:#98D091;"' : '' ; ?>></span>
                            <hr> 
                            <p style="color: #000;">Processing Order</p>
                        </div>
                        <div class="confirm">
                            <div class="imgcircle" <?php echo ($transaction->status > 0) ? ' style="background-color:#98D091;"' : '' ; ?>>
                                <img src="<?php echo base_url('') ?>public/img/icon/confirm.png" alt="confirm order">
                            </div>
                            <span class="line" <?php echo ($transaction->status > 0) ? ' style="background-color:#98D091;"' : '' ; ?>></span>
                            <hr> 
                            <p style="color: #000;">Confirmed Order</p>
                        </div>
                        
                        <!-- <div class="quality">
                            <div class="imgcircle" <?php echo ($transaction->status > 1) ? ' style="background-color:#98D091;"' : '' ; ?>>
                                <img src="<?php echo base_url('') ?>public/img/icon/quality.png" alt="quality check">
                            </div>
                            <span class="line" <?php echo ($transaction->status > 1) ? ' style="background-color:#98D091;"' : '' ; ?>></span>
                            <hr> 
                            <p style="color: #000;">Quality Check</p>
                        </div> -->
                        <!-- <div class="dispatch">
                            <div class="imgcircle" <?php echo ($transaction->status > 2) ? ' style="background-color:#98D091;"' : '' ; ?>>
                                <img src="<?php echo base_url('') ?>public/img/icon/dispatch.png" alt="dispatch product">
                            </div>
                            <span class="line" <?php echo ($transaction->status > 2) ? ' style="background-color:#98D091;"' : '' ; ?>></span>
                            <hr> 
                            <p style="color: #000;">Dispatched Item</p>
                        </div> -->
                        <div class="delivery">
                            <div class="imgcircle" <?php echo ($transaction->status > 3) ? ' style="background-color:#98D091;"' : '' ; ?>>
                                <img src="<?php echo base_url('') ?>public/img/icon/delivery.png" alt="delivery">
                            </div>
                            <hr> 
                            <p style="color: #000;">Product Delivered</p>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <br><br><br>
            <div>
                <!-- <button type="submit" class="form-control detail_pengiriman" style="background-color:#98D091;color:white;">Detail Pengiriman</button> -->
            </div>
            <br><br>
            <div align="center" class="loading_track" style="display: none;">
                <img src="<?php echo base_url() ?>public/img/icon/loading.gif" width="30">
            </div>
            <div id="detail_pengiriman" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                  </div>
                  <div class="modal-body">
                    <p>Some text in the modal.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>
        </div>
    </div>
</div>
</div>