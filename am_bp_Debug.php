<?php

function am_bp_add_debug_info($info, $importance = 0) {
	if(am_bp_debugObject::getDebugObject() && $info){
		$debugObject = am_bp_debugObject::getDebugObject();
		$debugObject->addDebugInfo($info, $importance);
	}
}

class am_bp_debugObject {
	private static $instance;
	private $mode;
	private $infoArray;
	
	public static function init($mode = 0) {
		if (!self::$instance) {
			
				$newInstance = new self($mode);
				self::$instance = $newInstance;
				return true;
			
		}
		else{
			return false;
		}
	}
	
	public static function getDebugObject(){
		if(self::$instance){
			return self::$instance;
		}
		return false;
	}
	
	private function __construct($mode){
		$this->mode = $mode;
		$this->infoArray = array('###', 'am_bp DEBUG INFO LOG', '####', '  ');	
	}
	
	public function getDebugMode(){
		return $mode;
	}
	
	public function addDebugInfo($info, $importance = 0){
	
		$newInfoArray = explode ('<br>',  $info);
		$this->infoArray = array_merge ( $this->infoArray, $newInfoArray);
		$mode_check_number = 2 - $this->mode;
		
		if($mode_check_number < $importance){
			echo $info.'<br>';
		}
	}
	
	public function getDebugLog()
	{
		return $this->infoArray;
	}
	
	public function printDebugLog()
	{
		$info_string = implode ('<br>', $this->infoArray);
		echo $info_string;
	}
}
