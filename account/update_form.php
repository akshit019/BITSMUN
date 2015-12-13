<?php
	require_once("../models/config.php");
	require_once("./crud.php");
	require_once("./admin_crud.php");
	require_once("./widget.php");

// Request method: GET
//$ajax = checkRequestMode("get");

if (!securePage(__FILE__)){
    apiReturnError($ajax);
}

setReferralPage(getAbsoluteDocumentPath(__FILE__));

?>

   	   <?php
// define variables and set to empty values
$pubidErr = $sidErr= $widgetErr= "";
$sid = $pubid = $templateHead = $templateRepeat = $templateFoot = $renderFunc = $css = $rowHead = $rowRepeat = $rowFoot = $wid_name= $submit= "";


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
    $("#widget").change(function(){
        $.post("updateAjax.php",
        {
          pubid: document.getElementById("pubid").value,
          sid: document.getElementById("sid").value,
          widget: document.getElementById("widget").value
        },
        function(data,status){
        	var myObj = $.parseJSON(data);
        	document.getElementById("renderFunc").value = myObj['renderFunc'];
        	document.getElementById("css").value = myObj['css'];
        	
        	var temp = ["templateHead", "templateRepeat", "templateFoot","rowHead", "rowRepeat", "rowFoot"];
					var i;
       		for(i =0; i<temp.length; i++)
       		{
       				document.getElementById(temp[i]).value = myObj['html'][temp[i]];
       		} 	
        	 
        });
    });
});
</script>
<script>
$(document).ready(function(){
    $("#pubid").change(function(){
        $.post("getsid.php",
        {
          pubid: document.getElementById("pubid").options[document.getElementById("pubid").selectedIndex].value
        },
        function(data,status){
        	var options = $.parseJSON(data);
    			var select = document.getElementById("sid");
   				for (var i=0; i<select.length; i++){
  					
     				select.remove(i);
  				}
  				
   				for (var i = 0; i < options.length; i++) {
      	  var opt = options[i];
      	  var el = document.createElement("option");
      	  el.textContent = opt;
      	  el.value = opt;
      	  select.appendChild(el);
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
        	<p class="lead">Provide all the fields if you want to update. For deletion only Publisher ID, Secondary ID and a widget are required.<br></p>
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
      		echo "<option name=" . $doc . " value=" . $doc .">" . $doc . " </option>";
      	}
      ?>
      <span class="error"><?php echo $pubidErr;?></span>
      </select>

    </div>
  </div>
		
		<div class="form-group">
    <label class="control-label col-sm-4" for="sid">Secondary ID:</label>
    <div class="col-sm-8">
			<select class="form-control" id="sid" class="target" name = "sid" placeholder="Select Secondary ID">
				
      
      <span class="error"><?php echo $sidErr;?></span>
      </select>
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
      		echo "<option  name=" . "$doc" . " value=" . "$doc" .">" . "$doc" . " </option>";
      		
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
      <input type="text" class="form-control" name="renderFunc" id="renderFunc" value="">
    </div>
 	 </div>
 	 
  <h4 class="form-signin-heading" style="text-align: center;">Html Settings</h4>
   <div class="form-group">
    <label class="control-label col-sm-4" for="templateHead">Template Head:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="templateHead" id="templateHead" value="">
    </div>
 	 </div>
   <div class="form-group">
    <label class="control-label col-sm-4" for="templateRepeat">Template Repeat:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="templateRepeat" id="templateRepeat" value="">
    </div>
 	 </div>
   <div class="form-group">
    <label class="control-label col-sm-4" for="templateFoot">Template Foot:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="templateFoot" id="templateFoot" value="">
    </div>
 	 </div> 	  	   
<div class="form-group">
    <label class="control-label col-sm-4" for="rowHead">Row Head:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="rowHead" id="rowHead" value="">
    </div>
 	 </div>
   <div class="form-group">
    <label class="control-label col-sm-4" for="rowRepeat">Row Repeat:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="rowRepeat" id="rowRepeat" value="">
    </div>
 	 </div>
   <div class="form-group">
    <label class="control-label col-sm-4" for="rowFoot">Row Foot:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="rowFoot" id="rowFoot" value="">
    </div>
 	 </div> 	 
  <h4 class="form-signin-heading" style="text-align: center;">CSS Settings</h4>
	<div class="form-group">
    <label class="control-label col-sm-4" for="css">CSS:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="css" id="css" value="">
    </div>
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
if(($submit === "update")){	 
	$crud = new admin_crud();
	$crud->update($pubid,$sid, $wid_name,$renderFunc,$templateHead,$templateRepeat,$templateFoot,$rowHead,$rowRepeat,$rowFoot,$css);
	}
	
	else if(($submit === "delete")){	 
	$crud = new admin_crud();
	$crud->delete($sid,$pubid,$wid_name);
	}



?>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->


</body>
</html>
l
