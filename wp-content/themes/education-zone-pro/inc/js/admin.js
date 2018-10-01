
jQuery(document).ready(function($){

	$('#education_zone_pro_event_start_date').datepicker({ 
		dateFormat: 'yy-mm-dd',
		onSelect: function(date) {
    		$("#education_zone_pro_event_end_date").datepicker('option', 'minDate', date);
  		}
	});

	$("#education_zone_pro_event_end_date").datepicker({dateFormat: 'yy-mm-dd'});

});
