<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php $this->load->view('pages/shop/head')?>
</head>

<body>
    <!-- Header -->
    <?php $this->load->view('pages/shop/header');?>
    <!-- End header -->
    <div class="breadcrumb-area pt-95 pb-95 bg-img"
        style="background-image:url(http://localhost:8888/petshop/assets/home/img/banner/banner3.jpg); object-fit:cover;">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Checkout</h2>
                <ul>
                    <li><a href="<?php echo base_url("home")?>">home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- shopping-cart-area start -->
    <div class="checkout-area pt-95 pb-70">
        <div class="container">

            <div class="row ">
                <div class="text-center" style="width:100%">
                    <div class="alert alert-primary" role="alert">
                        Orders are awaiting confirmation, please check your phone we will contact you as soon as
                        possible !!!
                    </div>
                    <div class="cart-shiping-update text-center mb-5">
                        <a href="<?php echo base_url("shop")?>">Continue Shopping</a>
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