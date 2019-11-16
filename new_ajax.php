
<?php 
include 'dbconnection/connect.inc.php';

$error1 = "<p>Username exist try another username</p>";
$error3 = "<p>All the Details are Required</p>";
$error4 = "<p>Password does not match</p>";


function cryptPass($input , $rounds = 9){
$salt ="";
$saltChars = array_merge(range('A', 'Z'), range('a', 'z'),range('0', '9'));

for($i = 0; $i < 22; $i++) {
$salt =$saltChars[array_rand($saltChars)];
}
return crypt($input , sprintf('$2y$%o2d$', $rounds). $salt);
}

if (isset($_GET['UserName']) && isset($_GET['Password1']) && isset($_GET['Email']) && isset($_GET['Password2']) && isset($_GET['type'])) {
    $username = $_GET['UserName'];
    $password = $_GET['Password1'];
    $password2 = $_GET['Password2'];
    $email = $_GET['Email'];
    $type = $_GET['type'];
    
    date_default_timezone_set("Asia/Kolkata");
    $put_date = date("Y-m-d H:i:s");

    $email1 = test_input($email);
    if (!filter_var($email1, FILTER_VALIDATE_EMAIL)) {
    $emailErr = false; 
    }
    else
        $emailErr = true;

    if (!empty($username)&& !empty($password) && !empty($email) && !empty($password2)) {


        if ($password == $password2 && $emailErr) {

            $query = "SELECT * FROM `login_info` WHERE `userID`='$username'";
           
            if($query_run = mysql_query($query)){

                $query_run_row = mysql_num_rows($query_run);

                if ($query_run_row==NUll) {

                    $password = cryptPass($_GET['Password1']);
                    $result = mysql_query("INSERT INTO login_info (userID,emailID,password,reg_date,type)
                    VALUES
                    ('$username','$email','$password','$put_date','$type')");
                   /* $result = mysql_query("INSERT INTO personal_info (userID)
                    VALUES
                    ('$username')");
                    $result = mysql_query("INSERT INTO contact_info (userID)
                    VALUES
                    ('$username')");*/
                    session_regenerate_id();
                    $_SESSION['sess_user']=$username;
                    $_SESSION['role'] = $type;
                    echo 'hello';
                }         
                else {
                echo $error1;
                }
            }

        }
        else {
              //echo $error4;
        }

    }
    else {
        echo $error3;
    } 
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>
