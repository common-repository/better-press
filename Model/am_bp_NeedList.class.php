<?php
class am_bpNeedListModel extends am_bpAbstractListModel {
	protected $ProjectObject;

	public function __get($get){
		echo "get".$get;
		return 'hhjhff';
	}
	public function __construct($that) {
		am_bp_add_debug_info('NeedList Object constructed', 2);
		$this -> ProjectObject = $that;
	}
	
	public function __destruct() {
		am_bp_add_debug_info('NeedList Object destructed', 2);
	}
	
	public function getListFocus(){
		
		if(!$this->InfoObject_array){
			$this->loadAllNeeds();
		}
		parent::getListFocus();
		
		return $this->InfoObjectFocus;
	}
	public function getNeedFocus() {
		return $this -> getListFocus();
	}

	public function addInfoObject($id = FALSE, $name = FALSE, $data_array = FALSE) {
		if ($data_array) {
			
			$this -> InfoObject_array[] = new am_bpNeedModel($id, $title, false, $data_array);
		} else {
			am_bp_add_debug_info('ERROR - NO DATA ARRAY GIVEN FOR NEED OBJECT', 3);
		}
	}

	public function loadAllNeeds() {

		$NeedList = $this->ProjectObject -> requestAllProjectNeeds();
		
		
		foreach ($NeedList as $needData) {
			
			
				$this -> addInfoObject($needData[id], $needData[title], $needData);
			
		}

		if (!$this -> InfoObjectFocus) {
			
			$this -> setInfoObjectFocus();
			
		}
	}

}
