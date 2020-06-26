<?php include('inc/header.php'); ?>
<?php include('inc/topbar.php'); ?>
<?php include('inc/menu-bar.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dasboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manage All Users</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    <?php

    $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

    if ($do == 'Manage') { ?>
    <!-- Body content starts  -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <div class="card card-primary card-outline">
                        <div class="card-header ">
                            <h2 class="card-title">Manage Users</h2>
                        </div>
                        <div class="card-body">

                            <div class="p-3">
                                <table id="example" class="table table-striped table-responsive table-bordered p-3"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#SL.</th>
                                            <th>Image</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Username</th>

                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Role</th>
                                            <th>Status</th>

                                            <th>Join Date</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                            $query = "SELECT * FROM users";
                                            $sql = mysqli_query($db, $query);
                                            $i = 1;

                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                $fullname = $row['fullname'];
                                                $email = $row['email'];
                                                $username = $row['username'];
                                                $password = $row['password'];
                                                $phone = $row['phone'];
                                                $address = $row['address'];
                                                $role = $row['role'];
                                                $status = $row['status'];
                                                $image = $row['image'];
                                                $join_date = $row['join_date'];


                                            ?>

                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php
                                                        if (!empty($image)) { ?>
                                                <img src="image/users/<?php echo $image ?>"
                                                    alt="<?php echo $fullname ?>" width="35">

                                                <?php } else { ?>
                                                <img src="image/users/d1.png" alt="<?php echo $fullname ?>" width="35">
                                                <?php }
                                                        ?></td>
                                            <td><?php echo $fullname; ?> </td>

                                            <td><?php echo $email; ?> </td>
                                            <td><?php echo $username; ?> </td>
                                            <td><?php echo $phone; ?> </td>
                                            <td><?php echo $address; ?> </td>
                                            <td><?php if ($role == 1) { ?>
                                                <span class="badge badge-primary">Admin</span>
                                                <?php } else if ($role == 2) { ?>
                                                <span class="badge badge-info">Editor</span>
                                                <?php } ?> </td>
                                            <td><?php if ($status == 1) { ?>
                                                <span class="badge badge-success">Active</span>
                                                <?php  } else if ($status == 0) { ?>
                                                <span class="badge badge-danger">In-Active</span>
                                                <?php } ?> </td>
                                            <td><?php echo $join_date; ?> </td>
                                            <td>
                                                <div class="action-bar">
                                                    <ul class="list">
                                                        <li class="list-item" title="Edit"><a class="list-link"
                                                                href=""><i class="fa fa-edit text-info"></i></a></li>
                                                        <li class="list-item"><a href="#" class="list-link"
                                                                title="Delete" data-toggle="modal" data-target=""><i
                                                                    class="fa fa-trash text-danger"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>

                                        </tr>

                                        <?php $i++;
                                            } ?>
                                        <div class="modal fade" id="" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure?
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="btn-group">
                                                            <a href="" class="btn btn-danger">Yes</a>
                                                            <a href="#" data-dismiss="modal" aria-label="Close"
                                                                class="btn btn-success">No</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Body content ends  -->
    <?php } else if ($do == 'Add') {
    } else if ($do == 'Insert') {
    } else if ($do == 'Edit') {
    } else if ($do == 'Update') {
    } else if ($do == 'Delete') {
    }

    ?>
</div>
<!-- /.content-header -->

<?php include('inc/footer.php'); ?>


<!-- Body content starts  -->
<!-- <section class="content">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-12">
                   
                    <div class="card card-primary card-outline">
                        <div class="card-header ">
                            <h2 class="card-title">Manage Users</h2>
                        </div>
                        <div class="card-body">


                            <p class="card-text">
                                Some quick example text to build on the card title and make up
                                the bulk of the card's content.
                            </p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section> -->
<!-- Body content ends  -->