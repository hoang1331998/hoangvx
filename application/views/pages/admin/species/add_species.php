<html>

<head>
    <?php $this->load->view("pages/admin/layout/head_admin");?>
</head>

<body class="sidebar-mini" style="height: auto;">
    <div class="wrapper">
        <!-- Navbar -->
        <?php $this->load->view('pages/admin/layout/navbar_admin');?>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <?php $this->load->view('pages/admin/layout/left_admin');?>

        <div class="content-wrapper" style="min-height: 1244.06px;">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>General Form</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">General Form</li>
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
                                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="card-body card-block">
                                        <form action="<?php echo base_url('admin/species/create')?>" method="post"
                                            enctype="multipart/form-data" class="form-horizontal">

                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input"
                                                        class=" form-control-label">Mã member</label></div>
                                                <div class="col-12 col-md-9"><span
                                                        style="color:red !important; font-style: italic;"><?php echo form_error('id')?></span><input
                                                        type="text" name="id" placeholder="Text"
                                                        value="<?php echo set_value('id')?>" class="form-control"></div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="name"
                                                        class=" form-control-label">Họ tên </label></div>
                                                <div class="col-12 col-md-9"><span
                                                        style="color:red !important; font-style: italic;"><?php echo form_error('name')?></span><input
                                                        type="text"  name="name" id="name"
                                                        placeholder="Enter Email" class="form-control">
                                                </div>
                                            </div>
                                           
                                            <div class="card-footer">
                                                <input type="submit" class="btn btn-primary" value="Add">
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