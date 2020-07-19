<?php include "inc/header.php"; ?>
<!-- :::::::::: Page Banner Section Start :::::::: -->
<section class="blog-bg background-img">
    <div class="container">
        <!-- Row Start -->
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">Blog Page</h2>
                <!-- Page Heading Breadcrumb Start -->
                <nav class="page-breadcrumb-item">
                    <ol>
                        <li><a href="index.html">Home <i class="fa fa-angle-double-right"></i></a></li>
                        <!-- Active Breadcrumb -->
                        <li class="active">Blog</li>
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
            <!-- Blog Posts Start -->
            <div class="col-md-8">
                <?php
                if (isset($_GET['id'])) {
                    $category_id = $_GET['id'];



                    $query = "SELECT * from post where category_id = '$category_id' order by cat_id desc";
                    $sql = mysqli_query($db, $query);

                    $total_category_post = mysqli_num_rows($sql);


                    if ($total_category_post == 0) {
                        echo '<div class="alert alert-danger">Sorry!!!! No post available at this moment.</div>';
                    } else {
                        while ($row = mysqli_fetch_assoc($sql)) {
                            $post_id                        = $row['id'];
                            $post_title                     = $row['title'];
                            $post_description               = $row['post_description'];
                            $post_image                     = $row['image'];
                            $post_category                  = $row['category_id'];
                            $post_title                     = $row['title'];
                            $post_author                    = $row['author_id'];
                            $post_status                    = $row['status'];
                            $post_tags                      = $row['tags'];
                            $post_post_date                 = $row['post_date'];
                ?>

                            <!-- Single Item Blog Post Start -->
                            <div class="blog-post">
                                <!-- Blog Banner Image -->
                                <div class="blog-banner">
                                    <a href="#">
                                        <img src="assets/images/blog/test.jpg">
                                        <!-- Post Category Names -->
                                        <div class="blog-category-name">
                                            <h6>Technology</h6>
                                        </div>
                                    </a>
                                </div>
                                <!-- Blog Title and Description -->
                                <div class="blog-description">
                                    <a href="#">
                                        <h3 class="post-title"><?php echo $post_title; ?></h3>
                                    </a>
                                    <p><?php echo $post_description; ?></p>
                                    <!-- Blog Info, Date and Author -->
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="blog-info">
                                                <ul>
                                                    <li><i class="fa fa-calendar"></i>7th Nov, 2018</li>
                                                    <li><i class="fa fa-user"></i>by - admin</li>
                                                    <li><i class="fa fa-heart"></i>(50)</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-md-4 read-more-btn">
                                            <button type="button" class="btn-main">Read More <i class="fa fa-angle-double-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Item Blog Post End -->

                <?php
                        }
                    }
                }


                ?>









            </div>



            <?php

            include("inc/sidebar.php");
            ?>
        </div>
    </div>
</section>
<!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->




<?php include "inc/footer.php"; ?>