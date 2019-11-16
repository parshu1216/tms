angular.module('ticketApp').directive('dashboardDirective',["$http", "ApiService", function($http, ApiService){
	return {
		replace : true,
		restrict : 'EA',
		transclude: false,
		scope:{
			edit: '&'
		},
		link: function($scope){
          $scope.loader = true;
          $scope.displayData=function(){
  $scope.loader = true;
  $http.get("resources/select_tickets.php")
  .success(function(data){
    $scope.tickets=data;
    $scope.filteredTickets = $scope.tickets;
    $scope.loader = false;
  });


}
$scope.displayData();

		},
		templateUrl: 'pages/dashboard.php'
	};
}]);