<?php
/**
 * Adds Foo_Widget widget.
 */
class am_bp_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		am_bp_add_debug_info('ProjectWidget bzw Project List Object constructed', 2);
		$options = $this->getRegisterOptionsArray();
		
		$IDbase = $options[0];
		$widgetName = $options[1];
		$widgetOptions = $options[2];
		parent::__construct($IDbase, $widgetName, $widgetOptions);
	}
	
	public function __destruct() {
		am_bp_add_debug_info('ProjectWidget bzw Project List Object destructed', 2);
	}
	protected function getRegisterOptionsArray(){
	 		$options= array(	'am_bp_widget', // Base ID
								'Better Press Widget', // Name
								array( 'description' => 'A Widget to display Betterplace Projects' ) // Args
							);
			return $options;
	}
		
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		if($instance['mode'] == 'dynamic'){
		
			$id = get_post_meta( get_the_ID(), 'am_bp_betterplace_id', true);
		}
		else{
			$id = $instance['bp_id'];
		}
		if($id){
			$bpObject = new am_bpProjectController();
			$bpObject->addProject($id);
			$needcount = 0;
			require 'Template/am_bp_WidgetFrontend.php';
		}
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
			echo "save";
		
			
		
		
		// General Settings
		$instance['mode'] = $new_instance['mode'];
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['bp_id'] = intval( $new_instance['bp_id'] );
		if($instance['bp_id'] == 0){$instance['bp_id'] = '';}
		$instance['project_details'] = $new_instance['project_details'];
		$instance['show_needs'] = $new_instance['show_needs'];
		$instance['limit_needs'] = $new_instance['limit_needs'];
		$instance['needcount'] = intval($new_instance['needcount']);
		if($instance['needcount'] == 0){$instance['needcount'] = '';}
		
		// Display Project Details Settings
		$instance['show_title'] = $new_instance['show_title'];
		$instance['title_link'] = strip_tags($new_instance['title_link']);
		
		$instance['show_description'] =  $new_instance['show_description'];
		$instance['description_lenght'] =  intval($new_instance['description_lenght']);
		if($instance['description_lenght'] == 0){$instance['description_lenght'] = '';}
		
		$instance['show_progress'] = $new_instance['show_progress'];
		$instance['progress_title'] = strip_tags($new_instance['progress_title']);
		$instance['progress_style'] = $new_instance['progress_style'];
		
		$instance['show_complete_amount'] = $new_instance['show_complete_amount'];
		$instance['complete_amount_title'] = strip_tags($new_instance['complete_amount_title']);
		
		$instance['show_donated_amount'] = $new_instance['show_donated_amount'];
		$instance['donated_amount_title'] = strip_tags($new_instance['donated_amount_title']);
		
		$instance['show_open_amount'] = $new_instance['show_open_amount'];
		$instance['open_amount_title'] = strip_tags($new_instance['open_amount_title']);
		
		$instance['project_link'] = $new_instance['project_link'];
		$instance['project_link_title'] = strip_tags($new_instance['project_link_title']);
		
		$instance['donate_button'] = $new_instance['donate_button'];
		$instance['donate_button_label'] = strip_tags($new_instance['donate_button_label']);
		
		// Will set project details to off, if no request necessary, due to performance reasons
		if(!$instance['show_title'] && !$instance['show_description'] && !$instance['show_progress']
		&& !$instance['show_complete_amount'] && !$instance['show_donated_amount'] && !$instance['show_open_amount']
		&& !$instance['project_link'] && !$instance['donate_button']){
			$instance['project_details'] = FALSE;
		}
		
		// Need Display Settings
		$instance['needs_title'] = strip_tags($new_instance['needs_title']);
		$instance['need_title_link'] = $new_instance['need_title_link'];
		
		$instance['hide_completed_needs'] = $new_instance['hide_completed_needs'];
		
		$instance['show_need_description'] =  $new_instance['show_need_description'];
		$instance['need_description_lenght'] =  $new_instance['need_description_lenght'];
		if($instance['need_description_lenght'] == 0){$instance['need_description_lenght'] = '';}
		
		$instance['show_need_progress'] = $new_instance['show_need_progress'];
		$instance['need_progress_title'] = strip_tags($new_instance['need_progress_title']);
		$instance['need_progress_style'] = $new_instance['need_progress_style'];
		
		$instance['need_show_complete_amount'] = $new_instance['need_show_complete_amount'];
		$instance['need_complete_amount_title'] = strip_tags($new_instance['need_complete_amount_title']);
		
		$instance['need_show_donated_amount'] = $new_instance['need_show_donated_amount'];
		$instance['need_donated_amount_title'] = strip_tags($new_instance['need_donated_amount_title']);
		
		$instance['need_show_open_amount'] = $new_instance['need_show_open_amount'];
		$instance['need_open_amount_title'] = strip_tags($new_instance['need_open_amount_title']);
		
		$instance['need_donate_button'] = $new_instance['need_donate_button'];
		$instance['need_button_label'] = strip_tags($new_instance['need_button_label']);
		
		// check if form valid
		if($instance['mode'] == 'static' && $instance['bp_id']){
			echo "<b>No betterplace ID set in static mode</b>";
		}
		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		// initialise
		
		require 'Template/am_bp_WidgetDashboard.php';
		}

		} // Widget
		