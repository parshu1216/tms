/*	var app = angular.module('ticketApp', []);
	 app.controller('ticketController',function($scope,$http){
    $scope.loader = true;
    $scope.displayData=function(){
    $scope.loader = false;
  }
  });

	 app.directive("navbarDirective", function() {
    return {
        restrict : "EA",
        templateUrl : 'pages/navbar-view.php'
    };
});

	 app.directive("dashboardLinkDirective", function() {
    return {
        restrict : "EA",
        templateUrl : 'pages/dashboard-links.php'
    };
});
*/

(function(){
	var app = angular.module("ticketApp", ["angularUtils.directives.dirPagination","xeditable"]);
      app.run(['editableOptions', function(editableOptions) {
  editableOptions.theme = 'bs3'; // bootstrap3 theme. Can be also 'bs4', 'bs2', 'default'
}]);

	var appController = function($scope, $http){
    $scope.loader = true;
    $scope.add_ticket = false;
    $scope.dash_board = true;
     $scope.view_all_tickets = false;
     $scope.view_assigned_tickets = false;
     $scope.add_project = false;
    $scope.loaderDisplay=function(){
    $scope.loader = false;
  }
  $scope.dashboard = function(){
    
      $scope.dash_board = true;
    $scope.add_ticket = false;
     $scope.view_assigned_tickets = false;
     $scope.view_all_tickets = false;
      $scope.add_project = false;
  }
  $scope.addTicket = function(){
     $scope.dash_board = false;
    $scope.add_ticket = true;
     $scope.view_assigned_tickets = false;
     $scope.view_all_tickets = false;
      $scope.add_project = false;
  }
   $scope.assginedTicket = function(){
         $scope.dash_board = false;
     $scope.add_ticket = false;
      $scope.view_assigned_tickets = true;
     $scope.view_all_tickets = false;
      $scope.add_project = false;
  }
  $scope.viewTicket = function(){
         $scope.dash_board = false;
     $scope.add_ticket = false;
     $scope.view_all_tickets = true;
      $scope.view_assigned_tickets = false;
       $scope.add_project = false;
  }

  $scope.addProject = function(){
       $scope.dash_board = false;
     $scope.add_ticket = false;
     $scope.view_all_tickets = false;
      $scope.view_assigned_tickets = false;
       $scope.add_project = true;
  }
	}
	app.controller("ticketController", appController);
}());


