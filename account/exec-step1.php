<?php
require_once("../models/config.php");
//Request method: GET
/*
$ajax = checkRequestMode("get");

if (!securePage(__FILE__)){
    apiReturnError($ajax);
}
*/

require_once("./execessay_crud.php");
require_once("./execEssayAns_crud.php");
require_once("./execEssayAnsTemp_crud.php");
require_once("./info_crud.php");
require_once("./delcouncil_crud.php");
require_once("./execstep1_crud.php");


setReferralPage(getAbsoluteDocumentPath(__FILE__));

?>
 <!DOCTYPE html>
<html lang="en">
  <?php
  	echo renderAccountPageHeader(array("#SITE_ROOT#" => SITE_ROOT, "#SITE_TITLE#" => SITE_TITLE, "#PAGE_TITLE#" => "Edit Form"));
  ?>
<head>
	<!-- include jquery library -->
	<script src="http://code.jquery.com/jquery-2.1.4.js"></script>
	<script src="readonly.js"></script>
</head>
<body>

<style type="text/css">
	.err-msg{
		color: red;
	}
</style>
<?php
// define variables and set to empty values
		$coun1 = $coun2 = $coun3 = $error = $button = "";
$username = $_SESSION["currentUsername"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		$coun1 = test_input($_POST["coun1"]);
		$coun2 = test_input($_POST["coun2"]);
		$coun3 = test_input($_POST["coun3"]);
		$button = test_input($_POST["submit"]);	
	//echo "<script type='text/javascript'>alert($username,$coun1,$coun2,$coun3);</script>";
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
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
    		<h1>Step 1 | Committee Preferences</h1>
	 <p class="lead"><br></p>
        <p class="lead">Please mention your committee preferences | Once submitted, the preferences cannot be changed<br></p>
	<p class="lead"><b> If it doesn't show the your saved preferences then try logging with email address or vice-versa<b><br></p>
	</div>        
	<div class="row">
		  			<div class="col-lg-6">
			<form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
	<?php
		$council = new delcouncil_crud();
	//	$council->add_council("DISEC","Q. Suppose the UN completely discredits the claim of Palestine over Israeli land, if Israel signs the NPT. How would Israel respond?");
	//	$council->add_council("ECOSOC","Q. Should countries have a limit on the amount of loans they can receive from international banks and organizations?");
	//	$council->add_council("FIFA","Q. The report into the scandal states that 'The bidding process is well thought and professional', and that the line between lobbying and corruption is not always clear. What are your views on this? ");
	//	$council->add_council("HCC","Q. What was the effect of the third battle of Panipat on the Maratha Dynasty?");
	//	$council->add_council("JCC","Q. What went wrong with the diplomatic efforts during the IC814 hijacking incident, if it be termed as a 'Failure'?");
	//	$council->add_council("UNHRC","Q. Migration and migrants are increasingly the focus of human rights discussions yet the gap between policy and protection remains wide. Any comments?");
	//	$council->add_council("WHO","Q. 2015 was the first deadline for reaching the millennium development goals. Do you feel that sufficient efforts were undertaken?");
		$cursor = $council->get_council();
		$list = array();
		$i = 0;
		foreach($cursor as $doc1){
			$list[$i] = $doc1['council'];
			$i = $i + 1;
		}
		
	?>
	<?php 
		$info = new info_crud();
		$status = $info->readStatus($username);
		if($status){
	?>
	<?php
		$check = new execstep1_crud();
		$istatus = $check->readStatus($username);
		$user = $check->read($username);
		$lis = array();
		$num = 0;
		foreach($user as $doc1){
			$lis[$num] = $doc1["firstCouncil"];
			$num = $num + 1;
			$lis[$num] = $doc1["secondCouncil"];
			$num = $num + 1;
			$lis[$num] = $doc1["thirdCouncil"];
			$num = $num + 1;
		}
	?>
	<br>
	<div class="form-group">
    <label class="control-label col-sm-4" for="coun1">Council First Preference:</label>
    <div class="col-sm-8">
    <?php 
    if($istatus){
			echo "<select class='form-control' id='coun1' name='coun1' placeholder='' readonly>";
		    echo "<option selected='selected' value=". $lis[0] ." >". $lis[0] ."</option>";
	}
	else{
		echo "<select class='form-control' id='coun1' name='coun1' placeholder='Select' required>";
		echo "<option selected='selected' value='' disabled='disable'>Select</option>";
			foreach($list as $doc){
				echo "<option class=" . $doc . " name=" . $doc . " value=" . $doc .">" . $doc . " </option>";
			}
	}	
	?>
	
	</select>    
	</div>
  </div>
	
  
<div class="form-group">
    <label class="control-label col-sm-4" for="coun2">Council second Preference:</label>
    <div class="col-sm-8">
	<?php 
	if($istatus){
			echo "<select class='form-control' id='coun2' name='coun2' placeholder='' readonly>";
		    echo "<option selected='selected' value=". $lis[1] ." >". $lis[1] ."</option>";
	}
	else{
		echo "<select class='form-control' id='coun2' name='coun2' placeholder='' required>";
		echo "<option selected='selected' value='' disabled='disable'>Select</option>";
			foreach($list as $doc){
				echo "<option class=" . $doc . " name=" . $doc . " value=" . $doc .">" . $doc . " </option>";
			}
	}	
	?>
	
	</select>    
	</div>
  </div>

<div class="form-group">
    <label class="control-label col-sm-4" for="coun3">Council third Preference:</label>
    <div class="col-sm-8">
	<?php 
	if($istatus){
			echo "<select class='form-control' id='coun3' name='coun3' placeholder='' readonly>";
		    echo "<option selected='selected' value=". $lis[2] ." >". $lis[2] ."</option>";
	}
	else{
		echo "<select class='form-control' id='coun3' name='coun3' placeholder=''  required>";
		echo "<option selected='selected' value='' disabled='disable'>Select</option>";
			foreach($list as $doc){
				echo "<option class=" . $doc . " name=" . $doc . " value=" . $doc .">" . $doc . " </option>";
			}
	}	
	?>
	
	</select>    
	</div>
  </div>

   <div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-8">
    <?php
    	if($istatus){

    	}
    	else{
    		echo  "<button type='submit' class='btn btn-lg btn-primary' name='submit' value='Submit'>Submit</button>";
    		
    		
     	}
     ?>
      
    </div>
  </div>
<?php }else{
	echo "<div class='form-group'><label class='control-label col-sm-12' for=''>PLEASE FIRST FILL YOUR GENERAL INFORMATION FORM IN ORDER TO PROCEED:</label><div class='col-sm-8'>";
}?>
  

<?php
if($button == "Submit"){
	if((($coun1 == $coun2)||($coun2 == $coun3)||($coun1 == $coun3))&&(!empty($coun1))&&(!empty($coun2))&&(!empty($coun3))){
		echo "<div class='form-group'><label class='control-label col-sm-8 err-msg' for=''>Please select three different committees:</label><div class='col-sm-8'></div></div>";
	}
	else{
		if(!empty($coun1)&&!empty($coun3)&&!empty($coun2)){	 
		$crud = new execStep1_crud();
		$crud->insert($username,$coun1,$coun2,$coun3);
		$location = htmlspecialchars($_SERVER['PHP_SELF']);
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$location.'">';
	  	exit; 
		}

	}
}

?>
</form>
  </div>   
  </div>
</div></div>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->


</body>
</html>

