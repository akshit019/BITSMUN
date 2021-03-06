<?php 
class info_crud{	
	public function __construct(){
		$GLOBALS['m'] = new MongoClient();
   		$GLOBALS['db'] = $GLOBALS['m']->bitsmun;
	}

	public function insert($username, $name,$email, $ccode, $phone,$sex,$institute,$nofmun){
		$collection = $GLOBALS['db']->generalInformation;
		$temp_query = array("username" => $username);
		$cursor = $collection->find($temp_query);
		if($cursor->count() == 0){ 		
			$document = array(
				"username" => $username,
		      	 	"name" => $name, 
		       		"email" => $email,
		      		"phoneNumber" => $phone,
				"countryCode" => $ccode,
				    "sex" => $sex,
		      		'institute'  => $institute,
		      		'nofmun' => $nofmun 
			);
		  	$collection->insert($document);
		  	$message = "Data inserted successfully";
		        echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else{
			$collection->update(array('username' => $username), array(
	      	 	"username" => $username,
		    	"name" => $name, 
		   	"email" => $email,
		      	"phoneNumber" => $phone,
			"countryCode" => $ccode,
				"sex" => $sex,
		      	'institute'  => $institute,
		      	'nofmun' => $nofmun 
		    ));
			$message = "Data updated successfully";
		        echo "<script type='text/javascript'>alert('$message');</script>";	
		}
	}


	public function read($username){
		$collection = $GLOBALS['db']->generalInformation;
		$temp_query = array("username" => $username);
		$cursor = $collection->find($temp_query);
		return $cursor;
	}

	public function readGeneral(){
		$collection = $GLOBALS['db']->generalInformation;
		$cursor = $collection->find();
		return $cursor;
	}

	public function readStatus($username){
		$collection = $GLOBALS['db']->generalInformation;
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
