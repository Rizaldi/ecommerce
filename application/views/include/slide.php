<div class="slider-menu-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">   
                <div class="menu-wrapper"></div>
            </div>
        </div>
    </div>
    <div class="slider-area banner-slider four">
        <div class="slider-wrapper owl-carousel">
            <?php foreach ($slide as $slides): ?>
                
            <div class="single-slide" style="background-image: url('public/img/slider/<?php echo $slides->img; ?>');height:500px;">
                <<!-- div class="container">
                    <div class="row justify-content-end">
                        <div class="col-lg-9">
                            <div class="slider-banner">
                                <h5> </h5>
                                <h4> </h4>
                                <h1></h1>
                                <a href="shop.html" class="banner-btn">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <?php endforeach ?>
            <!-- <div class="single-slide slider-two" style="background-image: url('public/img/slider/slider6.jpg');">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-lg-9">
                            <div class="slider-banner text-center">
                                <h2>BULK DEAL</h2>
                                <h5> Purchase ANY six, 1lb or 2lb bags and save 25%  Use promo code: COFFEE6</h5>
                                <a href="shop.html" class="banner-btn">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>