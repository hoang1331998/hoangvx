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
                <h2>Shop Page</h2>
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li class="active">Shop Page</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="shop-area pt-100 pb-100 gray-bg">
        <div class="container">
            <div class="row flex-row">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <?php $this->load->view('pages/shop/layout/left');?>
                </div>
                <div class="col-lg-9">
                    <div class="shop-topbar-wrapper">
                        <div class="product-sorting-wrapper">
                            <div class="product-show shorting-style">
                                <label>Showing <span>1-6</span> of <span> </span>
                                    Results</label>
                                <select name="sel">
                                    <option value="6">6</option>

                                </select>
                            </div>
                        </div>
                        <div class="grid-list-options">
                            <ul class="view-mode">
                                <li class="active"><a href="#product-grid" data-view="product-grid"><i
                                            class="ti-layout-grid4-alt"></i></a></li>
                                <li><a href="#product-list" data-view="product-list"><i
                                            class="ti-align-justify"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="grid-list-product-wrapper">
                        <div class="product-view product-grid">
                            <div class="row">
                                <!-- Item -->
                                <?php
                                        if($list){
                                           foreach ($list as $row){
                                               
                                    ?>
                                <div class="product-width col-lg-6 col-xl-4 col-md-6 col-sm-6">
                                    <div class="product-wrapper mb-10">
                                        <div class="product-img">
                                            <a href="<?php echo base_url("shop/pet_detail/".$row->id)?>">
                                                <img src="<?php echo base_url('assets/')?>img/pet/<?php echo $row->image?>"
                                                    alt="">
                                            </a>
                                            <div class="product-action">
                                                <a title="Quick View" data-toggle="modal" data-target="#exampleModal"
                                                    href="#">
                                                    <i class="ti-plus"></i>
                                                </a>
                                                <a title="Add To Cart" href="<?php echo base_url("cart/add/".$row->id )?>">
                                                    <i class="ti-shopping-cart"></i>
                                                </a>
                                            </div>
                                            <div class="product-action-wishlist">
                                                <a title="Wishlist" href="#">
                                                    <i class="ti-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <h4><a href="product-details.html"><?php echo $row->description?></a></h4>
                                            <div class="product-price">
                                                <span class="new"><?php echo $row->id?> </span>
                                                <!-- <span class="old">$50.00</span> -->
                                            </div>
                                        </div>
                                        <div class="product-list-content">
                                            <h4><a href="#"><?php echo $row->id?></a></h4>
                                            <div class="product-price">
                                                <span class="new"><?php echo $row->price?> </span>
                                            </div>
                                            <p><?php echo $row->description?></p>
                                            <div class="product-list-action">
                                                <div class="product-list-action-left">
                                                    <a class="addtocart-btn" title="Add to cart" href="#"><i
                                                            class="ion-bag"></i> Add to cart</a>
                                                </div>
                                                <div class="product-list-action-right">
                                                    <a title="Wishlist" href="#"><i class="ti-heart"></i></a>
                                                    <a title="Quick View" data-toggle="modal"
                                                        data-target="#exampleModal" href="#"><i class="ti-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="ti-close" aria-hidden="true"></span>
        </button>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
          
                <div class="modal-body">
                  
                    <div class="qwick-view-left">
                  
                        <div class="quick-view-learg-img">
                            <div class="quick-view-tab-content tab-content">
                                <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                    <img src="<?php echo base_url('assets/')?>img/pet/<?php echo $row->image?>" alt="">
                                </div>
                                <div class="tab-pane fade" id="modal2" role="tabpanel">
                                    <img src="<?php echo base_url('assets/')?>img/pet/<?php echo $row->image?>" alt="">
                                </div>
                                <div class="tab-pane fade" id="modal3" role="tabpanel">
                                    <img src="<?php echo base_url('assets/')?>img/pet/<?php echo $row->image?>" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="quick-view-list nav" role="tablist">
                            <a class="active" href="#modal1" data-toggle="tab" role="tab">
                                <img src="<?php echo base_url('assets/home/')?>img/quick-view/s1.jpg" alt="">
                            </a>
                            <a href="#modal2" data-toggle="tab" role="tab">
                                <img src="<?php echo base_url('assets/home/')?>img/quick-view/s2.jpg" alt="">
                            </a>
                            <a href="#modal3" data-toggle="tab" role="tab">
                                <img src="<?php echo base_url('assets/home/')?>img/quick-view/s3.jpg" alt="">
                            </a>
                        </div>
                       
                    </div>
                    <div class="qwick-view-right">
                        
                        <div class="qwick-view-content">
                            <h3><?php echo $row->description?> </h3>
                            <div class="product-price">
                                <span><?php echo $row->price?> </span>
                            </div>
                            <div class="product-rating">
                                <i class="ion-star theme-color"></i>
                                <i class="ion-star theme-color"></i>
                                <i class="ion-star theme-color"></i>
                                <i class="ion-star theme-color"></i>
                                <i class="ion-star theme-color"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do amt tempor incididun ut labore
                                et dolore magna aliqua. Ut enim ad mi , quis nostrud veniam exercitation .</p>
                            <!-- <div class="quick-view-select">
                                <div class="select-option-part">
                                    <label>Size*</label>
                                    <select class="select">
                                        <option value="">- Please Select -</option>
                                        <option value="">XS</option>
                                        <option value="">S</option>
                                        <option value="">M</option>
                                        <option value=""> L</option>
                                        <option value="">XL</option>
                                        <option value="">XXL</option>
                                    </select>
                                </div>
                                <div class="select-option-part">
                                    <label>Color*</label>
                                    <select class="select">
                                        <option value="">- Please Select -</option>
                                        <option value="">orange</option>
                                        <option value="">pink</option>
                                        <option value="">yellow</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="quickview-plus-minus">
                                <div class="cart-plus-minus">
                                    <input type="text" value="1" name="qtybutton" class="cart-plus-minus-box">
                                </div>
                                <div class="quickview-btn-cart">
                                    <a class="btn-style" href="#">add to cart</a>
                                </div>
                                <div class="quickview-btn-wishlist">
                                    <a class="btn-hover" href="#"><i class="ti-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
               
            </div>

        </div>
    </div>

                                <?php 
                                                }
                                            
                                        } else{
                                            echo "<p class = 'shop-sidebar-title'>No data </p>";
                                        }                                
                                     ?>
                                <!-- end item -->
                            </div>

                            <div class="pagination-style text-center mt-10">
                                <!-- <ul>
                                        <li>
                                            <a href="#"><i class="icon-arrow-left"></i></a>
                                        </li>
                                        <li>
                                            <a href="#">1</a>
                                        </li>
                                        <li>
                                            <a href="#">2</a>
                                        </li>
                                        <li>
                                            <a class="active" href="#"><i class="icon-arrow-right"></i></a>
                                        </li>
                                    </ul> -->
                                <?php echo $links?>
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



</body>

</html>