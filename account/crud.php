<?php 
class crud{	
	public function __construct(){
		$GLOBALS['m'] = new MongoClient();
   		$GLOBALS['db'] = $GLOBALS['m']->mydb;
	}

	public function insert($pubid,$sid, $website, $piwik, $cache,$allowedParameters,$abtest, $mp,$widget){
		$collection = $GLOBALS['db']->publishers;		
		$document = array(
	      	 	"pubid" => $pubid, 
	       		"sid" => $sid,
	      		"website" => $website,
	      		'piwik'  => $piwik,
	      		'cache' => $cache,	 
	      		'allowedParameters' => $allowedParameters,
		        'abtest' => $abtest,
		        'status' => "Disabled", 
		);
	  	$collection->insert($document);
		
		$collection = $GLOBALS['db']->public_IDs;		
		$document = array(
	      	 	"pubid" => $pubid,  
	      		"website" => $website
		);
	  	$collection->insert($document);

		$collection = $GLOBALS['db']->secondary_IDs;		
		$document = array(
	      	 	"pubid" => $pubid, 
	       		"sid" => $sid, 
/*match parameter*/	"mp" => $mp
		);
	  	$collection->insert($document);

		$collection = $GLOBALS['db']->widget_IDs;
		$document = array(
	      	 	"pubid" => $pubid, 
	       		"sid" => $sid, 
	      		"widget" => $widget
		);
		$collection->insert($document);
		$message = "Data inserted successfully";
echo "<script type='text/javascript'>alert('$message');</script>";

	}
	public function delete($sid, $pubid){
		$collection = $GLOBALS['db']->publishers;
		$collection->remove(array("sid"=>$sid, "pubid"=>$pubid));
		$collection = $GLOBALS['db']->secondary_IDs;
		$collection->remove(array("sid"=>$sid, "pubid"=>$pubid));
 		$collection = $GLOBALS['db']->widget_IDs;
		$collection->remove(array("sid"=>$sid, "pubid"=>$pubid));
		$message = "Data Deleted successfully";
echo "<script type='text/javascript'>alert('$message');</script>";
 	}

	public function update($pubid,$sid, $website, $piwik, $cache,$allowedParameters,$abtest, $mp,$widget){
		$collection = $GLOBALS['db']->publishers;
		 $collection->update(array('pubid' => $pubid, 'sid' => $sid), array(
	      	 	"pubid" => $pubid, 
	       		"sid" => $sid,
	      		"website" => $website,
	      		'piwik'  => $piwik,
	      		'cache' => $cache,	 
	      		'allowedParameters' => $allowedParameters,
		        'abtest' => $abtest, 
		        'status' => "Disabled" 
		    ));
		$collection = $GLOBALS['db']->secondary_IDs;
		$collection->update(array('pubid' => $pubid, 'sid' => $sid),array("pubid" => $pubid,"sid" => $sid,"mp" => $mp));
		$collection = $GLOBALS['db']->widget_IDs;
		$collection->update(array('pubid' => $pubid, 'sid' => $sid),array("pubid" => $pubid,"sid" => $sid,"widget" => $widget));
		 if($sid === "default"){
		$collection = $GLOBALS['db']->public_IDs;
		$collection->update(array('pubid' => $pubid),array("pubid" => $pubid,"website" => $website));
		}
		$message = "Data updated successfully";
echo "<script type='text/javascript'>alert('$message');</script>";
	}
	public function read(){
		$collection = $GLOBALS['db']->publishers;
                //$temp_pubid = array('pubid' => $pubid, 'sid' => $sid);
		$cursor = $collection->find();
		return $cursor;
	}		
	
	public function statusUpdate($pubid,$sid){
				$collection = $GLOBALS['db']->publishers;
				$query = array("pubid" => $pubid,"sid" => $sid);
				$cursor = $collection->find($query);
				$status="Disabled";
				foreach($cursor as $doc){
						$status = $doc['status'];
				}
				if($status == "Disabled"){
						$status = "Enabled";
				}
				else {
						$status = "Disabled";
				}
				
				 $collection->update(array("pubid" => $pubid,"sid" => $sid), array('$set' => array("status" => $status)));
				return $status;
	}
	
	
	public function readForm($pubid,$sid){
		$collection = $GLOBALS['db']->publishers;
    $temp_pubid = array('pubid' => $pubid, 'sid' => $sid);
		$cursor = $collection->find($temp_pubid);
		return $cursor;	
	}
	
	public function readAjax($pubid,$sid,$collect){
		$collection = $GLOBALS['db']->$collect;
    $temp_pubid = array('pubid' => $pubid, 'sid' => $sid);
		$cursor = $collection->find($temp_pubid);
		return $cursor;
	}
	
		public function readForm2($pubid){
		$collection = $GLOBALS['db']->publishers;
    $temp_pubid = array('pubid' => $pubid);
		$cursor = $collection->find($temp_pubid);
		return $cursor;	
	}
	
	public function readpubid(){
		$collection = $GLOBALS['db']->publishers;
		$cursor = $collection->distinct("pubid");
		
		return $cursor;		
	}
	
	
	public function readWidgets($pubid, $sid){
		$collection = $GLOBALS['db']->widget_IDs;
		$temp_pubid = array('pubid' => $pubid, 'sid' => $sid);
		$cursor = $collection->find($temp_pubid);
		return $cursor;
	}			
	
};

?>
