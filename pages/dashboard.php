<div>
  
	<?php
session_start();
if (!isset($_SESSION['sess_user'])) {
  echo "<script>location.assign('404.php')</script>";
}
else{
  $user_role = $_SESSION['role'];

  ?>
    <div class="loading" ng-show="loader"></div>
  <!-- Main content -->
    <section class="content">

      
      <!--admin view ticket status-->
      <div class="row" ng-if="<?php echo $_SESSION['role']== 'admin';?>">
        <!-- Small boxes (Stat box) -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
          include '../dbconnection/connect.inc.php';
          $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket");
          while ($row = mysql_fetch_array($res)) {
            ?>
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><?php echo $row['NumberOfTicket']; ?></h3>
                <?php
              }
              ?>
              <p>Total Ticket</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-photos"></i>
            </div>
          <!--   <a href="view_all_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php

          $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket where `ticket_status`='Completed'");
          while ($row = mysql_fetch_array($res)) {
            ?>
            <div class="small-box bg-green">
              <div class="inner">
               <h3><?php echo $row['NumberOfTicket']; ?></h3>
               <?php
             }
             ?>
             <p>Completed Ticket</p>
           </div>
           <div class="icon">
             <i class="ion ion-ios-trophy" ></i>
          </div>
         <!--  <a href="view_all_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      <!-- ./col -->


      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <!-- small box -->
        <?php

        $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket where `ticket_status`='In-Progress'");
        while ($row = mysql_fetch_array($res)) {
          ?>
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $row['NumberOfTicket']; ?></h3>
              <?php
            }
            ?>
            <p>In Progress Ticket</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-construct"></i>
          </div>
         <!--  <a href="view_all_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box --> 
        <?php

        $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket where `ticket_status`='Hold'");
        while ($row = mysql_fetch_array($res)) {
          ?>

          <div class="small-box bg-red">
            <div class="inner">
             <h3><?php echo $row['NumberOfTicket']; ?></h3>
             <?php
           }
           ?>
           <p>Hold Tickets</p>
         </div>
         <div class="icon">
          <i class="ion ion-ios-stopwatch"></i>
        </div>
        <!-- <a href="view_all_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
      </div>
    </div>
    <!-- ./col -->
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box --> 
      <?php

      $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket where `ticket_status`='To-Do'");
      while ($row = mysql_fetch_array($res)) {
        ?>

        <div class="small-box bg-gray">
          <div class="inner">
           <h3><?php echo $row['NumberOfTicket']; ?></h3>
           <?php
         }
         ?>
         <p>To-Do Tickets</p>
       </div>
       <div class="icon">
        <i class="fa fa-clipboard-list"></i>
      </div>
     <!--  <a href="view_all_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
    </div>
  </div>
  <!-- ./col -->
</div>
<!--admin view ticket status--->

<!--admin view ticket type -->
      <div class="row" ng-if="<?php echo $_SESSION['role']== 'admin';?>">
        <!-- Small boxes (Stat box) -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
          include '../dbconnection/connect.inc.php';
          $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket where `ticket_type`='Epic'");
          while ($row = mysql_fetch_array($res)) {
            ?>
            <div class="small-box bg-red Epic">
              <div class="inner">
                <h3><?php echo $row['NumberOfTicket']; ?></h3>
                <?php
              }
              ?>
              <p>Total Epic</p>
            </div>
            <div class="icon">
             <i class="fa fa-bolt"></i>
            </div>
          <!--   <a href="view_all_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php

          $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket where `ticket_type`='Story'");
          while ($row = mysql_fetch_array($res)) {
            ?>
            <div class="small-box bg-red  Story">
              <div class="inner">
               <h3><?php echo $row['NumberOfTicket']; ?></h3>
               <?php
             }
             ?>
             <p>Story</p>
           </div>
           <div class="icon">
             <i class="fa fa-bookmark"></i>
          </div>
         <!--  <a href="view_all_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      <!-- ./col -->


      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <!-- small box -->
        <?php

        $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket where `ticket_type`='Task'");
        while ($row = mysql_fetch_array($res)) {
          ?>
          <div class="small-box bg-yellow Task">
            <div class="inner">
              <h3><?php echo $row['NumberOfTicket']; ?></h3>
              <?php
            }
            ?>
            <p>Tasks</p>
          </div>
          <div class="icon">
            <i class="fa fa-check-square"></i>
          </div>
         <!--  <a href="view_all_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box --> 
        <?php

        $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket where `ticket_type`='Sub-Task'");
        while ($row = mysql_fetch_array($res)) {
          ?>

          <div class="small-box bg-red Sub-Task">
            <div class="inner">
             <h3><?php echo $row['NumberOfTicket']; ?></h3>
             <?php
           }
           ?>
           <p>Sub-Tasks</p>
         </div>
         <div class="icon">
          <i class="fa fa-tasks"></i>
        </div>
        <!-- <a href="view_all_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
      </div>
    </div>
    <!-- ./col -->
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box --> 
      <?php

      $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket where `ticket_type`='Bug'");
      while ($row = mysql_fetch_array($res)) {
        ?>

        <div class="small-box bg-red Bug">
          <div class="inner">
           <h3><?php echo $row['NumberOfTicket']; ?></h3>
           <?php
         }
         ?>
         <p>Bugs</p>
       </div>
       <div class="icon">
        <i class="fa fa-bug"></i>
      </div>
     <!--  <a href="view_all_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
    </div>
  </div>
  <!-- ./col -->

   <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box --> 
      <?php

      $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket where `ticket_type`='New-Feature'");
      while ($row = mysql_fetch_array($res)) {
        ?>

        <div class="small-box bg-red New-Feature">
          <div class="inner">
           <h3><?php echo $row['NumberOfTicket']; ?></h3>
           <?php
         }
         ?>
         <p>New-Features</p>
       </div>
       <div class="icon">
        <i class="fa fa-plus"></i>
      </div>
     <!--  <a href="view_all_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
    </div>
  </div>
  <!-- ./col -->
   <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box --> 
      <?php

      $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket where `ticket_type`='Improvement'");
      while ($row = mysql_fetch_array($res)) {
        ?>

        <div class="small-box bg-red Improvement">
          <div class="inner">
           <h3><?php echo $row['NumberOfTicket']; ?></h3>
           <?php
         }
         ?>
         <p>Improvement</p>
       </div>
       <div class="icon">
        <i class="fa fa-arrow-up"></i>
      </div>
     <!--  <a href="view_all_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
    </div>
  </div>
  <!-- ./col -->
</div>
<!--admin view ticket type--->



<!--agent --view ticket status--->
<div class="row" ng-if="<?php echo $_SESSION['role']== 'agent';?>">
        <!-- Small boxes (Stat box) -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
          include '../dbconnection/connect.inc.php';
          $user= $_SESSION['sess_user'];
          $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket where `ticket_assigned_to` = '$user'");
          while ($row = mysql_fetch_array($res)) {
            ?>
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><?php echo $row['NumberOfTicket']; ?></h3>
                <?php
              }
              ?>
              <p>Total Ticket</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-photos"></i>
            </div>
           <!--  <a href="view_all_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php

          $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket where `ticket_status`='Completed' and `ticket_assigned_to` = '$user'");

          while ($row = mysql_fetch_array($res)) {
            ?>
            <div class="small-box bg-green">
              <div class="inner">
               <h3><?php echo $row['NumberOfTicket']; ?></h3>
               <?php
             }
             ?>
             <p>Completed Ticket</p>
           </div>
           <div class="icon">
             <i class="ion ion-ios-trophy" ></i>
          </div>
          <!-- <a href="assigned_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      <!-- ./col -->


      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <!-- small box -->
        <?php

        $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket where `ticket_status`='In-Progress' and `ticket_assigned_to` = '$user'");
        while ($row = mysql_fetch_array($res)) {
          ?>
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $row['NumberOfTicket']; ?></h3>
              <?php
            }
            ?>
            <p>In Progress Ticket</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-construct"></i>
          </div>
          <!-- <a href="assigned_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box --> 
        <?php

        $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket where `ticket_status`='Hold' and `ticket_assigned_to` = '$user'");
        while ($row = mysql_fetch_array($res)) {
          ?>

          <div class="small-box bg-red">
            <div class="inner">
             <h3><?php echo $row['NumberOfTicket']; ?></h3>
             <?php
           }
           ?>
           <p>Hold Tickets</p>
         </div>
         <div class="icon">
          <i class="ion ion-ios-stopwatch"></i>
        </div>
       <!--  <a href="assigned_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
      </div>
    </div>
    <!-- ./col -->
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box --> 
      <?php

      $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket where `ticket_status`='To-Do' and `ticket_assigned_to` = '$user'");
      while ($row = mysql_fetch_array($res)) {
        ?>

        <div class="small-box bg-gray">
          <div class="inner">
           <h3><?php echo $row['NumberOfTicket']; ?></h3>
           <?php
         }
         ?>
         <p>To-Do Tickets</p>
       </div>
       <div class="icon">
        <i class="fa fa-clipboard-list"></i>
      </div>
     <!--  <a href="assigned_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
    </div>
  </div>
  <!-- ./col -->
</div>
<!--agent --view ticket status--->
<!--agent --view ticket type--->
 <div class="row" ng-if="<?php echo $_SESSION['role']== 'agent';?>">

        <!-- Small boxes (Stat box) -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
          include '../dbconnection/connect.inc.php';
          $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket where `ticket_type`='Epic'");
          while ($row = mysql_fetch_array($res)) {
            ?>
            <div class="small-box bg-red Epic">
              <div class="inner">
                <h3><?php echo $row['NumberOfTicket']; ?></h3>
                <?php
              }
              ?>
              <p>Total Epic</p>
            </div>
            <div class="icon">
             <i class="fa fa-bolt"></i>
            </div>
          <!--   <a href="view_all_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php

          $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket where `ticket_type`='Story'");
          while ($row = mysql_fetch_array($res)) {
            ?>
            <div class="small-box bg-red  Story">
              <div class="inner">
               <h3><?php echo $row['NumberOfTicket']; ?></h3>
               <?php
             }
             ?>
             <p>Story</p>
           </div>
           <div class="icon">
             <i class="fa fa-bookmark"></i>
          </div>
         <!--  <a href="view_all_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      <!-- ./col -->


      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <!-- small box -->
        <?php

        $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket where `ticket_type`='Task'");
        while ($row = mysql_fetch_array($res)) {
          ?>
          <div class="small-box bg-yellow Task">
            <div class="inner">
              <h3><?php echo $row['NumberOfTicket']; ?></h3>
              <?php
            }
            ?>
            <p>Tasks</p>
          </div>
          <div class="icon">
            <i class="fa fa-check-square"></i>
          </div>
         <!--  <a href="view_all_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box --> 
        <?php

        $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket where `ticket_type`='Sub-Task'");
        while ($row = mysql_fetch_array($res)) {
          ?>

          <div class="small-box bg-red Sub-Task">
            <div class="inner">
             <h3><?php echo $row['NumberOfTicket']; ?></h3>
             <?php
           }
           ?>
           <p>Sub-Tasks</p>
         </div>
         <div class="icon">
          <i class="fa fa-tasks"></i>
        </div>
        <!-- <a href="view_all_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
      </div>
    </div>
    <!-- ./col -->
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box --> 
      <?php

      $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket where `ticket_type`='Bug'");
      while ($row = mysql_fetch_array($res)) {
        ?>

        <div class="small-box bg-red Bug">
          <div class="inner">
           <h3><?php echo $row['NumberOfTicket']; ?></h3>
           <?php
         }
         ?>
         <p>Bugs</p>
       </div>
       <div class="icon">
        <i class="fa fa-bug"></i>
      </div>
     <!--  <a href="view_all_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
    </div>
  </div>
  <!-- ./col -->

   <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box --> 
      <?php

      $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket where `ticket_type`='New-Feature'");
      while ($row = mysql_fetch_array($res)) {
        ?>

        <div class="small-box bg-red New-Feature">
          <div class="inner">
           <h3><?php echo $row['NumberOfTicket']; ?></h3>
           <?php
         }
         ?>
         <p>New-Features</p>
       </div>
       <div class="icon">
        <i class="fa fa-plus"></i>
      </div>
     <!--  <a href="view_all_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
    </div>
  </div>
  <!-- ./col -->
   <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box --> 
      <?php

      $res = mysql_query("SELECT COUNT(ticket_title) AS NumberOfTicket FROM ticket where `ticket_type`='Improvement'");
      while ($row = mysql_fetch_array($res)) {
        ?>

        <div class="small-box bg-red Improvement">
          <div class="inner">
           <h3><?php echo $row['NumberOfTicket']; ?></h3>
           <?php
         }
         ?>
         <p>Improvement</p>
       </div>
       <div class="icon">
        <i class="fa fa-arrow-up"></i>
      </div>
     <!--  <a href="view_all_tickets.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
    </div>
  </div>
  <!-- ./col -->
</div>
<!--agent view ticket type-->
</section>
<!-- /.content -->
<?php }
?>

</div>