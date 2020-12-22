<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">  
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Register</li>
                    </ul>
                </div>  
            </div>
        </div>
    </div>
</div>
<div class="my-account-area pb-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form action="<?php echo $register; ?>" method="post">
                    <div class="subtitle">
                        <h3>Register</h3>
                        <p>
                            <label for="reg-email" class="important">Fullname</label>
                            <input name="username" type="text" required="" placeholder="Your Fullname">
                        </p>
                        <p>
                            <label for="reg-email" class="important">Nickname</label>
                            <input name="surname" type="text" required="" placeholder="Your Nickname">
                        </p>
                        <p>
                            <label for="reg-email" class="important">Email</label>
                            <input name="email" type="email" required="" placeholder="Your Email">
                        </p>
                        <p>
                            <label for="reg-pass" class="important">Password</label>
                            <input name="password" type="password" id="reg-pass" placeholder="Your Password">
                        </p>
                       <!--  <p>
                            <div class="state">
                                <p>Province</p>
                                <select class="country form-control" id="province" name="province">
                                </select>
                            </div>
                        </p>
                        <p>
                            <div class="state">
                                <p>City</p>
                                <select class="country form-control" id="city" name="city">
                                </select>
                            </div>
                        </p>
                        <p>
                            <label for="reg-pass" class="important">Address</label>
                            <textarea class="form-control" name="address1" placeholder="Your Address.."></textarea>
                        </p> -->
                        <p>
                            <label for="reg-pass" class="important">Phone Number</label>
                            <input name="phone" type="text" id="reg-pass" placeholder="Your Phone">
                        </p>
                        <button type="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>