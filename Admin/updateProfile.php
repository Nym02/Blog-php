<?php include 'inc/header.php'; ?>
<?php include 'inc/topbar.php'; ?>
<?php include 'inc/menu-bar.php'; ?>

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
                        <li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
                        <li class="breadcrumb-item active">Update Profile</li>
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
                <div class="col-md-12">
                    <!-- card design start  -->
                    <div class="card card-primary card-outline">
                        <div class="card-header ">
                            <h2 class="card-title">Update Profile</h2>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_GET['id'])) {
                                $updateUserID = $_GET['id'];

                                $updateQuery = "SELECT * from users where id = '$updateUserID'";
                                $updateSql = mysqli_query($db, $updateQuery);

                                while ($row = mysqli_fetch_assoc($updateSql)) {
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

                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Full Name</label>
                                                    <input type="text" name="fullname" class="form-control" value="<?php echo $fullname; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                                                </div>


                                                <div class="form-group">
                                                    <label for="">Username</label>
                                                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" disabled>
                                                </div>


                                                <div class="form-group">
                                                    <label for="">Password</label>
                                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Re-type Password</label>
                                                    <input type="password" name="rePassword" class="form-control" placeholder="Confirm Password">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Phone</label>
                                                    <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Address</label>
                                                    <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                                                </div>
                                                <?php if ($role == 1) { ?>
                                                    <div class="form-group">
                                                        <label for="">Role</label>

                                                        <select name="role" id="" class="form-control">
                                                            <option value="1" <?php if ($role == 1) {
                                                                                    echo "selected";
                                                                                } ?>>Admin</option>
                                                            <option value="2" <?php if ($role == 2) {
                                                                                    echo "selected";
                                                                                } ?>>Editor</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Status</label>
                                                        <select name="status" id="" class="form-control">
                                                            <option value="0" <?php if ($status == 0) {
                                                                                    echo "selected";
                                                                                } ?>>In-Active</option>
                                                            <option value="1" <?php if ($status == 1) {
                                                                                    echo "selected";
                                                                                } ?>>Active</option>
                                                        </select>
                                                    </div>
                                                <?php   } else if ($role == 2) { ?>
                                                    <div class="form-group">
                                                        <label for="">Role</label>

                                                        <select name="role" id="" class="form-control" disabled>
                                                            <option value="1" <?php if ($role == 1) {
                                                                                    echo "selected";
                                                                                } ?>>Admin</option>
                                                            <option value="2" <?php if ($role == 2) {
                                                                                    echo "selected";
                                                                                } ?>>Editor</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Status</label>
                                                        <select name="status" id="" class="form-control" disabled>
                                                            <option value="0" <?php if ($status == 0) {
                                                                                    echo "selected";
                                                                                } ?>>In-Active</option>
                                                            <option value="1" <?php if ($status == 1) {
                                                                                    echo "selected";
                                                                                } ?>>Active</option>
                                                        </select>
                                                    </div>
                                                <?php } ?>



                                                <div class="form-group">
                                                    <label for="">Profile Image</label>
                                                    <input type="file" name="profileImg" class="form-control-file">

                                                    <div class="image-prev mt-4 mb-4">
                                                        <?php
                                                        if (!empty($image)) { ?>
                                                            <img src="image/users/<?php echo $image; ?>" alt="<?php echo $fullname; ?>" width="150">

                                                        <?php } else { ?>
                                                            <img src="image/users/d1.png" alt="<?php echo $fullname; ?>" width="150">
                                                        <?php }

                                                        ?>

                                                    </div>
                                                </div>

                                                <input type="submit" class="btn btn-info" name="updateCurrentUser" value="Update User">
                                            </div>
                                        </div>


                                    </form>
                            <?php }
                                //updating user profile
                                // if (isset($_POST['updateCurrentUser'])) {
                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                                    $fullname               = $_POST['fullname'];
                                    $email                  = $_POST['email'];
                                    // $username            = $_POST['username'];
                                    $password               = $_POST['password'];
                                    $rePassword             = $_POST['rePassword'];
                                    $phone                  = $_POST['phone'];
                                    $address                = $_POST['address'];
                                    // $role                = $_POST['role'];
                                    // $status              = $_POST['status'];

                                    $avater                 = $_FILES['profileImg'];
                                    $avaterName             = $_FILES['profileImg']['name'];
                                    $avaterTmp              = $_FILES['profileImg']['tmp_name'];

                                    if (!empty($password) && !empty($avaterName)) {
                                        if ($password == $rePassword) {
                                            $hashedPass = sha1($password);
                                        }

                                        $image = rand(0, 500000000) . '_' . $avaterName;
                                        move_uploaded_file($avaterTmp, "image/users/" . $image);

                                        //Delete existing image
                                        $existingImageQuery = "SELECT * From users WHERE id = '$updateUserID'";
                                        $existingImageSql = mysqli_query($db, $existingImageQuery);

                                        while ($row = mysqli_fetch_assoc($existingImageSql)) {
                                            $existingImage = $row['image'];
                                        }
                                        unlink("image/users/" . $existingImage);

                                        //update query
                                        $updateQuery = "UPDATE users SET fullname = '$fullname', email = '$email', password='$hashedPass', phone='$phone', address ='$address', image ='$image' WHERE id = '$updateUserID'";

                                        $updateSql = mysqli_query($db, $updateQuery);

                                        if ($updateSql) {
                                            header("Location: profile.php");
                                        } else {
                                            die("Error" . mysqli_error($db));
                                        }
                                    } else if (!empty($password) && empty($avaterName)) {
                                        if ($password == $rePassword) {
                                            $hashedPass = sha1($password);
                                        }
                                        //update query
                                        $updateQuery = "UPDATE users SET fullname = '$fullname', email = '$email', password='$hashedPass', phone='$phone', address ='$address' WHERE id = '$updateUserID'";

                                        $updateSql = mysqli_query($db, $updateQuery);

                                        if ($updateSql) {
                                            header("Location: profile.php");
                                        } else {
                                            die("Error" . mysqli_error($db));
                                        }
                                    } else if (empty($password) && !empty($avaterName)) {
                                        $image = rand(0, 500000000) . '_' . $avaterName;
                                        move_uploaded_file($avaterTmp, "image/users/" . $image);

                                        //Delete existing image
                                        $existingImageQuery = "SELECT * From users WHERE id = '$updateUserID'";
                                        $existingImageSql = mysqli_query($db, $existingImageQuery);

                                        while ($row = mysqli_fetch_assoc($existingImageSql)) {
                                            $existingImage = $row['image'];
                                        }
                                        unlink("image/users/" . $existingImage);

                                        //update query
                                        $updateQuery = "UPDATE users SET fullname = '$fullname', email = '$email', phone='$phone', address ='$address', image ='$image' WHERE id = '$updateUserID'";

                                        $updateSql = mysqli_query($db, $updateQuery);

                                        if ($updateSql) {
                                            header("Location: profile.php");
                                        } else {
                                            die("Error" . mysqli_error($db));
                                        }
                                    } else if (empty($password) && empty($avaterName)) {
                                        //update query
                                        $updateQuery = "UPDATE users SET fullname = '$fullname', email = '$email', phone='$phone', address ='$address' WHERE id = '$updateUserID'";

                                        $updateSql = mysqli_query($db, $updateQuery);

                                        if ($updateSql) {
                                            header("Location: profile.php");
                                        } else {
                                            die("Error" . mysqli_error($db));
                                        }
                                    }
                                }
                            } ?>
                        </div>

                    </div>
                    <!-- /.card -->
                    <!-- card design end  -->
                </div>
            </div>
        </div>
    </section>
    <!-- Body content ends  -->



</div>
<!-- /.content-header -->

<?php include 'inc/footer.php'; ?>