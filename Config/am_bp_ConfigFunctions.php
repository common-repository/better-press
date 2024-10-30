<?php

/*
 * Arguments for Costum Post Type
 */
 function am_bp_getProjectPostTypeArgs(){
	$labels = array(
		'name'               => __('Projects', 'BetterPress'),
		'singular_name'      => __('Project', 'BetterPress'),
		'add_new'            => __('Add', 'BetterPress'),
		'add_new_item'       => __('Add New Project', 'BetterPress'),
		'edit_item'          => __('Edit Project', 'BetterPress'),
		'new_item'           => __('New Project', 'BetterPress'),
		'all_items'          => __('All Projects', 'BetterPress'),
		'view_item'          => __('Show Projects', 'BetterPress'),
		'search_items'       => __('Search Project', 'BetterPress'),
		'not_found'          => __('No Projects', 'BetterPress'),
		'not_found_in_trash' => __('No Projects in Trash', 'BetterPress'), 
		'parent_item_colon'  => '',
		'menu_name'          => __('Projects', 'BetterPress')
	);
	$args = array(
		'labels'        => $labels,
		'description'   => __('To Intigrate Betterplace or other Fundraising Projects', 'BetterPress'),
		'public'        => true,
		'menu_position' => 20,
		'supports'      => array( 'title', 'editor', 'thumbnail'),
		'has_archive'   => true,
		'publicly_queryable' => true,
   		 'show_ui' => true, 
    	'show_in_menu' => true, 
   		 'query_var' => true,
    	'rewrite' => array( 'slug' => 'project' ),
	);
	
	return $args;
}
	
/*
 * Function to get URL for JSON request
 */
 function am_bp_getJSONRequestURL($bp_id, $request){
 	
	// Root Directory of Betterplace Request (API 4)
 	$request_root = "https://api.betterplace.org/de/api_v4";
 	if($request == 'project_details'){
 		$request_url = $request_root.'/projects/'.$bp_id.'.json';
 	}
	elseif($request == 'need_list'){
		$request_url = $request_root.'/projects/'.$bp_id.'/needs.json';
	}
	
	return $request_url;
 }
 
 /*
  * Function to get Link to Betterplace
  */
  function am_bp_getBetterplaceLink($bp_id, $option){
  	if ($this -> Model_Object) {
			$link = "http://www.betterplace.org/de/projects/" . $bp_id;
			if ($option == 'donate') {
				$link = $link . "/donations/new";
			}
			return $link;
		}
  }
  /*
   * Function to get Betterplace Iframe
   */
