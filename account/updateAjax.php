<?php 
require_once("./admin_crud.php");

$arr = array();
$arr['renderFunc'] = (new admin_crud)->cascade_read($_POST['pubid'],$_POST['sid'],$_POST['widget'],'renderFunc');
$arr['html'] = (new admin_crud)->cascade_read($_POST['pubid'],$_POST['sid'],$_POST['widget'],'html');
$arr['css'] = (new admin_crud)->cascade_read($_POST['pubid'],$_POST['sid'],$_POST['widget'],'css');
	echo json_encode($arr);
?>
