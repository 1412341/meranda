<?php
  require_once('admin/Models/Blog.php');
  require_once('admin/Models/Category.php');

  $categories = Category::getAllCategory();
  $blogs = Blog::getBlogs();
  $newestBlogs = Blog::getNewestBlogs(4);
  $blog_slug = $_GET['slug'];
  $current_blog = Blog::getBlogBySlug($blog_slug);
  $current_category = Category::getCategoryInBlog($current_blog['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Meranda &mdash; Website Template by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="assets/fonts/icomoon/style.css">

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/jquery-ui.css">
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

  <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="assets/css/aos.css">
  <link href="assets/css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="assets/css/style.css">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>



    <div class="header-top">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-lg-6 d-flex">
            <a href="index.php" class="site-logo">
              Meranda
            </a>

            <a href="#" class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>

          </div>
          <div class="col-12 col-lg-6 ml-auto d-flex">
            <div class="ml-md-auto top-social d-none d-lg-inline-block">
              <a href="#" class="d-inline-block p-3"><span class="icon-facebook"></span></a>
                <a href="#" class="d-inline-block p-3"><span class="icon-twitter"></span></a>
                <a href="#" class="d-inline-block p-3"><span class="icon-instagram"></span></a>
            </div>
            <form action="search.php" method="get" class="search-form d-inline-block">

              <div class="d-flex">
                <input type="text" name="title" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-secondary" ><span class="icon-search"></span></button>
              </div>
            </form>


          </div>
          <div class="col-6 d-block d-lg-none text-right">

          </div>
        </div>
      </div>




      <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">

          <div class="mr-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
                <li class="active">
                  <a href="index.php" class="nav-link text-left">Home</a>
                </li>
                <?php
                    if (count($categories) > 0) {
                        foreach ($categories as $category) {
                ?>
                            <li>
                                <a href="categories.php?slug=<?php echo $category['slug'] ?>" class="nav-link text-left"><?php echo $category['title'] ?></a>
                            </li>
                <?php

                        }
                    }
                ?>
                <li>
              </ul>
            </nav>

          </div>

        </div>
      </div>

    </div>

    </div>



    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 single-content">

            <p class="mb-5">
              <img src="assets/images/big_img_1.jpg" alt="Image" class="img-fluid">
            </p>
            <h1 class="mb-4">
              <?php echo $current_blog['title'] ?>
            </h1>
            <div class="post-meta d-flex mb-5">
              <div class="bio-pic mr-3">
                <img src="<?php echo 'admin/' . $current_blog['picture'] ?>" alt="Image" class="img-fluidid">
              </div>
              <div class="vcard">
                <span class="d-block"><a href="#"><?php echo $current_blog['author'] ?></a> in <a href="#"><?php echo $current_category ?></a></span>
                <span class="date-read"><?php echo $current_blog['date'] ?></span>
              </div>
            </div>

            <?php echo $current_blog['content'] ?>



            <div class="pt-5">
                <p>Categories:  <a href="#"><?php echo $current_category ?></a> </p>
              </div>



          </div>


          <div class="col-lg-3 ml-auto">
            <div class="section-title">
              <h2>Newest Posts</h2>
            </div>
            <?php
                if (count($newestBlogs) > 0) {
                    foreach ($newestBlogs as $key => $newestBlog) {
                        $category = Category::getCategoryInBlog($newestBlog['id']);
            ?>
                        <div class="trend-entry d-flex">
                            <div class="number align-self-start"><?php echo ($key + 1 <= 9) ? '0' . ($key + 1) : ($key + 1) ?></div>
                            <div class="trend-contents">
                                <h2><a href="blog-single.php?slug=<?php echo $newestBlog['slug'] ?>"><?php echo $newestBlog['title'] ?></a></h2>
                                <div class="post-meta">
                                    <span class="d-block"><a href="#"><?php echo $newestBlog['author'] ?></a> in <a href="#"><?php echo $category ?></a></span>
                                    <span class="date-read"><?php echo $newestBlog['date'] ?></span>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            ?>

            <!-- <p>
              <a href="#" class="more">See All Popular <span class="icon-keyboard_arrow_right"></span></a>
            </p> -->
          </div>


        </div>

      </div>
    </div>

    <div class="site-section subscribe bg-light">
      <div class="container">
        <form action="#" class="row align-items-center">
          <div class="col-md-5 mr-auto">
            <h2>Newsletter Subcribe</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis aspernatur ut at quae omnis pariatur obcaecati possimus nisi ea iste!</p>
          </div>
          <div class="col-md-6 ml-auto">
            <div class="d-flex">
              <input type="email" class="form-control" placeholder="Enter your email">
              <button type="submit" class="btn btn-secondary" ><span class="icon-paper-plane"></span></button>
            </div>
          </div>
        </form>
      </div>
    </div>



    <div class="footer">
      <div class="container">


        <div class="row">
          <div class="col-12">
            <div class="copyright">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
  <!-- .site-wrap -->


  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15"/></svg></div>

  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="assets/js/jquery-ui.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/jquery.stellar.min.js"></script>
  <script src="assets/js/jquery.countdown.min.js"></script>
  <script src="assets/js/bootstrap-datepicker.min.js"></script>
  <script src="assets/js/jquery.easing.1.3.js"></script>
  <script src="assets/js/aos.js"></script>
  <script src="assets/js/jquery.fancybox.min.js"></script>
  <script src="assets/js/jquery.sticky.js"></script>
  <script src="assets/js/jquery.mb.YTPlayer.min.js"></script>




  <script src="assets/js/main.js"></script>

</body>

</html>
