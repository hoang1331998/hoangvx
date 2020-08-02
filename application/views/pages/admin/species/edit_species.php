<html>

<head>
    <?php $this->load->view("pages/admin/layout/head_admin");?>
</head>

<body class="sidebar-mini" style="height: auto;">
    <div class="wrapper">
        <!-- Main Sidebar Container -->
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

        <div class="content-wrapper" style="min-height: 1244.06px;">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>General Form</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/home')?>">Home</a></li>
                                <li class="breadcrumb-item active">Add pet</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-lg-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Quick Example</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->

                                <div class="card-body card-block">
                                    <form action="#" method="post" enctype="multipart/form-data"
                                        class="form-horizontal">
                                        <!-- id -->

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input"
                                                    class=" form-control-label">ID</label></div>
                                            <div class="col-12 col-md-9"><span
                                                    style="color:red !important; font-style: italic;"><?php echo form_error('id')?></span><input
                                                    type="text" id="text" name="id" placeholder="Text"
                                                    value="<?php echo $species->id?>" class="form-control"></div>
                                        </div>

                                        <!-- age -->
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input"
                                                    class=" form-control-label">Name</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text" name="name"
                                                    placeholder="Text" class="form-control"
                                                    value="<?php echo $species->name?>"></div>
                                        </div>

                                      
                                        <div class="form-group text-center">
                                            <input type="submit" value="Update" class="btn btn-primary">
                                        </div>


                                    </form>
                                </div>
                                <!-- /.card-body -->


                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php $this->load->view("pages/admin/layout/footer");?>
</body>

</html>