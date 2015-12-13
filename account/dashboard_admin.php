<?php

// UserCake authentication
require_once("../models/config.php");
require_once("./committee_crud.php");
require_once("./info_crud.php");
require_once("./execEssayAns_crud.php");
require_once("./execresult_crud.php");

// Request method: GET
$ajax = checkRequestMode("get");

if (!securePage(__FILE__)){
    apiReturnError($ajax);
}


setReferralPage(getAbsoluteDocumentPath(__FILE__));

// Admin page
?>
<!DOCTYPE html>
<html lang="en">
  <?php
  	echo renderAccountPageHeader(array("#SITE_ROOT#" => SITE_ROOT, "#SITE_TITLE#" => SITE_TITLE, "#PAGE_TITLE#" => "Admin Dashboard"));
  ?>
<head>
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css">
  
<!-- include jquery library -->
<script src="http://code.jquery.com/jquery-2.1.4.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.js"></script>

<script>
function callthis(arg,arg1,arg2){
	stat = document.getElementById(arg2).value;
	//alert(stat);
       $.post("dashboardAjax.php",
        {
         committee: arg,
         username: arg1,
	 status: stat
        },
      
        function(data,status){
        	//var myObj = $.parseJSON(data);
        	document.getElementById(arg2).value = data;
		//alert(data);
        	if(data=="Accepted"){
        		document.getElementById(arg2).classList.remove('btn-primary');
			document.getElementById(arg2).classList.remove('btn-warning');
			document.getElementById(arg2).classList.remove('btn-danger');
        		document.getElementById(arg2).classList.add('btn-success');
        	}else if(data=="Rejected" || data=="NotComing"){
        		document.getElementById(arg2).classList.remove('btn-primary');
			document.getElementById(arg2).classList.remove('btn-warning');
			document.getElementById(arg2).classList.remove('btn-success');
        		document.getElementById(arg2).classList.add('btn-danger');
		}else if(data=="Waitlisted"){
			document.getElementById(arg2).classList.remove('btn-primary');
			document.getElementById(arg2).classList.remove('btn-danger');
			document.getElementById(arg2).classList.remove('btn-success');
        		document.getElementById(arg2).classList.add('btn-warning');
		}
        	 
        });
    //    $("#".concat(arg)).remove
}


</script>
<?php
$committee = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
   $committee = test_input($_GET["comm"]);
}
  
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
	//$committee = new committee_crud();
	//$committee->add_committee("InternationalPress");
	//$committee->add_committee("ExecutiveBooard");
	//$committee->add_committee("Delegates");
	//$committee = "InternationalPress";
	$committee = "ExecutiveBoard";
	//$committee = "Delegates";

?>
  <body>    
    <div id="wrapper">

      <!-- Sidebar -->
        <?php
            echo renderMenu("dashboard-admin");
        ?>

     <div id="page-wrapper">
	  	<div class="row">
          <div id='display-alerts' class="col-lg-12">
          
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <h1>Dashboard <small>User Overview</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>
            
              <h2 class="sub-header">Executive Board</h2>
		<div class='row'>
		  <div class="col-lg-6">
		<form class='form-horizontal' role='form' method='GET' action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>'>

	<?php
		//	$ip = new ipEssayAns_crud();
//			$exec = new execEssayAns_crud();
//			$del = new DelEssayAns_crud();	
			
				echo "</div>";
				echo "</div>";
			echo "</form>";
			echo "</div></div>";
			echo "<div class='table-responsive'>";

		echo "<table id ='usertable' class='table table-striped'><thead><tr><th>Username</th><th>Name</th><th>Phone No.</th><th>Email ID</th><th>Gender</th><th>Institute</th><th>Committee</th><th>Position</th><th>Status</th><th>View</th></tr></thead><tbody>";
	//echo "<table id ='usertable' class='table table-striped'><thead><tr><th>Username</th><th>Name</th><th>Phone No.</th><th>Email ID</th><th>Institute</th><th>Status</th><th>View</th></tr></thead><tbody>";
            
              	$show = new info_crud();
              	$info = $show->readGeneral();
		$res = new execresult_crud();
              	foreach($info as $doc){
			$status = (new execEssayAns_crud())->readStatus($doc['username']);
			if($status){
				$status = "inProgress";
			}else{
				$status = "notSubmitted";
			}
			//if($status){
			      		echo "<tr>
				  <td>".$doc['username']."</td>
				  <td>".$doc['name']."</td>
				  <td>".$doc['countryCode'] . $doc['phoneNumber']."</td>
				  <td>".$doc['email']."</td>
				  <td>".$doc['sex']."</td>
				  <td>".$doc['institute']."</td>";
				$result = $res->read($doc['username']);

				
			      	$arg1=$doc['username'];
			      	$arg2=$doc['name'];
			      	$arg = $arg1.$committee;
				$argw = $arg."view";
				//$status = "InProgress";
				$comm = "";
				$position = "";
				//$status = "Rejected";
				//$status = "Accepted";
				//$status = "Backup";
				//$status = "Shortlisted";
				//$status = "Called";
				
				if($result->count() == 0){
					 $btnclass = 'text-default';												
				}
				else{
					foreach($result as $doc1){
						$status = $doc1['status'];
						$comm = $doc1['committee'];
						$position = $doc1['position'];
						
						if($status == "Selected"){
							$btnclass = "text-success";
						}
						if($status == "Rejected"){
							$btnclass = "text-danger";
						}
						if($status == "Backup"){
							$btnclass = "text-warning";
						}
						if($status == "Shortlisted"){
							$btnclass = "text-info";
						}
						if($status == "Called"){
							$btnclass = "text-primary";
						}
					}
			
				}
				echo "<td>".$comm."</td>";
				echo "<td>".$position."</td>";
		  		//echo "<td><input type='button' class='btn $btnclass' name='submit' id=".$arg." value=".$status.">";
				echo "<td class='$btnclass'><b>".$status."</b></td>";
				echo "<td><input type='button'class='btn btn-primary' name='view' onclick= window.open('application.php?username=".$doc['username']."&committee=".$committee."') value='View Application' /></td> ";	      
				//echo "<td>< class='$btnclass' name='submit' id=".$arg." onclick=" . "callthis('$arg','$arg1','$arg2');>".$doc['status']."</button></td> ";	              
				//echo "<td><a type='button' href='' onclick='window.open("."'https://www.google.com'"." ); return false' target='_blank'>View Application</a></td>";				
				echo "</tr>";

			
              	}
       		echo "</tbody></table>";
		?>    
            </div>
          </div>
          
          <div class="row">
          <div id='widget-users' class="col-lg-12">          
<div class="dropdown"><div class="dropdown">
          </div>
        </div><!-- /.row -->
		
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->
    
    <script src="../js/raphael/2.1.0/raphael-min.js"></script>
    <script src="../js/morris/morris-0.4.3.js"></script>
    <script src="../js/morris/chart-data-morris.js"></script>
    <script>
       /* $(document).ready(function() {          
          alertWidget('display-alerts');
          
          // Initialize the transactions tablesorter
          $('#transactions .table').tablesorter({
              debug: false
          });
          
        });*/
	$(document).ready( function () {
    $('#usertable').DataTable();
} );      
    </script>
  </body>
</html>
