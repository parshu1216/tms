<div><!-- Main content -->
   <?php
session_start();
if (!isset($_SESSION['sess_user'])) {
  echo "<script>location.assign('404.php')</script>";
}
else{
  $user_role = $_SESSION['role'];

  ?> 
    <div class="loading" ng-show="loader"></div>

    <section class="content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add Ticket</h3>
        </div>
        <!-- form start enctype="multipart/form-data" action="resources/insert_ticket.php" -->
        <form method="post" name="addticketForm">
          <div class="box-body">
           <!--  <div class="form-group">
              <label for="exampleInputEmail1">Project Name</label>
              <select name="project_name" ng-model="project_name" ng-required="true" class="form-control" >
                <option ng-repeat="x in projects" >{{x.project_name}}</option>
              </select>
            </div> -->
            <!---->
            <div class="row">
              <div class="col-sm-4">
            <div class="btn-group" ng-if="!selectedProject.length > 0">
              <button type="button" class="btn btn-default"><i class="fa fa-product-hunt text-purple "></i> Project Name</button>
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#"><input type="text" name="" class="form-control" placeholder="search Projects" ng-model="findProject"></a></li>
                <li ng-repeat="x in projects | filter:findProject"><a href="#" ng-checked="existProject(x)"   ng-click="toggleSelectionProject(x)"><span class="label text-purple"><i class="fa fa-product-hunt "></i></span>&nbsp;{{x.project_name}}</a></li>
              </ul>
            </div>
            <div class="form-group" ng-if="selectedProject.length > 0">
             <i class="fa fa-product-hunt text-purple "></i> Project Name
              <label ng-repeat="x in selectedProject" >
               <!--  <input type="text" disabled name="ticket.ticket_type" ng-model="ticket.ticket_type" placeholder="{{x.name}}" ng-value="{{x.name}}"> -->
                 <span class="label text-purple"><i class="fa fa-microchip "></i></span>{{x}}
               </label>
              <a href="" ng-model="clear" ng-click="clearProject()"><span><i class="fa fa-times-circle text-red"></i></span></a>
            </div>
          </div>
          <div class="col-sm-4">
               <div class="btn-group" ng-if="!selectedTicketType.length > 0">
              <button type="button" class="btn btn-default"> <i class="fa fa-ticket text-green"></i>&nbsp;Ticket Type</button>
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li ng-repeat="x in ticketType"><a href="#" ng-checked="exist(x)"   ng-click="toggleSelection(x)"><span class="label {{x.name}}"><i class="{{x.icon}}"></i></span>&nbsp;{{x.name}}</a></li>
              </ul>
            </div>
            <div class="form-group" ng-if="selectedTicketType.length > 0">
             <i class="fa fa-ticket text-green"></i>&nbsp;Ticket Type
              <label ng-repeat="x in selectedTicketType" >
               <!--  <input type="text" disabled name="ticket.ticket_type" ng-model="ticket.ticket_type" placeholder="{{x.name}}" ng-value="{{x.name}}"> -->
                 <span class="label {{x.name}}"><i class="{{x.icon}}"></i></span> {{x.name}}
               </label>
              <a href="" ng-model="clear" ng-click="clearTicketType()"><span><i class="fa fa-times-circle text-red"></i></span></a>
            </div>
          </div>
          <div class="col-sm-4">
              <div class="btn-group" ng-if="!selectedAgent.length > 0">
              <button type="button" class="btn btn-default"><i class="fa fa-user text-primary "></i>&nbsp;Ticket Assigned To</button>
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#"><input type="text" name="" class="form-control" placeholder="search Agents" ng-model="findAgent"></a></li>
                <li ng-repeat="x in agents | filter:findAgent"><a href="#" ng-checked="existAgent(x)"   ng-click="toggleSelectionAgent(x)"><span class="label text-purple"><i class="fa fa-user"></i></span>&nbsp;{{x.userID}}</a></li>
              </ul>
            </div>
            <div class="form-group" ng-if="selectedAgent.length > 0">
             <i class="fa fa-user text-primary "></i>&nbsp;Ticket Assigned To
              <label ng-repeat="x in selectedAgent" >
               <!--  <input type="text" disabled name="ticket.ticket_type" ng-model="ticket.ticket_type" placeholder="{{x.name}}" ng-value="{{x.name}}"> -->
                 <span class="label text-purple"><i class="fa fa-user "></i></span>{{x}}
               </label>
              <a href="" ng-model="clear" ng-click="clearAgent()"><span><i class="fa fa-times-circle text-red"></i></span></a>
            </div>
          </div>
          </div>
          <br>

     <!--        <div class="dropdown">
          }
          }
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
   Ticket Type
    <span class="caret"></span>
  </button>
  <ul id="dropselect-demo1" class="dropdown-menu" role="menu" ng-model="ticket.ticket_type" aria-labelledby="dropdownMenu1">
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#"> <i class="fa fa-file"></i>Action</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
    <li role="presentation" class="divider"></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
     <li ng-repeat="x in ticketType"><a href="#" ng-model="ticket.ticket_type"> <input type="checkbox" name="ticket.ticket_type"   ng-required="true" value="{{x}}"> <span class="label label-default {{x}}">&nbsp;<i class="fa fa-dashboard"></i></span>&nbsp;{{x}}</a></li>
  </ul>
</div> -->

           <!--  <div class="form-group">
              <label>Ticket Type</label>
              <select name="ticket.ticket_type" ng-model="ticket.ticket_type" ng-required="true" class="form-control">
                <option ng-repeat="x in ticketType" value="{{x}}"><span><i class="fa fa-file text-yellow"></i></span>{{x}}</option>

              </select>
            </div> -->
<!-- <div class="ui selection dropdown">
  <input type="hidden" name="gender">
  <i class="dropdown icon"></i>
  <div class="default text">Gender</div>
  <div class="menu">
    <div class="item" data-value="male" data-text="Male">
      <i class="male icon"></i>
      Male
    </div>
    <div class="item" data-value="female" data-text="Female">
      <i class="female icon"></i>
      Female
    </div>
  </div>
</div>
 -->

           <!--  <div class="form-group" >
              <label for="exampleInputEmail1">Ticket Number</label>
              <input type="text" name="ticket.ticket_number" class="form-control" required placeholder="Ticket Number">
              
            </div> -->
            <div class="form-group" >
              <label for="exampleInputEmail1">Ticket Title</label>
              <input type="text" name="ticket.ticket_title"  ng-model="ticket.ticket_title" class="form-control" ng-required="true" placeholder="Ticket Title">

            </div>
            <!--  <div class="form-group" >
              <label for="exampleInputEmail1">Ticket Description</label>
              <textarea name="ticket.ticket_description" ng-model="ticket.ticket_description" id="editor" class="form-control"  placeholder="Ticket Description"></textarea>
            </div> -->
            <textarea id="mytextarea" name="mytextarea">Hello, World!</textarea>

            
           <!--  <div class="form-group" >
              <label for="exampleInputEmail1">Comment</label>
              <input type="text" name="ticket.ticket_comment" class="form-control" required placeholder="Ticket Comment">
            </div> -->
             <!-- <div class="form-group">
              <label for="exampleInputEmail1">Ticket Assigned To</label>
              <select name="ticket.ticket_assigned_to"  ng-model="ticket.ticket_assigned_to" ng-required="true" class="form-control" >
                <option ng-repeat="x in agents" value="{{x.userID}}" >{{x.userID}}</option>
              </select>
            </div> -->
              <input type="hidden" name="ticket.ticket_status" ng-model="ticket.ticket_status"  value="To-Do" class="form-control">
              <input type="hidden" name="ticket.ticket_created_by" ng-model="ticket.ticket_created_by" value="<?php echo $_SESSION['sess_user']; ?>" class="form-control" >
         <!--    <div class="form-group">
                      <label for="exampleInputFile">Attachment</label>
                      <input type="file" name="image" id="image">
                      <p>Note: Please select image with alphabetical name like tehran,jpg. Don't select image with name 1-tehran or any other format</p>
                      <strong>Best Resolution to be uploaded:1024x618</strong>
                    </div> -->
           
            <div class="box-footer">
               <input type="submit" name="btnInsert" class="btn btn-info" ng-click="insertData()" value="{{btnName}}" ng-disabled="addticketForm.$invalid" />
            </div>
          </div>
        </form>
      </div><!--form action--> 
  </section>
  <?php }
?>
  </div> 
