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

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input"
                                                    class=" form-control-label">ID</label></div>
                                            <div class="col-12 col-md-9"><span
                                                    style="color:red !important; font-style: italic;"><?php echo form_error('id')?></span><input
                                                    type="text" id="text" name="id" placeholder="Text"
                                                    value="<?php echo set_value('id')?>" class="form-control"></div>
                                        </div>

                                        <!-- age -->
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input"
                                                    class=" form-control-label">Age</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text" name="age"
                                                    placeholder="Text" class="form-control"></div>
                                        </div>

                                        <!-- description -->
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="textarea-input"
                                                    class=" form-control-label">Description</label></div>
                                            <div class="col-12 col-md-9"><textarea name="description"
                                                    id="textarea-input" rows="9" placeholder="Content..."
                                                    class="form-control"></textarea></div>
                                        </div>
                                        <!-- price -->
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input"
                                                    class=" form-control-label">Price</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="price" name="price"
                                                    placeholder="" class="form-control"></div>
                                        </div>
                                        <!-- special id -->
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="selectLg"
                                                    class=" form-control-label">Giống loại</label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="species_id" id="selectLg"
                                                    class="form-control-lg form-control">
                                                    <option value="0">Cho</option>
                                                    <option value="1">Meo</option>
                                                    <option value="2">Chim</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- gender -->
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label class=" form-control-label">Gender</label>
                                            </div>
                                            <div class="col col-md-9">
                                                <div class="form-check-inline form-check">
                                                    <label for="inline-radio1" class="form-check-label ">
                                                        <input type="radio" id="inline-radio1" name="gender" value="1"
                                                            class="form-check-input">Male
                                                    </label>
                                                    <label for="inline-radio2" class="form-check-label ">
                                                        <input type="radio" id="inline-radio2" name="gender" value="0"
                                                            class="form-check-input" style="margin-left: 10px;">Female
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- sale id -->
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="password-input"
                                                    class=" form-control-label">Sale id</label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="password-input"
                                                    name="sale_id" placeholder="" class="form-control"></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="file-input"
                                                    class=" form-control-label">image</label></div>
                                            <div class="col-12 col-md-9"><input type="file" id="image" name="image"
                                                    class="form-control-file"></div>
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