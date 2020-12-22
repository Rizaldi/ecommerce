<header>
    <div class="header-area header-area-padding">
        <div class="mainmenu-area header-sticky header-box mb-60">
            <div class="container">
                <div class="menu-wrapper display-none">
                </div>
            </div>
        </div>
    </div>
</header>
<div class="shop-area-start leftsidebar pb-20">
    <div class="container">
        <div class="row">
            <div class="order-xl-2 order-lg-2 col-lg-9 col-md-8">
            <!-- <div class="shop-page-banner">
                    <img src="<?php echo base_url('') ?>public/img/banner/banner10.jpg" alt="">
                </div> 
                <div class="shop-cont">
                    <h2>shop</h2>  
                </div> -->
                <div class="shop-item-filter">
                    <ul class="nav" role="tablist">
                        <li><a href="#grid" class="active" data-toggle="tab" role="tab" aria-controls="grid"><i class="fa fa-th-large"></i>grid</a></li>
                        <!-- <li><a href="#list" data-toggle="tab" role="tab" aria-controls="list"><i class="fa fa-th-list"></i>list</a></li> -->
                    </ul>     
                    <div class="shop-content-wrapper">      
                        <div class="filter-by">
                            <h4>Sort by </h4>
                            <form action="#">
                                <div class="select-filter">
                                    <select class="filter-category" onchange="window.location.replace(this.value)">
                                      <option value="<?php echo ($this->input->get('limit')) ? site_url(uri_string().'?limit='.$this->input->get("limit").'&order=newest') : site_url(uri_string().'?order=newest'); ?>">Newest</option>
                                      <option value="<?php echo ($this->input->get('limit')) ? site_url(uri_string().'?limit='.$this->input->get("limit").'&order=newest') : site_url(uri_string().'?order=name'); ?>">Product Name</option>
                                      <option value="<?php echo ($this->input->get('limit')) ? site_url(uri_string().'?limit='.$this->input->get("limit").'&order=newest') : site_url(uri_string().'?order=price'); ?>">Price</option>
                                    </select> 
                                </div>
                            </form>								
                        </div> 
                        <a href="#"><i class="fa fa-arrow-up"></i></a>    
                        <div class="filter-by">
                            <h4>Show </h4>
                            <form action="#">
                                <div class="select-filter">
                                    <select class="show-page" onchange="window.location.replace(this.value)">
                                      <option value="<?php echo ($this->input->get('order')) ? site_url(uri_string().'?order='.$this->input->get("order").'&limit=10') : site_url(uri_string().'?limit=10'); ?>">10 per page</option>
                                      <option value="<?php echo ($this->input->get('order')) ? site_url(uri_string().'?order='.$this->input->get("order").'&limit=10') : site_url(uri_string().'?limit=20'); ?>">20 per page</option>
                                      <option value="<?php echo ($this->input->get('order')) ? site_url(uri_string().'?order='.$this->input->get("order").'&limit=10') : site_url(uri_string().'?limit=30'); ?>">30 per page</option>
                                      <option value="<?php echo ($this->input->get('order')) ? site_url(uri_string().'?order='.$this->input->get("order").'&limit=10') : site_url(uri_string().'?limit=40'); ?>">40 per page</option>
                                    </select> 
                                </div>
                            </form>	
                        </div>  
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="tab-content">
                    <div id="grid" class="tab-pane show active fade" role="tabpanel">
                        <?php foreach ($product_category['data_product'] as $product_category_list): ?>
                        <?php 
                            if (!empty($product_category['sub_category_slug']) || $product_category['sub_category_slug'] == 0) {
                                $sub_link = $product_category['sub_category_slug'].'/';
                            }else{
                                $sub_link = '';
                            }
                        ?>
                        <div class="feature-item">
                            <div class="feature-img">
                                <a href="<?php echo site_url('product/'.$product_category['category_slug'].'/'.$sub_link.$product_category_list->title_slug) ?>"><img class="img_product" style="width: 271px; height: 250px;" src="<?php echo base_url('') ?>public/img/product/<?php echo $product_category_list->front_image; ?>" alt="feature"></a>
                                <!-- <span class="new">new</span>
                                <span class="sale">sale</span>
                                 --><a class="btn-quickview modal-view" href="#" data-toggle="modal" data-target="#productModal"></a>
                            </div>
                            <div class="feature-content text-center">
                                <p><a href="<?php echo site_url('') ?>" class="title_product"><?php echo $product_category_list->title; ?></a></p>
                                <div class="price-box">
                                    <span>
                                        <?php if ($this->session->userdata('format_currency') == "USD"): ?>
                                            US $<?php echo $this->Currency_Converter->convert('IDR', 'USD', $product_category_list->sale_price, true, 1); ?>
                                        <?php else: ?>
                                           Rp <?php echo number_format($product_category_list->sale_price,0,",","."); ?>
                                        <?php endif ?>
                                    </span>
                                    <span class="price_product" style="display: none;"><?php echo $product_category_list->sale_price; ?></span>
                                    <!-- <span>$125.35 <del>$148.25</del></span>        -->
                                </div>
                                <div class="hover-cart">
                                    <ul>
                                        <li class="add"><a class="add_to_cart" href="#">Buy Now</a></li>
                                        <!-- <li><a href="#"><i class="fa fa-retweet"></i></a></li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <?php endforeach ?>
                        <div class="col-md-12">
                            <?php 
                                echo $this->pagination->create_links();
                            ?>
                        </div>   
                    </div>
                    <!-- <div id="list" class="tab-pane fade" role="tabpanel">
                        <div class="feature-item">
                            <div class="row">
                                <div class="col-md-4 col-6">
                                    <div class="feature-img">
                                        <a href="product-details.html"><img src="<?php echo base_url('') ?>public/img/product/product28.jpg" alt="feature"></a>
                                        <span class="new">new</span>  
                                        <span class="sale">sale</span>  
                                    </div>  
                                </div>  
                                <div class="col-md-8 col-6"> 
                                    <div class="feature-content text-left">
                                        <p><a href="product-details.html">Kristof Accent Table</a></p>
                                        <div class="product-rating">
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="description">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco <span>learn more</span></p>
                                        </div>
                                        <div class="price-box">
                                            <span>$125.35 <del>$148.25</del></span>       
                                        </div>
                                        <div class="cart-details">
                                            <ul>
                                                <li class="add"><a href="cart.html">add to cart</a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="row">
                                <div class="col-md-4 col-6">
                                    <div class="feature-img">
                                        <a href="product-details.html"><img src="<?php echo base_url('') ?>public/img/product/product20.jpg" alt="feature"></a>
                                        <span class="new">new</span>  
                                        <span class="sale">sale</span>  
                                    </div>  
                                </div>  
                                <div class="col-md-8 col-6"> 
                                    <div class="feature-content text-left">
                                        <p><a href="product-details.html">Dining Chairs</a></p>
                                        <div class="product-rating">
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="description">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco <span>learn more</span></p>
                                        </div>
                                        <div class="price-box">
                                            <span>$200.00 <del>$200.25</del></span>       
                                        </div>
                                        <div class="cart-details">
                                            <ul>
                                                <li class="add"><a href="cart.html">add to cart</a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="row">
                                <div class="col-md-4 col-6">
                                    <div class="feature-img">
                                        <a href="product-details.html"><img src="<?php echo base_url('') ?>public/img/product/product21.jpg" alt="feature"></a>
                                        <span class="new">new</span>  
                                        <span class="sale">sale</span>  
                                    </div>  
                                </div>  
                                <div class="col-md-8 col-6"> 
                                    <div class="feature-content text-left">
                                        <p><a href="product-details.html">love seats</a></p>
                                        <div class="product-rating">
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="description">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco <span>learn more</span></p>
                                        </div>
                                        <div class="price-box">
                                            <span>$80.00</span>       
                                        </div>
                                        <div class="cart-details">
                                            <ul>
                                                <li class="add"><a href="cart.html">add to cart</a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="row">
                                <div class="col-md-4 col-6">
                                    <div class="feature-img">
                                        <a href="product-details.html"><img src="<?php echo base_url('') ?>public/img/product/product35.jpg" alt="feature"></a>
                                        <span class="new">new</span>  
                                        <span class="sale">sale</span>  
                                    </div>  
                                </div>  
                                <div class="col-md-8 col-6"> 
                                    <div class="feature-content text-left">
                                        <p><a href="product-details.html">office chairs</a></p>
                                        <div class="product-rating">
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="description">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco <span>learn more</span></p>
                                        </div>
                                        <div class="price-box">
                                            <span>$125.00 </span>       
                                        </div>
                                        <div class="cart-details">
                                            <ul>
                                                <li class="add"><a href="cart.html">add to cart</a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="row">
                                <div class="col-md-4 col-6">
                                    <div class="feature-img">
                                        <a href="product-details.html"><img src="<?php echo base_url('') ?>public/img/product/product23.jpg" alt="feature"></a>
                                        <span class="new">new</span>  
                                        <span class="sale">sale</span>  
                                    </div>  
                                </div>  
                                <div class="col-md-8 col-6"> 
                                    <div class="feature-content text-left">
                                        <p><a href="product-details.html">Flourish</a></p>
                                        <div class="product-rating">
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="description">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco <span>learn more</span></p>
                                        </div>
                                        <div class="price-box">
                                            <span>$150.00</span>       
                                        </div>
                                        <div class="cart-details">
                                            <ul>
                                                <li class="add"><a href="cart.html">add to cart</a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="paginations pt-10">
                                <ul>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">next</a></li>
                                </ul>
                            </div> 
                        </div>   
                    </div> -->
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="shop-left-sidebar">
                    <div class="single-left-widget">
                        <div class="widget-title">
                            <h4>price</h4>
                        </div>
                        <div class="widget-cont">
                            <ul>
                                <li><a href="#">Rp 0 - Rp 100.000  <span>(2)</span></a></li>
                                <li><a href="#">Rp 100.000 - Rp 200.000  <span>(14)</span></a></li>
                                <li><a href="#">Rp 200.000 - Rp 300.000  <span>(4)</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-left-widget">
                        <div class="shop-banner">
                            <img src="<?php echo base_url('') ?>public/img/banner/shop-side.png" alt="shop">
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop end -->
<!-- Client Area Start -->