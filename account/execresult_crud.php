<?php 
class execresult_crud{	
	public function __construct(){
		$GLOBALS['m'] = new MongoClient();
   		$GLOBALS['db'] = $GLOBALS['m']->bitsmun;
	}

	public function insert($username,$committee,$position,$status){
		$collection = $GLOBALS['db']->execresult;
		$temp_query = array("username" => $username);
		$cursor = $collection->find($temp_query);
		if($cursor->count() == 0){ 		
			$document = array(
				"username" => $username,
		      	 	"committee" => $committee,
		      	 	"position" => $position, 
		       		"status" => $status  	 
			);
		  	$collection->insert($document);
		  			}
		else{
			$collection->update(array('username' => $username), array(
	      	 	"username" => $username,
		    	"committee" => $committee,
		    	"position" => $position, 
		   	"status" => $status 
		    ));	
		}

	}

	

	public function read($username){
		$collection = $GLOBALS['db']->execresult;
		$temp_query = array("username" => $username);
		$cursor = $collection->find($temp_query);
		return $cursor;
	}

	public function readGeneral(){
		$collection = $GLOBALS['db']->execresult;
		$cursor = $collection->find();
		return $cursor;
	}

	public function resultUpdate($username){
		$collection = $GLOBALS['db']->execresult;
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
