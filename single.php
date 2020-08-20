<?php include "inc/header.php"; ?>


<!-- :::::::::: Page Banner Section Start :::::::: -->
<section class="blog-bg background-img">
    <div class="container">
        <!-- Row Start -->
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">Single Blog Page</h2>
                <!-- Page Heading Breadcrumb Start -->
                <nav class="page-breadcrumb-item">
                    <ol>
                        <li><a href="index.html">Home <i class="fa fa-angle-double-right"></i></a></li>
                        <li><a href="">Blog <i class="fa fa-angle-double-right"></i></a></li>
                        <!-- Active Breadcrumb -->
                        <li class="active">Single Right Sidebar</li>
                    </ol>
                </nav>
                <!-- Page Heading Breadcrumb End -->
            </div>

        </div>
        <!-- Row End -->
    </div>
</section>
<!-- ::::::::::: Page Banner Section End ::::::::: -->


<!-- :::::::::: Blog With Right Sidebar Start :::::::: -->
<section>
    <div class="container">
        <div class="row">
            <!-- Blog Single Posts -->
            <div class="col-md-8">
                <?php

                if (isset($_GET['post'])) {
                    $postID = $_GET['post'];

                    $query = "SELECT * from post where id = '$postID'";
                    $sql = mysqli_query($db, $query);

                    while ($row = mysqli_fetch_assoc($sql)) {
                        $post_id = $row['id'];
                        $post_title = $row['title'];
                        $post_description = $row['description'];
                        $post_image = $row['image'];
                        $post_category = $row['category_id'];
                        $post_title = $row['title'];
                        $post_author = $row['author_id'];
                        $post_status = $row['status'];
                        $post_tags = $row['tags'];
                        $post_post_date = $row['post_date'];

                ?>
                        <div class="blog-single">
                            <!-- Blog Title -->

                            <h3 class="post-title"><?php echo $post_title; ?></h3>

                            <!-- Blog Categories -->
                            <div class="single-categories">


                                <?php
                                $categoryQuery = "SELECT * from category where cat_id = '$post_category'";
                                $sqlCategory = mysqli_query($db, $categoryQuery);

                                while ($row = mysqli_fetch_assoc($sqlCategory)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_name = $row['cat_name']; ?>

                                    <span><?php echo $cat_name; ?></span>


                                <?php }

                                ?>

                            </div>

                            <!-- Blog Thumbnail Image Start -->
                            <div class="blog-banner">
                                <a href="#">
                                    <img src="admin/image/post/<?php echo $post_image; ?>">
                                </a>
                            </div>
                            <!-- Blog Thumbnail Image End -->

                            <!-- Blog Description Start -->
                            <p><?php echo $post_description; ?></p>

                            <!-- Blog Description End -->
                        </div>

                <?php
                    }
                }
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Post New Comment Section Start -->
                        <div class="post-comments">
                            <h4>Post Your Comments</h4>
                            <div class="title-border"></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>

                            <?php
                            if (!empty($_SESSION['email'])) { ?>
                                <!-- Form Start -->
                                <form action="" method="POST" class="contact-form">


                                    <!-- Right Side Start -->
                                    <div class="row">
                                        <div class="col-md-12">

                                            <!-- Comments Textarea Field -->
                                            <div class="form-group">
                                                <textarea name="comments" class="form-input" placeholder="Your Comments Here..."></textarea>
                                                <i class="fa fa-pencil-square-o"></i>
                                            </div>
                                            <!-- Post Comment Button -->
                                            <button type="submit" name="addComments" class="btn-main"><i class="fa fa-paper-plane-o"></i> Post Your Comments
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Right Side End -->
                                </form>
                                <!-- Form End -->
                            <?php } else {

                                echo '<a href="#login" class="alert alert-info" >Login to post comments.</a>';
                            }

                            if (isset($_POST['addComments'])) {
                                $fullname = $_SESSION['fullnamee'];
                                $comment = $_POST['comments'];
                                $postID = $post_id;

                                $sql = "INSERT INTO comments(fullname, cmnt_description,	post_id,	cmnt_status	,cmnt_date	) VALUES('$fullname','$comment','$postID','1', now())";
                                $query = mysqli_query($db, $sql);

                                if ($query) {
                                    header("Location: single.php?post=" . $post_id);
                                } else {
                                    die("Error while posting comment" . mysqli_error($db));
                                }
                            }

                            ?>


                        </div>
                        <!-- Post New Comment Section End -->
                    </div>
                </div>


                <!-- Single Comment Section Start -->
                <div class="single-comments">
                    <!-- Comment Heading Start -->
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $countCmntSql = "SELECT * FROM comments where post_id = '$post_id'  AND cmnt_status = 1 AND reply_id = 0 order by cmnt_id desc";
                            $countCmntQuery = mysqli_query($db, $countCmntSql);
                            $totalCmnt = mysqli_num_rows($countCmntQuery);

                            ?>

                            <h4>All Latest Comments (<?php echo $totalCmnt; ?>)</h4>
                            <div class="title-border"></div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>
                    </div>
                    <!-- Comment Heading End -->


                    <?php

                    if ($totalCmnt == 0) {
                        echo '<div class="alert alert-warning">No Comments found yet.</div>';
                    } else {

                        while ($row = mysqli_fetch_assoc($countCmntQuery)) {
                            $cmnt_id = $row['cmnt_id'];
                            $fullname = $row['fullname'];
                            $cmnt_des = $row['cmnt_description'];
                            $cmntPost_id = $row['post_id'];
                            $cmnt_status = $row['cmnt_status'];
                            $cmnt_date = $row['cmnt_date']; ?>

                            <!-- Single Comment Post Start -->
                            <div class="row each-comments">
                                <div class="col-md-2">
                                    <!-- Commented Person Thumbnail -->
                                    <div class="comments-person">
                                        <img src="assets/images/corporate-team/team-1.jpg">
                                    </div>
                                </div>

                                <div class="col-md-10 no-padding">
                                    <!-- Comment Box Start -->
                                    <div class="comment-box">
                                        <div class="comment-box-header">
                                            <ul>
                                                <li class="post-by-name"><?php echo $fullname; ?></li>
                                                <li class="post-by-hour"><?php echo $cmnt_date; ?></li>
                                                <li class="post-by-hour">20 Hours Ago</li>
                                            </ul>
                                        </div>
                                        <p><?php echo $cmnt_des; ?></p>
                                    </div>
                                    <!-- Comment Box End -->
                                    <a href="" data-target="#collapseExample<?php echo $cmnt_id; ?>" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-comments"> </i> Reply</a>


                                    <!-- Form Start -->
                                    <form action="reply.php" method="POST" class="contact-form collapse" id="collapseExample<?php echo $cmnt_id; ?>">


                                        <!-- Right Side Start -->
                                        <div class="row">
                                            <div class="col-md-12">

                                                <!-- Comments Textarea Field -->
                                                <div class="form-group">
                                                    <textarea name="reply" class="form-input" placeholder="Your Reply Here..." col="20" rows="1"></textarea>
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </div>
                                                <!-- Post Comment Button -->
                                                <input type="hidden" name="postID" value="<?php echo $post_id; ?>">
                                                <input type="hidden" name="replyID" value="<?php echo $cmnt_id; ?>">

                                                <button type="submit" name="addReply" class="btn-main"><i class="fa fa-paper-plane-o"></i> Reply
                                                </button>
                                            </div>
                                        </div>
                                        <!-- Right Side End -->
                                    </form>
                                    <!-- Form End -->


                                </div>
                            </div>
                            <!-- Single Comment Post End -->
                            <!-- Single Comment Section End -->
                            <?php
                            $cmntReply = "SELECT * FROM comments WHERE reply_id != 0 AND  reply_id = '$cmnt_id'";
                            $fireCmntReply = mysqli_query($db, $cmntReply);

                            while ($row = mysqli_fetch_assoc($fireCmntReply)) {
                                $cmnt_id = $row['cmnt_id'];
                                $fullname = $row['fullname'];
                                $cmnt_des = $row['cmnt_description'];
                                $cmntPost_id = $row['post_id'];
                                $cmnt_status = $row['cmnt_status'];
                                $cmnt_date = $row['cmnt_date'];


                            ?>
                                <!-- Comment Reply Post Start -->
                                <div class="row each-comments">
                                    <div class="col-md-2 offset-md-2">
                                        <!-- Commented Person Thumbnail -->
                                        <div class="comments-person">
                                            <img src="assets/images/corporate-team/team-2.jpg">
                                        </div>
                                    </div>

                                    <div class="col-md-8 no-padding">
                                        <!-- Comment Box Start -->
                                        <div class="comment-box">
                                            <div class="comment-box-header">
                                                <ul>
                                                    <li class="post-by-name"><?php echo $fullname; ?></li>
                                                    <li class="post-by-hour">20 Hours Ago</li>
                                                </ul>
                                            </div>
                                            <p><?php echo $cmnt_des; ?></p>
                                        </div>
                                        <!-- Comment Box Start -->
                                    </div>
                                </div>
                                <!-- Comment Reply Post End -->
                    <?php }
                        }
                    }

                    ?>


                </div>



            </div>


            <?php

            include "inc/sidebar.php";
            ?>

        </div>
    </div>
</section>
<!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->


<!-- :::::::::: Footer Buy Now Section Start :::::::: -->
<section class="buy-now">
    <div class="container">
        <!-- But Now Row Start -->
        <div class="row">
            <!-- Left Side Content -->
            <div class="col-md-9">
                <h4><span>Blue Chip</span> - Multipurpose Business Corporate Website Template</h4>
            </div>
            <!-- Right Side Button -->
            <div class="col-md-3">
                <button type="button" class="btn-main"><i class="fa fa-cart-plus"></i> Buy Now</button>
            </div>
        </div>
        <!-- But Now Row End -->
    </div>
</section>
<!-- ::::::::::: Footer Buy Now Section End ::::::::: -->

<?php

include 'inc/footer.php';

?>