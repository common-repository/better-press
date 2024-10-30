<?php

abstract class am_bpAbstractInfoModel {
	public $bp_id;
	public $name_id;
	protected $autoload;
	protected $info;

	public function __construct($id, $name = 0, $autoload = 1) {
		$this -> autoload = $autoload;
		$this -> name_id = $name;
		if ($id) {
			$this -> bp_id = $id;
		} else {
			am_bp_add_debug_info('ERROR - CANNOT CREATE PROJECT OBJECT WITHOUT ID', 3);
			return FALSE;
		}
	}

	public function __get($thing) {
		if (!$this -> info) {
			$check = $this -> requestJSON();
		} else {
			$check = $this -> info;
		}
		if (key_exists($thing, $check)) {
			if ($this -> autoload) {
				$this -> info = $check;
			}
			return $check[$thing];
		} else {
			am_bp_add_debug_info('ERROR - UNKOWN TYPE REQUESTED IN MODEL<br>NAME:' . $thing, 3);
			return FALSE;
		}
	}

	public function loadInfo() {
		if ($this -> info = $this -> requestJSON()) {
			echo '***';
			return true;
		} else {
			am_bp_add_debug_info('ERROR - JSONREQUEST FAILED', 3);
			return false;
		}
	}

	protected function requestJSON($url = FALSE) {
		if (!$url) {
			$url = $this -> getStandartURL();
		}
		if ($json = file_get_contents($url)) {
			return json_decode($json, TRUE);
		} else {
			am_bp_add_debug_info('ERROR - JSONREQUEST FAILED - NO HOST', 3);
			return false;
		}
	}

	abstract protected function getStandartURL();

}
