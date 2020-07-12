<?php
if (isset($_SESSION['fullname']) && isset($_SESSION['image'])) {
    $fullname = $_SESSION['fullname'];
    $img = $_SESSION['image'];
}

?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="image/users/<?php echo $img; ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="profile.php" class="d-block"><?php echo $fullname; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="dashboard.php" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>

                </li>
                <?php
                if ($_SESSION['role'] == 2) { ?>
                    <!-- Editor Profile Section Starts  -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                Profile
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="profile.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Profile</p>
                                </a>
                            </li>


                        </ul>
                    </li>
                    <!-- Editor Profile Section Ends  -->

                <?php }


                ?>
                <!-- Category Section Starts  -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Category
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="category.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Category</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <!-- Category Section Ends  -->


                <?php
                if ($_SESSION['role'] == 1) { ?>
                    <!-- Mange Users Section Starts  -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                Users
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="user.php?do=Manage" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="user.php?do=Add" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add New Users</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <!-- Manage Users Section Ends  -->

                <?php }
                ?>

                <!-- Mange Post Section Starts  -->
                <li class="nav-item has-treeview">
                    <a href="post.php" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Post
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="post.php?do=Manage" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Post</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="post.php?do=Add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Post</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <!-- Manage Post Section Ends  -->
                <!-- Manage Comment Section Starts  -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Comments
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/UI/general.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Comments</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/icons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Comment</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <!-- Manage Comment Section Ends  -->
                <?php
                if ($_SESSION['role'] == 1) { ?>
                    <!-- Website Setting Section Starts  -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                Platform Setting
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/UI/general.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Social Media</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/UI/icons.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>General Setting</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <!-- Website Setting Section Ends   -->
                <?php }
                ?>

                <!-- Logout Section Starts  -->
                <li class="nav-item has-treeview">
                    <a href="logout.php" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>
                            Logout

                        </p>
                    </a>

                </li>
                <!-- Logout Section Ends   -->



                <!-- <li class="nav-header">LABELS</li> -->

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>