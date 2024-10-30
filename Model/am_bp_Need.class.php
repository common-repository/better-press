<?php
class am_bpNeedModel extends am_bpAbstractInfoModel {
	protected $projectID;

	public function __construct($id = FALSE, $name = FALSE, $autoload = TRUE, $data_array = FALSE) {
		am_bp_add_debug_info('NeedModel Object constructed', 2);
		if (!$data_array) {
			parent::__construct($id, $name, $autoload);
		} else {
			$this -> bp_id = $id;
			$this -> name_id = $name;

			$this -> info = $data_array;
		}
	}

	public function __destruct() {
		am_bp_add_debug_info('NeedModel Object destructed', 2);
	}

	public function setProjectID($projectID) {
		$this -> projectID = $projectID;

	}

	protected function getStandartURL() {
		return AM_BP_ADRESS_ROOT. AM_BP_ADRESS_PROJECTS . $this -> project_id . AM_BP_ADRESS_NEEDS . $this -> bp_id . AM_BP_JSON;
	}

}
