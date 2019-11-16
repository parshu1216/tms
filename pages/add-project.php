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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-sm-4">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add Project</h3>
        </div>
        <!-- form start -->
        <form method="post" name="add_project">
          <div class="box-body">
                       <input type="hidden" name="project_id" ng-model="project_id">

            <div class="form-group">
              <label for="exampleInputEmail1">Project Name</label>
              <input type="text" name="project_name" ng-model="project_name" class="form-control" required placeholder="Project Name Heading">
            </div>
             <div class="form-group">
              <label for="exampleInputEmail1">Project Short Name</label>
              <input type="text" name="project_short_name" ng-model="project_short_name" class="form-control" required placeholder="Project Short Name">
            </div>
            <div class="box-footer">
            <div class="box-footer">
              <input type="submit" name="btnName" class="btn btn-info" value="{{btnName}}" ng-disabled="add_project.$invalid"  ng-click="insertData()"/>
              <input type="reset" name="reset" class="btn btn-info" value="Reset" ng-click="resetData()" />
                      </div>
            </div>
          </div>
        </form><!--form action--> 
      </div>
      </div>
       <div class="col-sm-8">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Projects</h3>
      </div>
        <div class="container-fluid">
      <div class="row">
      <div class="col-sm-4">
        <label>Search</label>
        <input type="text" name="search" ng-model="search" class="form-control">
      </div>
      <div class="col-sm-2">
       <label>Page Size</label>
       <select class="form-control" ng-model="PageSize">
        <option value="5" >5</option>
        <option value="10">10</option>
        <option value="20">20</option>
        <option  value="30">30</option>
      </select>&nbsp;
    </div>
    </div>
  </div>
    <br>
    <div class="container-fluid">
        <div class="table-responsive">
        <table id="myTable" class="table table-striped">
       <tr>

        <strong><th>Sr No&nbsp;<a ng-click="sort_with('project_id');"><i class="glyphicon glyphicon-sort"></i></a></th>
          <th>Project Name&nbsp;<a ng-click="sort_with('project_name');"><i class="glyphicon glyphicon-sort"></i></a></th>
           <th>Project Short Name&nbsp;<a ng-click="sort_with('project_short_name');"><i class="glyphicon glyphicon-sort"></i></a></th>
          <th>Project Start Date&nbsp;<a ng-click="sort_with('project_start_date');"><i class="glyphicon glyphicon-sort"></i></a></th>
         
          <!-- <th>Thumbnail&nbsp;<a ng-click="sort_with('attachment_url');"><i class="glyphicon glyphicon-sort"></i></a></th> -->
           <th>Update</th>
          <th>Delete</th></strong>

        </tr>
        <tr dir-paginate="x in projects | filter:search |itemsPerPage:PageSize |orderBy :base:reverse">
          <td>{{x.project_id}}</td>
          <td>{{x.project_name}}</td>
          <td>{{x.project_short_name}}</td>
          <td>{{x.project_start_date}}</td>
          <!-- <td><img style="width: 100px; height: 100px;" src="{{x.attachment_url}}"></td> -->
              <!-- <td>{{x.enquiry}}</td>
              <td>{{x.status}}</td>
              <td>{{x.remark}}</td> -->
               <td><button type="button" class="btn btn-info btn-sm"
               ng-click="updateData(x.project_id,x.project_name,x.project_short_name)">
          <span class="glyphicon glyphicon-pencil"></span>
        </button></td>
              <td><button type="button" class="btn btn-danger btn-sm" ng-click="deleteData(x.project_id)">
                <span class="glyphicon glyphicon-trash"></span> 
              </button></td>
            </tr>

          </table>
          <dir-pagination-controls 
          max-size="5"
          direction-links="true"
          boundary-links="true">
        </dir-pagination-controls>
      </div>
    </div>
    </div>
  </div>
    </div>
  </section>
  <?php }
?>
  </div> 
