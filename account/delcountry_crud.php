<?php
	class delcountry_crud{
		public function __construct(){
			$GLOBALS['m'] = new MongoClient();
   			$GLOBALS['db'] = $GLOBALS['m']->bitsmun;
		}
	
		public function add_country($val,$count,$council){
			$value = array(
  				"country" => $val,
				"countryCount" => $count,
				"council" => $council
  			);
			$collection = $GLOBALS['db']->delCountry;
			
			$collection->insert($value);
		}

		public function remove_country($val,$council){
			$collection = $GLOBALS['db']->delCountry;
			$collection->remove(array(
  				"country" => $val,
				"council" => $council
  			));
	
		}
		
		public function update_count($val,$newCount, $council){
			$collection = $GLOBALS['db']->delCountry;
			$collection->update(array("country"=>$val),array("country"=>$val,"countryCount"=>$newCount, "council" => $council));
		}
	
		public function get_count(){
			$collection = $GLOBALS['db']->delCountry;
			$cursor = $collection->find();
			$i = 0;
			$coun_array = array();
			foreach($cursor as $doc){
				$coun_array['country'][$i] =  $doc['country'];
				$coun_array['count'][$i] = $doc['countryCount'];
				$coun_array['council'][$i] = $doc['council'];				
				$i = $i + 1;
			}
			return $coun_array;		
		}
	}
?>
