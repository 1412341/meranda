<?php

  include 'Models/Account.php';

  require_once('Models/Blog.php');
  require_once('Models/Category.php');

  session_start();

  if (!isset($_SESSION['account']))
    header('Location: login.php');
  else
    $account = $_SESSION['account'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Meranda | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- include summernote css/js-->
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
  <!-- Bootstrap Tags-Input -->
  <link rel="stylesheet" href="vendors/bootstrap-tagsinput/bootstrap-tagsinput.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $account->getDisplayedName()?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $account->getDisplayedName()?>
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <div class="pull-right">
                  <a href="#" id="btn-signout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $account->getDisplayedName()?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
        <li class="active">
          <a href="./index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>

          </a>

        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Blogs</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"><?php echo count(Blog::getAllBlogs()) ?></span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="blogs.php"><i class="fa fa-circle-o"></i>All blogs</a></li>
            <li><a href="create-new-blog.php"><i class="fa fa-circle-o"></i>Create new blog</a></li>
          </ul>
       </li>
       <li class="treeview active">
         <a href="#">
           <i class="fa fa-files-o"></i>
           <span>Categories</span>
           <span class="pull-right-container">
             <span class="label label-primary pull-right"><?php echo count(Category::getAllCategory()) ?></span>
           </span>
         </a>
         <ul class="treeview-menu">
           <li><a href="categories.php"><i class="fa fa-circle-o"></i>All categories</a></li>
           <li class="active"><a href="create-new-category.php"><i class="fa fa-circle-o"></i>Create new category</a></li>
         </ul>
      </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create new category
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Categories</li>
        <li class="active">Create new category</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <form id="postCategory" enctype="multipart/form-data" method="post">
            <div class="row">
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_slug">Slug: <span class="required">*</span>
                    </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="category_slug" name="category_slug" class="form-control col-md-7 col-xs-12" disabled>
                      <input type="hidden" id="category_slug_hidden" name="category_slug_hidden" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
            </div>
            <br />
            <div class="row">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blog_title">Enter Category Title: <span class="required">*</span>
                  </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="tẽt" id="category_title" required="required" name="category_title" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="picture">Choose Image:<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" id="picture" required="required" name="picture" class="form-control col-md-7 col-xs-12" readonly="readonly">
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="form-group">
                <div class="col-md-offset-4 col-sm-offset-4">
                  <img id="preview_img" src="" width="" height="">
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <button type="submit" class="btn btn-primary btnPublish">Publish</button>
                  <!-- <button type="submit" class="btn btn-warning btnSaveDraft">Save as draft</button> -->
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->

      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2017 <a href="#">Meranda</a>.</strong> All rights
    reserved.
  </footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Boostrap Tags Input -->
<script src="vendors/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- summernote -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
<!-- typeahead -->
<script src="vendors/bootstrap3-typeahead/bootstrap3-typeahead.js"></script>
<script src="dist/js/admin.js"></script>
<!-- newPost -->
<script src="dist/js/newCategory.js"></script>
<script src="dist/js/custom-link.js"></script>


</body>
</html>
