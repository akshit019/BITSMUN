<?php
	class ipPositions_crud{
		public function __construct(){
			$GLOBALS['m'] = new MongoClient();
   			$GLOBALS['db'] = $GLOBALS['m']->bitsmun;
		}
	
		public function add_position($val){
			$value = array(
  				"position" => $val
  			);
			$collection = $GLOBALS['db']->ipPositions;
			
			$collection->insert($value);
		}

		public function remove_position($val){
			$collection = $GLOBALS['db']->ipPositions;
			$collection->remove(array(
  				"position" => $val
  			));
	
		}
		
		public function update_position($val,$newVal){
			$collection = $GLOBALS['db']->ipPositions;
			$collection->update(array("position"=>$val),array("position"=>$newVal));
		}
	
		public function get_position(){
			$collection = $GLOBALS['db']->ipPositions;
			$cursor = $collection->find();
			$i = 0;
			$pos_array = array();
			foreach($cursor as $doc){
				$pos_array[$i] =  $doc['position'];
				$i = $i + 1;
			}
			return $pos_array;		
		}
	}
?>
