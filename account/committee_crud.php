<?php
	class committee_crud{
		public function __construct(){
			$GLOBALS['m'] = new MongoClient();
   			$GLOBALS['db'] = $GLOBALS['m']->bitsmun;
		}
	
		public function add_committee($val){
			$value = array(
  				"committee" => $val
  			);
			$collection = $GLOBALS['db']->committees;
			
			$collection->insert($value);
		}

		public function remove_committee($val){
			$collection = $GLOBALS['db']->committees;
			$collection->remove(array(
  				"committee" => $val
  			));
	
		}
		
		public function update_committee($val,$newVal){
			$collection = $GLOBALS['db']->committees;
			$collection->update(array("committee"=>$val),array("committee"=>$newVal));
		}
	
		public function get_committee(){
			$collection = $GLOBALS['db']->committees;
			$cursor = $collection->find();
			return $cursor;		
		}
	}
?>
