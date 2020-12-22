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
                        <h3><?php echo $this->lang->line("shipping"); ?></h3>
                        <p><?php echo $this->lang->line("large_selection"); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-facilitie">
                    <div class="facilitie-icon">
                        <img src="<?php echo base_url('') ?>public/img/icon/facilitie2.png" alt="facilitie">
                    </div>
                    <div class="facilitie-content">
                        <h3><?php echo $this->lang->line("money_back_guarantee"); ?></h3>
                        <p><?php echo $this->lang->line("100_money_back"); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-facilitie">
                    <div class="facilitie-icon">
                        <img src="<?php echo base_url('') ?>public/img/icon/facilitie3.png" alt="facilitie">
                    </div>
                    <div class="facilitie-content">
                        <h3><?php echo $this->lang->line("24_hours_support"); ?></h3>
                        <p><?php echo $this->lang->line("Monday_to_friday"); ?></p>
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
                            <li><a href="#tab1" class="active" data-toggle="tab" role="tab" aria-controls="tab1"><?php echo $this->lang->line("new_product"); ?></a></li>
                            <li><a href="#tab2" aria-controls="tab2" aria-selected="false" role="tab" data-toggle="tab"><?php echo $this->lang->line("on_sale"); ?></a></li>
                            <!-- <li><a href="#tab3" aria-controls="tab3" aria-selected="false" role="tab" data-toggle="tab"><?php echo $this->lang->line("new_product"); ?></a></li> -->
                        </ul> 
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active show fade" id="tab10" role="tabpanel">
                        <div class="product-carousel owl-carousel">   
                            <?php foreach ($new_product as $product_new): ?>
                            <?php 
                                if (!empty($product_new->sub_category_title)) {
                                    $sub_link = $product_new->sub_category_title.'/';
                                }else{
                                    $sub_link = '';
                                }
                            ?>
                            <div class="feature-item">
                                <div class="feature-img">
                                    <a href="<?php echo site_url('product/'.$product_new->category_title.'/'.$sub_link.$product_new->title_slug) ?>"><img style="width: 210px;height: 250px;" src="<?php echo base_url('') ?>public/img/product/<?php echo $product_new->front_image; ?>" alt="feature"></a>
                                    <!-- <span class="new">new</span>  
                                    <span class="sale">sale</span>   -->
                                    <a class="btn-quickview1  modal-view" href="#" data-toggle="modal" data-target="#productModal"></a>
                                </div>
                                <div class="feature-content text-center">
                                    <p><a href="<?php echo site_url('product/elektronik/'.url_title(strtolower('Kristof Accent Table'))) ?>"><?php echo $product_new->title; ?></a></p>
                                    <div class="price-box">
                                        <span>
                                            <?php if ($this->session->userdata('format_currency') == "USD"): ?>
                                                US $<?php echo $this->Currency_Converter->convert('IDR', 'USD', $product_new->sale_price, true, 1); ?>
                                            <?php else: ?>
                                               Rp <?php echo number_format($product_new->sale_price,0,",","."); ?>
                                            <?php endif ?>
                                        </span>       
                                    </div>
                                    <div class="hover-cart">
                                        <ul>
                                            <li><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li class="add"><a href="<?php echo site_url('product/'.$product_new->category_title.'/'.$sub_link.$product_new->title_slug) ?>">Buy Now</a></li>
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
                                                US $<?php echo $this->Currency_Converter->convert('IDR', 'USD', $onsale_product->sale_price, true, 1); ?>
                                            <?php else: ?>
                                               Rp <?php echo number_format($onsale_product->sale_price,0,",","."); ?>
                                            <?php endif ?>
                                        </span>       
                                    </div>
                                    <div class="hover-cart">
                                        <ul>
                                            <li><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
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
<div class="banner-area three">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-6">
                <div class="banner-image">
                    <a href="shop.html"><img src="<?php echo base_url('') ?>public/img/banner/banner1.png" alt=""></a> 
                </div>
            </div>
            <div class="col-md-4 col-6">
                <div class="banner-image mar">
                    <a href="shop.html"><img src="<?php echo base_url('') ?>public/img/banner/banner4.png" alt=""></a>
                </div>
                <div class="banner-image mars">
                    <a href="shop.html"><img src="<?php echo base_url('') ?>public/img/banner/banner5.png" alt=""></a>
                </div>
            </div>
            <div class="col-md-4 col-6">
                <div class="banner-image">
                    <a href="shop.html"><img src="<?php echo base_url('') ?>public/img/banner/banner6.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="best-seller-area three pt-30 pb-15">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title-one feature-title">
                    <h3><?php echo $this->lang->line("best_seller"); ?></h3>
                </div>
                <div class="tab-pane active show fade" id="tab10" role="tabpanel">
                        <div class="product-carousel owl-carousel">   
                            <?php foreach ($new_product as $product_new): ?>
                            <?php 
                                if (!empty($product_new->sub_category_title)) {
                                    $sub_link = $product_new->sub_category_title.'/';
                                }else{
                                    $sub_link = '';
                                }
                            ?>
                            <div class="feature-item">
                                <div class="feature-img">
                                    <a href="<?php echo site_url('product/'.$product_new->category_title.'/'.$sub_link.$product_new->title_slug) ?>"><img style="width: 210px;height: 250px;" src="<?php echo base_url('') ?>public/img/product/<?php echo $product_new->front_image; ?>" alt="feature"></a>
                                    <!-- <span class="new">new</span>  
                                    <span class="sale">sale</span>   -->
                                    <a class="btn-quickview1  modal-view" href="#" data-toggle="modal" data-target="#productModal"></a>
                                </div>
                                <div class="feature-content text-center">
                                    <p><a href="<?php echo site_url('product/elektronik/'.url_title(strtolower('Kristof Accent Table'))) ?>"><?php echo $product_new->title; ?></a></p>
                                    <div class="price-box">
                                        <span>
                                            <?php if ($this->session->userdata('format_currency') == "USD"): ?>
                                                US $<?php echo $this->Currency_Converter->convert('IDR', 'USD', $product_new->sale_price, true, 1); ?>
                                            <?php else: ?>
                                               Rp <?php echo number_format($product_new->sale_price,0,",","."); ?>
                                            <?php endif ?>
                                        </span>       
                                    </div>
                                    <div class="hover-cart">
                                        <ul>
                                            <li><a href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                            <li class="add"><a href="<?php echo site_url('product/'.$product_new->category_title.'/'.$sub_link.$product_new->title_slug) ?>">Buy Now</a></li>
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