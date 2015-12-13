<?php 
class delStep1_crud{	
	public function __construct(){
		$GLOBALS['m'] = new MongoClient();
   		$GLOBALS['db'] = $GLOBALS['m']->bitsmun;
	}

	public function insert($username,$vidf,$vids,$vidt,$vcp11,$vcp12,$vcp13,$vcp14,$vcp15,$vcp21,$vcp22,$vcp23,$vcp24,$vcp25,$vcp31,$vcp32,$vcp33,$vcp34,$vcp35){
		$collection = $GLOBALS['db']->delStep1;	
		$document = array(
			"username"=>$username,
			"CouncilFirstPreference" => $vidf,
			"CouncilSecondPreference" => $vidf,
			"CouncilThirdPreference" => $vidf,
	      	 	"First_CountryPreference1"=> $vcp11,
			"First_CountryPreference2"=> $vcp12,
			"First_CountryPreference3"=> $vcp13,
			"First_CountryPreference4"=> $vcp14,
			"First_CountryPreference5"=> $vcp15,
			"Second_CountryPreference1"=> $vcp21,
			"Second_CountryPreference2"=> $vcp22,
			"Second_CountryPreference3"=> $vcp23,
			"Second_CountryPreference4"=> $vcp24,
			"Second_CountryPreference5"=> $vcp25,
			"Third_CountryPreference1"=> $vcp31,
			"Third_CountryPreference2"=> $vcp32,
			"Third_CountryPreference3"=> $vcp33,
			"Third_CountryPreference4"=> $vcp34,
			"Third_CountryPreference5"=> $vcp35 
		);
	  	$collection->insert($document);
	  	$message = "Data inserted successfully";
	        echo "<script type='text/javascript'>alert('$message');</script>";
	}


	public function read($username){
		$collection = $GLOBALS['db']->delStep1;
		$temp_query = array("username" => $username);
		$cursor = $collection->find($temp_query);
		return $cursor;
	}

	public function readStatus($username){
		$collection = $GLOBALS['db']->delStep1;
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
