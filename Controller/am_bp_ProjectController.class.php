<?php

class am_bpProjectController {
	static $that;
	public $Need;
	private $Model_Object;
	private $projectFocus;

	public function __construct() {
		am_bp_add_debug_info('ProjectController Object constructed', 2);
		$that = $this;
		$this -> Model_Object = new am_bpMainModel();
	}
	
	public function __destruct() {
		am_bp_add_debug_info('ProjectController Object destructed', 2);
	}

	public function __call($name, $arguments) {

	}

	public function addProject($id, $autoload = true) {
		$this -> Model_Object -> addInfoObject($id, $autoload);
	}

	public function test() {
		$this -> Model_Object -> test();
	}

	public function setProject($id) {
		$this -> Model_Object -> setInfoObjectFocus($id);
	}

	public function nextProject() {
		if ($this -> Model_Object -> focusNextInfoObject()) {

			return TRUE;
		} else {
			am_bp_add_debug_info(' <br>## Project Controller - Function nextProject()<br>## Reached end of list<br> ', 1);
			return FALSE;
		}
	}
	public function nextNeed(){
		if ($this -> Model_Object -> getListFocus()->getListElement()->focusNextInfoObject()) {

			return TRUE;
		} else {
			am_bp_add_debug_info(' <br>## Project Controller - Function nextNeed()<br>## Reached end of list<br> ', 1);
			return FALSE;
		}
	}
	public function firstProject() {

		if ($this -> Model_Object -> focusFirstInfoObject()) {

			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function loadProjectDetails() {
		$this -> Model_Object -> getInfoObjectFocus() -> loadInfo();
	}

	protected function cutDescription($description, $option = 'letters', $maxnumber =50) {
		if ($option == 'letters' || $option = 0) {
			$description = substr($description, 0, $maxnumber);
			trim($description);
			$description = $description ."...";
		} else if ($option == 'words' || $option = 1) {

			$text_end = false;
			$in_bracket = false;
			$tok = strtok($description, " \n\t");
			$description = $tok;
			for ($i = 1; $i < $maxnumber; $i++) {
				$tok = strtok(" \n\t");
				if (!$tok) {
					$text_end = true;
					break;
				}
				
				$description = $description . " " . $tok;
				
			}
			if (!$text_end) {$description = $description . "...";
			}
			else{
				return false;
			}
		}
		return $description;
	}

	protected function formatAmount($amount, $format = 0) {
		if ($format == 1 || $format = "euro") {
			$amount = $amount / 100;
			$amount = number_format($amount, $decimals = 2, ',', '.');

		} else if ($format == 2 || "nocent") {
			$amount = $amount - ($amount % 100);
			$amount = $amount / 100;
		} else if ($format == 3 || "cent") {
			$amount = $amount % 100;
		}
		return $amount;
	}

	// Get the betterplaceID
	public function getProjectID() {
		if ($this -> Model_Object) {
			return $this -> Model_Object -> getProjectID();
		}
	}

	// Get the intern Project Id-Name. If not Set you get the string "betterplaceID-[Project ID]"
	public function getProjectName() {
		if ($this -> Model_Object) {

			if ($this -> Model_Object -> getProjectName_id()) {
				return $this -> Model_Object -> getProjectName_id();
			} else {
				return "betterplaceID-" . $this -> Model_Object -> getProjectBp_id();
			}
		} else {
			return FALSE;
		}
	}

	// Get the Project Title
	public function getProjectTitle() {
		if ($this -> Model_Object) {
			return $this -> Model_Object -> getProjectTitle();
		} else {
			return FALSE;
		}
	}

	// Get the Project Description - If you only want a cutted first part, set ($count, $option). $count for number of letters,
	// if $option is SET_LETTERS, or Words if $option is SET_WORDS.
	public function getProjectDescription($maxnumber = 0, $option = 0) {

		$description = $this -> Model_Object -> getProjectDescription();

		if ($maxnumber) {
			if($cut_description = $this -> cutDescription($description, $option, $maxnumber)){
				
				return $cut_description;
			}
		}
	
		return $description;
	}

	// Get the Project aimed sum of Money, that needed to be collect - Set $format to "European" or let it unset to get a string in European Money
	// format with €. Set $format to "Unformated" to get an int whith the value of Cents. Set $format to Euros to get only complete number of
	// Euros. Set $format to "Cents" to get only the value of Cents minus Euros
	public function getProjectAmount($option = 0, $format = 0) {

		if ($option == 0 || $option == "open") {

			$amount = $this -> Model_Object -> getProjectOpen_amount_in_cents();

		} else if ($option == 1 || $option == "donated") {// TODO: Muss erechnet werden
			$amount =  $this -> getProjectAmount(2) - $this -> Model_Object -> getProjectOpen_amount_in_cents();
		} else if ($option == 2 || $option == "requested") {
			$amount = $this->getProjectAmount(0)*100 / $this->getProjectProgress();
			 
		}
		if ($format) {

			$amount = $this -> formatAmount($amount, $format);
		}
		return $amount;
	}

	// Get complete Project progress in per cent. Set $format to "Unformatted" or let it unset to get the value as int. Set it to "Formatted"
	// to get it as a string with "%" sign.
	public function getProjectProgress() {

		return $this -> Model_Object -> getProjectProgress_percentage();

	}

	public function getProjectLink($option = 0) {
		if ($this -> Model_Object) {
			$link = "http://www.betterplace.org/de/projects/" . $this -> getProjectID();
			if ($option == 1) {
				$link = $link . "/donations/new";
			}
			echo $link;
		}
	}

	// Get number of Opinions as int. If let kind unset or set it to "Complete", you will get the number of all Opinions. Set it to "Positive" to
	// get the number of positive opinions, set it to "Negative" to get number of negative opinions.
	public function getProjectOpinions($option = 0) {
		if ($this -> Model_Object) {
			if (!$option || $option == "total") {
				return $this -> getProjectOpinions("positive") + $this -> getProjectOpinions("negative");
			} else if ($option == "positive" || $option == 1) {
				return $this -> Model_Object -> getProjectPositive_opinions_count();
			} else if ($option == "negative" || $option == 2) {
				return $this -> Model_Object -> getProjectNegative_opinions_count();
			}
		}
	}

	public function getProjectDonors() {
		if ($this -> Model_Object) {
			return $this -> Model_Object -> getProjectDonnors();
		}
	}

	public function getProjectNeedCount($option = 0) {

		if (!$option || $option == "complete") {
			return $this -> getProjectNeedCount("open") + $this -> getProjectNeedCount("finished");
		} else if ($option== 1 || $option == "open") {
			return $this -> Model_Object -> getProjectIncomplete_need_count;
		} else if ($option== 2 || $option == "finished") {
			return $this -> Model_Object -> getProjectComplete_need_count;
		}
	}

	public function getNeedID() {
		return $this -> Model_Object -> getNeedID;
	}

	public function getNeedDate($option = 0) {
		if ($option == 0 || $option == "created") {
			return $this -> Model_Object -> getNeedCreated_at();
		} else if ($option == 1 || $option == "updated") {
			return $this -> Model_Object -> getNeedUpdated_at();
		}
	}

	public function getNeedTitle() {
		return $this -> Model_Object -> getNeedTitle();
	}

	public function getNeedDescription($maxnumber = 0, $option = 0) {
		$description = $this -> Model_Object -> getNeedDescription();
		if ($maxnumber) {
			if($cut_description = $this -> cutDescription($description, $option, $maxnumber)){
				return $cut_description;
			}
		}
		return $description;
	}

	public function getNeedProgress() {
		return $this -> Model_Object -> getNeedProgress_percentage();
	}

	public function getNeedAmount($option, $format) {
		if ($option == 0 || $option == "open") {
			$amount = $this -> Model_Object -> getNeedOpen_amount_in_cents();
		} else if ($option == 1 || $option == "donated") {
			$amount = $this -> Model_Object -> getNeedDonated_amount_in_cents();
		} else if ($option == 2 || $option == "requested") {
			$amount = $this -> Model_Object -> getNeedRequested_amount_in_cents();
		}
		if ($format) {
			$amount = $this -> formatAmount($amount, $format);
		}
		return $amount;
	}
	public function iscompletedNeed(){
		return $this->Model_Object -> getNeedcompleted();
	}
}
