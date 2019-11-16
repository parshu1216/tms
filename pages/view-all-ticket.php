  <div>
   <?php
   session_start();
   if (!isset($_SESSION['sess_user'])) {
    echo "<script>location.assign('404.php')</script>";
  }
  else{
    ?>
    <div class="loading" ng-show="loader"></div>
    <!-- Main content -->
    <section class="content">
     <div class="box box-primary" ng-show="view_all_tickets">
      <div class="box-header with-border">
       <h3 class="box-title">View All Ticket</h3>
     </div>
     <div class="container-fluid">
       <div class="row">
        <div class="col-sm-2">

         <input type="text" name="search" placeholder="Search" ng-model="search" class="form-control">
       </div>
       <div class="col-sm-2">

         <input type="text" name="search" placeholder="Ticket Number" ng-model="search_by_ticket_number" class="form-control">
       </div>    

       <div class="col-sm-2">
         <div class="btn-group">
          <button type="button" class="btn btn-default"> Select Status</button>
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
           <span class="caret"></span>
           <span class="sr-only">Toggle Dropdown</span>
         </button>
         <ul class="dropdown-menu" role="menu">
           <li><a href="#"><input type="text" name="" class="form-control" placeholder="search status" ng-model="findStatus"></a></li>
           <li><a href="#"><input type="checkbox" name="" ng-model="selectAll" ng-click="checkAll()">&nbsp;Select/Deselect All</a></li>
           <li class="divider"></li>
           <li ng-repeat="x  in status2 | filter:findStatus"><a href="#"><input type="checkbox" name="" ng-model="selected" ng-checked="exist(x)" ng-click="toggleSelection(x)">&nbsp;{{x.text}} </a></li>
         </ul>
       </div>
     </div>
     <div class="col-sm-2">
       <div class="btn-group">
        <button type="button" class="btn btn-default"> Select Agent</button>
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
         <span class="caret"></span>
         <span class="sr-only">Toggle Dropdown</span>
       </button>
       <ul class="dropdown-menu" role="menu">
         <li><a href="#"><input type="text" name="" class="form-control" placeholder="search Agent" ng-model="findStatus"></a></li>
         <li><a href="#"><input type="checkbox" name="" ng-model="selectAllAgent" ng-click="checkAllAgent()">&nbsp;Select/Deselect All</a></li>
         <li class="divider"></li>
         <li  ng-repeat="agent  in agents | filter:findAgent"><a href="#"><input type="checkbox" name="" ng-model="selectedAgent" ng-checked="existAgent(agent)" ng-click="toggleSelectionAgent(agent)">&nbsp;{{agent.userID}} </a></li>
       </ul>
     </div>
   </div>
   <div class="col-sm-2">
     <select class="form-control" ng-model="PageSize">
      <option value="5" >5</option>
      <option ng-selected="true"  value="10">10</option>
      <option value="20">20</option>
      <option  value="30">30</option>
      <option  value="99999999999">All</option>
    </select>
  </div>
</div>
<br>
<div class="row">
 <div class="col-sm-4">
  <div class="form-group" ng-if="selectedStatus.length > 0">
   <i class="fas fa-exclamation-circle text-purple"></i>&nbsp; Status:
   <label ng-repeat="x in selectedStatus" >
     <!--  <input type="text" disabled name="ticket.ticket_type" ng-model="ticket.ticket_type" placeholder="{{x.name}}" ng-value="{{x.name}}"> -->
     <span class="label text-purple"></span>{{x}},

   </label>
   <!--  <a href="" ng-click="clearStatus(x)"><span><i class="fa fa-times-circle text-red"></i></span></a> -->

 </div>
 <div class="form-group" ng-if="selectedStatus.length == 0">
   <i class="fas fa-exclamation-circle  text-purple"></i>&nbsp;Status:
   <label>
     <!--  <input type="text" disabled name="ticket.ticket_type" ng-model="ticket.ticket_type" placeholder="{{x.name}}" ng-value="{{x.name}}"> -->
     <span class="label text-primary"></span>None,
   </label>
 </div>
</div>
<div class="col-sm-4">
  <div class="form-group" ng-if="selectedAgent.length > 0">
   <i class="fa fa-user text-primary "></i> Agent:
   <label ng-repeat="x in selectedAgent" >
     <!--  <input type="text" disabled name="ticket.ticket_type" ng-model="ticket.ticket_type" placeholder="{{x.name}}" ng-value="{{x.name}}"> -->
     <span class="label text-primary"></span>{{x}},

   </label>
   <!--  <a href="" ng-click="clearStatus(x)"><span><i class="fa fa-times-circle text-red"></i></span></a> -->

 </div>
 <div class="form-group" ng-if="selectedAgent.length == 0">
   <i class="fa fa-user text-primary "></i> Agent:
   <label>
     <!--  <input type="text" disabled name="ticket.ticket_type" ng-model="ticket.ticket_type" placeholder="{{x.name}}" ng-value="{{x.name}}"> -->
     <span class="label text-primary"></span>None,
   </label>
 </div>
</div>
</div>
</div>
<div class="container-fluid">
 <div class="table-responsive">
   <table id="myTable" class="table table-striped">

    <thead>
     <tr>

      <strong><th>Sr No&nbsp;<a ng-click="sort_with('ticket_id');"><i class="glyphicon glyphicon-sort"></i></a></th>
        <th>Ticket Number&nbsp;<a ng-click="sort_with('ticket_number');"><i class="glyphicon glyphicon-sort"></i></a></th>
        <!--  <th>Project Name&nbsp;<a ng-click="sort_with('project_name');"><i class="glyphicon glyphicon-sort"></i></a></th> -->
        <th>Ticket Title&nbsp;<a ng-click="sort_with('ticket_title');"><i class="glyphicon glyphicon-sort"></i></a></th>
        <!--  <th>Ticket Description&nbsp;<a ng-click="sort_with('ticket_description');"><i class="glyphicon glyphicon-sort"></i></a></th> -->
        <th>Assigned To&nbsp;<a ng-click="sort_with('ticket_assigned_to');"><i class="glyphicon glyphicon-sort"></i></a></th>
        <th>Created By &nbsp;<a ng-click="sort_with('ticket_created_by');"><i class="glyphicon glyphicon-sort"></i></a></th>
        <th>Created At &nbsp;<a ng-click="sort_with('ticket_created_at');"><i class="glyphicon glyphicon-sort"></i></a></th>
        <th ng-if="<?php echo $_SESSION['role']== 'admin';?>">Updated By &nbsp;<a ng-click="sort_with('ticket_updated_by');"><i class="glyphicon glyphicon-sort"></i></a></th>
        <th>Ticket Status &nbsp;<a ng-click="sort_with('ticket_status');"><i class="glyphicon glyphicon-sort"></i></a></th>
      </strong>

    </tr>
  </thead>
  <tbody>
   <tr dir-paginate="x in filteredTickets | filter:search | filter:search_by_ticket_number |itemsPerPage:PageSize |orderBy :base:reverse">
    <td>{{x.ticket_id}}</td>
    <td>{{x.ticket_number }}</td>
    <td><span class="label {{x.ticket_type}}"><i class="{{x.ticket_icon}}"></i></span>&nbsp;<a href="" ng-click="viewTicket(x.ticket_id)">{{ x.ticket_title}}</a> </td>
    <td>{{x.ticket_assigned_to }}</a></td>
    <td>{{x.ticket_created_by}}</td>
    <td>{{x.ticket_created_at}}</td>
    <td  ng-if="<?php echo $_SESSION['role']== 'admin';?>">{{x.ticket_updated_by}}</td>
    <td><a href="#" editable-select="x.ticket_status" e-ng-options="status.text as status.text for status in status" onbeforesave="updateStatus($data,x.ticket_id)"   > <span class="label label-default {{x.ticket_status}}">{{x.ticket_status || "empty"  }}</span></a></td>
    <td ng-if="<?php echo $_SESSION['role']== 'admin';?>"><button type="button" class="btn btn-danger btn-sm" ng-click="deleteData(x.ticket_id)">
      <span class="glyphicon glyphicon-trash"></span> 
    </button></td>
  </tr>
</tbody>
</table>
<dir-pagination-controls 
max-size="5"
direction-links="true"
boundary-links="true">
</dir-pagination-controls>
</div>
</div>
</div>

<div  class="box box-primary" ng-show="view_Ticket" >

  <div class="container-fluid" ng-repeat="x in ticket_views ">
   <div class="box-header with-border">
    <p>{{x.ticket_number}}</p>
    <h3 class="box-title"><span editable-textarea="x.ticket_title" onbeforesave="updateTitle($data,x.ticket_id)" >{{x.ticket_title  || "empty" }}</span></h3>
  </div>
  <div class="row">
   <div class="col-md-8">
     <div class="box-group" id="accordion">
      <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
      <div class="panel box box-primary">
        <div class="box-header with-border">
          <strong> Details:</strong>
          <div class="pull-right">
            <button type="button" data-toggle="tooltip" title="Back" data-placement="top" class="btn btn-default btn-sm" ng-click="back()">
              <span class="glyphicon glyphicon-arrow-left"></span> 
            </button>
          </div>
        </div>
        <div id="collapseOne" class="panel-collapse">
          <div class="box-body">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Ticket Type</th>
                  <th scope="col" ng-if="selectedTicketType.length > 0">
                    <div class="form-group" >
                     <i class="fa fa-ticket text-green"></i>&nbsp;Ticket Type
                     <label ng-repeat="x in selectedTicketType" >
                       <span class="label {{x.name}}"><i class="{{x.icon}}"></i></span> {{x.name}}
                     </label>
                     <a href="" ng-model="clear" ng-click="clearTicketType()"><span><i class="fa fa-times-circle text-red"></i></span></a>
                     <a href=""  ng-click="updateTicketType(x.ticket_id,x.ticket_type,x.ticket_icon)"><span><i class="fa fa-check-square text-green"></i></span></a>
                   </div>
                 </th>
                 <th scope="col" ng-if="!selectedTicketType.length > 0">
                   <div class="btn-group" >
                    <button type="button" class="btn btn-default btn-sm"> <i class="{{x.ticket_icon}} text-green"></i>&nbsp;{{x.ticket_type}}</button>
                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li ng-repeat="x in ticketType"><a href="#" ng-checked="existTicketType(x)"   ng-click="toggleSelectionTicketType(x)"><span class="label {{x.name}}"><i class="{{x.icon}}"></i></span>&nbsp;{{x.name}}</a></li>
                    </ul>
                  </div>
                </th>
                <th scope="col">Ticket Status</th>
                <th scope="col">
                  <a href="#" editable-select="x.ticket_status" e-ng-options="status.text as status.text for status in status" onbeforesave="updateStatus($data,x.ticket_id)"  > <span class="label label-default {{x.ticket_status}}">{{x.ticket_status || "empty"}}</span></a>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Assigned To</th>
                <td><a href="#" editable-select="x.ticket_assigned_to"  e-ng-options="agent.userID as agent.userID for agent in agents" onbeforesave="updateAssignedTo($data,x.ticket_id)" >&nbsp;{{x.ticket_assigned_to || "empty"}}</a></td>
                <td><strong>Ticket Created By:</strong></td>
                <td>{{x.ticket_created_by}}</td>
              </tr>
              <tr>
                <th scope="row">Created At:</th>
                <td>{{x.ticket_created_at}}</td>
                <td><strong>Ticket Updated:</strong></td>
                <td>{{x.ticket_updated_at}}</td>
              </tr>
              <tr>
                <th scope="row">Ticket Updated By:</th>
                <td>{{x.ticket_updated_by}}</td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-4">
               <div class="box-group" id="accordion">
        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
        <div class="panel box box-primary">
          <div class="box-header with-border">
            <h4 class="box-title">
              <button class="btn btn-default" data-toggle="collapse" data-parent="#accordion" href="#AddComment"  ng-click="addComment(x.ticket_id,comment)"> <i class="fa fa-comment-o"></i></button>
            </h4>
          </div>
          <div id="AddComment" class="panel-collapse collapse">
            <div class="box-body">
             <form method="post" name="add_comment">
              <input type="hidden" name="id" ng-model="id" class="form-control"><br>
              <input type="text" name="comment" ng-model="comment" class="form-control" required placeholder="Write your comment"><br>
              <!-- <input type="submit" value="Submit" name="submit" class="btn btn-info"> -->
              <!-- <input type="text" name="id" ng-model="id">  -->
              <input type="submit" name="btnInsert" class="btn btn-info" ng-click="insertData(x.ticket_id,comment)" value="{{btnName}}" ng-disabled="add_comment.$invalid" />
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="box-group" id="accordion">
        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
        <div class="panel box box-primary">
          <div class="box-header with-border">
            <h4 class="box-title">
              <button class="btn btn-default btn-sm" data-toggle="collapse" data-parent="#accordion" href="#People"><i class="fa fa-user"></i>&nbsp; People</button>
            </h4>
          </div>
          <div id="People" class="panel-collapse collapse">
            <div class="box-body">
              <tr>
                <th>Assigned To</th>
                <td><a href="#" editable-select="x.ticket_assigned_to"  e-ng-options="agent.userID as agent.userID for agent in agents" onbeforesave="updateAssignedTo($data,x.ticket_id)" >&nbsp;{{x.ticket_assigned_to || "empty"}}</a></td><br>
                <td><strong>Created By:</strong></td>
                <td>{{x.ticket_created_by}}</td>
              </tr>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
<div class="row">
    <div class="col-md-8">
 <div class="box-group" id="accordion">
        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
        <div class="panel box box-primary">
          <div class="box-header with-border">
              <strong> Description:</strong>
              <div class="pull-right">
              <button class="btn btn-default btn-sm" ng-click="descriptionBtnForm.$show()" ng-hide="descriptionBtnForm.$visible"><i class="glyphicon glyphicon-pencil"></i></button>
            </div>
          </div>
          <div class="box-body">
        <span editable-textarea="x.ticket_description" e-cols="50" e-form="descriptionBtnForm" onbeforesave="updateDescription($data,x.ticket_id)" >{{x.ticket_description  || "empty" }}</span>
      </div>
      </div>
</div>
</div>
</div>
</div>
<br>
<div class="box box-primary" ng-show="show_comments">
  <div class="box-header with-border">
    <h3 class="box-title">Comment Log</h3>
  </div>
  <div class="container-fluid" ng-repeat="x in comments">
    <ul class="timeline" >
      <!-- timeline time label -->
      <li class="time-label">
        <span class="bg-red">
          {{x.comment_date}}
        </span>
      </li>
      <!-- timeline item -->
      <li>
        <i class="fa fa-envelope bg-blue"></i>

        <div class="timeline-item">
          <span class="time"><i class="fa fa-clock-o"></i>{{x.comment_time}}</span>

          <h3 class="timeline-header"><a href="">{{x.comment_by}}</a></h3>

          <div class="timeline-body">
           {{x.comment}}
         </div>
         <div class="timeline-footer">
           <!--  <a class="btn btn-primary btn-xs">Read more</a> -->
           <a class="btn btn-danger btn-xs" ng-click="deleteComment(x.comment_id)"><i class="fa fa-trash"></i></a>
         </div>
       </div>
     </li>
     <!-- END timeline item -->
   </ul>
 </div>
</div>
</div>

</section>
<?php }
?>
</div>