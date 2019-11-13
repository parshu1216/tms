<?php
session_start();
if (!isset($_SESSION['sess_user'])) {
  echo "<script>location.assign('404.php')</script>";
}
else{
  $user_role = $_SESSION['role'];

  ?>
  <!DOCTYPE html>
  <html ng-app="ticketApp" ng-controller="ticketController" ng-init="loaderDisplay()"  >


  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Dashboard | TMS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../library/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../library/bower_components/font-awesome/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/369405ef77.js"></script>
    <!-- Ionicons -->
    <link rel="stylesheet" href="../library/bower_components/Ionicons/css/ionicons.min.css">
    <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
 --><!-- 
   <script>
$(document).ready(function() {
 
  // Fakes the loading setting a timeout
    setTimeout(function() {
        $('body').removeClass('se-pre-con');
    }, 3500);
 
});
</script> -->

    <!-- Theme style -->
    <link rel="stylesheet" href="../library/dist/css/AdminLTE.min.css">
           <link rel="stylesheet" href="../library/dist/css/status-color.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="../library/dist/css/skins/_all-skins.min.css">
   <!-- Morris chart -->
   <link rel="stylesheet" href="../library/bower_components/morris.js/morris.css">
   <!-- jvectormap -->
   <link rel="stylesheet" href="../library/bower_components/jvectormap/jquery-jvectormap.css">
   <!-- Date Picker -->
   <link rel="stylesheet" href="../library/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="../library/bower_components/bootstrap-daterangepicker/daterangepicker.css">
   <!-- bootstrap wysihtml5 - text editor -->
   <link rel="stylesheet" href="../library/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Angular-->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 --><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 --><script type="text/javascript" src="../library/js/bootstrap.min_1.js"></script>
<script type="text/javascript" src="../library/js/jquery-3.1.1.min.js"></script>
<!--tinymce-->
 <script src='../library/js/tinymce/tinymce.min.js' referrerpolicy="origin"></script>
 <script src='../library/js/tinymce/jquery.tinymce.min.js' referrerpolicy="origin"></script>
 <script>
  tinymce.init({
    selector: '#mytextarea'
  });
  </script>
<!--//tinymce-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script src="../library/js/dirPagination.js"></script>
<script src="mainController.js"></script>
<script src="directives/dashboard.js"></script>
<script src="directives/add_ticket.js"></script>
<script src="directives/assigned_ticket.js"></script>
<script src="directives/view_all_ticket.js"></script>
<script src="directives/add_project.js"></script>
  <script src="resources/services/ApiService.js"></script>
<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<!--xeditable-->
 <link href="../library/dist/css/xeditable.css" rel="stylesheet">
    <script src="../library/dist/js/xeditable.js"></script>

</head>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
  <!-- Paste this code after body tag -->
  <div class="se-pre-con" ng-show="loader"></div>
  <!-- Ends --
         <div class="loading" ng-show="loader"></div> -->

  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="Account.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>P</b>I</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Prago</b>Infotech</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->

            <li>
              <a href="logout.php" class="btn btn-primary">Sign out</a>
            </li>
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
            <img src="../library/dist/img/avatar.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php
            $name=$_SESSION['sess_user'];
            echo $name;
           
            ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form --
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
         <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li>
            <a href="" ng-click="dashboard()">
              <i class="fa fa-dashboard text-red"></i> <span>Dashboard</span>
            </a>
         <!--  <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul> -->
        </li>
        <li >
          <a href="" ng-click="addTicket()">
            <i class="fa fa-plus text-blue"></i> <span>Add Ticket</span>
          </a>
         <!--  <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul> -->
        </li>
       <li   ng-if="<?php echo $_SESSION['role']== 'agent';?>">
          <a href=""  ng-click="assginedTicket()">
            <i class="fa fa-file text-orange"></i> <span>Assigned Tickets</span>
          </a>
        </li>
        <li>
          <a href="" ng-click="viewTicket()">
            <i class="fa fa-eye text-green"></i> <span>View All Tickets</span>
          </a>
        </li>
         <li   ng-if="<?php echo $_SESSION['role']== 'admin';?>">
          <a href="" ng-click="addProject()">
          <i class="fa fa-product-hunt text-purple"></i> <span>Add Project</span>
        </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="Account.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
     <div ng-if="dash_board" >
       <dashboard-directive></dashboard-directive>
     </div>
     <div ng-if="add_ticket" >
       <add-ticket></add-ticket>
     </div>
      <div ng-if="view_assigned_tickets" >
       <assigned-ticket></assigned-ticket>
     </div>
       <div ng-if="view_all_tickets" >
       <view-ticket></view-ticket>
     </div>
     <div ng-if="add_project" >
       <add-project></add-project>
     </div>
   </div>

<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.4.0
  </div>
  <strong>Copyright &copy; 2016 <a href="https://pragoinfotech.com">Prago Infotech</a>.</strong> All rights
  reserved.
</footer>

<!--Angular Script--
<script>
  var app=angular.module("myapp",['angularUtils.directives.dirPagination']);
  app.controller("Accountcontroller",function($scope,$http){
    $scope.loader = true;
    $scope.displayData=function(){
    $scope.loader = false;
  }
  });
</script>
<!-- jQuery 3 --
<script src="../library/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 --
<script src="../library/bower_components/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<script type="text/javascript">
    $(function () {

  'use strict';
  // jQuery UI sortable for the todo list
  $('.todo-list').sortable({
    placeholder         : 'sort-highlight',
    handle              : '.handle',
    forcePlaceholderSize: true,
    zIndex              : 999999
  });
  });

</script>


<!-- Bootstrap 3.3.7 -->
<script src="../library/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../library/bower_components/raphael/raphael.min.js"></script>
<script src="../library/bower_components/morris.js/morris.min.js"></script>
<!--icons-->
 <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
<!-- Sparkline -->
<script src="../library/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../library/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../library/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../library/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../library/bower_components/moment/min/moment.min.js"></script>
<script src="../library/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../library/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../library/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../library/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../library/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../library/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../library/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../library/dist/js/demo.js"></script>
</body>
</html>
<?php }
?>