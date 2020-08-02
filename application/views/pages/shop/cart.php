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
                <h2>Cart Page</h2>
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li class="active">Cart Page</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- shopping-cart-area start -->
    <div class="cart-main-area pt-95 pb-100">
        <div class="container">
            <h3 class="page-title">Your cart items</h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="<?php echo base_url('cart/update')?>" method="post">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Until Price</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $total_amount = 0;?>
                                    <?php 
                                    if($carts){
                                        foreach($carts as $row){
                                            $total_amount = $total_amount + $row['subtotal'];
                                    ?>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="<?php echo base_url("shop/pet_detail/".$row["id"])?>"><img style="width:100px; height:100px;object-fit:cover;" src="<?php echo base_url('assets/')?>img/pet/<?php echo $row["image_link"]?>" alt=""></a>
                                        </td>
                                        <td class="product-name"><a href="<?php echo base_url("shop/pet_detail/".$row["id"])?>"><?php echo $row["name"]?></a></td>
                                        <td class="product-price-cart"><span class="amount"><?php echo $row["price"]?>đ</span></td>
                                        <td class="product-quantity text-center">
                                            <!-- <div class="cart-plus-minus">
                                                 <input class="cart-plus-minus-box" type="text" name="qty_ $row['id']?>"
                                                    value=" $row['qty']?>">
                                                    1
                                            </div> -->
                                          <span class="text-center">1</span>
                                        </td>
                                        <td class="product-subtotal"><?php echo $row["price"]?>đ</td>
                                        <td class="product-remove"><a href="<?php echo base_url("cart/del/".$row["id"])?>"><i class="ti-trash"></i></a></td>
                                    </tr>                                 
                                    <?php       
                                         }
                                    }?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="<?php echo base_url("shop")?>">Continue Shopping</a>
                                        <button>Update Cart</button>
                                    </div>
                                    <div class="cart-clear">
                                        <a href="<?php echo base_url("cart/remove")?>">Clear Shopping Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        
                  
                        <div class="col-lg-4 col-md-12">
                            <div class="grand-totall">
                                <span>Shipping:  30.000đ</span>
                                <h5>Grand Total: <?php echo $total_amount + 30000?>đ</h5>
                                <a href="<?php echo base_url("cart/checkout")?>">Proceed To Checkout</a>
                                <p>Checkout with Multiple Addresses</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php $this->load->view('pages/shop/footer');?>
    <!-- end footer -->
    <!-- modal -->

</html>