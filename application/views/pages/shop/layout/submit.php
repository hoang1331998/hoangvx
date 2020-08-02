<html>
    <head>
        <?php $this->load->view('pages/layout/head');?>
    </head>
    <body>
        <header class="header_area sticky-header">
            <?php $this->load->view('pages/shop/header');?>
        </header>	
        <!-- end header -->
        <section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Product Details Page</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="single-product.html">product-details</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
    <div class="container" style="height:400px">
    <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show" style="margin-top: 100px ">
        <span class="badge badge-pill badge-primary">Success</span>
           <p>Buy your pet successfully!!! </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="checkout_btn_inner d-flex align-items-center">
        <a class="gray_btn" href="<?php echo base_url('shop')?>">Continue Shopping</a>
        
    </div>
</div>

	<!-- End related-product Area -->
        <footer class="footer-area section_gap">
            <?php $this->load->view('pages/layout/footer');?>
        </footer>
    </body>
</html>