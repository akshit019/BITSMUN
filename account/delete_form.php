<?php
	require_once("../models/config.php");
	require_once("./crud.php");
	require_once("./widget.php");
/*
// Request method: GET
$ajax = checkRequestMode("get");

if (!securePage(__FILE__)){
    apiReturnError($ajax);
}
*/
setReferralPage(getAbsoluteDocumentPath(__FILE__));

?>

<?php
// define variables and set to empty values
$sidErr = $websiteErr = $mpErr = $widgetErr=$pubidErr= "";
$sid = $website = $mp = $widget =$pubid= $submit =  "";

   
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
$submit = $_POST['submit'];
	
	
if (empty($_POST["pubid"])) {
     $pubidErr = "Publisher is required";
   } else {
     $pubid = test_input($_POST["pubid"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$pubid)) {
       $pubidErr = "Only letters and white space allowed";
     }
   } 	
	
/*sid*/   if (empty($_POST["sid"])) {
     $sidErr = "Name is required";
   } else {
     $sid = test_input($_POST["sid"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$sid)) {
       $sidErr = "Only letters and white space allowed";
     }
   }
 
 if($submit === 'update'){
   if (empty($_POST["website"])) {
     $websiteErr = "website is required";
   } else {
     $website = test_input($_POST["website"]);
     // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
     if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {    
	$websiteErr = "Invalid URL";
     }
   }

   if (empty($_POST["mp"])) {
     $mpErr = "match paramter is required";
   } else {
     $mp = test_input($_POST["mp"]);
   }
   
   $widget2 = (new widget)->get_widget();
   $widget3 = (new widget)->get_widget();
   foreach($widget3 as $doc){
  			if (empty($_POST[$doc])){$i=array_search($doc,$widget2); array_splice($widget2, $i, 1);;}
   }   	
   if (empty($widget2)) {
     $widgetErr = "please select atleast one widget";
   }
  }
   
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
  <?php
 	echo renderAccountPageHeader(array("#SITE_ROOT#" => SITE_ROOT, "#SITE_TITLE#" => SITE_TITLE, "#PAGE_TITLE#" => "User Form"));
  ?>
<head>
<style>
.error {color: #FF0000;}
</style>
<!-- include jquery library -->
<script src="http://code.jquery.com/jquery-2.1.4.js"></script>

<!-- The code for Ajax call -->
<script>
$(document).ready(function(){
    $("#sid").change(function(){
        $.post("processAjax.php",
        {
          pubid: document.getElementById("pubid").value,
          sid: document.getElementById("sid").value
        },
        function(data,status){
        	var myObj = $.parseJSON(data);
        	document.getElementById("mp").value = myObj['mp'];
        	document.getElementById("website").value = myObj['website'];
        
        var i;
        for(i=0;i<myObj['widget'].length;i++){
        	document.getElementById(myObj['widget'][i]).checked = true;
        	}
        });
    });
});
</script>


</head>
  <body>
    <div id="wrapper">

      <!-- Sidebar -->
        <?php
        echo renderMenu("user_form");
        ?>  

      	<div id="page-wrapper">
	  			<div class="row">
          	<div id='display-alerts' class="col-lg-12">

          	</div>
        	</div>
        	<h1>User Form</h1>
        	<p class="lead">Provide all the fields if you want to update. For deletion only Publisher ID and Secondary ID are required.<br></p>
        	<div class="row">
		  			<div class="col-lg-6">
		  			<form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
		
		 <div class="form-group">
    <label class="control-label col-sm-4" for="pubid">Publisher ID:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="pubid" name="pubid" value="<?php echo htmlentities($_SESSION['username']); ?>" readonly>
      <span class="error"><?php echo $pubidErr;?></span>
    </div>
  </div>
		
		<div class="form-group">
    <label class="control-label col-sm-4" for="sid">Secondary ID:</label>
    <div class="col-sm-8">
			<select class="form-control" id="sid" class="target" name = "sid" placeholder="Select Secondary ID">
				<?php 
      	$cursor = (new crud)->readForm2($_SESSION['username']);
      	foreach($cursor as $doc){
      		echo "<option class ='target' id=" . $doc['sid'] . " name=" . $doc['sid'] . " value=" . $doc['sid'] .">" . $doc[	'sid'] . " </option>";	
      	}
      ?>
      <span class="error"><?php echo $sidErr;?></span>
      </select>
    </div>
  </div>
  
	<div class="form-group">
    <label class="control-label col-sm-4" for="mp">Match Parameter:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="mp" name="mp" placeholder="Enter Match Parameter" value="">
      <span class="error"><?php echo $mpErr;?></span>
    </div>
  </div>

	<div class="form-group">
    <label class="control-label col-sm-4" for="website">Website URL:</label>
    <div class="col-sm-8">
      <input type="url" class="form-control" id="website" name="website" placeholder="Enter url">
      <span class="error"><?php echo $websiteErr;?></span>
    </div>
  </div>


  
  <div class="form-group">
  	<label class="control-label col-sm-4" for="pubid">Select Widgets:</label> 
    <div class="col-sm-8">
    <?php
    	$wid = new widget();
      	$widget = $wid->get_widget();
      	foreach($widget as $doc){
      		$str = strtoupper($doc);
      		echo "<input type='checkbox' runat='server' id=" . "$doc" . " name=" . "$doc" . " value=" . "$doc" .">"  . " $str ";
      		echo "   ";
      	}
    ?>
 				 <span class="error"><?php echo $widgetErr;?></span>
      </div>
    </div>
    
   <div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-8">
      <button type="submit" class="btn btn-lg btn-success" id = "update" name="submit" value="update">Update</button>
      <button type="submit" class="btn btn-lg btn-danger" id = "delete" name="submit" value="delete" onclick="return confirm('Are you sure?');">Delete</button>
    </div>
  </div>    
  </form>
  
  </div>
		</div>
	  </div>
	</div>
	
	
<?php
if((empty($sidErr))&&(empty($websiteErr))&&(empty($mpErr))&&(!empty($sid))&&(!empty($website))&&(!empty($mp))&&(empty($widgetErr))&&(!empty($widget2))&&(!empty($pubid))&&(empty($pubidErr))&&($submit === "update")){	 
	$piwik = 2;
	$cache = true;
	$abtest = false;
	$allowedParameters = array();	
	$crud = new crud();
	$crud->update($pubid,$name, $website, $piwik, $cache,$allowedParameters,$abtest, $mp,$widget2);
	}
	
	else if((empty($sidErr))&&(!empty($sid))&&(!empty($pubid))&&(empty($pubidErr))&&($submit === "delete")){	 
	$crud = new crud();
	$crud->delete($sid,$pubid);
	}
?>



</body>
</html>
l
