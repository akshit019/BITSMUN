<?php 
class execStep1_crud{	
	public function __construct(){
		$GLOBALS['m'] = new MongoClient();
   		$GLOBALS['db'] = $GLOBALS['m']->bitsmun;
	}

	public function insert($username,$coun1,$coun2,$coun3){
		$collection = $GLOBALS['db']->execStep1;	
		$document = array(
			"username"=>$username,
			"firstCouncil" => $coun1,
			"secondCouncil" => $coun2,
			"thirdCouncil" => $coun3,
		);
	  	$collection->insert($document);
	  	$message = "Data inserted successfully | Now Please proceed to the next step";
	        echo "<script type='text/javascript'>alert('$message');</script>";
	}


	public function read($username){
		$collection = $GLOBALS['db']->execStep1;
		$temp_query = array("username" => $username);
		$cursor = $collection->find($temp_query);
		return $cursor;
	}

	public function readStatus($username){
		$collection = $GLOBALS['db']->execStep1;
		$temp_query = array("username" => $username);
		$cursor = $collection->find($temp_query);
		$status = false;
		if($cursor->count() != 0){
			$status = true;
		}
		return $status;
	}		
	
};


?>