angular.module('ticketApp').directive('assignedTicket',["$http", "ApiService", function($http, ApiService){
	return {
		replace : true,
		restrict : 'EA',
		transclude: false,
		scope:{
			edit: '&'
		},
		link: function($scope){
			$scope.groups = [];
    $scope.PageSize = "10";
    $scope.btnName="ADD";
    $scope.view_assigned_tickets = true;
    $scope.view_Ticket = false;
    $scope.show_comments = false;
    $scope.loader = true;
    $scope.ticket_status=["To-Do","In-Progress","Hold","Completed"];

    $scope.status=[{text:"To-Do"},{text:"In-Progress"},{text:"Hold"},{text:"Completed"}];
    $scope.status2=[{id:1,text:"To-Do"},{id:2,text:"In-Progress"},{id:3,text:"Hold"},{id:4,text:"Completed"}];
    $scope.selectedStatus = [];

     $scope.ticketType = [{id:1,name:"Epic",icon:"fa fa-bolt"},
                        {id:2,name:"Story",icon:"fa fa-bookmark"},
                        {id:3,name:"Task",icon:"fa fa-check-square"},
                        {id:4,name:"Sub-Task",icon:"fa fa-tasks"},
                        {id:5,name:"Bug",icon:"fa fa-bug"},
                        {id:5,name:"New-Feature",icon:"fa fa-plus"},
                        {id:5,name:"Improvement",icon:"fa fa-arrow-up"}
                        ];
       $scope.selectedTicketType = [];
     $scope.ticket_type = [];
     $scope.ticket_icon = [];
    
       $scope.clearTicketType = function(){
    $scope.selectedTicketType = [];
     $scope.ticket_type = [];
     $scope.ticket_icon = [];
  }
    $scope.existTicketType = function(item){
      return $scope.selectedTicketType.indexOf(item) > -1;
    }

    $scope.toggleSelectionTicketType = function(item){
      var idx = $scope.selectedTicketType.indexOf(item);
      if (idx > -1) {
        $scope.selectedTicketType.splice(idx,1);
      }else{

        $scope.selectedTicketType.push(item) && $scope.ticket_type.push(item.name)
        && $scope.ticket_icon.push(item.icon);

      }
       
    }

    $scope.exist = function(item){
      return $scope.selectedStatus.indexOf(item) > -1;
    }
 
    $scope.toggleSelection = function(item){
      var idx = $scope.selectedStatus.indexOf(item.text);
      if (idx > -1) {
        $scope.selectedStatus.splice(idx,1);
      }else{

        $scope.selectedStatus.push(item.text);
      }
/*
      if($scope.selectedStatus.length >= 1){*/
      
        
     /* }else{
        $scope.filteredTickets = $scope.tickets;
      }*/

    }

    $scope.checkAll = function(){
      if ($scope.selectAll) {
        angular.forEach($scope.status2, function(item){
          idx = $scope.selectedStatus.indexOf(item);
          if (idx >= 0) {
            return true;
          }
          else{
            $scope.selectedStatus.push(item);
            $scope.filteredTickets = $scope.tickets;
          }
        })
      }
      else{
        $scope.selectedStatus = [];
      }
    }


    $scope.insertData=function(id,comment){
      $scope.loader = true;
      $scope.btnName="ADD";
      $scope.comment = comment;
      $http.post(
        "resources/add_comment.php",
        {'comment':$scope.comment,
        'ticket_id':$scope.id,
        'btnName':$scope.btnName    
      }
      ).success(function(data){
        alert("Comment Added Succefully");
        $scope.viewTicket(id);
         $scope.comment = null;

        /* $http.post("resources/select_comments.php",{'ticket_id':id})
    .success(function(data){

      $scope.comments=data;
       $scope.loader = false;
        alert("Comment Added Succefully");
        $scope.comment="";
    });*/
      });  

    }
$scope.displayData=function(){
  $scope.loader = true;
  $http.get("resources/select_assigned_tickets.php")
  .success(function(data){
     $scope.btnName="ADD";
    $scope.loader= false;
    $scope.tickets=data;
    $scope.filteredTickets = $scope.tickets;
    if ($scope.tickets <= 0) {
           $scope.alert = "No Data Found";
    }else{
        $scope.to_do_FilteredTickets = $scope.tickets.filter(function(ticket){
          return (ticket.ticket_status == 'To-Do')
  });
      $scope.in_progress_FilteredTickets = $scope.tickets.filter(function(ticket){
          return (ticket.ticket_status == 'In-Progress')
  });
       $scope.completed_FilteredTickets = $scope.tickets.filter(function(ticket){
          return (ticket.ticket_status == 'Completed')
  });
       $scope.hold_FilteredTickets = $scope.tickets.filter(function(ticket){
          return (ticket.ticket_status == 'Hold')
  });

    }
  
        
    $http.get("resources/select_project.php")
    .success(function(data){
     $scope.projects=data;
     $http.get("resources/select_agent.php")
     .success(function(data){
       $scope.agents=data;

     });
   });

  });


}
$scope.displayData();


    

  /*  $scope.displayTicket=function(){
  $http.get("select_single_ticket.php")
  .success(function(data){
  $scope.ticket=data;
  });


}*/
  /*$scope.resetData= function(){
  $scope.blog_title=null;
  $scope.blog_description=null;
  $scope.blog_para1=null;
  $scope.blog_para2=null;
   $scope.blog_image_url=null;
  $scope.btnName="ADD";
  $scope.displayData();
}*/
$scope.updateData=function(ticket_id,ticket_number,ticket_type,ticket_icon,project_name,ticket_title,ticket_description,ticket_assigned_to,ticket_status){
  $scope.id = ticket_id;
  $scope.btnName="Update";
  $scope.ticket_number=ticket_number;
   $scope.ticket_type=ticket_type;
    $scope.ticket_icon=ticket_icon;
  $scope.project_name=project_name
  $scope.ticket_title=ticket_title;
  $scope.ticket_description=ticket_description;
  $scope.ticket_assigned_to=ticket_assigned_to;
  $scope.ticket_status=ticket_status;
}
$scope.updateTitle = function(data,ticket_id) {
  $scope.btnName = "Title";
  return $http.post('resources/update_ticket_attribute.php', {btn:$scope.btnName,ticket_id:ticket_id, ticket_title: data}).success(function(response){
 $scope.viewTicket(ticket_id);
    alert(response);
  });
};
$scope.updateDescription = function(data,ticket_id) {
  $scope.btnName = "Description";
  return $http.post('resources/update_ticket_attribute.php', {btn:$scope.btnName,ticket_id:ticket_id, ticket_description: data}).success(function(response){
     $scope.viewTicket(ticket_id);
     alert(response)
  });
};
$scope.updateAssignedTo = function(data,ticket_id) {
  $scope.btnName = "assigned_to";
  return $http.post('resources/update_ticket_attribute.php', {btn:$scope.btnName,ticket_id:ticket_id, assigned_to: data}).success(function(response){
     $scope.viewTicket(ticket_id);
     alert(response)
  });
};
$scope.updateTicketType = function(ticket_id,ticket_type,ticket_icon) {
  $scope.btnName = "ticket_type";
  return $http.post('resources/update_ticket_attribute.php', {btn:$scope.btnName,ticket_id:ticket_id, 
    ticket_type: $scope.ticket_type,ticket_icon:$scope.ticket_icon}).success(function(response){
      $scope.clearTicketType();
        $scope.viewTicket(ticket_id);
  /*    $scope.view_Ticket = false;
  $scope.view_assigned_tickets = true;
  $scope.displayData();
  $scope.show_comments = false;*/
    alert(response);
  });
};
$scope.updateStatus = function(data,ticket_id) {
  $scope.btnName = "status";
  return $http.post('resources/update_ticket_attribute.php', {btn:$scope.btnName,ticket_id:ticket_id, ticket_status: data}).success(function(response){
    /* $scope.viewTicket(ticket_id);*/
    alert(response);
  });
};

$scope.addComment=function(ticket_id){
  $scope.id = ticket_id;
  $scope.btnName="ADD";

}

$scope.viewTicket=function(id){
  $scope.loader = true;
  $http.post("resources/select_single_ticket.php",{'ticket_id':id})
  .success(function(data){
   
    $scope.view_Ticket = true;
    $scope.show_comments = true;
    $scope.view_assigned_tickets = false;
    $scope.ticket_views=data;
    $http.post("resources/select_comments.php",{'ticket_id':id})
    .success(function(data){
      $scope.comments=data;
       $scope.loader = false;

    });
  });

}
$scope.back=function(){
  $scope.view_Ticket = false;
  $scope.view_assigned_tickets = true;
  $scope.displayData();
  $scope.show_comments = false;
}
$scope.deleteData=function(id){
  if(confirm("Are you sure want to delete?")){
    $http.post("resources/delete_tickets.php",{'ticket_id':id})
    .success(function(data){
      alert("Data Deleted Succefully");
      $scope.displayData();

    });
  }else {
    return false;
  }
}
$scope.deleteComment=function(id){
  if(confirm("Are you sure want to delete?")){
    $http.post("resources/delete_comment.php",{'comment_id':id})
    .success(function(response){
      alert("Data Deleted Succefully");
       $scope.back();
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
		templateUrl: 'pages/assigned-ticket.php'
	};
}]);