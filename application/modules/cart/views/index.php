<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">  
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">cart</li>
                    </ul>
                </div>  
            </div>
        </div>
    </div>
</div>
<div class="cart-main-area pb-20">
    <div class="container">
        <form action="#">
            <div class="cart-table table-responsive">
                <?php $item_total = 0; ?>
            	<?php $weight_total = 0; ?>
                <?php foreach ($this->session->userdata('cart_item') as $product_cart): ?>
                    <?php print_r($product_cart); ?>
                <table class="cart_item" data-price="<?php echo $product_cart['price']; ?>">
                    <thead>
                        <tr>
                            <th class="p-image"></th>
                            <th class="p-name">Product Name</th>
                            <th class="p-amount">Unit Price</th>
                            <!-- <th class="p-quantity">Qty</th> -->
                            <th class="p-total">SubTotal</th>
                            <!-- <th class="p-total">Weight</th> -->
                            <th class="p-edit">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-id="<?php echo $product_cart['product_id']; ?>" data-qty="<?php echo $product_cart['quantity']; ?>">
                            <td class="p-image">
                                <a href="product-details.html"><img alt="" src="<?php echo site_url('') ?>/public/img/product/<?php echo $product_cart['front_image']; ?>" ></a>
                            </td>
                            <td class="p-name"><a href="product-details.html"><?php echo $product_cart['title']; ?></a></td>
                            <td class="p-amount">
                                <?php if ($this->session->userdata('format_currency') == "USD"): ?>
                                    US $<?php echo $this->Currency_Converter->convert('IDR', 'USD', $product_cart['price'], true, 1); ?>
                                <?php else: ?>
                                   Rp <?php echo number_format($product_cart['price'],0,",","."); ?>
                                <?php endif ?>
                                    
                            </td>
                            <!-- <td class="p-quantity"></td> -->
                            <td class="p-total"> 
                                <input maxlength="12" type="hidden" value="<?php echo $product_cart['quantity']; ?>" name="quantity" id="quantity_cart" class="quantity_cart">
                                <span style="display: none;" class="rp_total">Rp </span> <span class="product_total">
                                <?php if ($this->session->userdata('format_currency') == "USD"): ?>
                                    US $<?php echo $this->Currency_Converter->convert('IDR', 'USD', $product_cart['price_quantity'], true, 1); ?>
                                <?php else: ?>
                                   Rp <?php echo number_format($product_cart['price_quantity'],0,",","."); ?>
                                <?php endif ?>
                                    
                                </span>
                            <span class="product_total_n" style="display: none;"></span>
                            </td>
                            <!-- <td class="p-name"><a href="product-details.html"><?php echo $product_cart['weight']; ?> Gram</a></td> -->
                            <td class="edit"><a href="<?php echo site_url('cart/delete_cart/'.$product_cart['product_encrypted_id']) ?>"><img src="<?php echo base_url('') ?>/public/img/icon/delte.png" alt=""></a></td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <?php $item_total += ($product_cart["price"]*$product_cart["quantity"]); ?>
                <?php $weight_total += $product_cart['weight']; ?>
                <?php endforeach ?>
                <br>
            </div>
            <div class="all-cart-buttons">
                <button class="button" type="button" onclick="window.location.href='<?php echo site_url(); ?>'"><span>Continue Shopping</span></button>
                <button class="button" type="button"><span>CLEAR CART</span></button>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="ht-shipping-content">
                        <!-- <h3>Weight Total</h3> -->
                        <!-- <p><?php echo $weight_total; ?> Gram</p>   -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="ht-shipping-content">
                        <!-- <h3>Discount Code</h3>
                        <p>Enter your coupon code if you have one</p>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="postal-code">
                                    <input type="text" placeholder="">
                                </div>
                                <div class="buttons-set">
                                    <button class="button" type="button"><span>Apply Coupon</span></button>
                                </div>
                            </div>
                        </div> -->    
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="ht-shipping-content">
                        <h3>Total</h3>
                        <div class="amount-totals">
                            <p class="total">Subtotal <span class="total_all">
                                <?php if ($this->session->userdata('format_currency') == "USD"): ?>
                                    US $<?php echo $this->Currency_Converter->convert('IDR', 'USD', $item_total, true, 1); ?>
                                <?php else: ?>
                                   Rp <?php echo number_format($item_total,0,",","."); ?>
                                <?php endif ?>
                                </span></p>
                            <p class="total">Grandtotal <span class="total_all">
                                <?php if ($this->session->userdata('format_currency') == "USD"): ?>
                                    US $<?php echo $this->Currency_Converter->convert('IDR', 'USD', $item_total, true, 1); ?>
                                <?php else: ?>
                                   Rp <?php echo number_format($item_total,0,",","."); ?>
                                <?php endif ?>
                                </span></p>
                            <a class="button" href="<?php echo site_url('checkout'); ?>"><span>Procced to checkout</span></a>
                            <div class="clearfix"></div>
                            <!-- <p class="floatright">Checkout with multiples address</p> -->
                        </div>   
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- <?php print_r($this->session->userdata('product_cart')); ?> -->