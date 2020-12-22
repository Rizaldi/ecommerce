<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">  
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Login</li>
                    </ul>
                </div>  
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->
<!-- Login Area Start -->
<div class="login-area pb-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="login-title">
                    <h2>customer login</h2>
                </div>
            </div> 
            <div class="col-lg-6 col-md-12">
                <form id="login-form" action="<?php echo site_url('login') ?>" method="post">
                	<div class="login-left subtitle">
	                    <h3>registered customers</h3>
	                    <?php if ($this->session->flashdata('login_error') == 1): ?>
		                    <p>&nbsp;<span>Semua Field Harus Diisi</span></p>
		                <?php elseif ($this->session->flashdata('login_error') == 2): ?>
		                    <p>&nbsp;<span>Username atau password yang kamu masukkan salah. Silakan coba lagi.</span></p>
		                <?php endif ?>
	                    <div class="email">
	                        <label for="email" class="label"><span>email</span></label>
	                        <input id="email" type="text" name="email" value="<?php echo set_value('email'); ?>">
	                    </div>
	                    <div class="passwod">
	                        <label for="password" class="password"><span>password</span></label>
	                        <input id="password" type="text" name="password">
	                    </div>
	                    <div class="sign-in">
	                        <button type="submit" class="sign-in">sign in</button>
	                        <p class="forget">forget your password?</p>
	                    </div>
	                </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="login-right subtitle sign-in">
                    <h3>new customers</h3>
                    <p>Creating an account has many benefits: check out faster, keep more than one address, track orders and more.</p>
                    <a href="<?php echo site_url('register') ?>" class="creat">creat an account</a>
                </div>
            </div>
        </div>
    </div>
</div>