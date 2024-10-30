<?php

abstract class am_bpAbstractListModel{
	// The InfoObjectFocus is a reference to a ProjectObject of the ProjectObject array. The Focus select temporaly the Object that needs to work
	protected $InfoObjectFocus;

	// The PorjectObject array includes all Project Object, that can include NeedObjects
	protected $InfoObject_array;

	public function getListFocus(){
		
		if($this->InfoObject_array){
			if(!$this->InfoObjectFocus){
				$this->setInfoObjectFocus();
			}
			
			
			return $this->InfoObjectFocus;
		}
		else{
			am_bp_add_debug_info('ERROR - CANNOT FOCUS OBJECT', 3);
			return FALSE;
		}
	}

	public function focusNextInfoObject(){
		if($this->InfoObject_array && $this->InfoObjectFocus){
			$nextObject = next($this->InfoObject_array);
			if($nextObject){

				$this->InfoObjectFocus = $nextObject;

				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		else{
			am_bp_add_debug_info('ERROR - NO PROJECTS INITIALISED TO GO TO NEXT OBJECT',3);
			return FALSE;
		}
	}

	public function focusFirstInfoObject(){
		if($this->InfoObject_array){

			$this->InfoObjectFocus = reset($this->InfoObject_array);
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	public function setInfoObjectFocus($id = FALSE, $name = FALSE){
		if($this->InfoObject_array){
			if($id || $name){ // TODO: GET ID BY NAME
				$this->InfoObjectFocus = $this->InfoObject_array[$this->searchProject($id)];
			}
			else{
				$this->InfoObjectFocus = current($this->InfoObject_array);
			}
			return TRUE;
		}
		else{
			am_bp_add_debug_info('ERROR - CANNOT FOCUS INFO OBJECT',3);
			return FALSE;
		}
	}


	abstract public function addInfoObject($id, $name = FALSE);

	protected function searchInfoObject($id){
		$counter = 0;
		foreach($this->InfoObject_array as $singleObject){
			if($singleObject == $id){
				return $counter;
			}
			$counter ++;
		}
	}
}