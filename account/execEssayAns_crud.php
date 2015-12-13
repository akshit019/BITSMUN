<?php 
class execEssayAns_crud{	
	public function __construct(){
		$GLOBALS['m'] = new MongoClient();
   		$GLOBALS['db'] = $GLOBALS['m']->bitsmun;
	}

	public function insert($username,$essay1,$essay2,$essay3,$essay4){
		$collection = $GLOBALS['db']->execEssayAns;		
		$document = array(
			"username" => $username,
			"Essay1" => $essay1,
			"Essay2" => $essay2,
			"Essay3" => $essay3,
			"Essay4" => $essay4
		);
		$collection->insert($document);
		$message = "Data inserted successfully";
		echo "<script type='text/javascript'>alert('$message');</script>";	
	}


	public function read($username){
		$collection = $GLOBALS['db']->execEssayAns;
		$temp_query = array("username" => $username);
		$cursor = $collection->find($temp_query);
		return $cursor;
	}	

	public function readStatus($username){
		$collection = $GLOBALS['db']->execEssayAns;
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
