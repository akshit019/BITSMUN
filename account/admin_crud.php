<?php 
require_once("./widget.php");
class admin_crud{	
	public function __construct(){
		$GLOBALS['m'] = new MongoClient();
   		$GLOBALS['db'] = $GLOBALS['m']->mydb;
 	}

	public function insert($pubid,$sid,$wid_name,$renderFunc,$templateHead,$templateRepeat,$templateFoot,$rowHead,$rowRepeat,$rowFoot,$css){
		$collection = $GLOBALS['db']->render_col;
	$document = array(
	       "pubid" => $pubid, 
	       "sid" => $sid,
					"wid_name" => $wid_name,
		      "renderFunc" => $renderFunc,
		      "html" => array(
		      		"templateHead" => $templateHead,
		      		"templateRepeat" => $templateRepeat,
							"templateFoot" => $templateFoot,
							"rowHead"=>$rowHead,
							"rowRepeat"=>$rowRepeat,
							"rowFoot"=>$rowFoot,
		      ),	      
		      'css'  => $css                    
	      );
	$collection->insert($document);
	$message = "Data inserted successfully";
	echo "<script type='text/javascript'>alert('$message');</script>";

	}

	public function delete($sid, $pubid, $wid_name){
		$collection = $GLOBALS['db']->render_col;
		$collection->remove(array("sid"=>$sid,'pubid' => $pubid),false);
 	}

	public function update($pubid,$sid, $wid_name,$renderFunc,$templateHead,$templateRepeat,$templateFoot,$rowHead,$rowRepeat,$rowFoot,$css){
		$collection = $GLOBALS['db']->render_col;
		 $collection->update(array("sid"=>$sid, 'pubid' => $pubid, 'wid_name' => $wid_name), array(
	       "pubid" => $pubid, 
	       "sid" => $sid,
					"wid_name" => $wid_name,
		      "renderFunc" => $renderFunc,
		      "html" => array(
		      		"templateHead" => $templateHead,
		      		"templateRepeat" => $templateRepeat,
							"templateFoot" => $templateFoot,
							"rowHead"=>$rowHead,
							"rowRepeat"=>$rowRepeat,
							"rowFoot"=>$rowFoot,
		      ),	      
		      'css'  => $css                    
	      ));
	  $message = "Data updated successfully";
echo "<script type='text/javascript'>alert('$message');</script>";    
	}

	public function read($pubid,$sid){
		$collection = $GLOBALS['db']->render_col;
    $temp_pubid = array('pubid' => $pubid, 'sid' => $sid);
		$cursor = $collection->find($temp_pubid);
		foreach ($cursor as $doc){
			print_r($doc);
		}
	}
	

	public function cascade_read($pubid,$sid,$wid_name,$config_param){
		$collection = $GLOBALS['db']->render_col;
    $query = array('pubid' => $pubid, 'sid' => $sid, 'wid_name'=>$wid_name );
		$cursor1 = $collection->find($query);
		if($cursor1->count()==0){
			$query = array('pubid' => $pubid, 'sid' => 'default', 'wid_name'=>$wid_name );
			$cursor2 = $collection->find($query);
			if($cursor2->count()==0){
				$query = array('pubid' => 'default', 'sid' => 'default', 'wid_name'=>$wid_name );
				$cursor3 = $collection->find($query);
				foreach($cursor3 as $doc){return $doc[$config_param];}	
			}
			else{ 
				foreach($cursor2 as $doc){
					return $doc[$config_param];
					} 
			}
		}	
		else{ 
				foreach($cursor1 as $doc){
					return $doc[$config_param];
				} 
		}
	}					
};

?>
