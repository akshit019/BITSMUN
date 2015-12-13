<?php
require_once("../models/config.php");
require_once("./widget.php");
//Request method: GET
/*
$ajax = checkRequestMode("get");

if (!securePage(__FILE__)){
    apiReturnError($ajax);
}
*/
require_once("./ipPositions_crud.php");
require_once("./ipStep1_crud.php");
require_once("./info_crud.php");

setReferralPage(getAbsoluteDocumentPath(__FILE__));

?>
 <!DOCTYPE html>
<html lang="en">
  <?php
  	echo renderAccountPageHeader(array("#SITE_ROOT#" => SITE_ROOT, "#SITE_TITLE#" => SITE_TITLE, "#PAGE_TITLE#" => "Edit Form"));
  ?>
<body>

<?php
// define variables and set to empty values
$pa = "";
$username = "vaibhav";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $pa = test_input($_POST["pa"]);
   
   //echo "<script type='text/javascript'>alert('$var');</script>";
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
<?php
	$pos = new ipPositions_crud();
	//$pos->add_position("reporter");
	//$pos->add_position("press");
	$list = $pos->get_position();
?>


  <div id="wrapper">

      <!-- Sidebar -->
        <?php
          echo renderMenu("edit_publisher");
        ?>  

      	<div id="page-wrapper">
	  			<div class="row">
          	<div id='display-alerts' class="col-lg-12">

          	</div>
        	</div>
		<div class="jumbotron">
    		<h1>Step 1 | International Press Registrations</h1>
	 <p class='lead'><br></p>
        <p class='lead'>Please Select the Position You would Like To Apply For In International Press<br></p>
	</div>        
	<div class='row'>
		  			<div class="col-lg-6">
			<form class='form-horizontal' role='form' method='post' action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>' >
	
	<?php  $info = new info_crud();
	       $valid = $info->readStatus($username);
		if ($valid){
			echo"<div class='form-group'><label class='control-label col-sm-4' for='pa'>Positions Available:</label><div class='col-sm-8'>";
			$test = new ipStep1_crud();
			$cursor = $test->read($username);
			if($cursor->count() != 0){
				foreach($cursor as $doc){
					echo "<input class='form-control' type='text' value=". $doc['positionAvailable'] ." readonly>";
				}		
			}else{ 
				echo "<select class='form-control' id='pa' name='pa' placeholder='' required>";
				echo "<option selected='selected' value='Select' disabled='disable'>Select</option>";
			
				foreach($list as $doc){
				echo "<option class=" . $doc . " name=" . $doc . " value=" . $doc .">" . $doc . " </option>";
				}
				echo "</select>";
				echo "</div>";
				echo "</div>";
				echo "<div class='form-group'> <div class='col-sm-offset-4 col-sm-8'><button type='submit' class='btn btn-lg btn-primary' name='submit' value='Submit'>Submit</button></div></div>";
	  
			}
		}
		else{
			echo"<div class='form-group'><label class='control-label col-sm-12' for=''>PLEASE FIRST FILL YOUR GENERAL INFORMATION FORM IN ORDER TO PROCEED:</label><div class='col-sm-8'>";
		}	
	?>

  </form>
  </div>   
  </div>
</div></div>


<?php
if((!empty($pa))){	 
	$crud = new ipStep1_crud();
	$crud->insert($username,$pa);
	$location = htmlspecialchars($_SERVER['PHP_SELF']);
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$location.'">';
   exit; 
	
}
?>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->


</body>
</html>

