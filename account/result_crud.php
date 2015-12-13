<?php 
class result_crud{	
	public function __construct(){
		$GLOBALS['m'] = new MongoClient();
   		$GLOBALS['db'] = $GLOBALS['m']->bitsmun;
	}

	public function execInsert($username,$committee,$status){
		$collection = $GLOBALS['db']->result;
		$temp_query = array("username" => $username);
		$cursor = $collection->find($temp_query);
		if($cursor->count() == 0){ 		
			$document = array(
				"username" => $username,
		      	 	"committee" => $committee, 
		       		"status" => $status  	 
			);
		  	$collection->insert($document);
		  			}
		else{
			$collection->update(array('username' => $username), array(
	      	 	"username" => $username,
		    	"committee" => $committee, 
		   	"status" => $status 
		    ));	
		}
		return $status;

	}

	public function ipInsert($username,$committee,$pos,$status){
		$collection = $GLOBALS['db']->result;
		$temp_query = array("username" => $username);
		$cursor = $collection->find($temp_query);
		if($cursor->count() == 0){ 		
			$document = array(
				"username" => $username,
		      	 	"committee" => $committee, 
		      	 	"position" => $pos, 
		       		"status" => $status  
			);
		  	$collection->insert($document);
		}
		else{
			$collection->update(array('username' => $username), array(
	      	 	"username" => $username,
		    	"committee" => $committee, 
		   	"position" => $pos, 
		   	"status" => $status 
		    ));	
		}
		return $status;
	}

	public function delInsert($username,$committee,$council,$country,$status){
		$collection = $GLOBALS['db']->result;
		$temp_query = array("username" => $username);
		$cursor = $collection->find($temp_query);
		if($cursor->count() == 0){ 		
			$document = array(
				"username" => $username,
		      	 	"committee" => $committee, 
				"council" => $council,
		      	 	"country" => $country, 
		       		"status" => $status  
			);
		  	$collection->insert($document);
		  			}
		else{
			$collection->update(array('username' => $username), array(
	      	 	"username" => $username,
		    	"committee" => $committee, 
		   	"council" => $council,
		    	"country" => $country, 
		   	"status" => $status 
		    ));	
		}
		$message = "Data inserted successfully";
		echo "<script type='text/javascript'>alert('$message');</script>";

	}

	

	public function read($username){
		$collection = $GLOBALS['db']->result;
		$temp_query = array("username" => $username);
		$cursor = $collection->find($temp_query);
		return $cursor;
	}

	public function readGeneral(){
		$collection = $GLOBALS['db']->result;
		$cursor = $collection->find();
		return $cursor;
	}

	public function resultUpdate($username){
		$collection = $GLOBALS['db']->result;
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
