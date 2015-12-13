<?php
	class delcouncil_crud{
		public function __construct(){
			$GLOBALS['m'] = new MongoClient();
   			$GLOBALS['db'] = $GLOBALS['m']->bitsmun;
		}
	
		public function add_council($val,$essay){
			$value = array(
  				"council" => $val,
				"essay" => $essay
  			);
			$collection = $GLOBALS['db']->delCouncil;
			
			$collection->insert($value);
		}

		public function remove_council($val){
			$collection = $GLOBALS['db']->delCouncil;
			$collection->remove(array(
  				"council" => $val
  			));
	
		}
		
		public function get_council(){
			$collection = $GLOBALS['db']->delCouncil;
			$cursor = $collection->find();
			return $cursor;		
		}

		public function read_essay($council){
		$collection = $GLOBALS['db']->delCouncil;
		$temp_query = array("council" => $council);
		$cursor = $collection->find($temp_query);
		return $cursor;
		}		
	}
?>
