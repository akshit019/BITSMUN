<?php
require_once("./result_crud.php");
//require_once("./execStep1_crud.php");
require_once("./ipStep1_crud.php");

$committee = $_POST['committee'];
$username = $_POST['username'];
$status = $_POST['status'];

$vares = new result_crud();
//$stats = "InProgress";
if($committee == "InternationalPress"){
	$com = new ipStep1_crud();
	$find = $com->read($username);
	foreach($find as $doc){
		$pos = $doc['positionAvailable'];
	}
	$stats = $vares->ipInsert($username,$committee,$pos,$status);	
	
}
else if($committee == "ExecutiveBoard"){
	$stats = $vares->execInsert($username,$committee,$status);
}
else if($committee == "Delegates"){

}
echo $stats;
?>
