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
require_once("./execessay_crud.php");
require_once("./execEssayAns_crud.php");
require_once("./info_crud.php");
require_once("./delcouncil_crud.php");
require_once("./execstep1_crud.php");
require_once("./execresult_crud.php");

setReferralPage(getAbsoluteDocumentPath(__FILE__));

?>
 <!DOCTYPE html>
<html lang="en">
  <?php
  	echo renderAccountPageHeader(array("#SITE_ROOT#" => SITE_ROOT, "#SITE_TITLE#" => SITE_TITLE, "#PAGE_TITLE#" => "Edit Form"));
  ?>
<body>


<?php
$temp = "";
$username = $_GET['username'];
// define variables and set to empty values
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["username"]);
    $final_council = test_input($_POST["council"]);
    $final_position = test_input($_POST["position"]);
    $final_stat = test_input($_POST["stat"]);
    $button = test_input($_POST["submit"]);
    $temp = "done"; 
  //echo "<script type='text/javascript'>alert($username,$coun1,$coun2,$coun3);</script>";
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>
<?php
//$username = $_GET['username'];
  $res = new execresult_crud();
  $results = $res->read($username);
  $sa = $res->resultUpdate($username);
  if($sa){
    foreach($results as $doc){
      $councils = $doc["committee"];
      $position = $doc["position"];
      $stat = $doc["status"];
    }
  }
  else{
    $councils = "";
    $position = "";
    $stat = "";
  }

?>
<?php
//$username = $_GET['username'];
$essay = new execstep1_crud();
$cursor = $essay->read($username);
$t = 0;
$lists = array();
foreach($cursor as $doc1){
  $lists[$t] = $doc1["firstCouncil"];
  $t = $t + 1;
  $lists[$t] = $doc1["secondCouncil"];
  $t = $t + 1;
  $lists[$t] = $doc1["thirdCouncil"];
  $t = $t + 1;
}

$final = new delcouncil_crud();
$list = array();
//if(!empty($list)){
  $c1 = $final->read_essay($lists[0]);
  $q = 0;
  foreach($c1 as $d1){
    $list[$q] = $d1["essay"];
  }
  $c2 = $final->read_essay($lists[1]);
  $q = 1;
  foreach($c2 as $d2){
    $list[$q] = $d2["essay"]; 
  }

  $c3 = $final->read_essay($lists[2]);
  $q = 2;
  foreach($c3 as $d3){
    $list[$q] = $d3["essay"];

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
    		<h1>Applicant Information</h1>
	 <p class="lead"><br></p>
        <p class="lead">Please Select the Position of the applicants<br></p>
	</div>        
	<div class="row">
		  			<div class="col-lg-6">
			<form class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
	<?php
    $council = new delcouncil_crud();
    //$council->add_council("DISEC","Question DISEC");
    //$council->add_council("ECOSOC","Question ECOSOC");
    //$council->add_council("FIFA","Question FIFA");
    //$council->add_council("HCC","Question HCC");
    //$council->add_council("JCC","Question JCC");
    //$council->add_council("UNHRC","Question UNHRC");
    //$council->add_council("WHO","Question WHO");
    $cursor = $council->get_council();
    $listl = array();
    $i = 0;
    foreach($cursor as $doc1){
      $listl[$i] = $doc1['council'];
      $i = $i + 1;
    }
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
	<?php
		$infom = new info_crud();
    $read = new execEssayAns_crud();
    $cursorAns = $read->read($username);
		$info = $infom->read($username);
		foreach($info as $doc){
    echo "<div class='form-group'><label class='control-label col-sm-4' for='username'>Username:</label><div class='col-sm-8'><input type='text' class='form-control' id='username' name='username' value=".$username." readonly=''></div></div>";

    echo "<div class='form-group'><label class='control-label col-sm-4' for='name'>Name:</label><div class='col-sm-8'><input type='text' class='form-control' id='name' name='name' placeholder='Enter Your Name' value=".$doc['name']." readonly=''></div></div>";
   }
   ?>
    <br>
  <div class="form-group">
    <label class="control-label col-sm-4" for="coun1">Council First Preference:</label>
    <div class="col-sm-8">
    <?php 
      echo "<select class='form-control' id='coun1' name='coun1' placeholder='' readonly>";
        echo "<option selected='selected' value=". $lis[0] ." >". $lis[0] ."</option>";
  ?>
  
  </select>    
  </div>
  </div>
  
  
<div class="form-group">
    <label class="control-label col-sm-4" for="coun2">Council second Preference:</label>
    <div class="col-sm-8">
  <?php 
      echo "<select class='form-control' id='coun2' name='coun2' placeholder='' readonly>";
        echo "<option selected='selected' value=". $lis[1] ." >". $lis[1] ."</option>";
  ?>
  
  </select>    
  </div>
  </div>

<div class="form-group">
    <label class="control-label col-sm-4" for="coun3">Council third Preference:</label>
    <div class="col-sm-8">
  <?php 
      echo "<select class='form-control' id='coun3' name='coun3' placeholder='' readonly>";
        echo "<option selected='selected' value=". $lis[2] ." >". $lis[2] ."</option>";
  ?>
  
  </select>    
  </div>
  </div>

     <br>
  <div class="form-group">
    <label class="control-label col-sm-4" for="council">Council:</label>
    <div class="col-sm-8">
    <?php 
      echo "<select class='form-control' id='council' name='council' placeholder=''  required>";
    echo "<option selected='selected' value=".$councils." >".$councils."</option>";
      foreach($listl as $doc){
        echo "<option class=" . $doc . " name=" . $doc . " value=" . $doc .">" . $doc . " </option>";
      }
  ?>
  
  </select>    
  </div>
  </div>
  
  
<div class="form-group">
    <label class="control-label col-sm-4" for="position">Position:</label>
    <div class="col-sm-8">
  <?php 
      echo "<select class='form-control' id='position' name='position' placeholder=''  required>";
    echo "<option selected='selected' value=".$position." >".$position."</option>";
        echo "<option class='viceChair' name='viceChair' value='ViceChair'>Vice Chair</option>";
        echo "<option class='chair' name='chair' value='Chair'>Chair</option>";
  ?>
  
  </select>    
  </div>
  </div>

<div class="form-group">
    <label class="control-label col-sm-4" for="stat">Status:</label>
    <div class="col-sm-8">
  <?php 
      echo "<select class='form-control' id='stat' name='stat' placeholder=''  required>";
    echo "<option selected='selected' value=".$stat." >".$stat."</option>";
      echo "<option class='Shortlisted' name='Shortlisted' value='Shortlisted'>Shortlisted</option>";
      echo "<option class='Called' name='Called' value='Called'>Called</option>";
      echo "<option class='Backup' name='Backup' value='Backup'>Backup</option>";
      echo "<option class='Rejected' name='Rejected' value='Rejected'>Rejected</option>";
      echo "<option class='Selected' name='Selected' value='Selected'>Selected</option>";
  ?>
  
  </select>    
  </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-8">
      <button type="submit" class="btn btn-lg btn-primary" name="submit" value="Submit">Submit</button>
    </div>
  </div>

    <?php
    $step1 = new execstep1_crud();
    $council = $step1->read($username);
    foreach($council as $doc){

    }
      for($i = 0; $i < count($list); $i++){
          $j = $i + 1;
          $temp = "Essay" . $j;
          foreach($cursorAns as $doc){
            $variable = $doc[$temp];
          }
          //echo "<script type='text/javascript'>alert('$variable');</script>"; 
          echo "<div class='form-group'><label class='control-label col-sm-4' for='essay".$i."'>". $list[$i] ."</label><div class='col-sm-8'><textarea input type='text' class='form-control execexp' name='essay".$i."' rows='20' id='essay".$i."' placeholder='Write your answer here' required readonly>".$variable."</textarea></div></div>";
        }
        $ess = "";
        foreach($cursorAns as $doc1){
            $ess = $doc1["Essay4"];
          }
        echo "<div class='form-group'><label class='control-label col-sm-4' for='essay4'>Fill in your credentials (Experience, Awards etc)</label><div class='col-sm-8'><textarea class='form-control execexp' name='essay4' rows='20' id='essay4' placeholder='Write your answer here' required readonly>".$ess."</textarea></div></div>";
      
      
			//echo "<div class='form-group'><label class='control-label col-sm-4' for='essay".$i."'>". $list[$i] ."</label><div class='col-sm-12'><textarea class='form-control execexp' name='essay".$i."' rows='20' id='essay".$i."' placeholder='Write your answer here' required>".$variable."</textarea></div></div>";
			//echo "<div class='form-group'><label class='control-label col-sm-4' for='essay".$i."'>". $list[$i] ."</label><div class='col-sm-12'><textarea class='form-control execexp' name='essay".$i."' rows='20' id='essay".$i."' placeholder='Write your answer here' required>".$variable."</textarea></div></div>";

		
			
	?> 

  </form>
  </div>   
  </div>
</div></div>
<?php
  if((!empty($temp))&&(!empty($username))&&(!empty($final_council))&&(!empty($final_position))&&(!empty($final_stat))){
  $d = new execresult_crud();
  $d->insert($username, $final_council,$final_position, $final_stat);
 //echo "<script type='text/javascript'>window.open('application.php?username=".$username."&committee=ExecutiveBoard');</script>";
  echo "<meta http-equiv='refresh' content='0;URL=application.php?username=".$username."' />";
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

