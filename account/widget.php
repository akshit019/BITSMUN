<?php
	class widget{
		public function __construct(){
			$GLOBALS['m'] = new MongoClient();
   		$GLOBALS['db'] = $GLOBALS['m']->mydb;
		}
	
		public function add_widget($val){
			$value = array(
  				"widget" => $val
  			);
			$collection = $GLOBALS['db']->widgets;
			
			$collection->insert($value);
		}

		public function remove_widget($val){
			$collection = $GLOBALS['db']->widgets;
			$collection->remove(array(
  				"widget" => $val
  			));
	
		}
		
		public function update_widget($val,$newVal){
			$collection = $GLOBALS['db']->widgets;
			$collection->update(array("widget"=>$val),array("widget"=>$newVal));
		}
	
		public function get_widget(){
			$collection = $GLOBALS['db']->widgets;
			$cursor = $collection->find();
			$i = 0;
			$wid_array = array();
			foreach($cursor as $doc){
				$wid_array[$i] =  $doc['widget'];
				$i = $i + 1;
			}
			return $wid_array;		
		}
	}
?>
