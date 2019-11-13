<?php
include '../dbconnection/connect.sqli.php';
$data=json_decode(file_get_contents("php://input"));
if(count($data)>0)
{
  session_start();
  $id=$data->ticket_id;
  $comment=$data->comment;
  $btnName=$data->btnName;
           /*$ticket_id = $_POST['ticket_id'];
           $comment = $_POST['comment'];*/
           $comment_by = $_SESSION['sess_user'];
           if($btnName=="ADD")
           {
             $query ="INSERT INTO `comments`(`comment`, `comment_by`, `comment_date`,`comment_time`, `ticket_id`) VALUES 
             ('$comment','$comment_by', CURDATE(), CURTIME(),'$id')";
             if(mysqli_query($connect,$query))
             {
              echo "Comment Added successfully";

            }
            else{
              echo "Error";
            }
            }     /* if (mysql_query($insert)) {
              $msg = "Comment added successfully";
              header("location:view_all_tickets.php");
            }else{
              echo $msg = "Error in adding Comment";
            }*/

          }

          ?>