<?php
/*
 * Controller Class for Main functions of the Plug in.
 * Works Semi Object Orientated.
 * Only One Object possible.
 */
class am_bp_PluginFunctions {

	/*
	 * Objects
	 */

	// Instance of Object itself.
	protected static $Instance;

	// Reference of plugin porject output controller - am_bp_ProjectController
	protected $main_projectOut_Controller;

	// Reference to plugin config object. am_bp_Config
	protected $configObject;

	// Object of Dashboard Menu for am_bp project post type. WIP
	protected $projectMenuObject;
	protected $DashboardTemplateSettingsObject;
	
	// true if on Front and Pages of Wordpress site. false if on Dashboard
	protected $on_frontend;

	// true if on am_bp Project post type page.
	protected $is_project_posttype;

	// ID of betterplace project if on page meta data
	protected $meta_betterplace_id;

	/*
	 * Static global function to initialize the main object of plug in - absolutly necessary to run once for plug in functionality
	 * Only construct one Object of this class is possible and necessary.
	 *
	 * Returns true if success.
	 * Returns false if no new Object is constructed successful.
	 *
	 * If $overwrite set true, existing Object will be overwritten.
	 * If am_bp_Plugin object still exists once time, default no new object will be construct.
	 */
	public static function initPluginFunctionsObject($overwrite = false) {
		if (!self::$Instance && !$overwrite) {

			$newInstance = new self();
			self::$Instance = $newInstance;
			am_bp_add_debug_info('The Plugin Functions Object initialized');
			return true;
		} else {
			am_bp_add_debug_info('ERROR - cannot initialize Plugin Functions Object even it still exist', 3);
			return false;
		}
	}

	/*
	 * Function to get this Object.
	 *
	 * Returns this Object if success
	 * Returns false is no Object ist initialized yet.
	 */
	public static function getPluginFunctionsObject() {
		if (self::$Instance) {
			return self::$Instance;
		} else {
			return false;
		}
	}

	/*
	 * Constructor
	 */
	private function __construct() {
		$this -> addActions();
		am_bp_add_debug_info('Plugin Functions Object constructed', 2);
		//$this -> create_post_type();
		// Add common Plugin actions

	}

	/*
	 * Function to get betterplace id if set for actual page.
	 */
	public function getBetterplaceID() {
		return $this -> meta_betterplace_id;
	}

	public function isProjectPostType() {
		if ($this -> is_project_posttype) {
			return true;
		} else {
			return false;
		}
	}

	public function onFrontend() {
		if ($this -> on_frontend) {
			return true;
		} else {
			return false;
		}
	}

	public function getOutputObject($id = false) {
		if (!$id) {
			if ($this -> main_projectOut_Controller) {
				return self::$main_projectOut_Controller;
			} else {
				return new am_bpProjectController();
			}
		}
	}

	protected function addActions() {

		add_action('admin_init', array($this, 'loadDashboard'));
		add_action('widgets_init', array($this, 'registerAutomaticSidebar'));
		add_action('wp', array($this, 'checkPageData'));
		//add_action('admin_menu', array($this, 'addOptionsPage'));

		add_action('wp_enqueue_scripts', array($this, 'enqueueStyle'));
		add_action('wp_enqueue_scripts', array($this, 'enqueueScript'));

		add_filter('single-bpProject_template', array($this, 'loadSingleTemplate'));

	}

	private function addOptionsPage() {
	}

	public function loadSingleTemplate() {

	}

	public function create_post_type() {
		register_post_type('bpProject', am_bp_getProjectPostTypeArgs());
	}

	public function loadDashboard() {
		am_bp_add_debug_info('Load Dashboard', 1);
		am_bp_DashboardProjectMenu::initPluginObject();

		$this -> projectMenuObject = am_bp_DashboardProjectMenu::getPluginObject();
	}

	public function checkPageData() {
		am_bp_add_debug_info(' <br> ~ Checked Page data ~ <br>', 2);
		$postID = get_the_ID();
		$post_type = get_post_type();
		if ($post_type == 'bpproject') {
			$this -> is_project_posttype = true;

			$meta_betterplace_id = get_post_meta($postID, 'am_bp_betterplace_id', true);
			$this -> meta_betterplace_id = $meta_betterplace_id;

			am_bp_add_debug_info('## is post type \'bpproject\': true<br>## post id: ' . $postID . '<br>## betterplace id: ' . $meta_betterplace_id . '<br> ', 2);
		} else {
			am_bp_add_debug_info('## is post type \'bpproject\': false<br>## post id: ' . $postID . '<br>', 2);
		}
	}

	public static function enqueueScript() {
		am_bp_add_debug_info('enqueue Script...', 2);
		$deps = array('jquery', 'jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-progressbar');
		wp_enqueue_script('am_bp_progressbar_js', plugins_url('js/widget_progressbar.js', dirname(__FILE__)), $deps);

		//wp_register_script('am_bp_progressbar_js', plugins_url( 'am_betterpress/js/widget_progressbar.js', dirname(__FILE__)), $deps);
		$deps = array('jquery');
		wp_register_script('am_bp_dashboard_js', plugins_url('am_betterpress/js/dashboard.js', dirname(__FILE__)), $deps);
		
		$deps = array('jquery');
		wp_enqueue_script('am_bp_description_display_js', plugins_url('js/description_display.js', dirname(__FILE__)), $deps);
	
	}

	public static function enqueueStyle() {
		am_bp_add_debug_info('enqueue Style...', 2);
		wp_enqueue_style('am_bp_widget_css', plugins_url('css/widget.css', dirname(__FILE__)));
		wp_enqueue_style('am_bp_progressBar_css', plugins_url('css/jquery-ui-1.10.3.custom.css', dirname(__FILE__)));
	}

	public function __destruct() {
		am_bp_add_debug_info('Plugin Functions Object destructed', 2);
	}

}
