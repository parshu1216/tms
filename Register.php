<?php
session_start();

if (isset($_SESSION['sess_user'])) {
  echo "<script>location.assign('Account.php')</script>";
} else {


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Prago Infotech | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../library/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../library/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../library/bower_components/Ionicons/css/ionicons.min.css">
      <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">

  <!-- Theme style -->
  <link rel="stylesheet" href="../library/dist/css/AdminLTE.min.css">
             <link rel="stylesheet" href="../library/dist/css/status-color.css">

  <!-- iCheck -->
  <link rel="stylesheet" href="../library/plugins/iCheck/square/blue.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    
   <script>

  //paste this code under head tag or in a seperate js file.
  // Wait for window load
  $(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
  });
</script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    form { padding: 10px; }
    .error { border: 3px solid #b94a48!important; background-color: #fee!important; }
    #pass_form {
    margin:10px;
}
label {
    font-family:verdana;
    font-size:10px;
}
input {
    padding:2px;
    color:gray;
}
#passstrength {
    color:red;
    font-family:verdana;
    font-size:15px;
    font-weight:bold;
}
#passmatch {
    color:red;
    font-family:verdana;
    font-size:15px;
    font-weight:bold;
}
#passmatch_yes {
    color:green;
    font-family:verdana;
    font-size:15px;
    font-weight:bold;
}
#email_match {
    color:red;
    font-family:verdana;
    font-size:15px;
    font-weight:bold;
}


    </style>
    <script language="javascript" type="text/javascript">
<!-- 
//Browser Support Code
function ajaxFunction(){
   var ajaxRequest;  // The variable that makes Ajax possible!
   try{
   
      // Opera 8.0+, Firefox, Safari
      ajaxRequest = new XMLHttpRequest();
   }catch (e){
      
      // Internet Explorer Browsers
      try{
         ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
      }catch (e) {
         
         try{
            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
         }catch (e){
         
            // Something went wrong
            alert("Your browser broke!");
            return false;
         }
      }
   }
   
   // Create a function that will receive data
   // sent from the server and will update
   // div section in the same page.
  

   ajaxRequest.onreadystatechange = function(){
   
      if(ajaxRequest.readyState == 4){
         var ajaxDisplay = document.getElementById('test');
         var response = ajaxRequest.responseText;
         var check = 'ashello';
        
        if(response.length == check.length){
          window.location.href = "welcome.php";
        }else{
          ajaxDisplay.innerHTML = response;
        }
      }
   }
   
   // Now get the value from user and pass it to
   // server script.
   var UserName = document.getElementById('UserName').value;
   var Password1 = document.getElementById('Password1').value;
   var Email = document.getElementById('Email').value;
   var Password2 = document.getElementById('Password2').value;
   var type = document.getElementById('type').value;
   var queryString = "?UserName=" + UserName + "&Password1=" + Password1 + "&Email=" + Email + "&Password2=" + Password2 + "&type=" + type;

   ajaxRequest.open("GET", "new_ajax.php" + queryString, true);
   ajaxRequest.send(null);

 

}
//-->

</script>
</head>
<body class="hold-transition register-page">
  <!-- Paste this code after body tag -->
  <div class="se-pre-con"></div>
  <!-- Ends -->
<div class="container-fluid">
<div class="register-box">
  <div class="register-logo">
    <a href="index.php"><b>TMS</b> Registration</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>
    <div id="test" style="
    color: red;"></div>
    <form id="RegisterForm" name="RegisterForm">
      <div class="form-group has-feedback">
      <label for="email" data-error="wrong" data-success="right">Email</label>
      <input name="Email" type="text" class="form-control validate" id="Email"  />
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
   <span id="email_match"></span>
      </div>

      <div class="form-group has-feedback">
      <label for="icon_prefix">Username</label>
<input name="UserName" type="text" class="form-control validate" id="UserName" />
<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      <label for="password">Password</label> 
      <input name="Password1" type="password" class="form-control validate" id="Password1" />
            <span id="passstrength"></span><span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
      <label for="password">Confirm Password</label>
      <input name="Password2" type="password" class="form-control validate" id="Password2"  /><br>
            <span id="passstrength"></span>
          <span id="passmatch"></span>
  <span id="passmatch_yes"></span>        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      <label for="type">Type</label>
      <select name="type" class="form-control validate" id="type" >
        <option value="admin">Admin</option>
        <option value="agent">Agent</option>
      </select>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
        <input name="ProceedButton" type="button" class="btn btn-primary btn-block btn-flat" id="ProceedButton" value="Proceed" onclick='ajaxFunction()'/>

        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="index.php" class="text-center">I already have a membership</a>
    </div>

  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
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
<script type="text/javascript">
var count,count2;
$('#Password1').keyup(function(e) {
     var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
     var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
     var enoughRegex = new RegExp("(?=.{6,}).*", "g");
     if (false == enoughRegex.test($(this).val())) {
             $('#passstrength').html('More Characters');
     } else if (strongRegex.test($(this).val())) {
             $('#passstrength').className = 'ok';
             $('#passstrength').html('Strong!');
     } else if (mediumRegex.test($(this).val())) {
             $('#passstrength').className = 'alert';
             $('#passstrength').html('Medium!');
     } else {
             $('#passstrength').className = 'error';
             $('#passstrength').html('Weak!');
     }
     
});



$('#Password2').keyup(function(e) {
   if($('#Password1').val()!=$('#Password2').val()){
       $('#passmatch').html('Password Not Macthing');
       $('#passmatch_yes').html(''); 
       count = 0;
   }
   else
   {
    $('#passmatch').html('');
    $('#passmatch_yes').html('Password Matched'); 
   count=1;
 }
});



$('#Email').keyup(function(e) {   
 
  var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  var mail = $('#Email').val();

 if (true == regex.test(mail))  
  {  
    $('#email_match').html(''); 
    count2 = 1;  
  } else {
    $('#email_match').html('Email address invalid');   
    count2 = 0; 
}
}); 


$('#ProceedButton').keyup(function(e) {
  if(count == 1 && count2==1)
    return true;
  else
    return false;
});

</script>
</html>
<?php
session_destroy();
}
?>
</html>
