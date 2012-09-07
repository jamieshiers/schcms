<?php 
	
	echo Asset::js(array('fullcalendar.js', 'jQuery.popover/jquery.popover-1.1.0.js')); 
	echo Asset::css(array('fullcalendar.css', 'popover.css'));

?>



<script>
	

    $.fn.clearForm = function() {
      return this.each(function() {
        var type = this.type, tag = this.tagName.toLowerCase();
        if (tag == 'form')
          return $(':input',this).clearForm();
        if (type == 'text' || type == 'password' || tag == 'textarea')
          this.value = '';
        else if (type == 'checkbox' || type == 'radio')
          this.checked = false;
        else if (tag == 'select')
          this.selectedIndex = -1;
      });
    };


	$(document).ready(function(){
		$('#ex1').popover({
			trigger: 'click',
		});
	});

	$(document).ready(function() {
	//page is ready, start the calendar
	
		$('#calendar').fullCalendar({
			editable :true,
			events : "../api/calendar/events/",
			firstDay: 1,
			timeFormat : "H:mm",
			selectable : true,
			selectHelper : true,
			unselectAuto: true,
				eventResize: function(event,dayDelta,minuteDelta,revertFunc) {
					
					$.ajax({
						type: "POST",
						url: "../api/calendar/edit/",
						data: {id: event.id, title: event.title, allday: event.allDay, start:event.start, end:event.end, calendar:event.cal, time:event.time,  key:"c6a6da323866fa01d0d4d6f3c1d88c79"},
						success: function(response)
						{
						}
					});
				},
				eventDrop: function(event,dayDelta,minuteDelta,allDay,revertFunc) {
					
					$.ajax({
						type: "POST",
						url: "../api/calendar/edit/",
						data: {id: event.id, title: event.title, allday: event.allDay, start:event.start, end:event.end, calendar:event.cal, time:event.time, key:"6a6da323866fa01d0d4d6f3c1d88c79"},
						success: function(response)
						{
						},	
						error: function(jqXHR)
						{
							alert(jqXHR.responseTest);
						}
					});
				},

				eventClick: function(calEvent, jsEvent) {
					
        			var left = parseFloat(jsEvent.currentTarget.style.left) - 65 + "px";
					var top = parseFloat(jsEvent.currentTarget.style.top) + 100 + "px";
					$(".delete").remove();
					
					$(".calendar_popup").css({"left" : left, "top" : top});
					$(".calendar_popup").append('<a href="" onclick="return false" class="delete">Delete</a>');
					
					$(".title").val(calEvent.title);
					$(".time").val(calEvent.time);
					$(".calendar").val(calEvent.cal);

					$(".calendar_popup").show();

					$(".submitForm").click(function(){
						title = $(".title").val();
						time = $(".time").val();
						calendar = $(".calendar").val();


					if(time)
					{
						var allday = false;
					}
					else
					{
						var allday = calEvent.allDay; 
					}

					if(title){
						
						$.ajax({
						type: 'POST',
						url: '../api/calendar/edit/',
						data: {id:calEvent.id, title:title, allday:allday, start:calEvent.start, end:calEvent.end, time:time, calendar:calendar, key:"c6a6da323866fa01d0d4d6f3c1d88c79"}, 
						success: function(response)
						{	
							$('#calendar').fullCalendar('refetchEvents');
							$("#calendar").fullCalendar('unselect');
							
							$(".calendar_popup").hide();
							$("form").clearForm();
							
						}
					});
					$("#calendar").fullCalendar('unselect');
					$(".submitForm").unbind();
					$(".title").val('');
				} 

				});



					$(".exit").click(function(){
						$(".exit").unbind();
						$(".submitForm").unbind();
						$(".title").val('');
						$("#calendar").fullCalendar('unselect');
						$("form").clearForm();
						$(".calendar_popup").hide();
					});

					$(".delete").click(function(){
						$('.title').val('');
						$.ajax({
							type: "POST",
							url: "../api/calendar/delete",
							data:{id:calEvent.id, key:"c6a6da323866fa01d0d4d6f3c1d88c79"},
							success: function(response)
							{	
								$('#calendar').fullCalendar('refetchEvents');
								$("#calendar").fullCalendar('unselect');
								$('.delete').remove();
								$(".calendar_popup").hide();
								$("form").clearForm();
								
							}
						});
						$(".delete").remove();
						$(".title").val('');
					});


				


    			},

				select: function(startDate, endDate, allDay, jsEvent){
				
					var left = parseFloat(jsEvent.target.style.left) - 65 + "px";
					var top = parseFloat(jsEvent.target.style.top) + 180 + "px";
					$(".delete").remove();
					
					$(".calendar_popup").css({"left" : left, "top" : top});
					$(".calendar_popup").show();
					

					$(".submitForm").click(function(){
						title = $(".title").val();
						time = $(".time").val();
						calendar = $(".calendar").val();

					if(time)
					{
						var allday = false;
					}
					else
					{
						var allday = allDay; 
					}

					if(title){
						
						$.ajax({
						type: 'POST',
						url: '../api/calendar/create/',
						data: {title:title, allday:allday, start:startDate, end:endDate, time:time, calendar:calendar, key:"c6a6da323866fa01d0d4d6f3c1d88c79"}, 
						success: function(response)
						{	
							$('#calendar').fullCalendar('refetchEvents');
							$("#calendar").fullCalendar('unselect');
							
							$(".calendar_popup").hide();
							$("form").clearForm();
							
						}
					});
					$("#calendar").fullCalendar('unselect');
					$(".submitForm").unbind();
					$(".title").val('');
				} 

				});

				$(".exit").click(function(){
					$(".exit").unbind();
					$(".submitForm").unbind();
					$(".title").val('');
					$("#calendar").fullCalendar('unselect');
					$("form").clearForm();
					$(".calendar_popup").hide();
				});
				}

		});
		
	});
</script>

<div style="position:relative;">
	<div id="calendar"></div>
	<div class="calendar_popup" style="display:none; position:absolute;">
		<div class="calendar_triangle">&#9650;</div>
	<form>
  		<input class="title" type="text" size="26" placeholder="New Event" id="title"/>
  		<input class="time" type="text" size="26" placeholder="When"/>
  		<select class="calendar" >
  			<?php foreach ($cal as $c): ?>
  			<option value="<?php echo $c->id;?>"><?php echo $c->name; ?></option>
  			<?php endforeach; ?>
  		</select>
  	<?php Config::load('twitter', true);

  	if(Config::get('twitter.active_twitter') == 'set')
  	{?>
  	<input class="tweet_message" type="text" size="26" placeholder="Tweet Message" id="tweet_message"/>



  	<?php } ?>




  		<a href="" onclick="return false" class="submitForm">submit</a>&emsp;
  		<a href="" onclick="return false" class="exit">cancel</a>
  		
  	</form> 
	</div>
</div>

