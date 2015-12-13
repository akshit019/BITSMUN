<?php
require_once("../models/config.php");
require_once("./widget.php");
//Request method: GET

//$ajax = checkRequestMode("get");
/*
if (!securePage(__FILE__)){
    apiReturnError($ajax);
}*/

require_once("./crud.php");

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
$nameErr = $websiteErr = $mpErr = $widgetErr= $pubidErr = "";
$name = $website = $mp = $widget = $piwik = $cache = $allowedParameters = $abtest = $pubid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
/*sid*/   if (empty($_POST["name"])) {
     $nameErr = "Secondary ID is required";
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed";
     }
   }

if (empty($_POST["pubid"])) {
     $pubidErr = "Publisher ID is required";
   } else {
     $pubid = test_input($_POST["pubid"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$pubid)) {
       $pubidErr = "Only letters and white space allowed";
     }
   }  

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
   
   $piwik = test_input($_POST["piwik"]);
   $cache = test_input($_POST["cache"]);
   $allowedParameters = test_input($_POST["allowedParameters"]);
   $abtest = test_input($_POST["abtest"]);

   $widget2 = (new widget)->get_widget();
   $widget3 = (new widget)->get_widget();
   foreach($widget3 as $doc){
  			if (empty($_POST[$doc])){$i=array_search($doc,$widget2); array_splice($widget2, $i, 1);}
   }   	
   if (empty($widget2)) {
     $widgetErr = "please select atleast one widget";
   }

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
    		<h1>User Form</h1>
        <p class="lead">Use this form to add your requirements and customizations.<br></p>
        <div class="row">
		  			<div class="col-lg-6">
			<form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
	
	 <div class="form-group">
    <label class="control-label col-sm-4" for="pubid">Publisher ID:</label>
    <div class="col-sm-8">
      <select class="form-control" id="pubid" name = "name" placeholder="Select Publisher ID">
				<?php 
      	$cursor = (new crud)->readpubid();
      	foreach($cursor as $doc){
      		echo "<option id=" . $doc . " name=" . $doc . " value=" . $doc .">" . $doc . " </option>";	
      	}
      ?>
      <span class="error"><?php echo $pubidErr;?></span>
      </select>
      
    </div>
  </div>
	
	<div class="form-group">
    <label class="control-label col-sm-4" for="sid">Secondary ID:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="sid" name="name" placeholder="Enter Secondary ID">
      <span class="error"><?php echo $nameErr;?></span>
    </div>
  </div>
  
	<div class="form-group">
    <label class="control-label col-sm-4" for="mp">Match Parameter:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="mp" name="mp" placeholder="Enter Match Parameter">
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
    <label class="control-label col-sm-4" for="piwik">Piwik:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="piwik" name="piwik" placeholder="Enter Piwik">
    </div>
  </div>

	<div class="form-group">
    <label class="control-label col-sm-4" for="cache">Cache:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="cache" name="cache" placeholder="Enter Cache">
    </div>
  </div>

	<div class="form-group">
    <label class="control-label col-sm-4" for="allowedParameters">Allowed Paramters:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="allowedParameters" name="allowedParameters" placeholder="Enter Allowed Parameters">
    </div>
  </div>

	<div class="form-group">
    <label class="control-label col-sm-4" for="abtest">Ab Test:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="abtest" name="abtest" placeholder="Enter Ab test">
    </div>
  </div>
   <div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-8">
      <button type="submit" class="btn btn-lg btn-primary" name="submit" value="Submit">Submit</button>
    </div>
  </div>
  </form>
  </div>   
  </div>
</div></div>


<?php
if((empty($nameErr))&&(empty($websiteErr))&&(empty($mpErr))&&(!empty($name))&&(!empty($website))&&(!empty($mp))&&(!empty($pubid))&&(empty($pubidErr))&&(empty($widgetErr))&&(!empty($widget2))){	 
	$crud = new crud();
	$crud->insert($pubid,$name, $website, $piwik, $cache,$allowedParameters,$abtest, $mp,$widget2);
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

