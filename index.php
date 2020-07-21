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




                $query = "SELECT * from post order by id desc";
                $sql = mysqli_query($db, $query);


                $total_category_post = mysqli_num_rows($sql);


                if ($total_category_post == 0) {
                    echo '<div class="alert alert-danger"><strong>Sorry!!!! No post available at this moment.</strong></div>';
                } else {
                    while ($row = mysqli_fetch_assoc($sql)) {
                        $post_id                        = $row['id'];
                        $post_title                     = $row['title'];
                        $post_description               = $row['description'];
                        $post_image                     = $row['image'];
                        $post_category                  = $row['category_id'];
                        $post_title                     = $row['title'];
                        $post_author                    = $row['author_id'];
                        $post_status                    = $row['status'];
                        $post_tags                      = $row['tags'];
                        $post_date                      = $row['post_date'];
                ?>

                        <!-- Single Item Blog Post Start -->
                        <div class="blog-post">
                            <!-- Blog Banner Image -->
                            <div class="blog-banner">
                                <a href="single.php?post=<?php echo $post_id; ?>">
                                    <img src="admin/image/post/<?php echo $post_image; ?>">
                                    <!-- Post Category Names -->
                                    <div class="blog-category-name">
                                        <?php
                                        $categoryQuery = "SELECT * from category where cat_id = '$post_category'";
                                        $sqlCategory    = mysqli_query($db, $categoryQuery);

                                        while ($row = mysqli_fetch_assoc($sqlCategory)) {
                                            $cat_id = $row['cat_id'];
                                            $cat_name = $row['cat_name']; ?>

                                            <h6><?php echo $cat_name; ?></h6>



                                        <?php  }

                                        ?>
                                    </div>
                                </a>
                            </div>
                            <!-- Blog Title and Description -->
                            <div class="blog-description">
                                <a href="single.php?post=<?php echo $post_id; ?>">
                                    <h3 class="post-title"><?php echo $post_title; ?></h3>
                                </a>
                                <p><?php

                                    $descriptionLen = strlen($post_description);
                                    if ($descriptionLen > 300) {
                                        echo substr($post_description, 0, 300) . ' ....';
                                    } else {
                                        echo $post_description;
                                    }

                                    ?></p>
                                <!-- Blog Info, Date and Author -->
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="blog-info">
                                            <ul>
                                                <li><i class="fa fa-calendar"></i><?php echo $post_date ?></li>
                                                <li><i class="fa fa-user"></i>
                                                    <?php
                                                    $post_user = "SELECT * FROM users where id = '$post_author'";
                                                    $post_user_query = mysqli_query($db, $post_user);


                                                    while ($row = mysqli_fetch_assoc($post_user_query)) {
                                                        $uid                    = $row['id'];
                                                        $fullname               = $row['fullname']; ?>
                                                        by - <?php echo $fullname; ?>
                                                    <?php    }

                                                    ?>

                                                </li>
                                                <li><i class="fa fa-heart"></i>(50)</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-4 read-more-btn">
                                        <a href="single.php?post=<?php echo $post_id; ?>" class="btn-main">Read More <i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Item Blog Post End -->

                <?php
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