<html>

<head>
    <?php $this->load->view('pages/admin/layout/head_admin');?>
</head>

<body class="sidebar-mini" style="height: auto;">
    <div class="wrapper">
        <!-- Navbar -->
        <?php $this->load->view('pages/admin/layout/navbar_admin');?>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <?php $this->load->view('pages/admin/layout/left_admin');?>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <?php $this->load->view('pages/admin/message',$this->data);?>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Species</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin')?>">Home</a></li>
                                <li class="breadcrumb-item active">Species</li>
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
                                    <a href="<?php echo base_url("admin/species/create")?>"
                                        class="btn btn-primary">Add</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>STT</th>                                           
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if ($species) {
                                                $count = 1;
                                                foreach ($species as $p) {                                
                                        ?>
                                            <tr>
                                                <td><?php echo $count++ ?></td>
                                               
                                                <td> <?php echo $p->id?></td>
                                                <td><?php echo $p->name?></td>
                                                <td>
                                                    <a class="btn btn-primary"
                                                        href="<?php echo base_url('admin/species/edit/'.$p->id)?> "><span
                                                            class="badge badge-complete hvr-grow">Edit</span></a>
                                                    <a class="btn btn-danger"
                                                        onclick="return confirm('Ban co chac muon xoa sach nay hay khong?');"
                                                        href="<?php echo base_url('admin/species/delete/'.$p->id)?>"><span
                                                            class="badge badge-pending hvr-grow">Delete</span></a>
                                                </td>
                                            <?php
                                                    }
                                                }
                                            ?>
                                            </tr>
                                            
                                           
                                        </tbody>

                                    </table>
                                </div>
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