<?php 
class ipStep1_crud{	
	public function __construct(){
		$GLOBALS['m'] = new MongoClient();
   		$GLOBALS['db'] = $GLOBALS['m']->bitsmun;
	}

	public function insert($username,$pa){
		$collection = $GLOBALS['db']->ipStep1; 		
		$document = array(
			'username' => $username,
		  	 'positionAvailable' => $pa	  
		);
		$collection->insert($document);
		$message = "Data inserted successfully";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}


	public function read($username){
		$collection = $GLOBALS['db']->ipStep1;
		$temp_query = array("username" => $username);
		$cursor = $collection->find($temp_query);
		return $cursor;
	}

	public function readStatus($username){
		$collection = $GLOBALS['db']->ipStep1;
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
