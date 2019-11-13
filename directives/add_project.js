angular.module('ticketApp').directive('addProject',["$http", "ApiService", function($http, ApiService){
	return {
		replace : true,
		restrict : 'EA',
		transclude: false,
		scope:{
			edit: '&'
		},
		link: function($scope){
			 $scope.btnName="ADD";
     $scope.loader = true;
     $scope.PageSize = "10";
    $scope.insertData=function(){
       $scope.loader = true;
      $http.post(
            "resources/insert_project.php",
            {'project_name':$scope.project_name,
            'project_short_name':$scope.project_short_name,
             'btnName':$scope.btnName,
              'id':$scope.id
        }
        ).success(function(response){
          $scope.project_name='';
        $scope.project_short_name='';
          $scope.btnName="ADD";
          alert(response);
          $scope.loader= false;
          $scope.displayData();
        });  
      }
      $scope.displayData=function(){
        $http.get("resources/select_project.php")
        .success(function(data){
         $scope.projects=data;
          $scope.btnName="ADD";
          $scope.loader= false;
        });
   }
   $scope.displayData();
      $scope.resetData= function(){
       $scope.project_name=null;
        $scope.project_short_name=null;
          $scope.btnName="ADD";
          $scope.displayData();
      }
      $scope.updateData=function(project_id,project_name,project_short_name){
        $scope.id = project_id;
        $scope.btnName="Update";
        $scope.project_name=project_name;
        $scope.project_short_name=project_short_name;
      }
      $scope.deleteData=function(id){
        if(confirm("Are you sure want to delete?")){
          $http.post("resources/delete_project.php",{'project_id':id})
          .success(function(response){
            alert(response);
            $scope.displayData();
                 
          });
        }else {
          return false;
        }
      }
      $scope.sort_with = function(base){
        $scope.base = base;
        $scope.reverse = !$scope.reverse;
      };

		
		},
		templateUrl: 'pages/add-project.php'
	};
}]);