<?php 
class ipEssayAns_crud{	
	public function __construct(){
		$GLOBALS['m'] = new MongoClient();
   		$GLOBALS['db'] = $GLOBALS['m']->bitsmun;
	}

	public function insert($username,$essay1,$essay2){
		$collection = $GLOBALS['db']->ipEssayAns;		
		$document = array(
			"username" => $username,
			"Essay1" => $essay1,
			"Essay2" => $essay2
		);
		$collection->insert($document);
		$message = "Data inserted successfully";
		echo "<script type='text/javascript'>alert('$message');</script>";	
	}


	public function read($username){
		$collection = $GLOBALS['db']->ipEssayAns;
		$temp_query = array("username" => $username);
		$cursor = $collection->find($temp_query);
		return $cursor;
	}

	public function readStatus($username){
		$collection = $GLOBALS['db']->ipEssayAns;
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
