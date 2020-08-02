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
                                    <a href="<?php echo base_url("admin/item/create")?>" class="btn btn-primary">Add</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="serial">STT</th>
                                                <th class="avatar">Avatar</th>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>species</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            if ($Food) {
                                                $count = 1;
                                                foreach ($Food as $p) {                                
                                        ?>
                                            <tr>
                                                <td><?php echo $count++ ?></td>
                                                <td>
                                                    <div class="avatar">
                                                        <a href="#"><img class="rounded-circle"
                                                                style="width: 100px; height: 100px; image-rendering: pixelated; object-fit: cover;"
                                                                src="../assets/img/food/<?php echo $p->image?>"
                                                                alt=""></a>
                                                    </div>
                                                </td>
                                                <td> <?php echo $p->id?></td>
                                                <td><?php echo $p->name?></td>
                                                <td><?php echo $p->quantity?></td>
                                                <td><?php echo $p->price?></td>
                                                <td><?php if ($p->species_id == 0) {echo "Dog";}
                                                            else if($p->species_id ==1) {echo "Cat";}
                                                            else echo "Bird";?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary"
                                                        href="<?php echo base_url('admin/food/edit/'.$p->id)?> "><span
                                                            class="badge badge-complete hvr-grow">Edit</span></a>
                                                    <a class="btn btn-danger"
                                                        onclick="return confirm('Ban co chac muon xoa sach nay hay khong?');"
                                                        href="<?php echo base_url('admin/food/delete/'.$p->id)?>"><span
                                                            class="badge badge-pending hvr-grow">Delete</span></a>
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