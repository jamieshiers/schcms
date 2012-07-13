<?php 
	
	echo Asset::js(array('fullcalendar.js')); 
	echo Asset::css(array('fullcalendar.css'));

?>

<script>
	$(document).ready(function() {
		//page is ready, start the calendar

		$('#calendar').fullCalendar({
			editable :false, 

			events : "events",
			firstDay: 1,
			timeFormat : "H:mm", 

			loading: function(bool) {
				if (bool) $('#loading').show();
				else $('#loading').hide();
			}
		})
	});
</script>

<div id="calendar"></div>
