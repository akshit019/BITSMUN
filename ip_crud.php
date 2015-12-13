<?php 
class ip_crud{	
	public function __construct(){
		$GLOBALS['m'] = new MongoClient();
   		$GLOBALS['db'] = $GLOBALS['m']->bitsmun;
	}

	public function insert($name,$email,$phone,$sex,$institute,$nofmun,$pos,$essay){
		$collection = $GLOBALS['db']->ip;	
		$document = array(
			"name" => $name, 
		      "email" => $email,
		      "phoneNumber" => $phone,
			"sex" => $sex,
		     	"institute"  => $institute,
		     	"nofmun" => $nofmun ,
			"position" => $pos,
			"Essay" => $essay 
		);
	  	$collection->insert($document);
	  	$message = "Data inserted successfully";
	        echo "<script type='text/javascript'>alert('$message');</script>";
	}


	public function read($email){
		$collection = $GLOBALS['db']->ip;
		$temp_query = array("email" => $email);
		$cursor = $collection->find($temp_query);
		return $cursor;
	}

	public function readStatus($email){
		$collection = $GLOBALS['db']->ip;
		$temp_query = array("email" => $email);
		$cursor = $collection->find($temp_query);
		$status = false;
		if($cursor->count() != 0){
			$status = true;
		}
		return $status;
	}		
	
};


?>
