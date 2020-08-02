<html>

<head>
    <?php $this->load->view('pages/admin/layout/head_admin');?>
</head>

<body class="sidebar-mini" style="height: auto;">
    <div class="wrapper">
        <?php 
            if ($role) {
                foreach ($role as $r) {  
                    $R = $r->role_id;
                }
            }                             
        ?>
        <!-- Navbar -->
        <?php $this->load->view('pages/admin/layout/navbar_admin');?>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <?php
            if($R == 0){
                $this->load->view('pages/admin/layout/left_admin');
            }else{
                $this->load->view('pages/admin/layout/left_employee');
            }
        ?>
        <!-- $this->load->view('pages/admin/layout/left_admin'); -->

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Invoice</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Invoice</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- <div class="callout callout-info">
                                <h5><i class="fas fa-info"></i> Note:</h5>
                                This page has been enhanced for printing. Click the print button at the bottom of the
                                invoice to test.
                            </div> -->

                            <?php 
                                if ($info) {
                                  $count = 1;
                                  foreach ($info as $p) { 
                                                                   
                              ?>
                            <!-- Main content -->
                            <div class="invoice p-3 mb-3">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-12">
                                       
                                        <?php if($p->tt==1):?>
                                        <a class="btn btn-danger"
                                            href="<?php echo base_url('admin/invoice/active/'. $p->id)?>"><span style="font-size: 30px !important;" 
                                                class="badge badge-complete hvr-grow">confirm</span></a>
                                        <?php else:?>
                                        <h3 class=" text-success">confirmed</h3>
                                        <?php endif?>
                                        <h4 class="text-danger">
                                            <i class="fas fa-globe text-danger"></i> Invoice ID: <?php echo $p->id?>

                                            <small class="float-right">Date: <?php echo $p->created_time?></small>
                                        </h4>

                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        Employee
                                        <address>
                                            <strong><?php echo $p->em_name?></strong><br>
                                            Address: <?php echo $p->em_address?><br>
                                            Email: <?php echo $p->em_email?><br>
                                            Phone: <?php echo $p->em_phone?><br>

                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        Customer
                                        <address>
                                            <strong><?php echo $p->cus_name?></strong><br>
                                            Address: <?php echo $p->cus_address?><br>
                                            Email: <?php echo $p->cus_phone?><br>
                                            Phone: <?php echo $p->cus_email?><br>

                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">

                                        <b>Order ID:</b> 4F3S8J<br>
                                        <b>Payment Due:</b> 2/22/2014<br>

                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Qty</th>
                                                    <th>Product</th>
                                                    <th>Quality</th>
                                                    <th>Sale(%)</th>
                                                    <th>Old price</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $p->pet_id?></td>
                                                    <td><?php if ($p->pet_species == 0) {echo "Dog";}
                                                            else if($p->pet_species ==1) {echo "Cat";}
                                                            else echo "Bird";?></td>
                                                    <td><?php echo $p->pet_gender?></td>
                                                    <td><?php if($p->pet_sale) echo $p->pet_sale ;else echo 0;?></td>
                                                    <td><?php echo $p->pet_price?></td>
                                                    <td><?php if($p->pet_sale) echo $sub = $p->pet_price - $p->pet_price*$p->pet_sale/100;
                                                                else  echo $sub = $p->pet_price;?></td>
                                                </tr>
                                                <?php 
                                                    if ($item) {
                                                    $count = 1;
                                                    foreach ($item as $Item) {                                                                                 
                                                ?>
                                                <tr>
                                                    <td><?php echo $Item->foodID?></td>
                                                    <td><?php echo $Item->name_food?></td>
                                                    <td><?php echo $Item->quality_food?></td>
                                                    <td>0</td>
                                                    <td><?php echo $Item->price_food?></td>
                                                    <td><?php echo $Item->price_food?></td>
                                                </tr>
                                                <?php
                                                        }
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-6">
                                        <p class="lead">Payment Methods:</p>
                                        <img src="<?php echo base_url('assets')?>/dist/image/credit/visa.png"
                                            alt="Visa">
                                        <img src="<?php echo base_url('assets')?>/dist/image/credit/mastercard.png"
                                            alt="Mastercard">
                                        <img src="<?php echo base_url('assets')?>/dist/image/credit/american-express.png"
                                            alt="American Express">
                                        <img src="<?php echo base_url('assets')?>/dist/image/credit/paypal2.png"
                                            alt="Paypal">
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6">
                                        <p class="lead text-orange">Ha Noi,
                                            <?php date_default_timezone_set("Asia/Ho_Chi_Minh"); echo date('l jS \of F Y h:i:s A');?>
                                        </p>

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th style="width:50%">Subtotal:</th>
                                                        <td><?php if($item)
                                                                         echo $sum = $sub+ $Item->price_food ;
                                                                 else
                                                                    echo $sum = $sub ;                                                                                                                      
                                                            ?>đ</td>
                                                    </tr>

                                                    <tr>
                                                        <th>Shipping:</th>
                                                        <td>30.000đ</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total: </th>
                                                        <td class="font-weight-bold"> <?php echo $sum + 30000?>Đ</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                    <div class="col-12">
                                        <a href="invoice-print.html" target="_blank" class="btn btn-default"><i
                                                class="fas fa-print"></i> Print</a>
                                        <button type="button" class="btn btn-success float-right"><i
                                                class="far fa-credit-card"></i> Submit
                                            Payment
                                        </button>
                                        <button type="button" class="btn btn-primary float-right"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-download"></i> Generate PDF
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            }
                        ?>
                            <!-- /.invoice -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
        </div>
    </div>
    <?php $this->load->view("pages/admin/layout/footer");?>
</body>

</html>