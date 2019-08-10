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
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link href="dist/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

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
        <li>
          <a href="./index.html">
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
           <li class="active"><a href="categories.php"><i class="fa fa-circle-o"></i>All categories</a></li>
           <li><a href="create-new-category.php"><i class="fa fa-circle-o"></i>Create new category</a></li>
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
        All categories
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Categories</li>
        <li class="active">All categories</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">All blogs</h3> -->
            </div>
            <!-- /.box-header -->
            <?php $categories = Category::getAllCategory(); ?>
            <div class="box-body">
              <table id="blogs-list" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Picture</th>
                    <th>Title</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if (count ($categories) > 0) {
                        foreach ($categories as $category) {
                  ?>
                          <tr>
                            <td><img src="<?php echo $category['picture'] ?>" width="100"></td>
                            <td><?php echo $category['title'] ?></td>
                            <td>
                                <button type="button" class="btn btn-success edit" id="category<?php echo $category['id']?>">View</button>
                                <button type="button" class="btn btn-danger delete" id="category<?php echo $category['id']?>">Delete</button></td>
                          </tr>
                  <?php
                        }
                    }
                  ?>

                </tbody>
                <tfoot>
                  <tr>
                    <th>Picture</th>
                    <th>Title</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
    <strong>Copyright &copy; 2019 <a href="#">Meranda</a>.</strong> All rights
    reserved.
  </footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/plugins/sweetalert/sweetalert.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/admin.js"></script>
<script src="dist/js/deleteCategory.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.edit').on('click', function(e) {
      e.preventDefault();
      var row = $(this).parent().parent();

      // if (confirm('Bạn có chắc muốn xóa bài category này không?')) {
        var categoryId = $(this).attr('id').replace("category", "");

        window.location.href = 'edit-category.php?id='+categoryId;



      // }
    })
  })
</script>
<!-- page script -->
<script>
  $(function () {
    $('#blogs-list').DataTable();
  })
</script>
</body>
</html>
