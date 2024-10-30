/*
 * Script for Dashboard display of the Widget
 */
jQuery(document).ready(function am_bp_checkGeneralSettings() {

	jQuery('.check_project_details').parent().parent().parent().parent().children('.projectDetails').hide();
	jQuery('.check_project_details:checked').parent().parent().parent().parent().children('.projectDetails').show();
	jQuery('.check_show_needs').parent().parent().parent().parent().children('.needDetails').hide();
	jQuery('.check_show_needs:checked').parent().parent().parent().parent().children('.needDetails').show();
	jQuery(".checkDynamic:checked").parent().next().next().hide();
	jQuery(".checkStatic:checked").parent().next().next().show();

	jQuery('.checkBox').nextAll('.hiddenbox').hide();
	jQuery('.checkBox>input:checked').parent().nextAll('.hiddenbox').show();
});

jQuery(document).click(function am_bp_checkGeneralSettings() {

	jQuery('.check_project_details').parent().parent().parent().parent().children('.projectDetails').hide();
	jQuery('.check_project_details:checked').parent().parent().parent().parent().children('.projectDetails').show();
	jQuery('.check_show_needs').parent().parent().parent().parent().children('.needDetails').hide();
	jQuery('.check_show_needs:checked').parent().parent().parent().parent().children('.needDetails').show();
	jQuery(".checkDynamic:checked").parent().next().next().hide();
	jQuery(".checkStatic:checked").parent().next().next().show();

	jQuery('.checkBox').nextAll('.hiddenbox').hide();
	jQuery('.checkBox>input:checked').parent().nextAll('.hiddenbox').show();
});

