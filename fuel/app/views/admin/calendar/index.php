<!-- <h2>Listing Calendars</h2>
<br>
<?php if ($calendars): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Allday</th>
			<th>Start</th>
			<th>End</th>
			<th>Editable</th>
			<th>Url</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($calendars as $calendar): ?>		<tr>

			<td><?php echo $calendar->title; ?></td>
			<td><?php echo $calendar->allday; ?></td>
			<td><?php echo $calendar->start; ?></td>
			<td><?php echo $calendar->end; ?></td>
			<td><?php echo $calendar->editable; ?></td>
			<td><?php echo $calendar->url; ?></td>
			<td>
				<?php echo Html::anchor('admin/calendar/view/'.$calendar->id, 'View'); ?> |
				<?php echo Html::anchor('admin/calendar/edit/'.$calendar->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/calendar/delete/'.$calendar->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Calendars.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/calendar/create', 'Add new Calendar', array('class' => 'btn success')); ?>

</p>-->

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
					if(event.allDay)
						{
							disableResizing: true;
						}
					$.ajax({
						type: "POST",
						url: "../api/calendar/edit/",
						data: {id: event.id, title: event.title, allday: event.allDay, start:event.start, end:event.end, key:"c6a6da323866fa01d0d4d6f3c1d88c79"},
						success: function(response)
						{
						}
					});
				},
				eventDrop: function(event,dayDelta,minuteDelta,allDay,revertFunc) {
					$.ajax({
						type: "POST",
						url: "../api/calendar/edit/",
						data: {id: event.id, title: event.title, allday: event.allDay, start:event.start, end:event.end, key:"c6a6da323866fa01d0d4d6f3c1d88c79"},
						success: function(response)
						{
						}	
					});
				},

				eventClick: function(calEvent, jsEvent) {
					
        			var left = parseFloat(jsEvent.currentTarget.style.left) - 65 + "px";
					var top = parseFloat(jsEvent.currentTarget.style.top) + 80 + "px";
					
					
					$(".popup").css({"left" : left, "top" : top});
					$(".popup").append('<a href="" onclick="return false" class="delete">Delete</a>');
					$(".popup").show();

					$(".title").val(calEvent.title);
					$(".time").val(calEvent.time);

					$(".exit").click(function(){
						$(".exit").unbind();
						$(".submitForm").unbind();
						$(".title").val('');
						$("#calendar").fullCalendar('unselect');
						$("form").clearForm();
						$(".popup").hide();
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
								$(".popup").hide();
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
					
					$(".popup").css({"left" : left, "top" : top});
					$(".popup").show();
					

					$(".submitForm").click(function(){
						title = $(".title").val();
						time = $(".time").val();

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
						data: {title:title, allday:allday, start:startDate, end:endDate, time:time, key:"c6a6da323866fa01d0d4d6f3c1d88c79"}, 
						success: function(response)
						{	
							$('#calendar').fullCalendar('refetchEvents');
							$("#calendar").fullCalendar('unselect');
							
							$(".popup").hide();
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
					$(".popup").hide();
				});
				}

		});
		
	});
</script>
<div style="position:relative;">
	<div id="calendar"></div>
	<div class="popup" style="display:none; position:absolute;background-color:white;padding:20px;">
	<form>
  		<input class="title" type="text" size="26" placeholder="New Event"/>
  		<input class="time" type="text" size="26" placeholder="When"/>
  		<input class="calendar" type="text" size="26" placeholder="1"/> 
  		<a href="" onclick="return false" class="submitForm">submit</a>&emsp;
  		<a href="" onclick="return false" class="exit">cancel</a>
  		
  	</form> 
	</div>
</div>

