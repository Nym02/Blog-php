<?php include('inc/header.php'); ?>
<?php include('inc/topbar.php'); ?>
<?php include('inc/menu-bar.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <?php

    $do     = isset($_GET['do']) ? $_GET['do'] : 'Manage';

    if ($do == 'Manage') { ?>



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
                            <li class="breadcrumb-item active">Manage Comments</li>
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
                                <h2 class="card-title">Manage Comments</h2>
                            </div>
                            <div class="card-body">

                                <?php
                                $sl = 0;
                                $commentSql     = "SELECT * FROM comments order by cmnt_id desc";
                                $commentQuery   = mysqli_query($db, $commentSql);

                                $total_comments = mysqli_num_rows($commentQuery);

                                if ($total_comments == 0) { ?>


                                    <div class="alert alert-warning">No Comments Available.</div>




                                <?php   } else { ?>

                                    <table class="table table-striped table-dark">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Comment</th>
                                                <th scope="col">Post Title</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($commentQuery)) {
                                                $cmnt_id            = $row['cmnt_id'];
                                                $fullname           = $row['fullname'];
                                                $cmnt_description   = $row['cmnt_description'];
                                                $postID             = $row['post_id'];
                                                $cmnt_status        = $row['cmnt_status'];
                                                $cmnt_date          = $row['cmnt_date'];
                                                $sl++;
                                            ?>
                                                <tr>

                                                    <td><?php echo $sl; ?></td>
                                                    <td><?php echo $cmnt_description; ?></td>
                                                    <td><?php

                                                        $postSql        = "SELECT * FROM post WHERE id = '$postID'";
                                                        $postQuery      = mysqli_query($db, $postSql);

                                                        while ($row = mysqli_fetch_assoc($postQuery)) {
                                                            $postTitle      = $row['title'];
                                                        }
                                                        echo $postTitle;


                                                        ?></td>
                                                    <td><?php echo $fullname; ?></td>
                                                    <td>

                                                        <?php
                                                        if ($cmnt_status == 0) { ?>
                                                            <span class="badge badge-warning">Pending</span>

                                                        <?php } else if ($cmnt_status == 1) { ?>
                                                            <span class="badge badge-success">Approved</span>
                                                        <?php } else if ($cmnt_status == 2) { ?>
                                                            <span class="badge badge-danger">Suspended</span>
                                                        <?php     }


                                                        ?>
                                                    </td>
                                                    <td>
                                                        <div class="action-bar">
                                                            <ul class="list">
                                                                <li class="list-item" title="Edit"><a class="list-link" href="comments.php?do=Edit&id=<?php echo $cmnt_id; ?>"><i class="fa fa-edit text-info"></i></a></li>
                                                                <li class="list-item"><a href="#" class="list-link" title="Delete" data-toggle="modal" data-target="#delete<?php echo $cmnt_id; ?>"><i class="fa fa-trash text-danger"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="delete<?php echo $cmnt_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure? </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="btn-group">
                                                                    <a href="category.php?delete=<?php echo $cmnt_id; ?>" class="btn btn-danger">Yes</a>
                                                                    <a href="#" data-dismiss="modal" aria-label="Close" class="btn btn-success">No</a>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php   }


                                            ?>



                                        </tbody>
                                    </table>
                                <?php    }


                                ?>

                            </div>
                        </div>
                        <!-- /.card -->
                        <!-- card design end  -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Body content ends  -->

        <?php } else if ($do == 'Edit') {
        if (isset($_GET['id'])) {
            $editComment        = $_GET['id'];



            $commentSql     = "SELECT * FROM comments where cmnt_id = '$editComment'";
            $commentQuery   = mysqli_query($db, $commentSql);

            while ($row = mysqli_fetch_assoc($commentQuery)) {
                $cmnt_id            = $row['cmnt_id'];
                $fullname           = $row['fullname'];
                $cmnt_description   = $row['cmnt_description'];
                $postID             = $row['post_id'];
                $cmnt_status        = $row['cmnt_status'];
                $cmnt_date          = $row['cmnt_date'];


        ?>
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
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Edit Comment</li>
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
                                        <h2 class="card-title">Update Comment</h2>
                                    </div>
                                    <div class="card-body">

                                        <form action="comments.php?do=Update" method="POST">

                                            <div class="form-group">
                                                <label for="">Comment Status</label>
                                                <select name="status" id="" class="form-control">
                                                    <option value="0" <?php if ($cmnt_status == 0) {
                                                                            echo 'selected';
                                                                        } ?>>Pending</option>
                                                    <option value="1" <?php if ($cmnt_status == 1) {
                                                                            echo 'selected';
                                                                        } ?>>Approved</option>
                                                    <option value="2" <?php if ($cmnt_status == 2) {
                                                                            echo 'selected';
                                                                        } ?>>Suspended</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="updateComment" value="<?php echo $cmnt_id; ?>">
                                                <input type="submit" class="btn btn-primary" value="Update Comment">
                                            </div>


                                        </form>


                                    </div>
                                </div>
                                <!-- /.card -->
                                <!-- card design end  -->
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Body content ends  -->
    <?php }
        }
    } else if ($do == 'Update') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $updateCommentID    = $_POST['updateComment'];
            $status             = $_POST['status'];

            $updateCommentSql           = "UPDATE comments SET cmnt_status = '$status' where cmnt_id = '$updateCommentID'";
            $updateCommentQuery         = mysqli_query($db, $updateCommentSql);

            if ($updateCommentQuery) {
                header("Location: comments.php?do=Manage");
            } else {
                die("Error while updating comment" . mysqli_error($db));
            }
        }
    }


    ?>
</div>
<!-- /.content-header -->

<?php include('inc/footer.php'); ?>