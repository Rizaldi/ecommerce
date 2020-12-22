<header>
	<div class="header-area header-area-padding">
	    <div class="top-link three top-link-padding bg-three">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="top-left">
                            <?php if (!$this->session->userdata('data_session')): ?>
                                <p>Welcome.</p>
                                <a href="<?php echo site_url('register'); ?>">Register</a>
                                <span>or</span>
                                <a href="<?php echo site_url('login'); ?>">Login</a>
                            <?php endif ?>  
                        </div>	
                    </div>
                    <div class="col-md-6">
                       <div class="account-usd text-left">
                            <ul>
                                <?php if ($this->session->userdata('data_session')): ?>
                                    <a href="<?php echo site_url('transaction/list') ?>"><i class="fa fa-credit-card"></i> Konfirmasi Pembayaran</a>
                                <?php endif ?>
                                <li>
                                    <?php if ($this->session->userdata('data_session')): ?>
                                        <a href="#">Hi, <?php echo $this->session->userdata('data_session')->username; ?></a>
                                    <?php else: ?>
                                        <a href="#">My Account</a>
                                    <?php endif ?>
                                    <ul class="submenu-mainmenu">
                                        <?php if ($this->session->userdata('data_session')): ?>
                                            <!-- <li><a href="product-details.html">compare products</a></li> -->
                                            <li><a href="register.html">My Account</a></li>
                                            <!-- <li><a href="<?php echo site_url('transaction/list') ?>">My Shopping</a></li> -->
                                            <li><a href="<?php echo site_url('signout'); ?>">Sign Out</a></li>
                                        <?php else: ?>
                                            <li><a href="<?php echo site_url('login'); ?>">Sign In</a></li>
                                        <?php endif ?>
                                    </ul>
                                </li>
                                <!-- <li class="language">
                                    <?php if ($this->session->userdata('format_currency') == "USD"): ?>
                                        <a href="<?php echo site_url('currency/usd') ?>">USD</a>
                                        <ul class="submenu-mainmenu">
                                            <li><a href="<?php echo site_url('currency/idr') ?>">IDR</a></li>
                                        </ul>

                                    <?php else: ?>
                                        <a href="<?php echo site_url('currency/idr') ?>">IDR</a>
                                        <ul class="submenu-mainmenu">
                                            <li><a href="<?php echo site_url('currency/usd') ?>">USD</a></li>
                                        </ul>
                                    <?php endif ?>
                                </li>
                                <li class="language">
                                    <?php if ($this->session->userdata('site_lang') == 'indonesia'): ?>
                                        <a href="<?php echo site_url('id') ?>"><img style="padding-right: 3px;" src="<?php echo base_url('public/img/logo/indonesia.png'); ?>">  IDN</a>
                                    <?php else: ?>
                                        <a href="<?php echo site_url('en') ?>"><img style="padding-right: 3px;" src="<?php echo base_url('public/img/logo/english.png'); ?>">EN</a>
                                    <?php endif ?>
                                    <ul class="submenu-mainmenu">
                                        <?php if ($this->session->userdata('site_lang') != 'indonesia'): ?>
                                            <li><a href="<?php echo site_url('id') ?>"><img style="padding-right: 3px;" src="<?php echo base_url('public/img/logo/indonesia.png'); ?>">IDN</a></li>
                                        <?php else: ?>
                                        <li><a href="<?php echo site_url('en') ?>"><img style="padding-right: 3px;" src="<?php echo base_url('public/img/logo/english.png'); ?>">EN</a></li>
                                        <?php endif ?>
                                    </ul>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-header three header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-6">
                        <div class="logo main">
                        	<a href="<?php echo site_url(); ?>"><img src="<?php echo base_url('') ?>public/img/logo/logo.png" alt="shopro" width="150" /></a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-3">
                        <div class="menu-wrapper display-none">
                            <div class="main-menu mean-menu">
                                <nav style="display: block;">
                                    <ul>
                                        <li class="active"><a href="<?php echo site_url('') ?>">home</a>
                                        </li>
                                        <li><a href="#">Category</a></li>
                                        <li><a href="<?php echo site_url('blog') ?>"><?php echo $this->lang->line("menu_blog"); ?></a></li>
                                        <li><a href="<?php echo site_url('contact-us') ?>"><?php echo $this->lang->line("menu_contact"); ?></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- Main Menu Area End -->
                    </div>
                    <div class="col-lg-2 col-md-2 col-3">
                        <div class="header-cart main">
                            <a href="<?php echo site_url('cart') ?>">
                                <i class="fa fa-shopping-bag"></i>
                                <span><?php echo $this->lang->line("menu_cart"); ?></span>
                                <!-- <span class="counter counter_cart"><?php echo count($this->session->userdata('cart_item')); ?></span>    -->
                            </a>
                            <!-- <ul class="submenu-mainmenu">
                                <li class="ul_cart">
                                </li>
                                <li>
                                    <span class="sub-total-cart text-center">
                                        SubTotal <span>$620</span>
                                        <a href="checkout.html" class="view-cart">Checkout</a>
                                    </span>
                                </li>    
                            </ul> -->
                        </div>           
                    </div>
                </div>
                <!-- Mobile Menu Area Start -->
                <div class="mobile-menu-area col-12">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul class="menu-overflow">
                                <li><a href="<?php echo site_url('') ?>">Home</a>
                                </li>
                                <li><a href="#"><?php echo $this->lang->line("Kategori"); ?></a></li>
                                <li><a href="<?php echo site_url('blog') ?>"><?php echo $this->lang->line("menu_blog"); ?></a></li>
                                <li><a href="<?php echo site_url('contact-us') ?>"><?php echo $this->lang->line("menu_contact"); ?></a></li>
                            </ul>
                        </nav>							
                    </div>
                </div>
                <!-- Mobile Menu Area End -->
            </div>  
        </div> 
        <div class="header-bottom four">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3">
                        <div class="category-nav">
                            <div class="nav-title show-menu">
                                <h2><?php echo $this->lang->line("menu_categories"); ?></h2>
                            </div>
                            <div class="nav-menu menu-show" <?php echo ($this->uri->total_segments() != 0) ? 'style="display: none;"' : ''; ?>>
                                    <?php foreach ($category as $category_list): ?>
                                    <ul>
                                        <li <?php echo (empty($category_list->sub_category)) ? "" : "class='megamenu'"; ?>>
                                            <a href="<?php echo base_url('category/'.$category_list->category_slug); ?>"><img src="<?php echo ($category_list->icon != null || $category_list->icon != '') ? base_url('public/img/icon/'.$category_list->icon) : base_url('public/img/icon/order.png'); ?>" alt="cat"><?php echo $category_list->category_name; ?></a>
                                            <?php if (!empty($category_list->sub_category)): ?>
                                            <ul class="row">
                                            <?php foreach ($category_list->sub_category as $sub_category_list): ?>
                                                    <li class="col-md-3"><a href="<?php echo base_url('category/'.$category_list->category_slug.'/'.$sub_category_list->sub_category_slug); ?>"><b><?php echo $sub_category_list->sub_category_name; ?></b></a></li>
                                            <?php endforeach ?>
                                            </ul>
                                            <?php endif ?>
                                        </li>
                                    </ul>    
                                    <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-9">
                        <div class="search-box three" id="search-form">
                            <form action="<?php echo site_url('search') ?>" method="get">
                                <input placeholder="Search entire store here..." type="text" name="p" id="search_home">
                                <button class="search" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <div class="header-phone three">
                            <div class="fa fa-volume-control-phone"></div>
                            <div class="header-phn-info">
                                <span>+6287 82562 6969</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
	</div>
</header>