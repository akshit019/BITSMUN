<?php
require_once("./ecosoc.php");
require_once("./delStep1_crud.php");

?>



<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Delegate Application Form | BITSMUN</title>
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
 <script type="text/javascript">
 function first_council(){
 	var x = document.getElementById('vidf').value;
 	document.getElementById('who1').style.display = 'none';
 	document.getElementById('hrc1').style.display = 'none';
 	document.getElementById('fifa1').style.display = 'none';
	document.getElementById('jcc1').style.display = 'none';	 	
	document.getElementById('ga1').style.display = 'none';
 	document.getElementById('ecosoc1').style.display = 'none';
 	document.getElementById('hcc1').style.display = 'none';
 	document.getElementById(x).style.display = 'block';
 }

 function second_council(){
 	var x = document.getElementById('vids').value;
 	document.getElementById('who2').style.display = 'none';
 	document.getElementById('hrc2').style.display = 'none';
 	document.getElementById('fifa2').style.display = 'none';
 	document.getElementById('ga2').style.display = 'none';
	document.getElementById('jcc2').style.display = 'none';	 	
	document.getElementById('ecosoc2').style.display = 'none';
 	document.getElementById('hcc2').style.display = 'none';
 	document.getElementById(x).style.display = 'block';
 }

 function third_council(){
 	var x = document.getElementById('vidt').value;
 	document.getElementById('who3').style.display = 'none';
 	document.getElementById('hrc3').style.display = 'none';
 	document.getElementById('fifa3').style.display = 'none';
	document.getElementById('jcc3').style.display = 'none'; 	
	document.getElementById('ga3').style.display = 'none';
 	document.getElementById('ecosoc3').style.display = 'none';
 	document.getElementById('hcc3').style.display = 'none';
 	document.getElementById(x).style.display = 'block';
 }

 </script>
 

</head>

<?php

$c = new ecosoc();

/*
$c->insert("ECOSOC","Afghanistan");
$c->insert("ECOSOC","Argentina");
$c->insert("ECOSOC","Australia");
$c->insert("ECOSOC","Bahrain");
$c->insert("ECOSOC","Belgium");
$c->insert("ECOSOC","Brazil");
$c->insert("ECOSOC","Canada");
$c->insert("ECOSOC","China");
$c->insert("ECOSOC","Cyprus");
$c->insert("ECOSOC","Czech Republic");
$c->insert("ECOSOC","Democratic People’s Republic of Korea");
$c->insert("ECOSOC","Denmark");
$c->insert("ECOSOC","Egypt");
$c->insert("ECOSOC","France");
$c->insert("ECOSOC","Germany");
$c->insert("ECOSOC","Greece");
$c->insert("ECOSOC","India");
$c->insert("ECOSOC","Indonesia");
$c->insert("ECOSOC","Iran");
$c->insert("ECOSOC","Iraq");
$c->insert("ECOSOC","Israel");
$c->insert("ECOSOC","Italy");
$c->insert("ECOSOC","Japan");
$c->insert("ECOSOC","Malaysia");
$c->insert("ECOSOC","Mexico");
$c->insert("ECOSOC","Netherlands");
$c->insert("ECOSOC","Norway");
$c->insert("ECOSOC","Pakistan");
$c->insert("ECOSOC","Poland");
$c->insert("ECOSOC","Republic of Korea");
$c->insert("ECOSOC","Russian Federation");
$c->insert("ECOSOC","Saudi Arabia");
$c->insert("ECOSOC","Singapore");
$c->insert("ECOSOC","South Africa");
$c->insert("ECOSOC","Spain");
$c->insert("ECOSOC","Sweden");
$c->insert("ECOSOC","Switzerland");
$c->insert("ECOSOC","Syrian Arab Republic");
$c->insert("ECOSOC","Ukraine");
$c->insert("ECOSOC","United Arab Emirates");
$c->insert("ECOSOC","United Kingdom");
$c->insert("ECOSOC","United States of America");
$c->insert("ECOSOC","Yemen");

$c->insert("FIFA","Argentina");
$c->insert("FIFA","Germany");
$c->insert("FIFA","Belgium");
$c->insert("FIFA","Portugal");
$c->insert("FIFA","Colombia");
$c->insert("FIFA","Spain");
$c->insert("FIFA","Brazil");
$c->insert("FIFA","Wales");
$c->insert("FIFA","Chile");
$c->insert("FIFA","England");
$c->insert("FIFA","Austria");
$c->insert("FIFA","Switzerland");
$c->insert("FIFA","Romania");
$c->insert("FIFA","Netherlands");
$c->insert("FIFA","Czech Republic");
$c->insert("FIFA","Croatia");
$c->insert("FIFA","Italy");
$c->insert("FIFA","Slovakia");
$c->insert("FIFA","Algeria");
$c->insert("FIFA","Uruguay");
$c->insert("FIFA","Côte d'Ivoire");
$c->insert("FIFA","France");
$c->insert("FIFA","Iceland");
$c->insert("FIFA","Ukraine");
$c->insert("FIFA","Ghana");
$c->insert("FIFA","Russia");
$c->insert("FIFA","Mexico");
$c->insert("FIFA","Denmark");
$c->insert("FIFA","USA");
$c->insert("FIFA","Bosnia and Herzegovina");
$c->insert("FIFA","Ecuador");
$c->insert("FIFA","Albania");
$c->insert("FIFA","Hungary");
$c->insert("FIFA","Norway");
$c->insert("FIFA","Northern Ireland");
$c->insert("FIFA","Tunisia");
$c->insert("FIFA","Turkey");
$c->insert("FIFA","Senegal");
$c->insert("FIFA","Iran");
$c->insert("FIFA","Scotland");
$c->insert("FIFA","Cape Verde Islands");
$c->insert("FIFA","Costa Rica");
$c->insert("FIFA","Poland");
$c->insert("FIFA","Greece");
$c->insert("FIFA","Sweden");
$c->insert("FIFA","Slovenia");
$c->insert("FIFA","Israel");
$c->insert("FIFA","Cameroon");
$c->insert("FIFA","Congo");
$c->insert("FIFA","Peru");
$c->insert("FIFA","Nigeria");
$c->insert("FIFA","Korea Republic");
$c->insert("FIFA","Republic of Ireland");
$c->insert("FIFA","Guinea");
$c->insert("FIFA","Japan");
$c->insert("FIFA","Jamaica");
$c->insert("FIFA","Australia");
$c->insert("FIFA","Trinidad and Tobago");
$c->insert("FIFA","Congo DR");
$c->insert("FIFA","Paraguay");
$c->insert("FIFA","Mali");
$c->insert("FIFA","Serbia");
$c->insert("FIFA","Finland");
$c->insert("FIFA","Gabon");
$c->insert("FIFA","Panama");
$c->insert("FIFA","Equatorial Guinea");
$c->insert("FIFA","Bolivia");
$c->insert("FIFA","Venezuela");
$c->insert("FIFA","United Arab Emirates");
$c->insert("FIFA","Zambia");
$c->insert("FIFA","Montenegro");
$c->insert("FIFA","South Africa");
$c->insert("FIFA","Uzbekistan");
$c->insert("FIFA","Uganda");
$c->insert("FIFA","Burkina Faso");
$c->insert("FIFA","Haiti");
$c->insert("FIFA","Bulgaria");
$c->insert("FIFA","Togo");
$c->insert("FIFA","Morocco");
$c->insert("FIFA","China PR");
$c->insert("FIFA","Guatemala");
$c->insert("FIFA","Antigua and Barbuda");
$c->insert("FIFA","Sudan");
$c->insert("FIFA","Iraq");
$c->insert("FIFA","Faroe Islands");
$c->insert("FIFA","Estonia");
$c->insert("FIFA","Saudi Arabia");
$c->insert("FIFA","Mauritania");
$c->insert("FIFA","Honduras");
$c->insert("FIFA","Armenia");
$c->insert("FIFA","Qatar");

$c->insert("GA","Albania");
$c->insert("GA","Algeria");
$c->insert("GA","Andorra");
$c->insert("GA","Argentina");
$c->insert("GA","Armenia");
$c->insert("GA","Australia");
$c->insert("GA","Austria");
$c->insert("GA","Bahrain");
$c->insert("GA","Bangladesh");
$c->insert("GA","Belarus");
$c->insert("GA","Belgium");
$c->insert("GA","Bhutan");
$c->insert("GA","Brazil");
$c->insert("GA","Bulgaria");
$c->insert("GA","Burundi");
$c->insert("GA","Cameroon");
$c->insert("GA","Canada");
$c->insert("GA","Central African Republic");
$c->insert("GA","Chile");
$c->insert("GA","China");
$c->insert("GA","Colombia");
$c->insert("GA","Comoros");
$c->insert("GA","Congo");
$c->insert("GA","Côte d'Ivoire");
$c->insert("GA","Croatia");
$c->insert("GA","Cuba");
$c->insert("GA","Cyprus");
$c->insert("GA","Czech Republic");
$c->insert("GA","Democratic People's Republic of Korea");
$c->insert("GA","Democratic Republic of the Congo");
$c->insert("GA","Denmark");
$c->insert("GA","Ecuador");
$c->insert("GA","Egypt");
$c->insert("GA","Ethiopia");
$c->insert("GA","Finland");
$c->insert("GA","France");
$c->insert("GA","Georgia");
$c->insert("GA","Germany");
$c->insert("GA","Ghana");
$c->insert("GA","Greece");
$c->insert("GA","Hungary");
$c->insert("GA","Iceland");
$c->insert("GA","India");
$c->insert("GA","Indonesia");
$c->insert("GA","Iran");
$c->insert("GA","Iraq");
$c->insert("GA","Ireland");
$c->insert("GA","Israel");
$c->insert("GA","Italy");
$c->insert("GA","Japan");
$c->insert("GA","Jordan");
$c->insert("GA","Kazakhstan");
$c->insert("GA","Kenya");
$c->insert("GA","Kuwait");
$c->insert("GA","Kyrgyzstan");
$c->insert("GA","Lebanon");
$c->insert("GA","Liberia");
$c->insert("GA","Libya");
$c->insert("GA","Luxembourg");
$c->insert("GA","Madagascar");
$c->insert("GA","Malaysia");
$c->insert("GA","Maldives");
$c->insert("GA","Mauritania");
$c->insert("GA","Mauritius");
$c->insert("GA","Mexico");
$c->insert("GA","Mozambique");
$c->insert("GA","Myanmar");
$c->insert("GA","Namibia");
$c->insert("GA","Nepal");
$c->insert("GA","Netherlands");
$c->insert("GA","New Zealand");
$c->insert("GA","Nigeria");
$c->insert("GA","Norway");
$c->insert("GA","Oman");
$c->insert("GA","Pakistan");
$c->insert("GA","Panama");
$c->insert("GA","Paraguay");
$c->insert("GA","Peru");
$c->insert("GA","Philippines");
$c->insert("GA","Poland");
$c->insert("GA","Portugal");
$c->insert("GA","Qatar");
$c->insert("GA","Republic of Korea");
$c->insert("GA","Romania");
$c->insert("GA","Russian Federation");
$c->insert("GA","Saudi Arabia");
$c->insert("GA","Senegal");
$c->insert("GA","Serbia");
$c->insert("GA","Seychelles");
$c->insert("GA","Sierra Leone");
$c->insert("GA","Singapore");
$c->insert("GA","Slovakia");
$c->insert("GA","Somalia");
$c->insert("GA","South Africa");
$c->insert("GA","South Sudan");
$c->insert("GA","Spain");
$c->insert("GA","Sri Lanka");
$c->insert("GA","Sudan");
$c->insert("GA","Sweden");
$c->insert("GA","Tajikistan");
$c->insert("GA","Thailand");
$c->insert("GA","Turkey");
$c->insert("GA","Turkmenistan");
$c->insert("GA","Uganda");
$c->insert("GA","Ukraine");
$c->insert("GA","United Arab Emirates");
$c->insert("GA","United Kingdom");
$c->insert("GA","United States of America");
$c->insert("GA","Uruguay");
$c->insert("GA","Uzbekistan");
$c->insert("GA","Venezuela");
$c->insert("GA","Vietnam");
$c->insert("GA","Yemen");
$c->insert("GA","Zimbabwe");

$c->insert("HCC","Sadashivrao Bhau");
$c->insert("HCC","Peshwa Balajirao");
$c->insert("HCC","Vishwasrao");
$c->insert("HCC","Raghunathrao");
$c->insert("HCC","Mahadaji Shinde");
$c->insert("HCC","Govind Pant Bundele");
$c->insert("HCC"," Malharrao Holkar");
$c->insert("HCC","Ibrahim Khan Gardi");
$c->insert("HCC","Jat Suraj Mal");
$c->insert("HCC","Vitthak Vinchurkar");
$c->insert("HCC","Ranoji Bhoite");
$c->insert("HCC","Ahmad Shah Durrani");
$c->insert("HCC","Timur Shah Durrani");
$c->insert("HCC","Shuja-ud-Daula");
$c->insert("HCC","Najib-ud-Daula");
$c->insert("HCC","Jahan Khan");
$c->insert("HCC","Diler Khan Marwat");
$c->insert("HCC","Alam Khan Marwat");
$c->insert("HCC","Atai Khan Baluch");
$c->insert("HCC","Yousuf Zai");
$c->insert("HCC","Wazir Shaha Wali Khan Afridi");
$c->insert("HCC","Hafiz Rahmat");
$c->insert("HCC","Pasand Khan ");
$c->insert("HCC","Ahmad shah Bangash");
$c->insert("HCC","Shah alam II");
$c->insert("HCC","Robert Clive");
$c->insert("HCC","Madho singh I");
$c->insert("HCC","Jankoji Rao Scindia");
$c->insert("HCC","Samsher bahadur ");
$c->insert("HCC","Maharaja raj singh II");

$c->insert("HRC","Albania");
$c->insert("HRC","Algeria");
$c->insert("HRC","Argentina");
$c->insert("HRC","Bangladesh");
$c->insert("HRC","Bolivia (Plurinational State of)");
$c->insert("HRC","Botswana");
$c->insert("HRC","Brazil");
$c->insert("HRC","China");
$c->insert("HRC","Congo");
$c->insert("HRC","Côte d’Ivoire");
$c->insert("HRC","Cuba");
$c->insert("HRC","El Salvador");
$c->insert("HRC","Estonia");
$c->insert("HRC","Ethiopia");
$c->insert("HRC","France");
$c->insert("HRC","Gabon");
$c->insert("HRC","Germany");
$c->insert("HRC","Ghana");
$c->insert("HRC","India");
$c->insert("HRC","Indonesia");
$c->insert("HRC","Ireland");
$c->insert("HRC","Japan");
$c->insert("HRC","Kazakhstan");
$c->insert("HRC","Kenya");
$c->insert("HRC","Latvia");
$c->insert("HRC","Maldives");
$c->insert("HRC","Mexico");
$c->insert("HRC","Montenegro");
$c->insert("HRC","Morocco");
$c->insert("HRC","Namibia");
$c->insert("HRC","Netherlands");
$c->insert("HRC","Nigeria");
$c->insert("HRC","Pakistan");
$c->insert("HRC","Paraguay");
$c->insert("HRC","Portugal");
$c->insert("HRC","Qatar");
$c->insert("HRC","Republic of Korea");
$c->insert("HRC","Russian Federation");
$c->insert("HRC","Saudi Arabia");
$c->insert("HRC","Sierra Leone");
$c->insert("HRC","South Africa");
$c->insert("HRC","The former Yugoslav Republic of Macedonia");
$c->insert("HRC","United Arab Emirates");
$c->insert("HRC","United Kingdom of Great Britain and Northern Ireland");
$c->insert("HRC","United States of America");
$c->insert("HRC","Venezuela (Bolivarian Republic of)");
$c->insert("HRC","Viet Nam");
$c->insert("HRC","Syria");
$c->insert("HRC","Turkey");
$c->insert("HRC","Greece");
$c->insert("HRC","Kosovo");
$c->insert("HRC","Italy");
$c->insert("HRC","Austria");

$c->insert("WHO","Afghanistan");
$c->insert("WHO","Australia");
$c->insert("WHO","Belgium");
$c->insert("WHO","Brazil");
$c->insert("WHO","Cameroon");
$c->insert("WHO","Chile");
$c->insert("WHO","China");
$c->insert("WHO","Czech Republic");
$c->insert("WHO","Democratic People's Republic of Korea");
$c->insert("WHO","Democratic Republic of the Congo");
$c->insert("WHO","Denmark");
$c->insert("WHO","Egypt");
$c->insert("WHO","Finland");
$c->insert("WHO","France");
$c->insert("WHO","Germany");
$c->insert("WHO","Greece");
$c->insert("WHO","Hungary");
$c->insert("WHO","India");
$c->insert("WHO","Indonesia");
$c->insert("WHO","Iran");
$c->insert("WHO","Iraq");
$c->insert("WHO","Israel");
$c->insert("WHO","Italy");
$c->insert("WHO","Japan");
$c->insert("WHO","Kenya");
$c->insert("WHO","Libya");
$c->insert("WHO","Mexico");
$c->insert("WHO","Netherlands");
$c->insert("WHO","New Zealand");
$c->insert("WHO","Nigeria");
$c->insert("WHO","Norway");
$c->insert("WHO","Pakistan");
$c->insert("WHO","Qatar");
$c->insert("WHO","Republic of Korea");
$c->insert("WHO","Russian Federation");
$c->insert("WHO","Rwanda");
$c->insert("WHO","Saudi Arabia");
$c->insert("WHO","Senegal");
$c->insert("WHO","Somalia");
$c->insert("WHO","South Africa");
$c->insert("WHO","Spain");
$c->insert("WHO","Sri Lanka");
$c->insert("WHO","Sweden");
$c->insert("WHO","Switzerland");
$c->insert("WHO","Syrian Arab Republic");
$c->insert("WHO","Tunisia");
$c->insert("WHO","Turkey");
$c->insert("WHO","Uganda");
$c->insert("WHO","Ukraine");
$c->insert("WHO","United Kingdom");
$c->insert("WHO","United States of America");
$c->insert("WHO","Zimbabwe");

$c->insert("JCC","Russia");
$c->insert("JCC","USA");
$c->insert("JCC","Turkey");
$c->insert("JCC","Iran");
$c->insert("JCC","Saudi Arabia");
$c->insert("JCC","ISIL");
$c->insert("JCC","Syrian Revolutionary Command Council");
$c->insert("JCC","Hezbollah");
$c->insert("JCC","Jordan");
$c->insert("JCC","France");
$c->insert("JCC","Germany");
$c->insert("JCC","Israel");
$c->insert("JCC","Syrian Arab Republic(Government)");
$c->insert("JCC","Iraqi-Kurdistan");
$c->insert("JCC","North Korea");
$c->insert("JCC","Syrian Kurdistan");
$c->insert("JCC","Free Syrian Army");
$c->insert("JCC","Jaish-Al-Fatah");
*/

$ecosoc = $c->read("ECOSOC");
$who = $c->read("WHO");
$fifa = $c->read("FIFA");
$ga = $c->read("GA");
$hcc = $c->read("HCC");
$hrc = $c->read("HRC");
$jcc = $c->read("JCC");

$status = false;
	$name = $email = $ccode = $phone= $institute = $nofmun = $sex  = $vidf = $vids = $vidt = $vcp11 = $vcp12 = $vcp13 = $vcp14 = $vcp15 = $vcp21 = $vcp22 = $vcp23 = $vcp24 = $vcp25 = $vcp31 = $vcp32 = $vcp33 = $vcp34 = $vcp35 = $essay = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
   $name = test_input($_POST["name"]);
   $email = test_input($_POST["email"]);
   $phone = test_input($_POST["ccode"]);
   $institute = test_input($_POST["institue"]);
   $nofmun = test_input($_POST["nofmun"]);
   $sex = test_input($_POST["sex"]);
	 $vidf = test_input($_POST["vidf"]);
   $vids = test_input($_POST["vids"]);
   $vidt = test_input($_POST["vidt"]);
   $vcp11 = test_input($_POST["vcp11"]);
   $vcp12 = test_input($_POST["vcp12"]);
   $vcp13 = test_input($_POST["vcp13"]);
   $vcp14 = test_input($_POST["vcp14"]);
   $vcp15 = test_input($_POST["vcp15"]);
   $vcp21 = test_input($_POST["vcp21"]);
   $vcp22 = test_input($_POST["vcp22"]);
   $vcp23 = test_input($_POST["vcp23"]);
   $vcp24 = test_input($_POST["vcp24"]);
   $vcp25 = test_input($_POST["vcp25"]);
      $vcp31 = test_input($_POST["vcp31"]);
   $vcp32 = test_input($_POST["vcp32"]);
   $vcp33 = test_input($_POST["vcp33"]);
   $vcp34 = test_input($_POST["vcp34"]);
   $vcp35 = test_input($_POST["vcp35"]);
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
    		<h1>Delegate Application form</h1>
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

<div class="col-lg-4"></div> 
<div id="accordion" class="col-lg-8">
  <h3> 
	<select class='form-control' id='vidf' name='vidf' onchange="first_council();" placeholder="">	
	<option  value='ecosoc1' >ECOSOC</option>
	<option  value='fifa1' >FIFA</option>
	<option  value='who1' >WHO</option>
	<option  value='ga1' >GA</option>
	<option  value='hcc1' >HCC</option>
	<option  value='hrc1' >HRC</option>
	<option  value='jcc1' >JCC</option>
	</select></h3>  <div>
    <p id="ecosoc1" >
   	<select class='form-control' id='vcp11' name='vcp11' placeholder="">
	<option selected='selected' value='' disabled='disable'>Select your first preference</option>
	<?php
					foreach($ecosoc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp12' name='vcp12' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Second preference</option>
	<?php
					foreach($ecosoc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp13' name='vcp13' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Third preference</option>
	<?php
					foreach($ecosoc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp14' name='vcp14' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fourth preference</option>
	<?php
					foreach($ecosoc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp15' name='vcp15' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fifth preference</option>
	<?php
					foreach($ecosoc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
    </p>
     <p id="who1" style="display:none">
   	<select class='form-control' id='vcp11' name='vcp11' placeholder="">
	<option selected='selected' value='' disabled='disable'>Select your first preference</option>
	<?php
					foreach($who as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp12' name='vcp12' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Second preference</option>
	<?php
					foreach($who as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp13' name='vcp13' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Third preference</option>
	<?php
					foreach($who as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp14' name='vcp14' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fourth preference</option>
	<?php
					foreach($who as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp15' name='vcp15' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fifth preference</option>
	<?php
					foreach($who as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
    </p>
     <p id="fifa1" style="display:none">
   	<select class='form-control' id='vcp11' name='vcp11' placeholder="">
	<option selected='selected' value='' disabled='disable'>Select your first preference</option>
	<?php
					foreach($fifa as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp12' name='vcp12' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Second preference</option>
	<?php
					foreach($fifa as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp13' name='vcp13' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Third preference</option>
	<?php
					foreach($fifa as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp14' name='vcp14' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fourth preference</option>
	<?php
					foreach($fifa as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp15' name='vcp15' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fifth preference</option>
	<?php
					foreach($fifa as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
    </p>
     <p id="ga1" style="display:none">
   	<select class='form-control' id='vcp11' name='vcp11' placeholder="">
	<option selected='selected' value='' disabled='disable'>Select your first preference</option>
	<?php
					foreach($ga as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp12' name='vcp12' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Second preference</option>
	<?php
					foreach($ga as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp13' name='vcp13' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Third preference</option>
	<?php
					foreach($ga as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp14' name='vcp14' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fourth preference</option>
	<?php
					foreach($ga as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp15' name='vcp15' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fifth preference</option>
	<?php
					foreach($ga as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
    </p>
     <p id="hcc1" style="display:none">
   	<select class='form-control' id='vcp11' name='vcp11' placeholder="">
	<option selected='selected' value='' disabled='disable'>Select your first preference</option>
	<?php
					foreach($hcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp12' name='vcp12' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Second preference</option>
	<?php
					foreach($hcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp13' name='vcp13' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Third preference</option>
	<?php
					foreach($hcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp14' name='vcp14' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fourth preference</option>
	<?php
					foreach($hcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp15' name='vcp15' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fifth preference</option>
	<?php
					foreach($hcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
    </p>
    <p id="jcc1" style="display:none">
   	<select class='form-control' id='vcp11' name='vcp11' placeholder="">
	<option selected='selected' value='' disabled='disable'>Select your first preference</option>
	<?php
					foreach($jcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp12' name='vcp12' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Second preference</option>
	<?php
					foreach($jcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp13' name='vcp13' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Third preference</option>
	<?php
					foreach($jcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp14' name='vcp14' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fourth preference</option>
	<?php
					foreach($hrc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp15' name='vcp15' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fifth preference</option>
	<?php
					foreach($jcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
    </p>
	<p id="hrc1" style="display:none">
   	<select class='form-control' id='vcp11' name='vcp11' placeholder="">
	<option selected='selected' value='' disabled='disable'>Select your first preference</option>
	<?php
					foreach($hrc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp12' name='vcp12' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Second preference</option>
	<?php
					foreach($hrc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp13' name='vcp13' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Third preference</option>
	<?php
					foreach($hrc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp14' name='vcp14' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fourth preference</option>
	<?php
					foreach($hrc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp15' name='vcp15' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fifth preference</option>
	<?php
					foreach($hrc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
    </p>
  </div>
<h3> 
	<select class='form-control' id='vids' name='vids' onchange="second_council();" placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Second Council</option>	
	<option  value='ecosoc2' >ECOSOC</option>
	<option  value='fifa2' >FIFA</option>
	<option  value='who2' >WHO</option>
	<option  value='ga2' >GA</option>
	<option  value='hcc2' >HCC</option>
	<option  value='hrc2' >HRC</option>
	<option  value='jcc2' >JCC</option>

	</select></h3>  <div>
    <p id="ecosoc2" style="display:none">
   	<select class='form-control' id='vcp21' name='vcp21' placeholder="">
	<option selected='selected' value='' disabled='disable'>Select your first preference</option>
	<?php
					foreach($ecosoc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp22' name='vcp22' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Second preference</option>
	<?php
					foreach($ecosoc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp23' name='vcp23' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Third preference</option>
	<?php
					foreach($ecosoc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp24' name='vcp24' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fourth preference</option>
	<?php
					foreach($ecosoc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp25' name='vcp25' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fifth preference</option>
	<?php
					foreach($ecosoc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
    </p>
     <p id="who2" style="display:none">
   	<select class='form-control' id='vcp21' name='vcp21' placeholder="">
	<option selected='selected' value='' disabled='disable'>Select your first preference</option>
	<?php
					foreach($who as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp22' name='vcp22' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Second preference</option>
	<?php
					foreach($who as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp23' name='vcp23' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Third preference</option>
	<?php
					foreach($who as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp24' name='vcp24' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fourth preference</option>
	<?php
					foreach($who as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp25' name='vcp25' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fifth preference</option>
	<?php
					foreach($who as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
    </p>
     <p id="fifa2" style="display:none">
   	<select class='form-control' id='vcp21' name='vcp21' placeholder="">
	<option selected='selected' value='' disabled='disable'>Select your first preference</option>
	<?php
					foreach($fifa as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp22' name='vcp22' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Second preference</option>
	<?php
					foreach($fifa as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp23' name='vcp23' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Third preference</option>
	<?php
					foreach($fifa as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp24' name='vcp24' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fourth preference</option>
	<?php
					foreach($fifa as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp25' name='vcp25' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fifth preference</option>
	<?php
					foreach($fifa as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
    </p>
     <p id="ga2" style="display:none">
   	<select class='form-control' id='vcp21' name='vcp21' placeholder="">
	<option selected='selected' value='' disabled='disable'>Select your first preference</option>
	<?php
					foreach($ga as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp22' name='vcp22' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Second preference</option>
	<?php
					foreach($ga as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp23' name='vcp23' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Third preference</option>
	<?php
					foreach($ga as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp24' name='vcp24' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fourth preference</option>
	<?php
					foreach($ga as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp25' name='vcp25' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fifth preference</option>
	<?php
					foreach($ga as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
    </p>
     <p id="hcc2" style="display:none">
   	<select class='form-control' id='vcp21' name='vcp21' placeholder="">
	<option selected='selected' value='' disabled='disable'>Select your first preference</option>
	<?php
					foreach($hcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp22' name='vcp22' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Second preference</option>
	<?php
					foreach($hcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp23' name='vcp23' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Third preference</option>
	<?php
					foreach($hcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp24' name='vcp24' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fourth preference</option>
	<?php
					foreach($hcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp25' name='vcp25' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fifth preference</option>
	<?php
					foreach($hcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
    </p>
    <p id="hrc2" style="display:none">
   	<select class='form-control' id='vcp21' name='vcp21' placeholder="">
	<option selected='selected' value='' disabled='disable'>Select your first preference</option>
	<?php
					foreach($hrc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp22' name='vcp22' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Second preference</option>
	<?php
					foreach($hrc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp23' name='vcp23' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Third preference</option>
	<?php
					foreach($hrc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp24' name='vcp24' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fourth preference</option>
	<?php
					foreach($hrc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp25' name='vcp25' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fifth preference</option>
	<?php
					foreach($hrc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
    </p>
	<p id="jcc2" style="display:none">
   	<select class='form-control' id='vcp21' name='vcp21' placeholder="">
	<option selected='selected' value='' disabled='disable'>Select your first preference</option>
	<?php
					foreach($jcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp22' name='vcp22' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Second preference</option>
	<?php
					foreach($jcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp23' name='vcp23' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Third preference</option>
	<?php
					foreach($jcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp24' name='vcp24' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fourth preference</option>
	<?php
					foreach($jcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp25' name='vcp25' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fifth preference</option>
	<?php
					foreach($jcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
    </p>
  </div>
  <h3> 
	<select class='form-control' id='vidt' name='vidt' onchange="third_council();" placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Third Council</option>	
	<option  value='ecosoc3' >ECOSOC</option>
	<option  value='fifa3' >FIFA</option>
	<option  value='who3' >WHO</option>
	<option  value='ga3' >GA</option>
	<option  value='hcc3' >HCC</option>
	<option  value='hrc3' >HRC</option>
	<option  value='jcc3' >JCC</option>
	</select></h3>  <div>
    <p id="ecosoc3" style="display:none">
   	<select class='form-control' id='vcp31' name='vcp31' placeholder="">
	<option selected='selected' value='' disabled='disable'>Select your first preference</option>
	<?php
					foreach($ecosoc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp32' name='vcp32' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Second preference</option>
	<?php
					foreach($ecosoc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp33' name='vcp33' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Third preference</option>
	<?php
					foreach($ecosoc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp34' name='vcp34' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fourth preference</option>
	<?php
					foreach($ecosoc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp35' name='vcp35' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fifth preference</option>
	<?php
					foreach($ecosoc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
    </p>
     <p id="who3" style="display:none">
   	<select class='form-control' id='vcp31' name='vcp31' placeholder="">
	<option selected='selected' value='' disabled='disable'>Select your first preference</option>
	<?php
					foreach($who as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp32' name='vcp32' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Second preference</option>
	<?php
					foreach($who as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp33' name='vcp33' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Third preference</option>
	<?php
					foreach($who as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp34' name='vcp34' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fourth preference</option>
	<?php
					foreach($who as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp35' name='vcp35' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fifth preference</option>
	<?php
					foreach($who as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
    </p>
     <p id="fifa3" style="display:none">
   	<select class='form-control' id='vcp31' name='vcp31' placeholder="">
	<option selected='selected' value='' disabled='disable'>Select your first preference</option>
	<?php
					foreach($fifa as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp32' name='vcp32' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Second preference</option>
	<?php
					foreach($fifa as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp33' name='vcp33' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Third preference</option>
	<?php
					foreach($fifa as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp34' name='vcp34' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fourth preference</option>
	<?php
					foreach($fifa as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp35' name='vcp35' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fifth preference</option>
	<?php
					foreach($fifa as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
    </p>
     <p id="ga3" style="display:none">
   	<select class='form-control' id='vcp31' name='vcp31' placeholder="">
	<option selected='selected' value='' disabled='disable'>Select your first preference</option>
	<?php
					foreach($ga as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp32' name='vcp32' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Second preference</option>
	<?php
					foreach($ga as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp33' name='vcp33' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Third preference</option>
	<?php
					foreach($ga as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp34' name='vcp34' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fourth preference</option>
	<?php
					foreach($ga as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp35' name='vcp35' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fifth preference</option>
	<?php
					foreach($ga as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
    </p>
     <p id="hcc3" style="display:none">
   	<select class='form-control' id='vcp31' name='vcp31' placeholder="">
	<option selected='selected' value='' disabled='disable'>Select your first preference</option>
	<?php
					foreach($hcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp32' name='vcp32' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Second preference</option>
	<?php
					foreach($hcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp33' name='vcp33' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Third preference</option>
	<?php
					foreach($hcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp34' name='vcp34' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fourth preference</option>
	<?php
					foreach($hcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp35' name='vcp35' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fifth preference</option>
	<?php
					foreach($hcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
    </p>
    <p id="hrc3" style="display:none">
   	<select class='form-control' id='vcp31' name='vcp31' placeholder="">
	<option selected='selected' value='' disabled='disable'>Select your first preference</option>
	<?php
					foreach($hrc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp32' name='vcp32' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Second preference</option>
	<?php
					foreach($hrc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp33' name='vcp33' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Third preference</option>
	<?php
					foreach($hrc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp34' name='vcp34' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fourth preference</option>
	<?php
					foreach($hrc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp35' name='vcp35' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fifth preference</option>
	<?php
					foreach($hrc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
    </p>
	  <p id="jcc3" style="display:none">
   	<select class='form-control' id='vcp31' name='vcp31' placeholder="">
	<option selected='selected' value='' disabled='disable'>Select your first preference</option>
	<?php
					foreach($jcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp32' name='vcp32' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Second preference</option>
	<?php
					foreach($jcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp33' name='vcp33' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Third preference</option>
	<?php
					foreach($jcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>
	</select><br>
	<select class='form-control' id='vcp34' name='vcp34' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fourth preference</option>
	<?php
					foreach($jcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
	<select class='form-control' id='vcp35' name='vcp35' placeholder="">
	<option selected="selected" value='Select' disabled="disable">Select your Fifth preference</option>
	<?php
					foreach($jcc as $doc){
				echo "<option  value=" . $doc['Country'] .">" . $doc['Country'] . " </option>";
			}

		?>	
	</select><br>
    </p>
  	</div>
</div>

	<div class='form-group'>
		<label class='control-label col-sm-4' for='essay'>Fill in your credentials (Experience, Awards etc)</label>
			<div class='col-sm-6'>
					<br>
					<textarea class='form-control execexp' name='essay' rows='20' id='essay' placeholder='Write your answer here' ></textarea>
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
	$info_crud = new delStep1_crud();
	$info_crud->insert($name,$email,$phone,$sex,$institute,$nofmun,$vidf,$vids,$vidt,$vcp11,$vcp12,$vcp13,$vcp14,$vcp15,$vcp21,$vcp22,$vcp23,$vcp24,$vcp25,$vcp31,$vcp32,$vcp33,$vcp34,$vcp35,$essay);
}
?>
 
</body>
</html>
