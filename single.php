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
                        $post_id                        = $row['id'];
                        $post_title                     = $row['title'];
                        $post_description               = $row['description'];
                        $post_image                     = $row['image'];
                        $post_category                  = $row['category_id'];
                        $post_title                     = $row['title'];
                        $post_author                    = $row['author_id'];
                        $post_status                    = $row['status'];
                        $post_tags                      = $row['tags'];
                        $post_post_date                 = $row['post_date'];



                ?>
                        <div class="blog-single">
                            <!-- Blog Title -->

                            <h3 class="post-title"><?php echo $post_title; ?></h3>

                            <!-- Blog Categories -->
                            <div class="single-categories">


                                <?php
                                $categoryQuery = "SELECT * from category where cat_id = '$post_category'";
                                $sqlCategory    = mysqli_query($db, $categoryQuery);

                                while ($row = mysqli_fetch_assoc($sqlCategory)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_name = $row['cat_name']; ?>

                                    <span><?php echo $cat_name; ?></span>



                                <?php  }

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
                                            <button type="submit" name="addComments" class="btn-main"><i class="fa fa-paper-plane-o"></i> Post Your Comments</button>
                                        </div>
                                    </div>
                                    <!-- Right Side End -->
                                </form>
                                <!-- Form End -->
                            <?php   } else {

                                echo '<a href="#login" class="alert alert-info" >Login to post comments.</a>';
                            }

                            if (isset($_POST['addComments'])) {
                                $fullname               = $_SESSION['fullnamee'];
                                $comment                = $_POST['comments'];
                                $postID                = $post_id;


                                $sql        = "INSERT INTO comments(fullname, cmnt_description,	post_id,	cmnt_status	,cmnt_date	) VALUES('$fullname','$comment','$postID','1', now())";
                                $query      = mysqli_query($db, $sql);

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
                            $countCmntSql       = "SELECT * FROM comments where post_id = '$post_id'  AND cmnt_status = 1 order by cmnt_id desc";
                            $countCmntQuery     = mysqli_query($db, $countCmntSql);
                            $totalCmnt          = mysqli_num_rows($countCmntQuery);


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
                            $cmnt_id                = $row['cmnt_id'];
                            $fullname               = $row['fullname'];
                            $cmnt_des               = $row['cmnt_description'];
                            $cmntPost_id            = $row['post_id'];
                            $cmnt_status            = $row['cmnt_status'];
                            $cmnt_date              = $row['cmnt_date']; ?>

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
                                </div>
                            </div>
                            <!-- Single Comment Post End -->
                    <?php  }
                    }

                    ?>





                </div>
                <!-- Single Comment Section End -->



            </div>







            <?php

            include("inc/sidebar.php");
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


<!-- :::::::::: Footer Section Start :::::::: -->
<footer>
    <!-- Footer Widget Section Start -->
    <div class="footer-widget background-img section">
        <div class="container">
            <div class="row">

                <!-- Footer Widget One Start-->
                <div class="col-md-3">
                    <div class="widget-title">
                        <h4><span>Blue</span> Chip</h4>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Lorem Ipsum has been the</p>
                    <!-- Social Media -->
                    <div class="widget-title">
                        <h4><span>Social</span> Media</h4>
                    </div>

                    <div class="social-media">
                        <ul>
                            <li>
                                <a href=""><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Footer Widget One End-->

                <!-- Footer Widget Two Start -->
                <div class="col-md-3">
                    <div class="widget-title">
                        <h4><span>Useful</span> Links</h4>
                    </div>
                    <div class="useful-links">
                        <ul>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Portfolio</a></li>
                            <li><a href="">Pages</a></li>
                            <li><a href="">FAQ</a></li>
                            <li><a href="">Terms of Use</a></li>
                            <li><a href="">Privacy Policy</a></li>
                            <li><a href="">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Footer Widget Two End -->

                <!-- Footer Widget Three Start -->
                <div class="col-md-3">
                    <div class="widget-title">
                        <h4><span>Contact</span> With Us</h4>
                    </div>
                    <div class="contact-with-us">
                        <ul>
                            <li>
                                <a><i class="fa fa-home"></i>7/H, Banani, Dhaka-1213</a>
                            </li>
                            <li>
                                <a><i class="fa fa-envelope-o"></i>example@yourdomain.com</a>
                            </li>
                            <li>
                                <a><i class="fa fa-fax"></i>+880 123 456 789</a>
                            </li>
                            <li>
                                <a><i class="fa fa-phone"></i>+880 123 456 789</a>
                            </li>
                            <li>
                                <a><i class="fa fa-clock-o"></i>9.00 am - 5.00 pm</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Footer Widget Three End -->

                <!-- Footer Widget Four Start -->
                <div class="col-md-3">
                    <div class="widget-title">
                        <h4><span>Subscribe</span> Here</h4>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                    <!-- Subscribe From Start -->
                    <form action="" method="">
                        <div class="form-group ">
                            <input type="email" name="email" placeholder="Enter Your Email" autocomplete="off" class="form-input" required="required">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <!-- Subscribe Button -->
                        <div class="">
                            <button type="submit" class="btn-main"><i class="fa fa-paper-plane-o"></i> Subscribe</button>
                        </div>
                    </form>
                    <!-- Subscribe From End -->
                </div>
                <!-- Footer Widget Four End -->

            </div>
        </div>
    </div>
    <!-- Footer Widget Section End -->


    <!-- CopyRight Section Start -->
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <!-- Copyright Left Content -->
                <div class="col-md-6">
                    <p><a href="">Theme Express</a> © 2018 All rights reserved. Terms of use and Privacy Policy</p>
                </div>

                <!-- Copyright Right Footer Menu Start -->
                <div class="col-md-6">
                    <div class="footer-menu">
                        <ul>
                            <li><a href="">About</a></li>
                            <li><a href="">FAQ</a></li>
                            <li><a href="">Privacy Policy</a></li>
                            <li><a href="">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Copyright Right Footer Menu End -->
            </div>
        </div>
    </div>
    <!-- CopyRight Section End -->
</footer>
<!-- ::::::::::: Footer Section End ::::::::: -->


<!-- JQuery Library File -->
<script type="text/javascript" src="assets/js/jquery-1.12.4.min.js"></script>
<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script-->

<!-- Bootstrap JS -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

<!-- Owl Carousel JS -->
<script src="assets/js/owl.carousel.min.js"></script>

<!-- Isotop JS -->
<script src="assets/js/isotop.min.js"></script>

<!-- Fency Box JS -->
<script src="assets/js/jquery.fancybox.min.js"></script>

<!-- Easy Pie Chart JS -->
<script src="assets/js/jquery.easypiechart.js"></script>

<!-- JQuery CounterUp JS -->
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>

<!-- BlueChip Extarnal Script -->
<script type="text/javascript" src="assets/js/main.js"></script>

</body>

</html>