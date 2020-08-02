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
            <section class="content-header">
                <div class="container-fluid">
                    <?php $this->load->view('pages/admin/message',$this->data);?>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Pet</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin')?>">Home</a></li>
                                <li class="breadcrumb-item active">PET</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header">
                                    <a href="<?php echo base_url("admin/product/create")?>"
                                        class="btn btn-primary">Add</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="serial">STT</th>
                                                <th>ID</th>

                                                <th>Employee</th>
                                                <th>Customer</th>
                                                <th>Total price</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if ($build) {
                                                $count = 1;
                                                $total =0;
                                                foreach ($build as $p) {  
                                                    //$total += $p->price;

                                        ?>
                                            <tr>
                                                <td><?php echo $count++ ?></td>

                                                <td><?php echo $p->id?></td>
                                                <td><?php echo $p->em_name?></td>
                                                <td>
                                                    <?php echo $p->cus_name?></td>
                                                </td>
                                                <td><?php echo $p->total_price?></td>

                                                <td>
                                                    <a class="btn btn-primary"
                                                        href="<?php echo base_url('admin/invoice/detail/'. $p->id)?>"><span
                                                            class="badge badge-complete hvr-grow">View detail</span></a>
                                                    <?php if($p->tt==1):?>
                                                    <a class="btn btn-danger"
                                                        href="<?php echo base_url('admin/invoice/active/'. $p->id)?>"><span
                                                            class="badge badge-complete hvr-grow">confirm</span></a>
                                                    <?php else:?>
                                                    <span
                                                        class="badge badge-complete hvr-grow text-success">confirmed</span>
                                                    <?php endif?>
                                                </td>
                                            </tr>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>
    <?php $this->load->view("pages/admin/layout/footer");?>
</body>

</html>