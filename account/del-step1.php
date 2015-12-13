<?php
require_once("../models/config.php");
//Request method: GET
/*
$ajax = checkRequestMode("get");

if (!securePage(__FILE__)){
    apiReturnError($ajax);
}
*/

require_once("./delcouncil_crud.php");
require_once("./delcountry_crud.php");
require_once("./delStep1_crud.php");
require_once("./info_crud.php");

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

<?php
// define variables and set to empty values
		$vidf = $vids = $vidt = $vcp11 = $vcp12 = $vcp13 = $vcp14 = $vcp15 = $vcp21 = $vcp22 = $vcp23 = $vcp24 = $vcp25 = $vcp31 = $vcp32 = $vcp33 = $vcp34 = $vcp35 = "";
$username = $_SESSION["currentUsername"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$vidf = test_input($_POST["cfp"]);
	$vids = test_input($_POST["csp"]);
	$vidt = test_input($_POST["ctp"]);
	$vcp11 = test_input($_POST["1cp1"]);
	$vcp12 = test_input($_POST["1cp2"]);
	$vcp13 = test_input($_POST["1cp3"]);
	$vcp14 = test_input($_POST["1cp4"]);
	$vcp15 = test_input($_POST["1cp5"]);
     	$vcp21 = test_input($_POST["2cp1"]);
	$vcp22 = test_input($_POST["2cp2"]);
	$vcp23 = test_input($_POST["2cp3"]);
	$vcp24 = test_input($_POST["2cp4"]);
	$vcp25 = test_input($_POST["2cp5"]);
     	$vcp31 = test_input($_POST["3cp1"]);
	$vcp32 = test_input($_POST["3cp2"]);
	$vcp33 = test_input($_POST["3cp3"]);
	$vcp34 = test_input($_POST["3cp4"]);
	$vcp35 = test_input($_POST["3cp5"]);
	//alert($username,$vidf,$vids,$vidt,$vcp11,$vcp12,$vcp13,$vcp14,$vcp15,$vcp21,$vcp22,$vcp23,$vcp24,$vcp25,$vcp31,$vcp32,$vcp33,$vcp34,$vcp35);
	echo "<script type='text/javascript'>alert('$username,$vidf,$vids,$vidt,$vcp11,$vcp12,$vcp13,$vcp14,$vcp15,$vcp21,$vcp22,$vcp23,$vcp24,$vcp25,$vcp31,$vcp32,$vcp33,$vcp34,$vcp35');</script>";
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
    		<h1>Step 1 | Delegate Registrations</h1>
	 <p class="lead"><br></p>
        <p class="lead">Please Select the Position You would Like To Apply For In International Press<br></p>
	</div>        
	<div class="row">
		  			<div class="col-lg-6">
			<form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
	<?php
		$council = new delcouncil_crud();
		//$council->add_council("EU");
		//$council->add_council("SECURITY");
		//$council->add_council("JCC");
		//$council->add_council("UNHRC");
		$list = $council->get_council();
		
		
	?>

	<?php
		$council = new delcountry_crud();
		//$council->add_country("Afganistan",10);
		//$council->add_country("USA",10);
		//$council->add_country("India",10);
		//$council->add_country("Japan",10);
		//$council->update_count("USA",10);
		//$council->add_country("UK",10);
		$counts = $council->get_count();
		
		
	?>
	<?php 
		$info = new info_crud();
		$status = $info->readStatus($username);
		if($status){
	?>
	<br>
	<div class="form-group">
    <label class="control-label col-sm-4" for="cfp">Council First Preference:</label>
    <div class="col-sm-8">
	<?php 
		$idf = "cfp";
		$ids = "csp";
		$idt = "ctp";
		$cp11 = "1cp1";
		$cp12 = "1cp2";
		$cp13 = "1cp3";
		$cp14 = "1cp4";
		$cp15 = "1cp5";
     		$cp21 = "2cp1";
		$cp22 = "2cp2";
		$cp23 = "2cp3";
		$cp24 = "2cp4";
		$cp25 = "2cp5";
     		$cp31 = "3cp1";
		$cp32 = "3cp2";
		$cp33 = "3cp3";
		$cp34 = "3cp4";
		$cp35 = "3cp5";
     
	echo "<select class='form-control' id='cfp' name='cfp' placeholder='' onchange=". "genprec('$idf'); required>"
	?>
	<option selected="selected" value='Select' disabled="disable">Select</option>
  	<?php
		foreach($list as $doc){
			echo "<option class=" . $doc . " name=" . $doc . " value=" . $doc .">" . $doc . " </option>";
		}	
	?>
	
	</select>    
	</div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-4" for="1cp1">Country Preference 1:</label>
    <div class="col-sm-6">
	<?php 
	echo "<select class='form-control' id='1cp1' name='1cp1' placeholder='' onchange=". "gen('$cp11'); required>"
	?>
		<option selected="selected" value='Select' disabled="disable">Select</option>
  	<?php
		for($i = 0; $i < count($counts['country']); $i++){
			if($counts['count'][$i] >= 1){
				echo "<option class= 1_" . $counts['country'][$i] . " name= 1_" . $counts['country'][$i] . " value= " . $counts['country'][$i] .">" . $counts['country'][$i] . " </option>";
			}		
		}	
	?>
	
	</select>    
	</div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-4" for="1cp2">Country Preference 2:</label>
    <div class="col-sm-6">
	<?php 
	echo "<select class='form-control' id='1cp2' name='1cp2' placeholder='' onchange=". "gen('$cp12'); required>"
	?>
		<option selected="selected" value='Select' disabled="disable">Select</option>
  	<?php
		for($i = 0; $i < count($counts['country']); $i++){
			if($counts['count'][$i] >= 1){
				echo "<option class= 1_" . $counts['country'][$i] . " name= 1_" . $counts['country'][$i] . " value= " . $counts['country'][$i] .">" . $counts['country'][$i] . " </option>";
			}		
		}	
	?>
	
	</select>    
	</div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-4" for="1cp3">Country Preference 3:</label>
    <div class="col-sm-6">
	<?php 
	echo "<select class='form-control' id='1cp3' name='1cp3' placeholder='' onchange=". "gen('$cp13'); required>"
	?>
		<option selected="selected" value='Select' disabled="disable">Select</option>
  	<?php
		for($i = 0; $i < count($counts['country']); $i++){
			if($counts['count'][$i] >= 1){
				echo "<option class= 1_" . $counts['country'][$i] . " name= 1_" . $counts['country'][$i] . " value= " . $counts['country'][$i] .">" . $counts['country'][$i] . " </option>";
			}		
		}	
	?>
	
	</select>    
	</div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-4" for="1cp4">Country Preference 4:</label>
    <div class="col-sm-6">
	<?php 
	echo "<select class='form-control' id='1cp4' name='1cp4' placeholder='' onchange=". "gen('$cp14'); required>"
	?>
		<option selected="selected" value='Select' disabled="disable">Select</option>
  	<?php
		for($i = 0; $i < count($counts['country']); $i++){
			if($counts['count'][$i] >= 1){
				echo "<option class= 1_" . $counts['country'][$i] . " name= 1_" . $counts['country'][$i] . " value= " . $counts['country'][$i] .">" . $counts['country'][$i] . " </option>";
			}		
		}	
	?>
	
	</select>    
	</div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-4" for="1cp5">Country Preference 5:</label>
    <div class="col-sm-6">
	<?php 
	echo "<select class='form-control' id='1cp5' name='1cp5' placeholder='' onchange=". "gen('$cp15'); required>"
	?>
		<option selected="selected" value='Select' disabled="disable">Select</option>
  	<?php
		for($i = 0; $i < count($counts['country']); $i++){
			if($counts['count'][$i] >= 1){
				echo "<option class= 1_" . $counts['country'][$i] . " name= 1_" . $counts['country'][$i] . " value= " . $counts['country'][$i] .">" . $counts['country'][$i] . " </option>";
			}		
		}	
	?>
	
	</select>    
	</div>
  </div>
	<br><br>
<div class="form-group">
    <label class="control-label col-sm-4" for="csp">Council second Preference:</label>
    <div class="col-sm-8">
	<?php 
	echo "<select class='form-control' id='csp' name='csp' placeholder='' onchange=". "genprec('$ids'); required>"
	?>
	<option selected="selected" value='Select' disabled="disable">Select</option>
  	<?php
		foreach($list as $doc){
			echo "<option class=" . $doc . " name=" . $doc . " value=" . $doc .">" . $doc . " </option>";
		}	
	?>
	
	</select>    
	</div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-4" for="2cp1">Country Preference 1:</label>
    <div class="col-sm-6">
	<?php 
	echo "<select class='form-control' id='2cp1' name='2cp1' placeholder='' onchange=". "gen('$cp21'); required>"
	?>
		<option selected="selected" value='Select' disabled="disable">Select</option>
  	<?php
		for($i = 0; $i < count($counts['country']); $i++){
			if($counts['count'][$i] >= 1){
				echo "<option class= 2_" . $counts['country'][$i] . " name= 2_" . $counts['country'][$i] . " value= " . $counts['country'][$i] .">" . $counts['country'][$i] . " </option>";
			}		
		}	
	?>
	
	</select>    
	</div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-4" for="2cp2">Country Preference 2:</label>
    <div class="col-sm-6">
	<?php 
	echo "<select class='form-control' id='2cp2' name='2cp2' placeholder='' onchange=". "gen('$cp22'); required>"
	?>
		<option selected="selected" value='Select' disabled="disable">Select</option>
  	<?php
		for($i = 0; $i < count($counts['country']); $i++){
			if($counts['count'][$i] >= 1){
				echo "<option class= 2_" . $counts['country'][$i] . " name= 2_" . $counts['country'][$i] . " value= " . $counts['country'][$i] .">" . $counts['country'][$i] . " </option>";
			}		
		}	
	?>
	
	</select>    
	</div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-4" for="2cp3">Country Preference 3:</label>
    <div class="col-sm-6">
	<?php 
	echo "<select class='form-control' id='2cp3' name='2cp3' placeholder='' onchange=". "gen('$cp23'); required>"
	?>
		<option selected="selected" value='Select' disabled="disable">Select</option>
  	<?php
		for($i = 0; $i < count($counts['country']); $i++){
			if($counts['count'][$i] >= 1){
				echo "<option class= 2_" . $counts['country'][$i] . " name= 2_" . $counts['country'][$i] . " value= " . $counts['country'][$i] .">" . $counts['country'][$i] . " </option>";
			}		
		}	
	?>
	
	</select>    
	</div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-4" for="2cp4">Country Preference 4:</label>
    <div class="col-sm-6">
	<?php 
	echo "<select class='form-control' id='2cp4' name='2cp4' placeholder='' onchange=". "gen('$cp24'); required>"
	?>
		<option selected="selected" value='Select' disabled="disable">Select</option>
  	<?php
		for($i = 0; $i < count($counts['country']); $i++){
			if($counts['count'][$i] >= 1){
				echo "<option class= 2_" . $counts['country'][$i] . " name= 2_" . $counts['country'][$i] . " value= " . $counts['country'][$i] .">" . $counts['country'][$i] . " </option>";
			}		
		}	
	?>
	
	</select>    
	</div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-4" for="2cp5">Country Preference 5:</label>
    <div class="col-sm-6">
	<?php 
	echo "<select class='form-control' id='2cp5' name='2cp5' placeholder='' onchange=". "gen('$cp25'); required>"
	?>
		<option selected="selected" value='Select' disabled="disable">Select</option>
  	<?php
		for($i = 0; $i < count($counts['country']); $i++){
			if($counts['count'][$i] >= 1){
				echo "<option class= 2_" . $counts['country'][$i] . " name= 2_" . $counts['country'][$i] . " value= " . $counts['country'][$i] .">" . $counts['country'][$i] . " </option>";
			}		
		}	
	?>
	
	</select>    
	</div>
  </div>
	<br><br>
<div class="form-group">
    <label class="control-label col-sm-4" for="ctp">Council third Preference:</label>
    <div class="col-sm-8">
	<?php 
	echo "<select class='form-control' id='ctp' name='ctp' placeholder='' onchange=". "genprec('$idt'); required>"
	?>
	<option selected="selected" value='Select' disabled="disable">Select</option>
  	<?php
		foreach($list as $doc){
			echo "<option class=" . $doc . " name=" . $doc . " value=" . $doc .">" . $doc . " </option>";
		}	
	?>
	
	</select>    
	</div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-4" for="3cp1">Country Preference 1:</label>
    <div class="col-sm-6">
	<?php 
	echo "<select class='form-control' id='3cp1' name='3cp1' placeholder='' onchange=". "gen('$cp31'); required>"
	?>
		<option selected="selected" value='Select' disabled="disable">Select</option>
  	<?php
		for($i = 0; $i < count($counts['country']); $i++){
			if($counts['count'][$i] >= 1){
				echo "<option class= 3_" . $counts['country'][$i] . " name= 3_" . $counts['country'][$i] . " value= " . $counts['country'][$i] .">" . $counts['country'][$i] . " </option>";
			}		
		}	
	?>
	
	</select>    
	</div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-4" for="3cp2">Country Preference 2:</label>
    <div class="col-sm-6">
	<?php 
	echo "<select class='form-control' id='3cp2' name='3cp2' placeholder='' onchange=". "gen('$cp32'); required>"
	?>
		<option selected="selected" value='Select' disabled="disable">Select</option>
  	<?php
		for($i = 0; $i < count($counts['country']); $i++){
			if($counts['count'][$i] >= 1){
				echo "<option class= 3_" . $counts['country'][$i] . " name= 3_" . $counts['country'][$i] . " value= " . $counts['country'][$i] .">" . $counts['country'][$i] . " </option>";
			}		
		}	
	?>
	
	</select>    
	</div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-4" for="3cp3">Country Preference 3:</label>
    <div class="col-sm-6">
	<?php 
	echo "<select class='form-control' id='3cp3' name='3cp3' placeholder='' onchange=". "gen('$cp33'); required>"
	?>
		<option selected="selected" value='Select' disabled="disable">Select</option>
  	<?php
		for($i = 0; $i < count($counts['country']); $i++){
			if($counts['count'][$i] >= 1){
				echo "<option class= 3_" . $counts['country'][$i] . " name= 3_" . $counts['country'][$i] . " value= " . $counts['country'][$i] .">" . $counts['country'][$i] . " </option>";
			}		
		}	
	?>
	
	</select>    
	</div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-4" for="3cp4">Country Preference 4:</label>
    <div class="col-sm-6">
	<?php 
	echo "<select class='form-control' id='3cp4' name='3cp4' placeholder='' onchange=". "gen('$cp34'); required>"
	?>
		<option selected="selected" value='Select' disabled="disable">Select</option>
  	<?php
		for($i = 0; $i < count($counts['country']); $i++){
			if($counts['count'][$i] >= 1){
				echo "<option class= 3_" . $counts['country'][$i] . " name= 3_" . $counts['country'][$i] . " value= " . $counts['country'][$i] .">" . $counts['country'][$i] . " </option>";
			}		
		}	
	?>
	
	</select>    
	</div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-4" for="3cp5">Country Preference 5:</label>
    <div class="col-sm-6">
	<?php 
	echo "<select class='form-control' id='3cp5' name='3cp5' placeholder='' onchange=". "gen('$cp35'); required>";
	?>
		<option selected="selected" value='Select' disabled="disable">Select</option>
  	<?php
		for($i = 0; $i < count($counts['country']); $i++){
			if($counts['count'][$i] >= 1){
				echo "<option class= 3_" . $counts['country'][$i] . " name= 3_" . $counts['country'][$i] . " value= " . $counts['country'][$i] .">" . $counts['country'][$i] . " </option>";
			}		
		}	
	?>
	
	</select>    
	</div>
  </div>


   <div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-8">
      <button type="submit" class="btn btn-lg btn-primary" name="submit" value="Submit">Submit</button>
    </div>
  </div>
<?php }else{
	echo "<div class='form-group'><label class='control-label col-sm-12' for=''>PLEASE FIRST FILL YOUR GENERAL INFORMATION FORM IN ORDER TO PROCEED:</label><div class='col-sm-8'>";
}?>
  </form>
  </div>   
  </div>
</div></div>


<script>
		function genprec(arg){
				var temp = "#" + arg;
				//document.getElementsByClassName(document.getElementById(arg).value)[0].disabled = true;
				//document.getElementsByClassName(document.getElementById(arg).value)[1].disabled = true;
				//document.getElementsByClassName(document.getElementById(arg).value)[2].disabled = true;
				//$(temp).readonly();
		}
</script>

<script>
		function gen(arg){ 
				//document.getElementsByClassName(document.getElementById(arg).value)[0].disabled = true;
				//document.getElementsByClassName(document.getElementById(arg).value)[1].disabled = true;
				//document.getElementsByClassName(document.getElementById(arg).value)[2].disabled = true;
				//document.getElementsByClassName(document.getElementById(arg).value)[3].disabled = true;
				//document.getElementsByClassName(document.getElementById(arg).value)[4].disabled = true;
				//document.getElementById(arg).disabled = true;

		}
</script>


<?php
if(!empty($vidf)){	 
	$crud = new delStep1_crud();
	$crud->insert($username,$vidf,$vids,$vidt,$vcp11,$vcp12,$vcp13,$vcp14,$vcp15,$vcp21,$vcp22,$vcp23,$vcp24,$vcp25,$vcp31,$vcp32,$vcp33,$vcp34,$vcp35);
	//$location = htmlspecialchars($_SERVER['PHP_SELF']);
	//echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$location.'">';
  // exit; 
	
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

