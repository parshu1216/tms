angular.module('ticketApp').directive('addTicket',["$http", "ApiService", function($http, ApiService){
	return {
		replace : true,
		restrict : 'EA',
		transclude: false,
		scope:{
			edit: '&'
		},
		link: function($scope){
			$scope.btnName="ADD";

			$scope.ticket = {};

			$scope.ticketType = [{id:1,name:"Epic",icon:"fa fa-bolt"},
			{id:2,name:"Story",icon:"fa fa-bookmark"},
			{id:3,name:"Task",icon:"fa fa-check-square"},
			{id:4,name:"Sub-Task",icon:"fa fa-tasks"},
			{id:5,name:"Bug",icon:"fa fa-bug"},
			{id:5,name:"New-Feature",icon:"fa fa-plus"},
			{id:5,name:"Improvement",icon:"fa fa-arrow-up"}
			];
			$scope.loader= true;
			$scope.selectedTicketType = [];
			$scope.ticket.ticket_type = [];
			$scope.ticket.ticket_icon = [];
			$scope.selectedProject = [];
			$scope.selectedAgent = [];

			
			$scope.clearTicketType = function(){
				$scope.selectedTicketType = [];
				$scope.ticket.ticket_type = [];
				$scope.ticket.ticket_icon = [];
			}
			$scope.exist = function(item){
				return $scope.selectedTicketType.indexOf(item) > -1;
			}

			$scope.toggleSelection = function(item){
				var idx = $scope.selectedTicketType.indexOf(item);
				if (idx > -1) {
					$scope.selectedTicketType.splice(idx,1);
				}else{

					$scope.selectedTicketType.push(item) && $scope.ticket.ticket_type.push(item.name)
					&& $scope.ticket.ticket_icon.push(item.icon);

				}

			}

			$scope.clearProject = function(){
				$scope.selectedProject = [];

			}
			$scope.existProject = function(item){
				return $scope.selectedProject.indexOf(item) > -1;
			}

			$scope.toggleSelectionProject = function(item){
				var idx = $scope.selectedProject.indexOf(item);
				if (idx > -1) {
					$scope.selectedProject.splice(idx,1);
				}else{

					$scope.selectedProject.push(item.project_name);

				}

			}
			$scope.clearAgent = function(){
				$scope.selectedAgent = [];

			}
			$scope.existAgent = function(item){
				return $scope.selectedAgent.indexOf(item) > -1;
			}

			$scope.toggleSelectionAgent = function(item){
				var idx = $scope.selectedAgent.indexOf(item);
				if (idx > -1) {
					$scope.selectedAgent.splice(idx,1);
				}else{

					$scope.selectedAgent.push(item.userID);

				}

			}
			/*ApiService.project.getAllProjects().then(function(response){
				$scope.projects=response.data;
			});	
			
			ApiService.agent.getAllAgents().then(function(response){
				$scope.agents=response.data;
				$scope.btnName="ADD";
			});*/
			$scope.displayData=function(){
				$http.get("resources/select_tickets.php")
				.success(function(data){
					$scope.tickets=data;


					$http.get("resources/select_project.php")
					.success(function(data){
						$scope.projects=data;
						$http.get("resources/select_agent.php")
						.success(function(data){
							$scope.agents=data;
							$scope.btnName="ADD";
							$scope.loader= false;
						});
					});

				});
			}
			$scope.displayData();
			$scope.insertData = function(){
				$scope.ticket.project_name = $scope.selectedProject;
					$scope.ticket.ticket_assigned_to = $scope.selectedAgent;
				$scope.ticket.btnName = $scope.btnName;
				$scope.ticket.id = $scope.id;
				

				ApiService.ticket.addTicket($scope.ticket).success(function(response){

					$scope.ticket.ticket_title='';
					$scope.ticket.ticket_description='';
					$scope.selectedTicketType = [];
					$scope.selectedProject = [];
					$scope.selectedAgent = [];
					$scope.btnName="ADD";
					alert(response);
					$scope.displayData();
				});
			}

		},
		templateUrl: 'pages/add-ticket.php'
	};
}]);