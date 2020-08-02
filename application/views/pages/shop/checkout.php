<!doctype html>
<html class="no-js" lang="zxx">
    <head>
    <?php $this->load->view('pages/shop/head')?>
    </head>
    <body>
    <!-- Header -->
    <?php $this->load->view('pages/shop/header');?>
    <!-- End header -->
        <div class="breadcrumb-area pt-95 pb-95 bg-img" style="background-image:url(http://localhost:8888/petshop/assets/home/img/banner/banner3.jpg); object-fit:cover;">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h2>Checkout</h2>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li class="active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
         <!-- shopping-cart-area start -->
        <div class="checkout-area pt-95 pb-70">
            <div class="container">
                <h3 class="page-title">checkout</h3>
                <div class="row">
                    <div class="col-lg-9">
                        <div class="checkout-wrapper">
                            <div id="faq" class="panel-group">
                            <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-1">billing information</a></h5>
                                    </div>
                                    <div id="payment-1" class="panel-collapse collapse show">
                                        <div class="panel-body">
                                            <form action="<?php echo base_url('cart/success')?>" method="post">
                                            <div class="billing-information-wrapper">
                                            <?php $total_amount = 0;?>
                                            
                                            <?php 
                                            if($carts){
                                                foreach($carts as $row){
                                                    $total_amount = $total_amount + $row['subtotal'];
                                            ?>
                                               <?php       
                                                }
                                            }?>
                                             <h4>Total Price: <span class="shop-total"> <?php echo $sum = $total_amount + 30000;?>đ</span></h4>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>First Name</label>
                                                            <input type="text" name="name"  required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">

                                                            <input type="hidden" name="total" value="<?php echo $sum = $total_amount + 30000;?>" required>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Email Address</label>
                                                            <input type="email" name="telephone"  required >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Address</label>
                                                            <input type="text" name="telephone"  required>
                                                        </div>
                                                    </div>
                                                    
                                                   
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Telephone</label>
                                                            <input type="text" name="telephone" required>
                                                        </div>
                                                    </div>
                                                 
                                                </div>
                                               
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ti-arrow-up"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button>Get a Quote</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>    
                                <!-- <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq"  href="#payment-2" >Checkout method</a></h5>
                                    </div>
                                    <div id="payment-2" class="panel-collapse collapse ">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="checkout-register">
                                                        <h5 class="checkout-sub-title">great an account</h5>
                                                        <p>Please enter your email address to create an account</p>
                                                        <form>
                                                            <label> Email Address </label>
                                                            <input type="email" name="email">
                                                            <button class="checkout-btn" type="submit">Great An Account</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="checkout-login">
                                                        <h5 class="checkout-sub-title">login</h5>
                                                        <form>
                                                            <div class="login-form">
                                                                <label> Email Address </label>
                                                                <input type="email" name="email">
                                                            </div>
                                                            <div class="login-form">
                                                                <label> Password </label>
                                                                <input type="email" name="email">
                                                            </div>
                                                        </form>
                                                        <div class="login-forget">
                                                            <button class="checkout-btn" type="submit">Login</button>
                                                            <a href="#">Forgot your password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                                    
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="checkout-progress">
                            <h4>Checkout Progress</h4>
                            <ul>
                                <li>Billing Address</li>
                                <li>Shipping Address</li>
                                <li>Shipping Method</li>
                                <li>Payment Method</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- footer -->
        <?php $this->load->view('pages/shop/footer');?>
        <!-- end footer -->
        <!-- modal -->
    </body>
</html>
