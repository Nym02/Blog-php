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
                    <h1 class="m-0 text-dark">Manage All Post</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dasboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manage All Post</li>
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
                                <h2 class="card-title">Manage Posts</h2>
                            </div>
                            <div class="card-body">

                                <div class="p-3 table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#SL.</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Author</th>
                                                <th>Status</th>
                                                <th>Post Date</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            $query = "SELECT * FROM post order by id desc";
                                            $sql = mysqli_query($db, $query);
                                            $i = 1;

                                            while ($row = mysqli_fetch_assoc($sql)) {
                                                $id                     = $row['id'];
                                                $title                  = $row['title'];
                                                $description            = $row['description'];
                                                $image                  = $row['image'];
                                                $category_id            = $row['category_id'];
                                                $author_id              = $row['author_id'];
                                                $status                 = $row['status'];
                                                $tags                   = $row['tags'];
                                                $post_date              = $row['post_date'];



                                            ?>

                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php
                                                        if (!empty($image)) { ?>
                                                            <img src="image/post/<?php echo $image ?>" alt="<?php echo $title ?>" width="50">

                                                        <?php } else { ?>
                                                            <img src="image/post/default-profile-pic.png" alt="<?php echo $title ?>" width="50">
                                                        <?php }
                                                        ?></td>
                                                    <td><?php echo $title; ?> </td>


                                                    <td><?php
                                                        $query = "SELECT * from category";
                                                        $cat_info = mysqli_query($db, $query);

                                                        while ($row = mysqli_fetch_assoc($cat_info)) {
                                                            $cat_id = $row['cat_id'];
                                                            $cat_name = $row['cat_name'];

                                                            if ($category_id == $cat_id) {
                                                                echo '<p>' . $cat_name . '</p>';
                                                            }
                                                        }


                                                        ?> </td>
                                                    <td><?php

                                                        $author = "SELECT * from users";
                                                        $authorQuery = mysqli_query($db, $author);

                                                        while ($row = mysqli_fetch_assoc($authorQuery)) {
                                                            $user_id = $row['id'];
                                                            $fullname = $row['fullname'];


                                                            if ($author_id == $user_id) {
                                                                echo '<p>' . $fullname . '</p>';
                                                            }
                                                        }




                                                        ?> </td>
                                                    <td><?php if ($status == 1) { ?>
                                                            <span class="badge badge-success">Published</span>
                                                        <?php  } else if ($status == 0) { ?>
                                                            <span class="badge badge-danger">Draft</span>
                                                        <?php } ?> </td>
                                                    <td><?php echo $post_date; ?> </td>

                                                    <td>
                                                        <div class="action-bar">
                                                            <ul class="list">
                                                                <li class="list-item" title="Edit"><a class="list-link" href="post.php?do=Edit&id=<?php echo $id; ?>"><i class="fa fa-edit text-info"></i></a></li>
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
                                                                delete this post?
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="btn-group">
                                                                <a href="post.php?do=Delete&id=<?php echo $id; ?>" class="btn btn-danger">Yes</a>
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
                                <h2 class="card-title">Add New Post</h2>
                            </div>
                            <div class="card-body">
                                <form action="post.php?do=Insert" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label for="fname">Title</label>
                                                <input type="text" class="form-control" name="title" id="fname" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="urole">Category</label>
                                                <select name="category" id="urole" class="form-control">
                                                    <option>Please select a category</option>
                                                    <?php

                                                    $query = "SELECT * from category order by cat_name asc";
                                                    $cat_info = mysqli_query($db, $query);

                                                    while ($row = mysqli_fetch_assoc($cat_info)) {
                                                        $cat_id = $row['cat_id'];
                                                        $cat_name = $row['cat_name']; ?>
                                                        <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
                                                    <?php    }

                                                    ?>


                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="ustatus">Status</label>
                                                <select name="status" id="ustatus" class="form-control">
                                                    <option value="1">Published</option>
                                                    <option value="0">Draft</option>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="fname">Tags</label>
                                                <input type="text" class="form-control" name="tags" id="fname" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="uimage">Post Thumbnail</label>
                                                <input type="file" name="profileImg" id="uimage" class="form-control-file" required>
                                            </div>


                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="postDes">Post Body</label>
                                                <textarea class="form-control" name="description" id="postDes" cols="30" rows="15"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn bg-gradient-primary btn-flat" name="addPost" id="" value="Publish Post">
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
        <?php }
    else if ($do == 'Insert') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title                          = mysqli_real_escape_string($db, $_POST['title']);
            $description                    = mysqli_real_escape_string($db, $_POST['description']);
            $category_id                    = $_POST['category'];
            $author_id                      = $_SESSION['id'];
            $status                         = $_POST['status'];
            $tags                           = mysqli_real_escape_string($db, $_POST['tags']);




            $avater = $_FILES['profileImg'];
            $avaterName = $_FILES['profileImg']['name'];
            $avaterTmp = $_FILES['profileImg']['tmp_name'];



            if ($avaterName != NULL) {
                $image = rand(0, 500000) . '_' . $avaterName;
                move_uploaded_file($avaterTmp, "image/post/" . $image);

                $postInfoQuery = "INSERT INTO post(title, description, image, category_id, author_id, status, tags, post_date ) VALUES ('$title','$description', '$image','$category_id','$author_id','$status','$tags', now()) ";

                $postInfoSql = mysqli_query($db, $postInfoQuery);

                if ($postInfoSql) {
                    header("Location: post.php?do=Manage");
                } else {
                    die("Connection Error" . mysqli_error($db));
                }
            }
        }
    }
    else if ($do == 'Edit') {

        if (isset($_GET['id'])) {
            $editID = $_GET['id'];

            $editQuery = "SELECT * FROM post WHERE id = '$editID'";
            $editSql = mysqli_query($db, $editQuery);

            while ($row = mysqli_fetch_assoc($editSql)) {
                $id                     = $row['id'];
                $title                  = $row['title'];
                $description            = $row['description'];
                $image                  = $row['image'];
                $category_id            = $row['category_id'];
                $author_id              = $row['author_id'];
                $status                 = $row['status'];
                $tags                   = $row['tags'];
                $post_date              = $row['post_date']; ?>
                <!-- Body content starts  -->
                <section class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">

                                <div class="card card-primary card-outline">
                                    <div class="card-header ">
                                        <h2 class="card-title">Edit Post</h2>
                                    </div>
                                    <div class="card-body">
                                        <form action="post.php?do=Update" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label for="fname">Title</label>
                                                        <input type="text" class="form-control" name="title" id="fname" autocomplete="off" value="<?php echo $title; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="urole">Category</label>
                                                        <select name="category" id="urole" class="form-control">
                                                            <option>Please select a category</option>
                                                            <?php

                                                            $query = "SELECT * from category order by cat_name asc";
                                                            $cat_info = mysqli_query($db, $query);

                                                            while ($row = mysqli_fetch_assoc($cat_info)) {
                                                                $cat_id = $row['cat_id'];
                                                                $cat_name = $row['cat_name']; ?>
                                                                <option value="<?php echo $cat_id ?>" <?php if ($cat_id == $category_id) {
                                                                                                            echo "selected";
                                                                                                        } ?>><?php echo $cat_name; ?></option>
                                                            <?php    }

                                                            ?>


                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="ustatus">Status</label>
                                                        <select name="status" id="ustatus" class="form-control">
                                                            <option value="1" <?php if ($status == 1) {
                                                                                    echo "selected";
                                                                                } ?>>Published</option>
                                                            <option value="0" <?php if ($status == 0) {
                                                                                    echo "selected";
                                                                                } ?>>Draft</option>
                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fname">Tags</label>
                                                        <input type="text" class="form-control" name="tags" id="fname" autocomplete="off" value="<?php echo $tags; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="uimage">Post Thumbnail</label>
                                                        <input type="file" name="profileImg" id="uimage" class="form-control-file">
                                                    </div>


                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="postDes">Post Body</label>
                                                        <textarea class="form-control" name="description" id="postDes" cols="30" rows="15"><?php echo $description; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="updatePostID" value="<?php echo $id; ?>">
                                                        <input type="submit" class="btn bg-gradient-primary btn-flat" name="addPost" id="" value="Update Post">
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
    }
    else if ($do == 'Update') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $updatePostID                   = $_POST['updatePostID'];
            $title                          = mysqli_real_escape_string($db, $_POST['title']);
            $description                    = mysqli_real_escape_string($db, $_POST['description']);
            $category_id                    = $_POST['category'];
            $author_id                      = $_SESSION['id'];
            $status                         = $_POST['status'];
            $tags                           = mysqli_real_escape_string($db, $_POST['tags']);




            $avater = $_FILES['profileImg'];
            $avaterName = $_FILES['profileImg']['name'];
            $avaterTmp = $_FILES['profileImg']['tmp_name'];



            if ($avaterName != NULL) {
                $image = rand(0, 500000) . '_' . $avaterName;
                move_uploaded_file($avaterTmp, "image/post/" . $image);

                //Delete existing image
                $existingImageQuery = "SELECT * From post WHERE id = 'updatePostID'";
                $existingImageSql = mysqli_query($db, $existingImageQuery);

                while ($row = mysqli_fetch_assoc($existingImageSql)) {
                    $existingImage = $row['image'];
                }
                unlink("image/post/" . $existingImage);

                $postInfoQuery = "UPDATE post SET title='$title', description='$description', image='$image', category_id='$category_id', author_id='$author_id', status='$status', tags='$tags' where id = '$updatePostID'";

                $postInfoSql = mysqli_query($db, $postInfoQuery);

                if ($postInfoSql) {
                    header("Location: post.php?do=Manage");
                } else {
                    die("Connection Error" . mysqli_error($db));
                }
            } else if (empty($avaterName)) {
                $postInfoQuery = "UPDATE post SET title='$title', description='$description', category_id='$category_id', author_id='$author_id', status='$status', tags='$tags' where id = '$updatePostID'";

                $postInfoSql = mysqli_query($db, $postInfoQuery);

                if ($postInfoSql) {
                    header("Location: post.php?do=Manage");
                } else {
                    die("Connection Error" . mysqli_error($db));
                }
            }
        }
    }
    else if ($do == 'Delete') {
        if (isset($_GET['id'])) {
            $delete_post_id = $_GET['id'];

            //Delete existing image
            $existingImageQuery = "SELECT * From post WHERE id = '$delete_post_id'";
            $existingImageSql = mysqli_query($db, $existingImageQuery);

            while ($row = mysqli_fetch_assoc($existingImageSql)) {
                $existingImage = $row['image'];
            }
            unlink("image/post/" . $existingImage);

            $deleteQuery = "DELETE from post where id = '$delete_post_id'";
            $deleteSql = mysqli_query($db, $deleteQuery);

            if ($deleteSql) {
                header("Location: post.php?do=Manage");
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