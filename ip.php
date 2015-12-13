<?php
require_once("./ecosoc.php");
require_once("./ip_crud.php");

?>



<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>IP Application form | BITSMUN</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  
  <script>
  $(function() {
    $( "#accordion" ).accordion();
  });
  </script>
</head>

<?php

$status = false;
	$name = $email = $ccode = $phone= $institute = $nofmun = $sex  = $pos =  $essay = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
   $name = test_input($_POST["name"]);
   $email = test_input($_POST["email"]);
   $phone = test_input($_POST["ccode"]);
   $institute = test_input($_POST["institue"]);
   $nofmun = test_input($_POST["nofmun"]);
   $sex = test_input($_POST["sex"]);
  $pos = test_input($_POST["pos"]);
   $essay = test_input($_POST["essay"]);	
  $status = true;
}
  
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>



<body>

	<div class="jumbotron">
    		<h1>International Press Application form</h1>
        <p class="lead"><br></p>
        	</div>
	<div class="row">		  			
	<div class="col-lg-6">
 	<form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >

	<div class="form-group">
    <label class="control-label col-sm-4" for="name">Name:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" value="" required>
     </div>
  </div>
  
	<div class="form-group">
    <label class="control-label col-sm-4" for="email">E-mail:</label>
    <div class="col-sm-8">
      <input type="email" name = "email" class="form-control" id="email" placeholder="Enter Your Email Address" value=""  required>
    </div>
  </div>


	<div class="form-group">
    <label class="control-label col-sm-4" for="phoneNumber">Phone Number:</label>
    <div class="col-sm-6 input-group">
	 <div class="input-group-addon ">+</div>
      <input type="phone" name = "ccode" class="form-control" id="ccode" name="ccode" placeholder="" value=""  required>
    </div>
    </div>

  <div class="form-group">
    <label class="control-label col-sm-4" for="sex">Sex:</label>
    <div class="col-sm-8">
      <input type="radio" name = "sex" id="sex" name="sex" value="male" required >Male
      <br>
      <input type="radio" name = "sex"  id="sex" name="sex"  value="female" required >Female
      <br>
      <input type="radio" name = "sex"  id="sex" name="sex"  value="other" required >Other
    </div>
  </div>

	<div class="form-group">
    <label class="control-label col-sm-4" for="institue">Name Of Your Institute:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="institue" name="institue" placeholder="Enter Your Insititute Name" value=""  required>
     </div>
  </div>

	<div class="form-group">
    <label class="control-label col-sm-4" for="nofmun">Number Of MUNs Attended:</label>
    <div class="col-sm-8">
      <input type="number" class="form-control" id="nofmun" name="nofmun" min="0" max="99" placeholder="" value=""  required>
     </div>
  </div>

	<div class="form-group">
    <label class="control-label col-sm-4" for="pos">Position To Apply:</label>
    <div class="col-sm-8">
     	<select class='form-control' id="pos" name="pos" placeholder="" required>
	<option selected='selected' value="" disabled='disable'>Select Your Position</option>
	<option value='ipChief' >IP Chief</option>
	<option value='ipDeputyChief' >Deputy IP Chief</option>
	<option value='reporte' >Reporter</option>
	<option value='photographer' >Photographer</option>
	</select>	
	</div>
  </div>

	<div class='form-group'>
		<label class='control-label col-sm-4' for='essay'>Past Experience:</label>
			<div class='col-sm-6'>
					<br>
					<textarea class='form-control execexp' name='essay' rows='20' id="essay" placeholder="Write your answer here" ></textarea>
			</div>
	</div>

<br>
<div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-8">
      <button type="submit" class="btn btn-lg btn-primary" name="submit" value="Submit">Submit</button>
    </div>
  </div></form>
</div>
</div>
 <?php
	if($status){
	$info_crud = new ip_crud();
	$info_crud->insert($name,$email,$phone,$sex,$institute,$nofmun,$pos,$essay);
}
?>
 
</body>
</html>

