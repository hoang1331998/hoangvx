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
                                        <form action="<?php echo base_url('admin/employee/create')?>" method="post"
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
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="email"
                                                        class=" form-control-label">Email </label></div>
                                                <div class="col-12 col-md-9"><span
                                                        style="color:red !important; font-style: italic;"><?php echo form_error('email')?></span><input
                                                        type="email" name="email" id="email"
                                                        placeholder="Enter Email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="username"
                                                        class=" form-control-label">Username </label></div>
                                                <div class="col-12 col-md-9"><span
                                                        style="color:red !important; font-style: italic;"><?php echo form_error('username')?></span><input
                                                        type="text" name="username" id="username"
                                                        value="<?php echo set_value('id')?>"
                                                        placeholder="Enter userename" 
                                                        class="form-control"></div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="password-input"
                                                        class=" form-control-label">Password</label></div>
                                                <div class="col-12 col-md-9"><span
                                                        style="color:red !important; font-style: italic;"><?php echo form_error('password')?></span><input
                                                        type="password" name="password"
                                                        placeholder="Password" class="form-control"></div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="password-input"
                                                        class=" form-control-label">Confirm Password</label></div>
                                                <div class="col-12 col-md-9"><span
                                                        style="color:red !important; font-style: italic;"><?php echo form_error('re_password')?></span><input
                                                        type="password"  name="re_password"
                                                        placeholder="Password" class="form-control"></div>
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3"><label class=" form-control-label">Giới
                                                        tính</label></div>
                                                <div class="col col-md-9">
                                                    <div class="form-check-inline form-check">
                                                        <label for="male" class="form-check-label ">
                                                            <input type="radio" id="male" name="gender"
                                                                value="0" class="form-check-input" checked="checked">Male
                                                        </label>
                                                        <label for="female" class="form-check-label ">
                                                            <input type="radio" id="female" name="gender"
                                                                value="1" class="form-check-input"
                                                                style="margin-left: 10px;">Female
                                                        </label>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3"><label class=" form-control-label">Chức
                                                        vụ</label></div>
                                                <div class="col col-md-9">
                                                    <div class="form-check-inline form-check">
                                                        <label for="admin" class="form-check-label ">
                                                            <input type="radio" id="admin" name="role" value="0"
                                                                class="form-check-input">Admin
                                                        </label>
                                                        <label for="employee" class="form-check-label ">
                                                            <input type="radio" id="employee" name="role" value="1"
                                                                class="form-check-input" style="margin-left: 10px;" checked="checked">Employee
                                                            
                                                        </label>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="file-input"
                                                        class=" form-control-label">Avatar</label></div>
                                                <div class="col-12 col-md-9"><input type="file" id="file-input"
                                                        name="image" class="form-control-file"></div>
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