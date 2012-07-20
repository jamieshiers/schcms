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
	$(document).ready(function(){
		$('#ex1').popover({
				trigger: 'click',
				title:"hello", 
				content: "heya - -- - ",
				verticalOffset: 0,
				horizontalOffset: 0,
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
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) {
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
    	});
	});
</script>

<div id="calendar"></div>
<div class="popup" style="display:none; position:absolute; top:25%; left:25%; background-color:white;padding:20px;">
  <input class"title" type="text" size="26" />
  <a href="#" onclick="return false" class="submitForm">submit</a>&emsp;
  <a href="#" onclick="return false" class="exit">cancel</a>
</div>

