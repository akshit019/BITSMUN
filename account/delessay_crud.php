<?php
	class delessay_crud{
		public function __construct(){
			$GLOBALS['m'] = new MongoClient();
   			$GLOBALS['db'] = $GLOBALS['m']->bitsmun;
		}
	
		public function add_essay($val){
			$value = array(
  				"essay" => $val
  			);
			$collection = $GLOBALS['db']->delEssays;
			
			$collection->insert($value);
		}

		public function remove_essay($val){
			$collection = $GLOBALS['db']->delEssays;
			$collection->remove(array(
  				"essay" => $val
  			));
	
		}
		
		public function update_essay($val,$newVal){
			$collection = $GLOBALS['db']->delEssays;
			$collection->update(array("essay"=>$val),array("essay"=>$newVal));
		}
	
		public function get_essay(){
			$collection = $GLOBALS['db']->delEssays;
			$cursor = $collection->find();
			$i = 0;
			$ess_array = array();
			foreach($cursor as $doc){
				$ess_array[$i] =  $doc['essay'];
				$i = $i + 1;
			}
			return $ess_array;		
		}
	}
?>
