<?php
include("inc/db.inc.php");
ob_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Registration Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="fullname" placeholder="Full name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="rePassword" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <input type="submit" class="btn btn-primary btn-block" name="register" value="Register">
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <?php
                $msg = '';
                if (isset($_POST['register'])) {
                    $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
                    $email = mysqli_real_escape_string($db, $_POST['email']);
                    $username = mysqli_real_escape_string($db, $_POST['username']);
                    $password = mysqli_real_escape_string($db, $_POST['password']);
                    $rePassword = mysqli_real_escape_string($db, $_POST['rePassword']);

                    if (!empty($fullname) || !empty($email) || !empty($username) || !empty($password)) {
                        if ($password == $rePassword) {
                            $hashedPassReg = sha1($password);

                            $sql = "INSERT INTO users(fullname, email, username, password, role, status, join_date) VALUES ('$fullname','$email','$username','$hashedPassReg', 2, 0, now())";
                            $registerUserQuery = mysqli_query($db, $sql);

                            if ($registerUserQuery) {
                                header("Location: index.php");
                            } else {
                                die("Error" . mysqli_error($db));
                            }
                        } else {
                            $msg = '<div class="alert alert-danger">Your password doesn\'n match.</div>';
                            echo $msg;
                        }
                    } else {
                        $msg = '<div class="alert alert-danger">Please provide valid information.</div>';
                        echo $msg;
                    }
                }

                ?>
                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>
                        Sign up using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>
                        Sign up using Google+
                    </a>
                </div>

                <a href="login.html" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

    <?php ob_end_flush(); ?>
</body>

</html>