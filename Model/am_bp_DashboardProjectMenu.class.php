<?php
/*
 * This is the Dashboard Custom Post Type Project Page Class.
 * TODO: exclude the custom post type initial code to am_bp_ProjectType.class because this is not menu specific
 * TODO: rename
 */

class am_bp_DashboardProjectMenu {
	protected static $Instance;

	protected $configObject;

	public static function getPluginObject() {
		if (self::$Instance) {
			return self::$Instance;
		} else {
			return false;
		}
	}

	protected function __construct() {
		am_bp_add_debug_info('DashboardProjectMenu Object constructed', 2);

		$this -> addActions();
	}

	public function __destruct() {
		am_bp_add_debug_info('DashboardProjectMenu Object destructed', 2);
	}

	public static function initPluginObject() {
		$newInstance = new self();
		self::$Instance = $newInstance;
		return $newInstance;
	}

	protected function addActions() {
		add_action('save_post', array($this, 'project_boxes_save'));
		add_action('add_meta_boxes', array($this, 'projectPostType_ProjectID'));
	}

	public function projectPostType_ProjectID($post_type) {
		//add_meta_box('project_type_box', __('Project Settings', 'BetterPress'), array($this, 'project_type_box_content'), 'bpProject', 'side', 'high');

		//add_meta_box('attach_to_project_box_content', __('Attach to Project Page', 'BetterPress'), array($this, 'attach_to_project_box_content'), 'page', 'advanced', 'high');

		add_meta_box('set_bpID', __('Set betterplace.org ID for widget', 'BetterPress'), array($this, 'set_bpID_content'), 'page', 'side', 'high');

		add_meta_box('set_bpID', __('Set betterplace.org ID for widget', 'BetterPress'), array($this, 'set_bpID_content'), 'post', 'side', 'high');
	}

	public function set_bpID_content($post) {

		$meta = get_post_meta($post -> ID, 'am_bp_betterplace_id', true);

		require 'am_bp_dashboard-boxes-setbpID.phtml';

	}

	public function project_type_box_content($post) {
		wp_nonce_field(plugin_basename(__FILE__), 'project_type_box_content_nonce');
		$project_type = get_post_meta($post -> ID, 'project_type', true);
		$bp_id = get_post_meta($post -> ID, 'am_bp_betterplace_id', true);
		$int_id = get_post_meta($post -> ID, 'am_bp_int_id', true);
		$attached_pages = get_pages(array('meta_key' => 'am_bp_int_id', 'meta_value' => $int_id));
		$args = array('type' => 'post', 'orderby' => 'name', 'order' => 'ASC', 'hide_empty' => 0, 'hierarchical' => 1, 'exclude' => '', 'include' => '', 'number' => '', 'taxonomy' => 'category', 'pad_counts' => false);
		$Categories = get_categories($args);

		require 'am_bp_dashboard-boxes-project_type_box_content.phtml';

	}

	public function attach_to_project_box_content($post) {

		$post_int_id = get_post_meta($post -> ID, 'am_bp_int_id', true);
		$post_attach = get_post_meta($post -> ID, 'am_bp_post_attach', true);
		$args = array('post_type' => 'bpProject', 'post_status' => 'publish', 'suppress_filters' => true, );
		$bpProjects = get_posts($args);
		$allProjectData = array();
		$projectData = array();
		foreach ($bpProjects as $single_bpProject) {

			$projectData['int_id'] = get_post_meta($single_bpProject -> ID, 'am_bp_int_id', true);
			$projectData['title'] = $single_bpProject -> post_title;
			$allProjectData[] = $projectData;
		}

		unset($internal_id);

		require 'am_bp_dashboard-box-attach_to_project_box_content.phtml';

	}

	public function project_boxes_save($post_id) {

		$actualPost = get_post($post_id);
		$actualPost_int_id = get_post_meta($post_id, 'am_bp_int_id', true);

		// TODO: optimize this function - get post datas and save if Project Post Type or Page ID
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
			return;

		if ($actualPost -> post_type == 'bpproject') {
			if (!wp_verify_nonce($_POST['project_type_box_content_nonce'], plugin_basename(__FILE__)))
				return;
		}

		if ('page' == $_POST['post_type']) {

			if (!current_user_can('edit_page', $post_id))
				return;
		} else {
			if (!current_user_can('edit_post', $post_id))
				return;
		}

		if ($actualPost -> post_type == 'bpproject') {
			if (!$actualPost_int_id) {
				$new_int_id = $this -> getnew_int_ID();
				update_post_meta($post_id, 'am_bp_int_id', $new_int_id);
			}

			$am_bp_attach_blog = $_POST['am_bp_attach_blog'];
			$project_type = $_POST['project_type'];
			update_post_meta($post_id, 'am_bp_betterplace_id', $am_bp_betterplace_id);
			update_post_meta($post_id, 'project_type', $project_type);
			update_post_meta($post_id, 'am_bp_attach_blog', $am_bp_attach_blog);
		} elseif ($actualPost -> post_type == 'page') {
			if ($_POST[am_bp_post_attach] == "gallery" && $_POST['am_bp_int_id'] != '') {
				$int_id = $_POST['am_bp_int_id'];
				update_post_meta($post_id, 'am_bp_int_id', $int_id);
				update_post_meta($post_id, 'am_bp_post_attach', 'gallery');
			} else {
				update_post_meta($post_id, 'am_bp_int_id', '');
				update_post_meta($post_id, 'am_bp_post_attach', 'unknown');
			}
		}

		$am_bp_betterplace_id = $_POST['am_bp_betterplace_id'];
		if ($am_bp_betterplace_id) {
			update_post_meta($post_id, 'am_bp_betterplace_id', $am_bp_betterplace_id);
		}

	}

	public function getnew_int_ID() {
		$args = array('post_type' => 'bpProject', 'post_status' => 'publish', 'suppress_filters' => true);

		$higherID = 0;
		$bpProjects = get_posts($args);
		foreach ($bpProjects as $single_bpProject) {
			$counter++;
			$actual_int_id = get_post_meta($single_bpProject -> ID, 'am_bp_int_id', true);

			if ($higherID <= $actual_int_id) {
				$higherID = $actual_int_id + 1;
			}
		}
		return $higherID;
	}

}
