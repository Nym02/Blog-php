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

                                <div class="p-3 table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
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
                                                $id = $row['id'];
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
                                                            <img src="image/users/<?php echo $image ?>" alt="<?php echo $fullname ?>" width="35">

                                                        <?php } else { ?>
                                                            <img src="image/users/default-profile-pic.png" alt="<?php echo $fullname ?>" width="35">
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
                                                                <li class="list-item" title="Edit"><a class="list-link" href="user.php?do=Edit&id=<?php echo $id; ?>"><i class="fa fa-edit text-info"></i></a></li>
                                                                <li class="list-item"><a href="#delete<?php echo $id; ?>" class="list-link" title="Delete" data-toggle="modal" data-target=""><i class="fa fa-trash text-danger"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>

                                                </tr>

                                            <?php $i++;
                                            } ?>
                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Do you want to
                                                                delete this user?
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="btn-group">
                                                                <a href="user.php?do=Delete&id=<?php echo $id; ?>" class="btn btn-danger">Yes</a>
                                                                <a href="#" data-dismiss="modal" aria-label="Close" class="btn btn-success">No</a>
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
    <?php } else if ($do == 'Add') { ?>

        <!-- Body content starts  -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <div class="card card-primary card-outline">
                            <div class="card-header ">
                                <h2 class="card-title">Add New User</h2>
                            </div>
                            <div class="card-body">
                                <form action="user.php?do=Insert" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="fname">Full Name</label>
                                                <input type="text" class="form-control" name="fullname" id="fname" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="uEmail">Email</label>
                                                <input type="email" class="form-control" name="email" id="uEmail" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="uname">Username</label>
                                                <input type="text" class="form-control" name="username" id="uname" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="pass">Password</label>
                                                <input type="password" class="form-control" name="password" id="pass" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="repass">Re-Type Password</label>
                                                <input type="password" class="form-control" name="rePassword" id="repass" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="uphone">Phone</label>
                                                <input type="text" class="form-control" name="phone" id="uphone" autocomplete="off">
                                            </div>



                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="uaddress">Address</label>
                                                <input type="text" class="form-control" name="address" id="uaddress" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="urole">User Role</label>
                                                <select name="role" id="urole" class="form-control">
                                                    <option value="1">Super Admin</option>
                                                    <option value="2">Editor</option>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="ustatus">Status</label>
                                                <select name="status" id="ustatus" class="form-control">
                                                    <option value="1">Active</option>
                                                    <option value="0">In-Active</option>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="uimage">Profile Picture</label>
                                                <input type="file" name="profileImg" id="uimage" class="form-control-file">
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn bg-gradient-primary btn-flat" name="addUser" id="" value="Register User">
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- Body content ends  -->
        <?php } else if ($do == 'Insert') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $rePassword = $_POST['rePassword'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $role = $_POST['role'];
            $status = $_POST['status'];

            $avater = $_FILES['profileImg'];
            $avaterName = $_FILES['profileImg']['name'];
            $avaterTmp = $_FILES['profileImg']['tmp_name'];


            if ($password == $rePassword) {
                $hashedPass = sha1($password);

                if ($avaterName != NULL) {
                    $image = rand(0, 500000) . '_' . $avaterName;
                    move_uploaded_file($avaterTmp, "image/users/" . $image);

                    $userInfoQuery = "INSERT INTO users(fullname, email, username, password, phone, address, role, status, image, join_date ) VALUES ('$fullname','$email','$username','$hashedPass','$phone','$address','$role','$status','$image', now()) ";

                    $userInfoSql = mysqli_query($db, $userInfoQuery);

                    if ($userInfoSql) {
                        header("Location: user.php?do=Manage");
                    } else {
                        die("Connection Error" . mysqli_error($db));
                    }
                } else {


                    $userInfoQuery = "INSERT INTO users(fullname, email, username, password, phone, address, role, status, image, join_date ) VALUES ('$fullname','$email','$username','$hashedPass','$phone','$address','$role','$status','$image', now()) ";

                    $userInfoSql = mysqli_query($db, $userInfoQuery);

                    if ($userInfoSql) {
                        header("Location: user.php?do=Manage");
                    } else {
                        die("Connection Error" . mysqli_error($db));
                    }
                }
            } else { ?>
                <section class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">

                                <div class="alert alert-danger">
                                    Your password does not match with each other. Please enter correct password.
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            <?php }
        }
    } else if ($do == 'Edit') {

        if (isset($_GET['id'])) {
            $editID = $_GET['id'];

            $editQuery = "SELECT * FROM users WHERE id = '$editID'";
            $editSql = mysqli_query($db, $editQuery);

            while ($row = mysqli_fetch_assoc($editSql)) {
                $id = $row['id'];
                $fullname = $row['fullname'];
                $email = $row['email'];
                $username = $row['username'];
                $password = $row['password'];
                $phone = $row['phone'];
                $address = $row['address'];
                $role = $row['role'];
                $status = $row['status'];
                $image = $row['image'];
                $join_date = $row['join_date']; ?>
                <!-- Body content starts  -->
                <section class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">

                                <div class="card card-primary card-outline">
                                    <div class="card-header ">
                                        <h2 class="card-title">Edit User</h2>
                                    </div>
                                    <div class="card-body">
                                        <form action="user.php?do=Update" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="fname">Full Name</label>
                                                        <input type="text" class="form-control" name="fullname" id="fname" autocomplete="off" value="<?php echo $fullname ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="uEmail">Email</label>
                                                        <input type="email" class="form-control" name="email" id="uEmail" autocomplete="off" value="<?php echo $email ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="uname">Username</label>
                                                        <input type="text" class="form-control" name="username" id="uname" autocomplete="off" value="<?php echo $username ?>" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pass">Password</label>
                                                        <input type="password" class="form-control" name="password" id="pass" autocomplete="off" placeholder="Enter New Password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="repass">Re-Type Password</label>
                                                        <input type="password" class="form-control" name="rePassword" id="repass" autocomplete="off" placeholder="Confirm New Password">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="uphone">Phone</label>
                                                        <input type="text" class="form-control" name="phone" id="uphone" autocomplete="off" value="<?php echo $phone ?>">
                                                    </div>



                                                </div>
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="uaddress">Address</label>
                                                        <input type="text" class="form-control" name="address" id="uaddress" autocomplete="off" value="<?php echo $address ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="urole">User Role</label>
                                                        <select name="role" id="urole" class="form-control">
                                                            <option value="1" <?php if ($role == 1) {
                                                                                    echo "selected";
                                                                                } ?>>Super Admin</option>
                                                            <option value="2" <?php if ($role == 2) {
                                                                                    echo "selected";
                                                                                } ?>>Editor</option>
                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="ustatus">Status</label>
                                                        <select name="status" id="ustatus" class="form-control" value="<?php echo $status ?>">
                                                            <option value="1" <?php if ($status == 1) {
                                                                                    echo "selected";
                                                                                } ?>>Active</option>
                                                            <option value="0" <?php if ($status == 0) {
                                                                                    echo "selected";
                                                                                } ?>>In-Active</option>
                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="uimage">Profile Picture</label>
                                                        <?php
                                                        if (!empty($image)) { ?>
                                                            <img src="image/users/<?php echo $image ?>" alt="<?php echo $fullname; ?>" width="35">
                                                        <?php    } else { ?>
                                                            <img src="image/users/d1.png" alt="<?php echo $fullname; ?>" width="35">
                                                        <?php    }
                                                        ?>
                                                        <input type="file" name="profileImg" id="uimage" class="form-control-file">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="updateUserID" value="<?php echo $id; ?>">
                                                        <input type="submit" class="btn bg-gradient-primary btn-flat" name="addUser" id="" value="Register User">
                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                <!-- Body content ends  -->


    <?php    }
        }
    } else if ($do == 'Update') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $updateUserID = $_POST['updateUserID'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $rePassword = $_POST['rePassword'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $role = $_POST['role'];
            $status = $_POST['status'];

            $avater = $_FILES['profileImg'];
            $avaterName = $_FILES['profileImg']['name'];
            $avaterTmp = $_FILES['profileImg']['tmp_name'];


            if (!empty($password) && !empty($avaterName)) {
                if ($password == $rePassword) {
                    $hashedPassword = sha1($password);
                }
                $image = rand(0, 500000) . '_' . $avaterName;
                move_uploaded_file($avaterTmp, "image/users/" . $image);

                //Delete existing image
                $existingImageQuery = "SELECT * From users WHERE id = 'updateUserID'";
                $existingImageSql = mysqli_query($db, $existingImageQuery);

                while ($row = mysqli_fetch_assoc($existingImageSql)) {
                    $existingImage = $row['image'];
                }
                unlink("image/users/" . $existingImage);


                //updating user info

                $updateQuery = "UPDATE users SET fullname='$fullname', email='$email',password='$hashedPassword', phone='$phone', address='$address', role='$role', status='$status', image='$image' WHERE id = '$updateUserID'";

                $updateSql = mysqli_query($db, $updateQuery);

                if ($updateSql) {
                    header("Location: user.php?do=Manage");
                } else {
                    die("Connection Error" . mysqli_error($db));
                }
            } else if (empty($password) && !empty($avaterName)) {

                $image = rand(0, 500000) . '_' . $avaterName;
                move_uploaded_file($avaterTmp, "image/users/" . $image);

                //Delete existing image
                $existingImageQuery = "SELECT * From users WHERE id = '$updateUserID'";
                $existingImageSql = mysqli_query($db, $existingImageQuery);

                while ($row = mysqli_fetch_assoc($existingImageSql)) {
                    $existingImage = $row['image'];
                }
                unlink("image/users/" . $existingImage);


                //updating user info

                $updateQuery = "UPDATE users SET fullname='$fullname',email='$email', phone='$phone',address='$address',role='$role',status='$status', image='$image' WHERE id = '$updateUserID'";

                $updateSql = mysqli_query($db, $updateQuery);

                if ($updateSql) {
                    header("Location: user.php?do=Manage");
                } else {
                    die("Connection Error" . mysqli_error($db));
                }
            } else if (!empty($password) && empty($avaterName)) {
                if ($password == $rePassword) {
                    $hashedPassword = sha1($password);
                }

                //updating user info

                $updateQuery = "UPDATE users SET fullname='$fullname',email='$email',password='$hashedPassword', phone='$phone',address='$address',role='$role',status='$status' WHERE id = '$updateUserID'";

                $updateSql = mysqli_query($db, $updateQuery);

                if ($updateSql) {
                    header("Location: user.php?do=Manage");
                } else {
                    die("Connection Error" . mysqli_error($db));
                }
            } else {
                //updating user info

                $updateQuery = "UPDATE users SET fullname='$fullname',email='$email', phone='$phone',address='$address',role='$role',status='$status' WHERE id = '$updateUserID'";

                $updateSql = mysqli_query($db, $updateQuery);

                if ($updateSql) {
                    header("Location: user.php?do=Manage");
                } else {
                    die("Connection Error" . mysqli_error($db));
                }
            }
        }
    } else if ($do == 'Delete') {
        if (isset($_GET['id'])) {
            $delete_user_id = $_GET['id'];

            //Delete existing image
            $existingImageQuery = "SELECT * From users WHERE id = '$delete_user_id'";
            $existingImageSql = mysqli_query($db, $existingImageQuery);

            while ($row = mysqli_fetch_assoc($existingImageSql)) {
                $existingImage = $row['image'];
            }
            unlink("image/users/" . $existingImage);

            $deleteQuery = "DELETE from users where id = '$delete_user_id'";
            $deleteSql = mysqli_query($db, $deleteQuery);

            if ($deleteSql) {
                header("Location: user.php?do=Manage");
            } else {
                die("Connection Error" . mysqli_error($db));
            }
        }
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