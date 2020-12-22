<?php $this->load->view('include/slide'); ?>
<div class="facilities-area pt-28">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-facilitie">
                    <div class="facilitie-icon">
                        <img src="<?php echo base_url('') ?>public/img/icon/facilitie1.png" alt="facilitie">
                    </div>
                    <div class="facilitie-content">
                        <h3>Daftar Narasumber</h3>
                        <p>Mari berkontribusi untuk keluarga Indonesia</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-facilitie">
                    <div class="facilitie-icon">
                        <img src="<?php echo base_url('') ?>public/img/icon/facilitie2.png" alt="facilitie">
                    </div>
                    <div class="facilitie-content">
                        <h3>Daftar Mitra</h3>
                        <p>Berkolaborasi untuk mengedukasi keluarga</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-facilitie">
                    <div class="facilitie-icon">
                        <img src="<?php echo base_url('') ?>public/img/icon/facilitie3.png" alt="facilitie">
                    </div>
                    <div class="facilitie-content">
                        <h3>Daftar Affiliate</h3>
                        <p>Promosikan  produk dan raih penghasilan</p>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

<div class="feature-area three pt-30">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content-menu">
                    <div class="feature-tab feature-title">
                        <ul class="nav" role="tablist"> 
                            <li><a href="#tab1" class="active" data-toggle="tab" role="tab" aria-controls="tab1">Kelas</a></li>
                            <!-- <li><a href="#tab2" aria-controls="tab2" aria-selected="false" role="tab" data-toggle="tab"><?php echo $this->lang->line("on_sale"); ?></a></li> -->
                            <!-- <li><a href="#tab3" aria-controls="tab3" aria-selected="false" role="tab" data-toggle="tab"><?php echo $this->lang->line("new_product"); ?></a></li> -->
                        </ul> 
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active show fade" id="tab10" role="tabpanel">
                        <div class="product-carousel owl-carousel">   
                            <?php foreach ($on_sale as $product_new): ?>
                            <?php 
                                if (!empty($product_new->sub_category_title)) {
                                    $sub_link = $product_new->sub_category_title.'/';
                                }else{
                                    $sub_link = '';
                                }
                            ?>
                            <div class="feature-item">
                                <div class="feature-img">
                                    <a href="<?php echo site_url('product/'.$product_new->category_title.'/'.$sub_link.$product_new->title_slug) ?>"><img width="100" src="<?php echo base_url('') ?>public/img/product/<?php echo $product_new->front_image; ?>" alt="feature"></a>
                                    <!-- <span class="new">new</span>  
                                    <span class="sale">sale</span>   -->
                                    <a class="btn-quickview1  modal-view" href="#" data-toggle="modal" data-target="#productModal"></a>
                                </div>
                                <div class="feature-content text-center">
                                    <p><a href="<?php echo site_url('product/elektronik/'.url_title(strtolower('Kristof Accent Table'))) ?>">Kelas Dimulai :</a></p>
                                    <div class="price-box">
                                        <span>
                                            <b></b> Senin, 21 Des 2020
                                            <!-- <?php if ($this->session->userdata('format_currency') == "USD"): ?>
                                                US $<?php echo $this->Currency_Converter->convert('IDR', 'USD', $product_new->sale_price, true, 1); ?>
                                            <?php else: ?>
                                               Rp <?php echo number_format($product_new->sale_price,0,",","."); ?>
                                            <?php endif ?> -->
                                        </span>       
                                    </div>
                                    <div class="hover-cart">
                                        <ul>
                                            <li class="add"><a href="<?php echo site_url('product/'.$product_new->category_title.'/'.$sub_link.$product_new->title_slug) ?>">Lihat Kelas</a></li>
                                            <!-- <li><a href="#"><i class="fa fa-retweet"></i></a></li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab2" role="tabpanel">
                        <div class="product-carousel owl-carousel">
                            <?php foreach ($on_sale as $onsale_product): ?>
                            <?php 
                                if (!empty($onsale_product->sub_category_title)) {
                                    $sub_link = $onsale_product->sub_category_title.'/';
                                }else{
                                    $sub_link = '';
                                }
                            ?>
                            <div class="feature-item">
                                <div class="feature-img">
                                    <a href="<?php echo site_url('product/'.$onsale_product->category_title.'/'.$sub_link.$onsale_product->title_slug) ?>"><img style="width: 210px;height: 250px;" src="<?php echo base_url('') ?>public/img/product/<?php echo $onsale_product->front_image; ?>" alt="feature"></a>
                                    <!-- <span class="new">new</span>  
                                    <span class="sale">sale</span>   -->
                                    <a class="btn-quickview1  modal-view" href="#" data-toggle="modal" data-target="#productModal"></a>
                                </div>
                                <div class="feature-content text-center">
                                    <p><a href="<?php echo site_url('product/elektronik/'.url_title(strtolower('Kristof Accent Table'))) ?>"><?php echo $onsale_product->title; ?></a></p>
                                    <div class="price-box">
                                        <span>
                                            <?php if ($this->session->userdata('format_currency') == "USD"): ?>
                                                US $<?php echo $this->Currency_Converter->convert('USD', 'IDR', $onsale_product->sale_price, true, 1); ?>
                                            <?php else: ?>
                                               Rp <?php echo number_format($onsale_product->sale_price,0,",","."); ?>
                                            <?php endif ?>
                                        </span>       
                                    </div>
                                    <div class="hover-cart">
                                        <ul>
                                            <li class="add"><a href="<?php echo site_url('product/'.$onsale_product->category_title.'/'.$sub_link.$onsale_product->title_slug) ?>">Buy Now</a></li>
                                            <!-- <li><a href="#"><i class="fa fa-retweet"></i></a></li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>     
                </div>
            </div> 
        </div>  
    </div>
</div>
<div class="banner-area three dtr-section dtr-pt-100 dtr-pb-70 dtr-section-with-bg bg-light-blue parallax" style="background-image: url(public/img/section-bg1.png);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row d-flex align-items-center"> 
                    <div class="col-12 text-center">
                        <h2>Mengapa Harus Generasi Juara ?</h2>
                        <br>
                        <div class="dtr-styled-divider divider-center bg-light-green"></div>
                        <br><br>
                    </div>
                    <!-- column 1 starts -->
                    <div class="col-12 col-md-5">
                        <div class="dtr-pr-40 dtr-sm-pr-0"> 
                            <br><br><br>
                            <!-- feature 1 starts -->
                            <div class="dtr-line-feature dtr-mb-10">
                                <div class="dtr-line-feature-img-wrapper">
                                    <div class="dtr-line-feature-img bg-green border-light-green color-white"><i class="icon-user-edit"></i></div>
                                </div>
                                <div class="dtr-vert-border border-light-green"></div>
                                <h4 class="dtr-line-feature-heading font-weight-600">Developer-first coding </h4>
                                <p style="color:#27A086;">There are many variations of passages of lorem available.</p>
                            </div>
                            <!-- feature 1 ends --> 
                            
                            <!-- feature 2 starts -->
                            <div class="dtr-line-feature dtr-mb-10">
                                <div class="dtr-line-feature-img-wrapper">
                                    <div class="dtr-line-feature-img bg-green border-light-green color-white"><i class="icon-mail-bulk"></i></div>
                                </div>
                                <div class="dtr-vert-border border-light-green"></div>
                                <h4 class="dtr-line-feature-heading font-weight-600">Leading incremental database</h4>
                                <p style="color:#27A086;">Nemo enim ipsam voluptatem quia voluptas sit.</p>
                            </div>
                            <!-- feature 2 ends --> 
                            
                            <!-- feature 3 starts -->
                            <div class="dtr-line-feature">
                                <div class="dtr-line-feature-img-wrapper">
                                    <div class="dtr-line-feature-img bg-green border-light-green color-white"><i class="icon-shipping-fast"></i></div>
                                </div>
                                <div class="dtr-vert-border border-light-green"></div>
                                <h4 class="dtr-line-feature-heading font-weight-600">Automated work flow</h4>
                                <p style="color:#27A086;">Similique sunt in culpa qui officia deserunt mollitia animi.</p>
                            </div>
                            <!-- feature 3 ends --> 
                            
                        </div>
                    </div>
                    <!-- column 1 starts --> 
                    
                    <!-- column 2 starts -->
                    <div class="col-12 col-md-7 dtr-md-mt-30"> 
                        <br>
                        <!-- video box starts -->
                        <div class="dtr-video-box"> 
                            
                            <!-- image --> 
                            <img src="<?php echo base_url() ?>public/img/slider/banner.jpg" alt="image"> 
                            
                            <!-- video button starts --> 
                            <a class="dtr-video-popup dtr-video-button bg-green color-white vbox-item" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=gStPz8Td4ZQ"></a> 
                            <!-- video button ends --> 
                            
                        </div>
                        <!-- video box ends --> 
                        
                    </div>
                    <!-- column 2 ends --> 
                    
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br>
<div class="best-seller-area three pt-30 pb-15">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-one feature-title">
                    <h3>Akademi</h3>
                </div>
                <div class="tab-pane active show fade" id="tab10" role="tabpanel">
                        <div class="product-carousel owl-carousel">   
                            <?php foreach ($best_product as $product_best): ?>
                            <?php 
                                if (!empty($product_best->sub_category_title)) {
                                    $sub_link = $product_best->sub_category_title.'/';
                                }else{
                                    $sub_link = '';
                                }
                            ?>
                            <div class="feature-item">
                                <div class="feature-img">
                                    <a href="<?php echo site_url('product/'.$product_best->category_title.'/'.$sub_link.$product_best->title_slug) ?>"><img style="width: 210px;height: 250px;" src="<?php echo base_url('') ?>public/img/product/<?php echo $product_best->front_image; ?>" alt="feature"></a>
                                    <!-- <span class="new">new</span>  
                                    <span class="sale">sale</span>   -->
                                    <a class="btn-quickview1  modal-view" href="#" data-toggle="modal" data-target="#productModal"></a>
                                </div>
                                <div class="feature-content text-center">
                                    <p><a href="<?php echo site_url('product/elektronik/'.url_title(strtolower('Kristof Accent Table'))) ?>"><?php echo $product_best->title; ?></a></p>
                                    <div class="price-box">
                                        <span>
                                            <?php if ($this->session->userdata('format_currency') == "USD"): ?>
                                                US $<?php echo $this->Currency_Converter->convert('IDR', 'USD', $product_best->sale_price, true, 1); ?>
                                            <?php else: ?>
                                               Rp <?php echo number_format($product_best->sale_price,0,",","."); ?>
                                            <?php endif ?>
                                        </span>       
                                    </div>
                                    <div class="hover-cart">
                                        <ul>
                                            <li class="add"><a href="<?php echo site_url('product/'.$product_best->category_title.'/'.$sub_link.$product_new->title_slug) ?>">Buy Now</a></li>
                                            <!-- <li><a href="#"><i class="fa fa-retweet"></i></a></li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
            </div>   
        </div>
    </div>
</div>

<div class="banner-area three dtr-section dtr-pt-100 dtr-pb-70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row d-flex align-items-center"> 
                    <div class="col-12 text-center">
                        <h2>Mitra yang telah menggunakan Generasi Juara</h2>
                        <br>
                        <div class="dtr-styled-divider divider-center bg-light-green"></div>
                    </div>
                    <!-- column 1 starts -->
                    <div class="col-md-12">
                        <div class="dtr-pr-40 dtr-sm-pr-0"> 
                            <br><br><br>
                            <div class="dtr-slick-slider dtr-logo-carousel"> 
                                    <!-- logo 1 -->
                                    <div> <img src="<?php echo base_url() ?>public/img/client-1.png" alt="image"> </div>
                                    <!-- logo 2 -->
                                    <div> <img src="<?php echo base_url() ?>public/img/client-2.png" alt="image"> </div>
                                    <!-- logo 3 -->
                                    <div> <img src="<?php echo base_url() ?>public/img/client-3.png" alt="image"> </div>
                                    <!-- logo 4 -->
                                    <div> <img src="<?php echo base_url() ?>public/img/client-4.png" alt="image"> </div>
                                    <!-- logo 5 -->
                                    <div> <img src="<?php echo base_url() ?>public/img/client-5.png" alt="image"> </div>
                                    <!-- logo 6 -->
                                    <div> <img src="<?php echo base_url() ?>public/img/client-6.png" alt="image"> </div>
                                    <!-- logo 7 -->
                                    <div> <img src="<?php echo base_url() ?>public/img/client-4.png" alt="image"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="banner-area three dtr-section dtr-pt-100 dtr-pb-70 dtr-section-with-bg bg-light-blue parallax" style="background-image: url(public/img/section-bg1.png);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- section intro row starts -->
                <div class="row dtr-mb-50">
                    <div class="col-12 text-center">
                        <h2>Mari Kerja Sama dengan Generasi Juara</h2>
                        <br>
                        <div class="dtr-styled-divider divider-center bg-light-green"></div>
                        <br>
                        <h6>Bergabunglah bersama Generasi Juara untuk memberikan kontribusi terbaik untuk Keluarga di Indonesia.</h6>
                    </div>
                </div>
                <!-- section intro row ends --> 
                
                <!-- row starts -->
                <div class="row"> 
                    
                    <!-- column 1 starts -->
                    <div class="col-12 col-md-4"> 
                        
                        <!-- blog item 1 starts -->
                        <div class="dtr-blog-item dtr-shadow"> 
                            <!-- image -->
                            <div class="dtr-post-img"> <img src="<?php echo base_url() ?>public/img/mari1.svg" alt="image" style="background: white;width: 100%;"> </div>
                            <div class="dtr-post-content">
                                <p class="dtr-blog-category"><a href="#" class="color-green">Mitra</a></p>
                                <!-- <h4><a href="#">How to use saas to create a positive work</a></h4> -->
                                <p class="dtr-mb-20" style="color: black;">Anda punya program edukasi rutin? Mari bergabung menjadi Mitra Generasi Juara</p>
                                <a href="#" class="dtr-read-more">Continue Reading<i class="icon-ellipsis-h dtr-ml-10 color-green"></i></a> </div>
                        </div>
                        <!-- blog item 1 ends --> 
                        
                    </div>
                    <!-- column 1 ends --> 
                    
                    <!-- column 2 starts -->
                    <div class="col-12 col-md-4 dtr-md-mt-30"> 
                        
                        <!-- blog item 2 starts -->
                        <div class="dtr-blog-item dtr-shadow"> 
                            <!-- image -->
                            <div class="dtr-post-img"> <img src="<?php echo base_url() ?>public/img/mari2.svg" alt="image" style="background: white;width: 100%;"> </div>
                            <div class="dtr-post-content">
                                <p class="dtr-blog-category"><a href="#" class="color-green">Narasumber</a></p>
                                <!-- <h4><a href="#">5 tips to boost product based sale online</a></h4> -->
                                <p class="dtr-mb-20" style="color: black;">Bergabung menjadi Narasumber untuk berbagi ilmu untuk keluarga Indonesia</p>
                                <a href="#" class="dtr-read-more">Continue Reading<i class="icon-ellipsis-h dtr-ml-10 color-green"></i></a> </div>
                        </div>
                        <!-- blog item 2 ends --> 
                        
                    </div>
                    <!-- column 2 ends --> 
                    
                    <!-- column 3 starts -->
                    <div class="col-12 col-md-4 dtr-md-mt-30"> 
                        
                        <!-- blog item 3 starts -->
                        <div class="dtr-blog-item dtr-shadow"> 
                            <!-- image -->
                            <div class="dtr-post-img"> <img src="<?php echo base_url() ?>public/img/mari3.svg" alt="image" style="background: white;width: 100%;"> </div>
                            <div class="dtr-post-content">
                                <p class="dtr-blog-category"><a href="#" class="color-green">Affiliate</a></p>
                                <!-- <h4><a href="#">How to become a fully AI based company</a></h4> -->
                                <p class="dtr-mb-20" style="color: black;">Ajak setiap keluarga untuk belajar ilmu keluarga dan dapatkan penghasilan.</p>
                                <a href="#" class="dtr-read-more">Continue Reading<i class="icon-ellipsis-h dtr-ml-10 color-green"></i></a> </div>
                        </div>
                        <!-- blog item 3 ends --> 
                        
                    </div>
                    <!-- column 3 ends --> 
                    
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br>