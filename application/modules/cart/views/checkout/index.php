<style type="text/css">
.modal.right.fade .modal-dialog {
    -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
    -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
    -o-transition: opacity 0.3s linear, right 0.3s ease-out;
    transition: opacity 0.3s linear, right 0.3s ease-out;
}
.modal.right.fade.in .modal-dialog {
    right: 0;
}
.modal-backdrop
{
    opacity:0.5 !important;
}
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
.unf-navbar__close {
    width: 52px;
    height: 100%;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    position: relative;
}
</style>
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">  
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">checkout</li>
                    </ul>
                </div>  
            </div>
        </div>
    </div>
</div>

<form id="payment-form" method="post" action="<?=site_url()?>transaction/finish">
    <input type="hidden" name="result_type" id="result-type" value=""></div>
    <input type="hidden" name="result_data" id="result-data" value=""></div>
</form>
<div class="checkout-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel">
                        <div class="panel-heading" id="headingOne">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#checkout">
                                    <span>1</span>buyer details
                                </a>
                            </h4>
                        </div>
                        <div id="checkout" class="collapse show">
                            <div class="panel-body"> 
                                <div class="single-panel">
                                    <div class="single-checkout">
                                        <h3 class="login-title">Check as a guest or Login to your account</h3>
                                        <!-- <p class="heading-p">Register with us for future convenience</p> -->
                                        <?php if ($this->session->userdata('data_session')): ?>
                                            Hi , <?php echo $this->session->userdata('data_session')->username; ?>
                                        <?php else: ?>
                                            <form action="#">
                                                <!-- <label>
                                                    <input type="radio" id="guest" name="check_guest" value="guest" checked="checked">
                                                    <span>Checkout as Guest</span>
                                                </label> -->
                                                <label>
                                                    <input type="radio" name="check_guest" value="user" id="user" checked="checked">
                                                    <span>Login</span>
                                                </label>
                                            </form>
                                        <?php endif ?>
                                    </div>
                                    <div class="buttons-set">
                                        <?php if ($this->session->userdata('data_session')): ?>
                                            <button class="button" type="button" id="btn-buyer"><span>Continue</span></button>
                                        <?php else: ?>
                                            <!-- <button class="button" type="button" id="btn-buyer"><span>Continue</span></button> -->
                                        <?php endif ?>
                                    </div>
                                </div>
                                <?php if (!$this->session->userdata('data_session')): ?>
                                <div class="single-panel" style="display: none;" id="login_checkout">
                                    <div class="single-checkout">
                                        <h3 class="login-title">Login</h3>
                                        <h4>Already Registered?</h4>
                                        <p>Please log in below :</p>
                                        <div class="login-form">
                                            <form action="<?php echo site_url('login/checkout') ?>" method="post" id="login_checkout">
                                                <p>Email Adress*</p>
                                                <input type="email" required name="email">
                                                <p>Password*</p>
                                                <input type="password" required name="password">
                                                <div class="pass-wrap">
                                                    <!-- <a href="#" class="forgot-pass">Forgot your Password ?</a> -->
                                                </div>
                                                <button type="submit" class="default-btn">Login</button>
                                                <br><br><span>Do not have a Jual Beli Barang account yet ?<br><br> <a class="btn btn-danger" href="<?php echo site_url('register?from=checkout') ?>">Register now</a></span>
                                            </form>
                                        </div>
                                    </div>    
                                </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#shipping">
                                    <span>3</span> Address Information
                                </a>
                            </h4>
                        </div>
                        <div id="shippinginfo" class="collapse">
                            <div class="panel-body">
                                <div class="login-form">
                                    <form action="#" method="post">
                                        <div class="customer-name">
                                            <div class="first-name">
                                                <p>First Name<span>*</span></p>
                                                <input type="text" id="username" name="username" required <?php echo ($this->session->userdata('data_session')) ? "value='".$this->session->userdata('data_session')->username."' disabled='disabled'" : '' ; ?>>
                                            </div>
                                            <div class="last-name">
                                                <p>Last Name<span>*</span></p>
                                                <input type="text" id="surname" name="surname" required <?php echo ($this->session->userdata('data_session')) ? "value='".$this->session->userdata('data_session')->surname."' disabled='disabled'" : '' ; ?>>
                                            </div>
                                        </div>
                                        <div class="customer-info">
                                            <div class="company-name">
                                                <p>Email</p>
                                                <input type="text" id="email" name="email" required <?php echo ($this->session->userdata('data_session')) ? "value='".$this->session->userdata('data_session')->email."' disabled='disabled'" : '' ; ?>>
                                            </div>
                                        </div>
                                        <p>Address<span>*</span></p>
                                        <textarea id="address" class="form-control"></textarea>
                                        <!-- <textarea id="address" class="form-control" <?php echo ($this->session->userdata('data_session')) ? "style='font-size:12px;color:#c5c0ca;'" : '' ; ?>> <?php echo ($this->session->userdata('data_session')) ? $this->session->userdata('data_session')->address1 : '' ; ?></textarea> -->
                                        <br>
                                        
                                        <br>
                                        <div class="city-country">
                                            <div class="telephone">
                                                <p>Telephone<span>*</span></p>
                                                <input id="phone" type="text" required <?php echo ($this->session->userdata('data_session')) ? "value='".$this->session->userdata('data_session')->phone."' disabled='disabled'" : '' ; ?>>
                                            </div>
                                        </div>
                                        <div class="buttons-set">
                                            <!-- <p class="back-link"><a href="#">Back</a></p> -->
                                            <!-- <button class="button" type="button"><span>Continue</span></button> -->
                                            <button class="button" type="button" id="btn-shipping-information"><span>Continue</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="panel">
                        <div class="panel-heading" id="headingFour">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#shipping-method">
                                    <span>4</span> Shipping Method
                                </a>
                            </h4>
                        </div>
                        <div id="shipping-method" class="collapse">
                            <div class="panel-body">
                                <div class="login-form">
                                    <form action="#" method="post">
                                        <div class="city-country">
                                            <div class="city">
                                                <p>Select Shipping<span>*</span></p>
                                                <select id="shipping_select"></select>
                                            </div>
                                        </div>
                                        <div class="buttons-set">
                                             <p class="back-link"><a href="#">Back</a></p> 
                                            <button class="button" type="button" id="btn-shipping-method"><span>Continue</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="panel">
                        <div class="panel-heading" id="headingFive">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#payment-info">
                                    <span>5</span> PAYMENT INFORMATION
                                </a>
                            </h4>
                        </div>
                        <div id="payment-info" class="collapse">
                            <div class="panel-body">
                                <div class="ship-method payment">
                                    <div class="ship-wrap">
                                        <div class="ship-address">
                                            <input type="radio" name="check" value="check">
                                            <span>Check / Money order </span>
                                        </div>
                                         <div class="ship-address">
                                            <input type="radio" name="check" value="credit">
                                            <span>Credit Card (saved) </span>
                                        </div>
                                    </div>
                                    <div class="buttons-set">
                                        <p class="back-link"><a href="#">Back</a></p>
                                        <button type="button" class="button"><span>Continue</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="panel">
                        <div class="panel-heading" id="headingFour">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#order-review">
                                    <span>6</span> ORDER REVIEW
                                </a>
                            </h4>
                        </div>
                        <div id="order-review" class="collapse">
                            <div class="panel-body">
                                <form action="#">
                                    <div class="checkout-table table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="p-name alignleft">Product Name</th>
                                                    <th class="p-amount">Price</th>
                                                    <th class="p-quantity">Qty</th>
                                                    <th class="p-total">SubTotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $item_total = ""; foreach ($this->session->userdata('cart_item') as $key => $product_cart): ?>
                                                <tr>
                                                    <td class="p-name"><?php echo $product_cart['title']; ?></td>
                                                    <td class="p-amount"><span class="amount">Rp <?php echo number_format($product_cart['price'],0,",","."); ?></span></td>
                                                    <td class="p-quantity"><?php echo $product_cart['quantity']; ?></td>
                                                    <td class="p-total alignright">Rp <?php echo number_format($product_cart['price_quantity'],0,",","."); ?></td>
                                                </tr>

                                                <?php $item_total += ($product_cart["price"]*$product_cart["quantity"]); ?>
                                            <?php endforeach ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3" class="alignright">Subtotal</td>
                                                <td>Rp <?php echo number_format($item_total,0,",","."); ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="alignright"></td>
                                                <td> <span style="display: none;" class="rp_total">Rp </span> <span  id="shipping_cost"> - </span></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="alignright"><strong>Grand Total</strong></td>
                                                <td><strong><span style="display: none;" class="rp_total">Rp </span> <span id="total_product_checkout"> Rp <?php echo number_format($item_total,0,",","."); ?></span></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="checkout-buttons">
                                        <p>Forgot an Item? <a href="<?php echo site_url('cart'); ?>">Edit Your Cart</a>
                                        </p>
                                        <button type="button" class="default-btn" id="order-payment"><span>Select Payment Method</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="background-color: transparent;" class="modal fade" id="modal-payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="height: 200px;width: 400px;margin-top: 90px;">
                <div class="modal-content" style="padding: 0;margin: 0;height: 530px;">
                  <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> --><h6>Pembayaran</h6>
                    <a href="#"><img src="<?php echo base_url('public/img/icon/cancel.png') ?>"></a>
                  </div>
                  <div class="modal-body" style="overflow-y: scroll;">
                    <!-- <iframe src="<?php echo site_url('checkout/payment') ?>" allowtransparency="true" style="width: 100%;border: transparent;" frameborder="0" scrolling="no" onload="resizeIframe(this)" ></iframe> -->
                    
                    <div id="bank_bca" style="display: none;">
                        <div class="col-md-12" style="box-shadow: 0 2px 6px 0.5px rgba(0,0,0,.12);padding: 15px;">
                            Detail Tagihan <h6 class="float-right" id="bank_amount"></h6><span style="display: none;" class="rp_total float-right">Rp </span>
                        </div>
                        <br><br>
                        <form action="<?php echo site_url('transaction/manual_transfer') ?>" method="post">
                            <div class="col-md-12" style="box-shadow: 0 2px 6px 0.5px rgba(0,0,0,.12);padding: 15px;font-weight: bold;">
                                Transfer Bank BCA <img src="<?php echo base_url('public/img/icon/bca.png') ?>" class="float-right">
                                <hr>
                                <label>No. Rekening Anda</label>
                                <input type="text" name="account_number" class="form-control" required="">
                                <span style="font-size: 10px;">Masukan nomor rekening sesuai buku tabungan</span>
                                <br><br><br>
                                <label class="textfield__label">Nama Pemilik Rekening</label>
                                <input class="form-control text input-detail account_name" name="account_name" type="text" required="">
                                <input class="form-control text input-detail account_name" name="bank" type="hidden" value="bca">
                                <span style="font-size: 10px;">Masukan nama pemilik rekening sesuai buku tabungan</span>
                                <br><br><br><br><br>
                                <span style="font-weight: 100;">Jika melalui Teller, isi </span><span> Nama Pemilik Rekening </span><span style="font-weight: 100;">dengan nama Penyetor dan</span><span> Nomor Rekening </span><span style="font-weight: 100;">dengan 0000</span>
                                <br><br><br>
                                <span style="font-weight: 100;">Demi keamanan transaksi Anda, pastikan untuk </span><span>tidak menginformasikan bukti dan data pembayaran kepada pihak manapun kecuali JualBeliBarang.</span>
                            </div>
                            <br><br><br>
                            <div class="buttons-set col-md-12">
                                <button class="default-btn form-control" type="submit" id="btn-buyer"><span>Bayar</span></button>
                            </div>
                        </form>
                    </div>
                    <div id="bank_mandiri" style="display: none;">
                        <div class="col-md-12" style="box-shadow: 0 2px 6px 0.5px rgba(0,0,0,.12);padding: 15px;">
                            Detail Tagihan <h6 class="float-right" id="bank_amount"></h6><span style="display: none;" class="rp_total float-right">Rp </span>
                        </div>
                        <br><br>
                        <form action="<?php echo site_url('transaction/manual_transfer') ?>" method="post">
                            <div class="col-md-12" style="box-shadow: 0 2px 6px 0.5px rgba(0,0,0,.12);padding: 15px;font-weight: bold;">
                                Transfer Bank Mandiri <img src="<?php echo base_url('public/img/icon/mandiri.png') ?>" class="float-right" width="70">
                                <hr>
                                <label>No. Rekening Anda</label>
                                <input type="text" name="account_number" class="form-control" required="">
                                <span style="font-size: 10px;">Masukan nomor rekening sesuai buku tabungan</span>
                                <br><br><br>
                                <label class="textfield__label">Nama Pemilik Rekening</label>
                                <input class="form-control text input-detail account_name" name="account_name" type="text" required="">
                                <input class="form-control text input-detail account_name" name="bank" type="hidden" value="mandiri">
                                <span style="font-size: 10px;">Masukan nama pemilik rekening sesuai buku tabungan</span>
                                <br><br><br><br><br>
                                <span style="font-weight: 100;">Jika melalui Teller, isi </span><span> Nama Pemilik Rekening </span><span style="font-weight: 100;">dengan nama Penyetor dan</span><span> Nomor Rekening </span><span style="font-weight: 100;">dengan 0000</span>
                                <br><br><br>
                                <span style="font-weight: 100;">Demi keamanan transaksi Anda, pastikan untuk </span><span>tidak menginformasikan bukti dan data pembayaran kepada pihak manapun kecuali Jual beli produk.</span>
                            </div>
                            <br><br><br>
                            <div class="buttons-set col-md-12">
                                <button class="default-btn form-control" type="submit" id="btn-buyer"><span>Bayar</span></button>
                            </div>
                        </form>
                    </div>
                    <div id="bank_bri" style="display: none;">
                        <div class="col-md-12" style="box-shadow: 0 2px 6px 0.5px rgba(0,0,0,.12);padding: 15px;">
                            Detail Tagihan <h6 class="float-right" id="bank_amount"></h6><span style="display: none;" class="rp_total float-right">Rp </span>
                        </div>
                        <br><br>
                        <form action="<?php echo site_url('transaction/manual_transfer') ?>" method="post">
                            <div class="col-md-12" style="box-shadow: 0 2px 6px 0.5px rgba(0,0,0,.12);padding: 15px;font-weight: bold;">
                                Transfer Bank BRI <img src="<?php echo base_url('public/img/icon/bri.png') ?>" class="float-right" width="70">
                                <hr>
                                <label>No. Rekening Anda</label>
                                <input type="text" name="account_number" class="form-control" required="">
                                <span style="font-size: 10px;">Masukan nomor rekening sesuai buku tabungan</span>
                                <br><br><br>
                                <label class="textfield__label">Nama Pemilik Rekening</label>
                                <input class="form-control text input-detail account_name" name="account_name" type="text" required="">
                                <input class="form-control text input-detail account_name" name="bank" type="hidden" value="bri">
                                <span style="font-size: 10px;">Masukan nama pemilik rekening sesuai buku tabungan</span>
                                <br><br><br><br><br>
                                <span style="font-weight: 100;">Jika melalui Teller, isi </span><span> Nama Pemilik Rekening </span><span style="font-weight: 100;">dengan nama Penyetor dan</span><span> Nomor Rekening </span><span style="font-weight: 100;">dengan 0000</span>
                                <br><br><br>
                                <span style="font-weight: 100;">Demi keamanan transaksi Anda, pastikan untuk </span><span>tidak menginformasikan bukti dan data pembayaran kepada pihak manapun kecuali JualBeliBarang.</span>
                            </div>
                            <br><br><br>
                            <div class="buttons-set col-md-12">
                                <button class="default-btn form-control" type="submit" id="btn-buyer"><span>Bayar</span></button>
                            </div>
                        </form>
                    </div>
                    <div id="bank_bni" style="display: none;">
                        <div class="col-md-12" style="box-shadow: 0 2px 6px 0.5px rgba(0,0,0,.12);padding: 15px;">
                            Detail Tagihan <h6 class="float-right" id="bank_amount"></h6><span style="display: none;" class="rp_total float-right">Rp </span>
                        </div>
                        <br><br>
                        <form action="<?php echo site_url('transaction/manual_transfer') ?>" method="post">
                            <div class="col-md-12" style="box-shadow: 0 2px 6px 0.5px rgba(0,0,0,.12);padding: 15px;font-weight: bold;">
                                Transfer Bank BNI <img src="<?php echo base_url('public/img/icon/bni.png') ?>" class="float-right">
                                <hr>
                                <label>No. Rekening Anda</label>
                                <input type="text" name="account_number" class="form-control" required="">
                                <span style="font-size: 10px;">Masukan nomor rekening sesuai buku tabungan</span>
                                <br><br><br>
                                <label class="textfield__label">Nama Pemilik Rekening</label>
                                <input class="form-control text input-detail account_name" name="account_name" type="text" required=""><input class="form-control text input-detail account_name" name="bank" type="hidden" value="bni">
                                <span style="font-size: 10px;">Masukan nama pemilik rekening sesuai buku tabungan</span>
                                <br><br><br><br><br>
                                <span style="font-weight: 100;">Jika melalui Teller, isi </span><span> Nama Pemilik Rekening </span><span style="font-weight: 100;">dengan nama Penyetor dan</span><span> Nomor Rekening </span><span style="font-weight: 100;">dengan 0000</span>
                                <br><br><br>
                                <span style="font-weight: 100;">Demi keamanan transaksi Anda, pastikan untuk </span><span>tidak menginformasikan bukti dan data pembayaran kepada pihak manapun kecuali JualBeliBarang.</span>
                            </div>
                            <br><br><br>
                            <div class="buttons-set col-md-12">
                                <button class="default-btn form-control" type="submit" id="btn-buyer"><span>Bayar</span></button>
                            </div>
                        </form>
                    </div>
                    <div id="choose_payment">
                        <br>
                        <div>
                            <h6>Transfer Bank (Verifikasi Manual)</h6>
                            <hr>
                            <div class="card" style="width: 100%;">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item" style="padding: 25px;"><a href="#" onclick="choose_bank('bank_bca')"><img src="<?php echo base_url('public/img/icon/bca.png') ?>" style="height: 20px;"> <span style="color:black;margin-left: 5%;font-size: 15px;"> <b> Bank BCA </b> </span><i class="fa fa-chevron-right float-right"></i></a></li>
                                    <li class="list-group-item" style="padding: 25px;"><a href="#"  onclick="choose_bank('bank_mandiri')"><img src="<?php echo base_url('public/img/icon/mandiri.png') ?>" style="height: 20px;"> <span style="color:black;margin-left: 7%;font-size: 15px;"> <b> Bank MANDIRI </b> </span> <i class="fa fa-chevron-right float-right"></i></a></li>
                                    <li class="list-group-item" style="padding: 25px;"><a href="#"  onclick="choose_bank('bank_bri')"><img src="<?php echo base_url('public/img/icon/bri.png') ?>" style="height: 15px;"> <span style="color:black;margin-left: 5%;font-size: 15px;"> <b> Bank BRI </b> </span> <i class="fa fa-chevron-right float-right"></i></a></li>
                                    <li class="list-group-item" style="padding: 25px;"><a href="#"  onclick="choose_bank('bank_bni')"><img src="<?php echo base_url('public/img/icon/bni.png') ?>" style="height: 20px;"> <span style="color:black;margin-left: 6%;font-size: 15px;"> <b> Bank BNI </b> </span> <i class="fa fa-chevron-right float-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <br><br>
                        <div>
                            <h6>Transfer Via Midtrans (Verifikasi Otomatis)</h6>
                            <hr>
                            <div class="card" style="width: 100%;">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item" style="padding: 25px;"><a href="#" id="midtrans-payment"><img src="<?php echo base_url('public/img/icon/midtrans.png') ?>" style="height: 10px;"> <span style="color:black;margin-left: 4%;font-size: 15px;"> <b> MIDTRANS Payment </b> </span><i class="fa fa-chevron-right float-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                  </div>
                  <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div> -->
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12">
            <div class="checkout-progress">
                <div class="section-title"><h4>Checkout Progress</h4></div>
                <ul class="check">
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Billing address</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>Shipping address</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>shipping method</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>payment method</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-278GuXBiM1bMfPw6"></script>