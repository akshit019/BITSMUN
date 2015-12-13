<?php 
class ecosoc{	
	public function __construct(){
		$GLOBALS['m'] = new MongoClient();
   		$GLOBALS['db'] = $GLOBALS['m']->bitsmun;
	}

	public function insert($council,$country){
		$collection = $GLOBALS['db']->council;	
		$document = array(
			"Council" => $council,
			"Country" => $country
		);
	  	$collection->insert($document);
	  	$message = "Data inserted successfully";
	        echo "<script type='text/javascript'>alert('$message');</script>";
	}


	public function read($council){
		$collection = $GLOBALS['db']->council;
		$temp_query = array("Council" => $council);
		$cursor = $collection->find($temp_query);
		return $cursor;
	}

}


?>
