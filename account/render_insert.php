 <?php
	require_once("../models/config.php");
	require_once("./crud.php");
	require_once("./widget.php");

// Request method: GET
//$ajax = checkRequestMode("get");

if (!securePage(__FILE__)){
    apiReturnError($ajax);
}

setReferralPage(getAbsoluteDocumentPath(__FILE__));

?>
 
  <!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
// define variables and set to empty values
$pubidErr = $sidErr= "";
$sid = $pubid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
/*sid*/   if (empty($_POST["pubid"])) {
     $pubidErr = "Publisher ID is required";
   } else {
     $pubid = test_input($_POST["pubid"]);
   //  $pubidErr = "";
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$pubid)) {
       $pubidErr = "Only letters and white space allowed";
     }
   }
  
   if (empty($_POST["sid"])) {
     $sidErr = "Domain ID is required";
   } else {
     $sid = test_input($_POST["sid"]);
    // $sidErr = "";
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
<script>
	window.onload = function () {
		document.getElementById("awc").checked = false;
		document.getElementById("rrc").checked = false;
		document.getElementById("awcomc").checked = false;
    		var checkbox1 = document.getElementById("awc");
		var checkbox2 = document.getElementById("rrc");
		var checkbox3 = document.getElementById("awcomc");
   		var expanded1 = document.getElementById("aw_display");
		var expanded2 = document.getElementById("rr_display");
		var expanded3 = document.getElementById("awcom_display");
		var expanded4 = document.getElementById("final");
		expanded1.style.display = 'none';
		expanded2.style.display = 'none';
		expanded3.style.display = 'none';
		expanded4.style.display = 'none';
    		checkbox1.onchange = function () {
        		expanded1.style.display = this.checked ? 'initial' : 'none';
    			expanded4.style.display = ((expanded1.style.display === 'initial')||(expanded2.style.display === 'initial')||(expanded3.style.display === 'initial')) ? 'initial' : 'none'; 
	};
		checkbox2.onchange = function () {
        		expanded2.style.display = this.checked ? 'initial' : 'none';
			expanded4.style.display = ((expanded1.style.display === 'initial')||(expanded2.style.display === 'initial')||(expanded3.style.display === 'initial')) ? 'initial' : 'none'; 
	};
		checkbox3.onchange = function () {
        		expanded3.style.display = this.checked ? 'initial' : 'none';
			expanded4.style.display = ((expanded1.style.display === 'initial')||(expanded2.style.display === 'initial')||(expanded3.style.display === 'initial')) ? 'initial' : 'none'; 
	};
};	
</script>
<p><span class="error"></span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   publisher ID: <input type="text" name="pubid" value="">
    <span class="error"><?php echo $pubidErr;?></span>
   <br><br>
   Domain ID: <input type="text" name="sid" value="_DEFAULT_">
   <span class="error"><?php echo $sidErr;?></span>
   <br><br>
<p>Select Widgets: <br> <input type="checkbox" runat="server" id="awc" name="aw" value="AW" unchecked />AW   
  <input type="checkbox" runat="server" id = "rrc" name="rr" value="RR" unchecked />RR
 <input type="checkbox" runat="server" id = "awcomc" name="awcom" value="AWCOM" unchecked />AWCOM <br>  

<div id="aw_display">
  <h2>AW Settings</h2>
  <h4>Javascript Settings</h4>
  Render Function: <input type="text" name="aw_renderFunc" value="">
   <br><br>
  <h4>Html Settings</h4>
  Template Head: <input type="text" name="aw_templateHead" value="">
   <br><br>
  Template Repeat: <input type="text" name="aw_templateRepeat" value="">
   <br><br>
  Template Foot: <input type="text" name="aw_templateFoot" value="">
  <h4>CSS Settings</h4>
  CSS: <input type="text" name="aw_css" value="">
   <br><br>
</div>
<div id="rr_display">
<h2>RR Settings</h2>
  <h4>Javascript Settings</h4>
  Render Function: <input type="text" name="rr_renderFunc" value="">
   <br><br>
  <h4>Html Settings</h4>
  Template Head: <input type="text" name="rr_templateHead" value="">
   <br><br>
  Template Repeat: <input type="text" name="rr_templateRepeat" value="">
   <br><br>
  Template Foot: <input type="text" name="rr_templateFoot" value="">
  <h4>CSS Settings</h4>
  CSS: <input type="text" name="rr_css" value="">
   <br><br>
</div>
<div id="awcom_display">
<h2>AWCOM Settings</h2>
  <h4>Javascript Settings</h4>
  Render Function: <input type="text" name="awcom_renderFunc" value="">
   <br>
<br>
  <h4>Html Settings</h4>
  Template Head: <input type="text" name="awcom_templateHead" value="">
   <br><br>
  Template Repeat: <input type="text" name="awcom_templateRepeat" value="">
   <br><br>
  Template Foot: <input type="text" name="awcom_templateFoot" value="">
  <br><br>
  Row Head: <input type="text" name="awcom_rowHead" value="">
   <br><br>
  Row Repeat: <input type="text" name="awcom_rowRepeat" value="">
   <br><br>
  Row Foot: <input type="text" name="awcom_rowFoot" value="">
  <h4>CSS Settings</h4>
  CSS: <input type="text" name="awcom_css" value="">
   <br><br>
</div>
<div id="final">
<input type="submit" name="submit" value="Submit">
</div>
</form>

<?php

if((empty($pubidErr))&&(empty($sidErr))){
	 $m = new MongoClient();
        echo "Database connected";
	$db = $m->mydb;
        echo "Database selected";
	$collection = $db->createCollection("render_col");
	$document = array(
	       "pubid" => $pubid, 
	       "sid" => $sid,
               "AW" => array(
		      "renderFunc" => $aw_renderFunc,
		      "html" => array(
		      		"templateHead" => $aw_templateHead,
		      		"templateRepeat" => $aw_templateRepeat,
				"templateFoot" => $aw_templateFoot
		      ),	      
		      'css'  => $aw_css 
	      ),
              "RR" => array( 
		      "renderFunc" => $rr_renderFunc,
		      "html" => array(
		      		"templateHead" => $rr_templateHead,
		      		"templateRepeat" => $rr_templateRepeat,
				"templateFoot" => $rr_templateFoot
		      ),	      
		      'css'  => $rr_css 
	      ),  
              "AWCOM" => array( 
		      "renderFunc" => $awcom_renderFunc,
		      "html" => array(
		      		"templateHead" => $awcom_templateHead,
		      		"templateRepeat" => $awcom_templateRepeat,
				"templateFoot" => $awcom_templateFoot,
				"rowHead" => $awcom_rowHead,
		      		"rpwRepeat" => $awcom_rowRepeat,
				"rowFoot" => $awcom_rowFoot
		      ),	      
		      'css'  => $awcom_css 
	        )         
	      );
	$collection->insert($document);
	echo "data inserted";
}
?>


<?php
//echo "<h2>Your Input:</h2>";
//echo $name;
//echo "<br>";

//echo $website;
//echo "<br>";
?>



</body>
</html>

