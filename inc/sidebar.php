 <!-- Blog Right Sidebar -->
 <div class="col-md-4">

     <!-- Latest News -->
     <div class="widget">
         <h4>Latest News</h4>
         <div class="title-border"></div>

         <!-- Sidebar Latest News Slider Start -->
         <div class="sidebar-latest-news owl-carousel owl-theme">


             <?php
                $latestPost = "SELECT * from post order by id desc limit 3 ";
                $latestPostQuery = mysqli_query($db, $latestPost);
                while ($row = mysqli_fetch_assoc($latestPostQuery)) {
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
                 <!-- First Latest News Start -->
                 <div class="item">
                     <div class="latest-news">
                         <!-- Latest News Slider Image -->
                         <div class="latest-news-image">
                             <a href="#">
                                 <img src="admin/image/post/<?php echo $post_image; ?>">
                             </a>
                         </div>
                         <!-- Latest News Slider Heading -->
                         <h5><?php echo $post_title; ?></h5>
                         <!-- Latest News Slider Paragraph -->
                         <p><?php echo substr($post_description, 0, 100); ?></p>
                     </div>
                 </div>
                 <!-- First Latest News End -->



             <?php

                }
                ?>



         </div>
         <!-- Sidebar Latest News Slider End -->
     </div>


     <!-- Search Bar Start -->
     <div class="widget">
         <!-- Search Bar -->
         <h4>Blog Search</h4>
         <div class="title-border"></div>
         <div class="search-bar">
             <!-- Search Form Start -->
             <form action="search.php" method="POST">
                 <div class="form-group">
                     <input type="text" name="search" placeholder="Search Here" autocomplete="off" class="form-input">
                     <i class="fa fa-paper-plane-o"></i>
                 </div>
             </form>
             <!-- Search Form End -->
         </div>
     </div>
     <!-- Search Bar End -->

     <!-- Recent Post -->
     <div class="widget">
         <h4>Recent Posts</h4>
         <div class="title-border"></div>
         <div class="recent-post">
             <?php
                $latestPost = "SELECT * from post order by id desc limit 4 ";
                $latestPostQuery = mysqli_query($db, $latestPost);
                while ($row = mysqli_fetch_assoc($latestPostQuery)) {
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
                 <!-- Recent Post Item Content Start -->
                 <div class="recent-post-item">
                     <div class="row">
                         <!-- Item Image -->
                         <div class="col-md-4">
                             <img src="admin/image/post/<?php echo $post_image; ?>">
                         </div>
                         <!-- Item Tite -->
                         <div class="col-md-8 no-padding">
                             <h5><?php echo $post_title; ?></h5>
                             <ul>
                                 <li><i class="fa fa-clock-o"></i><?php echo $post_date; ?></li>
                                 <li><i class="fa fa-comment-o"></i>15</li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <!-- Recent Post Item Content End -->

             <?php

                }
                ?>

         </div>
     </div>

     <!-- All Category -->
     <div class="widget">
         <h4>Blog Categories</h4>
         <div class="title-border"></div>
         <!-- Blog Category Start -->
         <div class="blog-categories">
             <ul>
                 <?php
                    $categoryQuery = "SELECT * from category";
                    $categorySql = mysqli_query($db, $categoryQuery);

                    while ($row = mysqli_fetch_assoc($categorySql)) {
                        $cat_id = $row['cat_id'];
                        $cat_name = $row['cat_name'];
                        $cat_des = $row['cat_des'];
                        $cat_status = $row['cat_status'];

                        $count = 0;

                        $postCount = "SELECT * from post where category_id = '$cat_id'";
                        $postCountSql = mysqli_query($db, $postCount);

                        while ($row = mysqli_fetch_assoc($postCountSql)) {
                            $count++;
                        }

                    ?>
                     <!-- Category Item -->
                     <li>
                         <i class="fa fa-check"></i>
                         <?php echo $cat_name; ?>
                         <span>[<?php echo $count; ?>]</span>
                     </li>
                     <!-- Category Item -->
                 <?php }


                    ?>


             </ul>
         </div>
         <!-- Blog Category End -->
     </div>

     <!-- Recent Comments -->
     <div class="widget">
         <h4>Recent Comments</h4>
         <div class="title-border"></div>
         <div class="recent-comments">

             <!-- Recent Comments Item Start -->
             <div class="recent-comments-item">
                 <div class="row">
                     <!-- Comments Thumbnails -->
                     <div class="col-md-4">
                         <i class="fa fa-comments-o"></i>
                     </div>
                     <!-- Comments Content -->
                     <div class="col-md-8 no-padding">
                         <h5>admin on blog posts</h5>
                         <!-- Comments Date -->
                         <ul>
                             <li>
                                 <i class="fa fa-clock-o"></i>Dec 15, 2018
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
             <!-- Recent Comments Item End -->

             <!-- Recent Comments Item Start -->
             <div class="recent-comments-item">
                 <div class="row">
                     <!-- Comments Thumbnails -->
                     <div class="col-md-4">
                         <i class="fa fa-comments-o"></i>
                     </div>
                     <!-- Comments Content -->
                     <div class="col-md-8 no-padding">
                         <h5>admin on blog posts</h5>
                         <!-- Comments Date -->
                         <ul>
                             <li>
                                 <i class="fa fa-clock-o"></i>Dec 15, 2018
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
             <!-- Recent Comments Item End -->

             <!-- Recent Comments Item Start -->
             <div class="recent-comments-item">
                 <div class="row">
                     <!-- Comments Thumbnails -->
                     <div class="col-md-4">
                         <i class="fa fa-comments-o"></i>
                     </div>
                     <!-- Comments Content -->
                     <div class="col-md-8 no-padding">
                         <h5>admin on blog posts</h5>
                         <!-- Comments Date -->
                         <ul>
                             <li>
                                 <i class="fa fa-clock-o"></i>Dec 15, 2018
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
             <!-- Recent Comments Item End -->

         </div>
     </div>

     <!-- Meta Tag -->
     <div class="widget">
         <h4>Tags</h4>
         <div class="title-border"></div>
         <!-- Meta Tag List Start -->
         <div class="meta-tags">
             <?php
                $latestPost = "SELECT * from post order by id desc limit 4 ";
                $latestPostQuery = mysqli_query($db, $latestPost);
                while ($row = mysqli_fetch_assoc($latestPostQuery)) {
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
                 <span><?php echo $post_tags; ?></span>
             <?php } ?>
         </div>
         <!-- Meta Tag List End -->
     </div>

 </div>
 <!-- Right Sidebar End -->