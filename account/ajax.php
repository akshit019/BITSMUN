<?php 
require_once("./crud.php");
//echo $_POST['pubid'];

$cursor = (new crud)->readForm($_POST['pubid'],$_POST['sid']);
foreach ($cursor as $doc){
	json_encode($doc);
	echo $doc;
	}
?>
