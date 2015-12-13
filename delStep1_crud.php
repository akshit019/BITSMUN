<?php 
class delStep1_crud{	
	public function __construct(){
		$GLOBALS['m'] = new MongoClient();
   		$GLOBALS['db'] = $GLOBALS['m']->bitsmun;
	}

	public function insert($name,$email,$phone,$sex,$institute,$nofmun,$vidf,$vids,$vidt,$vcp11,$vcp12,$vcp13,$vcp14,$vcp15,$vcp21,$vcp22,$vcp23,$vcp24,$vcp25,$vcp31,$vcp32,$vcp33,$vcp34,$vcp35,$essay){
		$collection = $GLOBALS['db']->del;	
		$document = array(
			"name" => $name, 
		      "email" => $email,
		      "phoneNumber" => $phone,
			"sex" => $sex,
		     	"institute"  => $institute,
		     	"nofmun" => $nofmun ,
			"CouncilFirstPreference" => $vidf,
			"CouncilSecondPreference" => $vids,
			"CouncilThirdPreference" => $vidt,
	      	 	"First_CouncilPreference1"=> $vcp11,
			"First_CouncilPreference2"=> $vcp12,
			"First_CouncilPreference3"=> $vcp13,
			"First_CouncilPreference4"=> $vcp14,
			"First_CouncilPreference5"=> $vcp15,
			"Second_CouncilPreference1"=> $vcp21,
			"Second_CouncilPreference2"=> $vcp22,
			"Second_CouncilPreference3"=> $vcp23,
			"Second_CouncilPreference4"=> $vcp24,
			"Second_CouncilPreference5"=> $vcp25,
			"Third_CouncilPreference1"=> $vcp31,
			"Third_CouncilPreference2"=> $vcp32,
			"Third_CouncilPreference3"=> $vcp33,
			"Third_CouncilPreference4"=> $vcp34,
			"Third_CouncilPreference5"=> $vcp35,	
			"Essay" => $essay 
		);
	  	$collection->insert($document);
	  	$message = "Data inserted successfully";
	        echo "<script type='text/javascript'>alert('$message');</script>";
	}


	public function read($email){
		$collection = $GLOBALS['db']->del;
		$temp_query = array("email" => $email);
		$cursor = $collection->find($temp_query);
		return $cursor;
	}

	public function readStatus($email){
		$collection = $GLOBALS['db']->del;
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
