<?php $this->load->view('include/breadcumb'); ?>

<div class="shop-details-area pb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="row">
                    <div class="col-md-6 padright col-12">
                        <div class="single-product-image product-image-slider fix">
                            <?php foreach ($product_detail->product_image as $product_image): ?>
                                <div class="p-thumb"><img src="<?php echo base_url('') ?>public/img/product/<?php echo $product_image->product_image; ?>" alt=""></div>
                            <?php endforeach ?>
                        </div>
                        <div class="single-product-thumbnail product-thumbnail-slider float-left">
                            <?php foreach ($product_detail->product_image as $product_image): ?>
                                <div class="p-thumb"><img src="<?php echo base_url('') ?>public/img/product/<?php echo $product_image->product_image; ?>" alt=""></div>
                            <?php endforeach ?>
                        </div>
                    </div>    
                    <div class="col-md-6">
                        <div class="details-content">
                            <h2 id="title_product"><?php echo $product_detail->title; ?></h2>
                            <!-- <div class="product-rating">
                                <i class="fa fa-star color"></i>
                                <i class="fa fa-star color"></i>
                                <i class="fa fa-star color"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div> -->
                            <p id="front_image" style="display: none;"><?php echo $product_detail->front_image; ?></p>
                            <p id="desc_product"><?php echo $product_detail->short_description; ?></p>
                            <div class="price-box">
                                <span id="price_products">
                                    <?php if ($this->session->userdata('format_currency') == "USD"): ?>
                                        US $<?php echo $this->Currency_Converter->convert('IDR', 'USD', $product_detail->sale_price, true, 1); ?>
                                    <?php else: ?>
                                       Rp <?php echo number_format($product_detail->sale_price,0,",","."); ?>
                                    <?php endif ?>
                                    <!-- <?php print_r($this->curl_request->currency_convert("USD", "IDR", 2000)); ?> -->
                                <span id="price_product" style="display: none;"><?php echo $product_detail->sale_price; ?>
                                </span>       
                            </div>
                            <div class="box-to-cart">
                                <div class="control">
                                    <input value="1" type="hidden" name="qty_product" id="qty_product">
                                    <input value="<?php echo $product_detail->product_id; ?>" type="hidden" name="product_id" id="product_id">
                                </div>
                            </div>
                            <a class="add" href="#" id="buy_now" class="buy_now">Beli</a>
                            <div class="add-to-link">
                                <ul>
                                    <!-- <li><a href="#"><i class="fa fa-retweet"></i>Add to compare</a></li> -->
                                </ul>
                            </div>
                        </div>    
                    </div>
                </div>
                <div class="tab-content-menu pt-80">
                    <div class="feature-tab feature-title">
                        <ul class="nav" role="tablist"> 
                            <li><a href="#tab1" class="active" data-toggle="tab" role="tab" aria-controls="tab1">details</a></li>
                            <!-- <li><a href="#tab2" aria-controls="tab2" aria-selected="false" role="tab" data-toggle="tab">reviews 1</a></li> -->
                        </ul> 
                    </div>
                </div>
                <div class="container">
                    <div class="custom-row">
                        <div class="tab-content">
                            <div class="tab-pane active show fade" id="tab1" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="dtr-pr-40 dtr-sm-pr-0"> 
                                            <br><br><br>
                                            <!-- feature 1 starts -->
                                            <div class="dtr-line-feature dtr-mb-10">
                                                <div class="dtr-line-feature-img-wrapper">
                                                    <div class="dtr-line-feature-img bg-green border-light-green color-white">
                                                        <label style="padding: 7px;font-size: 13px;color: white;">Sen, 21</label>
                                                    </div>
                                                </div>
                                                <div class="dtr-vert-border border-light-green"></div>
                                                <h6 class="dtr-line-feature-heading font-weight-600">Webinar DTEO Public Speaking for Kids : 09.00 - 11.00 WIB </h6>
                                                <span style="color:#6666;">Senin, 21 Desember 2020</span>
                                                <p style="color:#27A086;">1. Peserta mengikuti Webinar dengan klik di sini</p>
                                            </div>
                                            <!-- feature 1 ends --> 
                                            
                                            <!-- feature 2 starts -->
                                            <div class="dtr-line-feature dtr-mb-10">
                                                <div class="dtr-line-feature-img-wrapper">
                                                    <div class="dtr-line-feature-img bg-green border-light-green color-white"><label style="padding: 7px;font-size: 13px;color: white;">Sel, 22</label></div>
                                                </div>
                                                <div class="dtr-vert-border border-light-green"></div>
                                                <h6 class="dtr-line-feature-heading font-weight-600">Webinar DTEO Public Speaking for Kids : 09.00 - 11.00 WIB </h6>
                                                <span style="color:#6666;">Selasa, 22 Desember 2020</span>
                                                <p style="color:#27A086;">1. Peserta mengikuti Webinar dengan klik di sini</p>
                                            </div>
                                            <!-- feature 2 ends --> 
                                            
                                            <!-- feature 3 starts -->
                                            <div class="dtr-line-feature">
                                                <div class="dtr-line-feature-img-wrapper">
                                                    <div class="dtr-line-feature-img bg-green border-light-green color-white"><label style="padding: 7px;font-size: 13px;color: white;">Rab, 23</label></div>
                                                </div>
                                                <div class="dtr-vert-border border-light-green"></div>
                                                <h6 class="dtr-line-feature-heading font-weight-600">Webinar DTEO Public Speaking for Kids : 09.00 - 11.00 WIB </h6>
                                                <span style="color:#6666;">Rabu, 23 Desember 2020</span>
                                                <p style="color:#27A086;">1. Peserta mengikuti Webinar dengan klik di sini</p>
                                            </div>
                                            <!-- feature 3 ends --> 
                                            
                                        </div>
                                    </div>
                                    </div>
                            </div>
                            <div class="tab-pane fade" id="tab2" role="tabpanel">
                            </div>
                            <br><br><br>
                            <div class="tab-content-menu">
                                <div class="feature-tab feature-title">
                                    <ul class="nav" role="tablist"> 
                                        <li><a href="#tab1" class="active" data-toggle="tab" role="tab" aria-controls="tab1">Sertifikat</a></li>
                                        <!-- <li><a href="#tab2" aria-controls="tab2" aria-selected="false" role="tab" data-toggle="tab">reviews 1</a></li> -->
                                    </ul> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <img style="padding: 30px;" src="<?php echo base_url() ?>public/img/product/Pelatihan_berani_berbicara_di_depan_umum_sertifikat.jpg">
                                </div>
                                <div class="col-md-6">
                                    <br><br><br><br>
                                    <table style="padding: 30px;" class="table" style="text-align: justify;">
                                        <tr>
                                            <td><i class="icon-check-circle" style="color: #27A086;"></i> Langsung tersedia setelah kelas selesai</td>
                                        </tr>
                                        <tr>
                                            <td><i class="icon-check-circle" style="color: #27A086;"></i> Berisi nama masing-masing peserta</td>
                                        </tr>
                                        <tr>
                                            <td><i class="icon-check-circle" style="color: #27A086;"></i> Format PDF sehingga bisa dicetak</td>
                                        </tr>
                                        <tr>
                                            <td><i class="icon-check-circle" style="color: #27A086;"></i> Ditandatangani oleh CEO Generasi Juara</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div> 
                    </div>  
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="shop-left-sidebar">
                    <div class="single-left-widget">
                        <div class="shop-banner">
                            <div class="tab-content-menu">
                                <div class="feature-tab feature-title">
                                    <ul class="nav" role="tablist"> 
                                        <li><a href="#tab1" class="active" data-toggle="tab" role="tab" aria-controls="tab1">Info Kelas</a></li>
                                        <!-- <li><a href="#tab2" aria-controls="tab2" aria-selected="false" role="tab" data-toggle="tab">reviews 1</a></li> -->
                                    </ul> 
                                </div>
                            </div>
                            <table class="table" style="text-align: justify;">
                                <tr>
                                    <td><i class="icon-list" style="color: #27A086;"></i> Pelatihan Berani Berbicara di Depan Umum</td>
                                </tr>
                                <tr>
                                    <td><i class="icon-user" style="color: #27A086;"></i>  DT EO Narasumber</td>
                                </tr>
                                <tr>
                                    <td><i class="icon-calendar" style="color: #27A086;"></i>  Senin, 21 Des 2020 s/d Kamis, 24 Des 2020</td>
                                </tr>
                                <tr>
                                    <td><i class="icon-mbri-unlock" style="color: #27A086;"></i>  Materi bisa diakses kapan saja</td>
                                </tr>
                                <tr>
                                    <td><i class="icon-mbri-numbered-list" style="color: #27A086;"></i>  Resume kelas bisa langsung diakses setelah kelas selesai</td>
                                </tr>
                                <tr>
                                    <td><i class="icon-trophy" style="color: #27A086;"></i>  Sertifikat bisa langsung di download setelah kelas selesai</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>


<?php if ($this->input->get_post('afl')): ?>
    <script type="text/javascript">
        var afl = '<?php echo $this->input->get('afl') ?>';
    </script>
<?php else: ?>
    <script type="text/javascript">
        var afl = null;
    </script>
<?php endif ?>