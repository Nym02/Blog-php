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
                    <h1 class="m-0 text-dark">Manage Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Body content starts  -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-6">
                    <!-- card design start  -->
                    <div class="card card-primary card-outline">

                        <div class="card-header">
                            <h2 class="card-title">Add New Category</h2>
                        </div>
                        <div class="card-body">
                            <!-- Add new category form  -->

                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="catName">Category Name</label>
                                    <input type="text" class="form-control" name="cat_name" id="catName" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="catDes">Category Description</label>
                                    <textarea class="form-control" name="cat_des" id="catDes" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="catStatus">Category Status</label>
                                    <select name="cat_status" id="catStatus" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">In-Active</option>
                                    </select>
                                </div>
                                <input type="submit" class="btn btn-primary" name="add_cat" value="Submit">

                            </form>
                            <?php

                            if (isset($_POST['add_cat'])) {
                                $cat_name = $_POST['cat_name'];
                                $cat_des = $_POST['cat_des'];
                                $cat_status = $_POST['cat_status'];

                                $query = "INSERT into category (cat_name, cat_des, cat_status) value ('$cat_name','$cat_des','$cat_status')";

                                $sql = mysqli_query($db, $query);

                                if ($sql) {
                                    header("Location: category.php");
                                } else {
                                    die("Connection Error" . mysqli_error($db));
                                }
                            }


                            ?>


                        </div>


                    </div><!-- /.card -->
                    <?php
                    if (isset($_GET['edit'])) {

                        $the_cat_id = $_GET['edit'];
                        $query = "SELECT * from category where cat_id ='$the_cat_id'";
                        $cat_info = mysqli_query($db, $query);

                        while ($row = mysqli_fetch_assoc($cat_info)) {
                            $cat_id = $row['cat_id'];
                            $cat_name = $row['cat_name'];
                            $cat_des = $row['cat_des'];
                            $cat_status = $row['cat_status'];


                    ?>
                            <div class="card card-primary card-outline">
                                <div class="card-header ">
                                    <h2 class="card-title">Update Category Info</h2>
                                </div>
                                <div class="card-body">
                                    <!-- Add new category form  -->

                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="catName">Category Name</label>
                                            <input type="text" class="form-control" name="cat_name" id="catName" value="<?php echo $cat_name; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="catDes">Category Description</label>
                                            <textarea class="form-control" name="cat_des" id="catDes" rows="4"><?php echo $cat_des; ?> </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="catStatus">Category Status</label>
                                            <select name="cat_status" id="catStatus" class="form-control">
                                                <option value="1" <?php if ($cat_status == 1) echo "selected" ?>>Active</option>
                                                <option value="0" <?php if ($cat_status == 0) echo "selected" ?>>In-Active
                                                </option>
                                            </select>
                                        </div>
                                        <input type="submit" class="btn btn-primary" name="update_cat" value="Update">

                                    </form>



                                </div>
                            </div>
                    <?php }
                        if (isset($_POST['update_cat'])) {
                            $cat_name = $_POST['cat_name'];
                            $cat_des = $_POST['cat_des'];
                            $cat_status = $_POST['cat_status'];

                            $query = "UPDATE category SET cat_name='$cat_name', cat_des='$cat_des', cat_status='$cat_status' WHERE cat_id = '$the_cat_id'";

                            $sql = mysqli_query($db, $query);

                            if ($sql) {
                                header("Location: category.php");
                            } else {
                                die("Connection Error" . mysqli_error($db));
                            }
                        }
                    }

                    ?>
                    <!-- card design end  -->


                </div>
                <div class="col-md-6">
                    <!-- card design start  -->
                    <div class="card card-primary card-outline">

                        <div class="card-header">
                            <h2 class="card-title">Manage Category</h2>
                        </div>
                        <div class="data-table p-3">


                            <?php
                            $query = "SELECT * FROM category  order by cat_name asc";
                            $sql = mysqli_query($db, $query);
                            $total_cat = mysqli_num_rows($sql);
                            $i = 1;

                            if ($total_cat == 0) {
                                echo "No Category Found";
                            } else { ?>
                                <table id="example" class="table table-striped table-bordered p-3" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>#SL.</th>
                                            <th>Category Name</th>
                                            <th>Category Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php while ($row = mysqli_fetch_assoc($sql)) {
                                            $cat_id = $row['cat_id'];
                                            $cat_name = $row['cat_name'];
                                            $cat_des = $row['cat_des'];
                                            $cat_status = $row['cat_status'];



                                        ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $cat_name; ?></td>
                                                <td><?php
                                                    if ($cat_status == 1) { ?>
                                                        <span class="badge badge-success">Active</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-danger">In-Active</span>
                                                    <?php } ?>

                                                </td>
                                                <td>
                                                    <div class="action-bar">
                                                        <ul class="list">
                                                            <li class="list-item" title="Edit"><a class="list-link" href="category.php?edit=<?php echo $cat_id ?>"><i class="fa fa-edit text-info"></i></a></li>
                                                            <li class="list-item"><a href="#" class="list-link" title="Delete" data-toggle="modal" data-target="#delete<?php echo $cat_id; ?>"><i class="fa fa-trash text-danger"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>

                                            </tr>
                                            <div class="modal fade" id="delete<?php echo $cat_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                <a href="category.php?delete=<?php echo $cat_id; ?>" class="btn btn-danger">Yes</a>
                                                                <a href="#" data-dismiss="modal" aria-label="Close" class="btn btn-success">No</a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php $i++;
                                        } ?>

                                    </tbody>

                                </table>
                            <?php      } ?>

                        </div>
                    </div><!-- /.card -->
                    <!-- card design end  -->
                </div>
            </div>
        </div>
    </section>
    <!-- Body content ends  -->

    <?php

    if (isset($_GET['delete'])) {
        $delID = $_GET['delete'];

        $delQuery = "DELETE  from category WHERE cat_id = '$delID'";

        $sql = mysqli_query($db, $delQuery);

        if ($sql) {
            header("Location: category.php");
        } else {
            die("Connection Error" . mysqli_error($db));
        }
    }

    ?>
</div>
<!-- /.content-header -->

<?php include('inc/footer.php'); ?>