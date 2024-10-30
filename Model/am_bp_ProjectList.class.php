<?php

class am_bpMainModel extends am_bpAbstractListModel{
	private $Organisation; // WIP: The Organisation Object is a temporaly soloution, Will be changed in future
	
	public function __construct(){
		am_bp_add_debug_info('MainModel bzw Project List Object constructed', 2);
	}
	
	public function __destruct(){
		am_bp_add_debug_info('MainModel bzw Project List Object destructed', 2);
	}
	
	public function addInfoObject($id, $name = FALSE, $autoload = TRUE){
		
		if($id){

			$this->InfoObject_array[] = new am_bpProjectModel($id, $name, $autoload);
			if(!$this->InfoObjectFocus){
				$this->setInfoObjectFocus();
			}
			return TRUE;
		}
		else{
			am_bp_add_debug_info('ERROR - NO ID TO ADD PROJECT IN MODEL', 3);
			return FALSE;
		}
	}

	public function __call($method, $args = 0){
		$method_firstpart = substr($method, 0, 3);
		$method = substr($method, 3);

		if($method_firstpart == "get"){
				
			if(strncmp($method, "Project", 7) == 0){
				if(!$this->InfoObject_array){
					$this->loadDefaultProjects();
					am_bp_add_debug_info('default Projekte geladen',1);
				}

				$method = substr($method, 7);
				$method = strtolower($method);
				$projectFocus = $this->getListFocus();
				
				return $projectFocus->$method;
			}
			else if (strncmp($method, "Need", 4) == 0){
					
				$projectFocus = $this->getListFocus();
				
				$needFocus = $projectFocus->getListElement()->getListFocus();
				
				$method = substr($method, 4);
				$method = strtolower($method);
				return $needFocus->$method;
			}
			else{
				$msg = '--Call in Main Model<br>--NO METHOD get-methode CAN BE GENERATED BECAUSE'.$method.'IS UNKNOWN';
				am_bp_add_debug_info($msg, 3);
				return false;
			}
		}
		else{
			$msg = '--Call in Main Model<br>--NO METHOD -'.$method.'- CAN BE GENERATED<br>--method_firstpart'.$method_firstpart;
			am_bp_add_debug_info($msg, 3);
			return false;
		}
	}

	private function loadDefaultProjects(){		
		if($id = get_post_meta( get_the_ID(), 'am_bp_betterplace_id', true)){
			$this->addInfoObject($id);
		return $id;
		}
		else{
			return false;
		}
	}

}


