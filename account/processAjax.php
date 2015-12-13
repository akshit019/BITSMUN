<?php 
require_once("./crud.php");
//echo $_POST['pubid'];
$arr = array();
$cursor1 = (new crud)->readAjax($_POST['pubid'],$_POST['sid'],'publishers');
$cursor2 = (new crud)->readAjax($_POST['pubid'],$_POST['sid'],'secondary_IDs');
$cursor3 = (new crud)->readAjax($_POST['pubid'],$_POST['sid'],'widget_IDs');
	foreach ($cursor1 as $doc1){
	$arr['website'] = $doc1['website'];
	}
	
	foreach ($cursor2 as $doc1){
	$arr['mp'] = $doc1['mp'];
	}
	
	foreach ($cursor3 as $doc1){
		$i=0;
		$arr['widget'] = $doc1['widget'];
	/*	foreach($doc1 as $doc2){
			$arr[]=$doc2['widget'];
			$i++;
		}*/
	}
	echo json_encode($arr);
?>
