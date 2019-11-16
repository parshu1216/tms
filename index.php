<?php
session_start();
if (isset($_SESSION['sess_user'])) {
   echo "<script>location.assign('Account.php')</script>";
 /* if ($_SESSION['role']!='agent') {
   echo "<script>location.assign('admin/Account.php')</script>";
  }else{
  echo "<script>location.assign('Account.php')</script>";
}*/
} else {


?><!DOCTYPE html>
  <html>
    <head>
            <title>Prago Infotech | TMS | Login</title>
     <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../library/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../library/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../library/bower_components/Ionicons/css/ionicons.min.css">
      <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>

  <!-- Theme style -->
  <link rel="stylesheet" href="../library/dist/css/AdminLTE.min.css">

  <!-- iCheck -->
  <link rel="stylesheet" href="../library/plugins/iCheck/square/blue.css">
</script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

 <body class=" login-page">

 <div class="container-fluid">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>TMS</b> Login</a>
    <p></p>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

          
          <?php
      include "dbconnection/connect.inc.php";
      function cryptPass($input , $rounds = 9){
        $salt ="";
        $saltChars = array_merge(range('A', 'Z'), range('a', 'z'),range('0', '9'));

        for($i = 0; $i < 22; $i++) {
          $salt =$saltChars[array_rand($saltChars)];
        }
        return crypt($input , sprintf('$2y$%o2d$', $rounds). $salt);
      }


      if (isset($_POST['userID'])&&isset($_POST['password'])) {

        $user = $_POST['userID'];
        $pass = cryptPass($_POST['password']);
        $error1 ='<div style="color: red;">Inavalid Username or password</div>';
        $error2 ='<div style="color: red;">Please fill the details</div>';

        if (!empty($user)&& !empty($pass)) {
          $query = "SELECT * FROM `login_info` WHERE `userID`='$user' AND `password`='$pass'";

          if ($query_run = mysql_query($query)) {

            if ($result=mysql_fetch_assoc($query_run)) {
             session_regenerate_id();
             $_SESSION['sess_user']=$result['userID'];
              $_SESSION['role']=$result['type'];

              if (mysql_num_rows($query_run)!=NULL) {
                 header('location:Account.php');
              }
            
           }else
           echo $error1;

         }

       } else 
        echo $error2;
      

    }
    ?>

    <form id="LoginForm" class="form-horizontal" name="LoginForm" method="post" action="index.php" role="form">
    <div id="test" style="color: red;"></div>
      <div class="form-group has-feedback">
      
  <input id="UserID" type="text" class="form-control" name="userID" value="" placeholder="UserID" > 
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        
      </div>
      <div class="form-group has-feedback">
      <input  name="password" type="password" class="form-control" id="Password" placeholder="Password"  />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
        <button name="LoginButton" type="submit" class="btn btn-info" id="LoginButton" value="Login" >Login</button>
        </div>
       
      
        <!-- /.col -->
      </div>
      <hr/>


      
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="Register.php"><button type="button"   class="btn btn-primary">Sign Up Here</button></a>
    </div>
     
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<p style="text-align:center">Developed By <a  href="https://www.pragoinfotech.com"> Prago Infotech</a></p>

</div>

</body>
<!-- jQuery 3 -->
<script src="../library/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../library/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../library/plugins/iCheck/icheck.min.js"></script>
<!--icons-->
 <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</html>

  <?php
}
  ?>