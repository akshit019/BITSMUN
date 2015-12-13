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
<!DOCTYPE html>
<html lang="en">
  <?php
  	echo renderAccountPageHeader(array("#SITE_ROOT#" => SITE_ROOT, "#SITE_TITLE#" => SITE_TITLE, "#PAGE_TITLE#" => "Render Publsiher"));
  ?>
  <body>

   	   <?php
// define variables and set to empty values
$pubidErr = $sidErr= "";
$sid = $pubid = $templateHead = $templateRepeat = $templateFoot = $renderFunc = $css = $rowHead = $rowRepeat = $rowFoot = $wid_name= "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
/*sid*/   if (empty($_POST["pubid"])) {
     $pubidErr = "Publisher ID is required";
   } else {
     $pubid = test_input($_POST["pubid"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$pubid)) {
       $pubidErr = "Only letters and white space allowed";
     }
   }
  
   if (empty($_POST["sid"])) {
     $sidErr = "Secondary ID is required";
   } else {
     $sid = test_input($_POST["sid"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$sid)) {
       $sidErr = "Only letters and white space allowed";
     }
   }

	
   $templateHead = test_input($_POST["templateHead"]);
   $templateRepeat = test_input($_POST["templateRepeat"]);
   $templateFoot = test_input($_POST["templateFoot"]);
   $renderFunc = test_input($_POST["renderFunc"]);
   $css = test_input($_POST["css"]);
   $rowHead = test_input($_POST["rowHead"]);
   $rowRepeat = test_input($_POST["rowRepeat"]);
   $rowFoot = test_input($_POST["rowFoot"]);
	 $wid_name = test_input($_POST["widget"]);

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
          echo renderMenu("render_publisher");
        ?>  

      	<div id="page-wrapper">
	  			<div class="row">
          	<div id='display-alerts' class="col-lg-12">

          	</div>
        	</div>
        	
    		<h1>Administrator Form</h1>
        <p class="lead">Use this document to add to the database.<br></p>
        <div class="row">
		  			<div class="col-lg-6">
			<form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
  
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
      <input type="text" class="form-control" id="sid" name = "sid" placeholder="Enter Secondary ID">
      <span class="error"><?php echo $sidErr;?></span>
    </div>
  </div>
 
 <div class="form-group">
    <label class="control-label col-sm-4" for="widget">Select Widget:</label>
    <div class="col-sm-8"> 
      <select class="form-control" id="widget" name = "widget" placeholder="Select the widget">
      <?php 
      	$wid = new widget();
      	$widget = $wid->get_widget();
      	foreach($widget as $doc){
      		echo "<option id=" . "$doc" . " name=" . "$doc" . " value=" . "$doc" .">" . "$doc" . " </option>";
      		
      	}
      ?>
      
      </select>
    </div>
  </div>
  
 <div id="display">
  <h2 class="form-signin-heading" style="text-align: center;">Settings</h2>
  <h4 class="form-signin-heading" style="text-align: center;">JavaScript Settings</h4>
   <div class="form-group">
    <label class="control-label col-sm-4" for="renderFunc">Render Function:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="renderFunc" value="">
    </div>
 	 </div>
 	 
  <h4 class="form-signin-heading" style="text-align: center;">Html Settings</h4>
   <div class="form-group">
    <label class="control-label col-sm-4" for="templateHead">Template Head:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="templateHead" value="">
    </div>
 	 </div>
   <div class="form-group">
    <label class="control-label col-sm-4" for="templateRepeat">Template Repeat:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="templateRepeat" value="">
    </div>
 	 </div>
   <div class="form-group">
    <label class="control-label col-sm-4" for="templateFoot">Template Foot:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="templateFoot" value="">
    </div>
 	 </div> 	  	   
<div class="form-group">
    <label class="control-label col-sm-4" for="rowHead">Row Head:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="rowHead" value="">
    </div>
 	 </div>
   <div class="form-group">
    <label class="control-label col-sm-4" for="rowRepeat">Row Repeat:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="rowRepeat" value="">
    </div>
 	 </div>
   <div class="form-group">
    <label class="control-label col-sm-4" for="rowFoot">Row Foot:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="rowFoot" value="">
    </div>
 	 </div> 	 
  <h4 class="form-signin-heading" style="text-align: center;">CSS Settings</h4>
	<div class="form-group">
    <label class="control-label col-sm-4" for="css">CSS:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="css" value="">
    </div>
 	 </div>
	</div>	

<div id="final">
  <div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-8">
      <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
    </div>
  </div>
</div>
</form>
     </div>
   </div>
</div></div>

<?php
if((empty($pubidErr))&&(empty($sidErr))&&(!empty($pubid))&&(!empty($sid))){	 
	$crud = new admin_crud();
	$crud->insert($pubid,$sid,$wid_name,$renderFunc,$templateHead,$templateRepeat,$templateFoot,$rowHead,$rowRepeat,$rowFoot,$css);
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
