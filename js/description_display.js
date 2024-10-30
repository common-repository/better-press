/*
 * Script for hidde and show full description in widget
 */


jQuery(document).ready(function(){
	
	jQuery('.am_bp_more_description').click(function(){
		jQuery(this).parent().next().show();
		jQuery(this).parent().hide();
		return false;
	});
	jQuery('.am_bp_less_description').click(function(){
		jQuery(this).parent().hide();
		jQuery(this).parent().prev().show();
		return false;
	});
});
