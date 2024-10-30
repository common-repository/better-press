/*
 * The display of the jquery ui progress bar 
 */

jQuery(document).ready(function () {
var progress_values = jQuery('.progress_count>span').get();
var progress_count = progress_values.length;
var value;
for (var i=0,len=progress_values.length; i<len; i++){
	value = progress_values[i].innerHTML;
	value = parseInt(value);
	jQuery( '.progress_bar:eq('+i+')' ).progressbar({
  		value: value
	});
}
 

});



/*   var widget = $( ".selector" ).progressbar( "widget" );

$( ".selector" ).progressbar({ max: 1024 });
$( ".selector" ).progressbar({ value: 25 }) */