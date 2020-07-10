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
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    <!-- Body content starts  -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-8">
                    <!-- card design start  -->
                    <div class="card card-primary card-outline">
                        <div class="card-header ">
                            <h2 class="card-title">Profile</h2>
                        </div>
                        <div class="card-body">

                            <table class="table table-bordered table-hover table-striped">
                                <tbody>
                                    <?php
                                    $authID     = $_SESSION['id'];
                                    $userQuery  = "SELECT * from users WHERE id = '$authID'";
                                    $userData   = mysqli_query($db, $userQuery);
                                    while ($row = mysqli_fetch_assoc($userData)) {
                                        $id                 = $row['id'];
                                        $fullname           = $row['fullname'];
                                        $email              = $row['email'];
                                        $username           = $row['username'];
                                        $password           = $row['password'];
                                        $phone              = $row['phone'];
                                        $address            = $row['address'];
                                        $role               = $row['role'];
                                        $status             = $row['status'];
                                        $image              = $row['image'];
                                        $join_date          = $row['join_date'];




                                    ?>
                                        <tr>
                                            <th scope="row">Image</th>
                                            <td>
                                                <?php
                                                if (!empty($image)) { ?>
                                                    <img src="image/users/<?php echo $image; ?>" alt="<?php echo $fullname; ?>" width="60">
                                                <?php  } else { ?>
                                                    <img src="image/users/d1.png" alt="<?php echo $fullname; ?>" width="60">

                                                <?php    }

                                                ?>


                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Full Name</th>
                                            <td><?php echo $fullname; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Username</th>
                                            <td><?php echo $username; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Phone</th>
                                            <td><?php echo $phone; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Address</th>
                                            <td><?php echo $address; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Join Date</th>
                                            <td><?php echo $join_date; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                    <!-- card design end  -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <a href="updateProfile.php?id=<?php echo $id; ?>" class="btn btn-info">Update Profile</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Body content ends  -->
</div>
<!-- /.content-header -->

<?php include('inc/footer.php'); ?>