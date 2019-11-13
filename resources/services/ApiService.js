angular.module("ticketApp").factory('ApiService', ['$http', function($http){
	var basePath = "../directive_tms/resources";
	return {
			"ticket" : {
				getAllTickets: function(){
					return $http.get("resources/select_tickets.php");
				},
				addTicket : function(ticket){
					return $http.post("resources/insert_ticket.php", ticket);
				}
			},
			"agent": {
				getAllAgents: function(){
					return $http.get(basePath+"/select_agent.php");
				}
			},
			"project": {
				getAllProjects: function(){
					return $http.get(basePath+"/select_project.php");
				}
			}
	}
}]);