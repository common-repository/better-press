<?php
class am_bpProjectModel extends am_bpAbstractInfoModel{

	protected $ListElement;

	public function getListElement(){
		return $this->ListElement;
	}

	public function __construct($id, $name = FALSE, $autoload = TRUE){
		am_bp_add_debug_info('ProjectModel Object constructed', 2);
		parent::__construct($id, $name, $autoload);


		$this->ListElement = new am_bpNeedListModel($this);
	}
	
	public function __destruct(){
		am_bp_add_debug_info('ProjectModel Object destructed', 2);
	}

	public function requestAllProjectNeeds(){
		
		$rawList = $this->requestJSON(am_bp_getJSONRequestURL($this->bp_id, 'need_list'));
		return $rawList[data];

	}

	protected function getStandartURL(){
	
		return am_bp_getJSONRequestURL($this->bp_id, 'project_details');
	}
}


