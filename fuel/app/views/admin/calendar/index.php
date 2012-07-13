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
	
	echo Asset::js(array('fullcalendar.js')); 
	echo Asset::css(array('fullcalendar.css'));

?>

<script>
	$(document).ready(function() {
		//page is ready, start the calendar

		$('#calendar').fullCalendar({
			editable :true, 
			events : "../events",
			firstDay: 1,
			timeFormat : "H:mm",
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) {
				$.ajax({
					type: "POST",
					url: "../api/calendar/edit/",
					data: {id: event.id, title: event.title, allday: event.allDay, start:event.start, end:event.end},
					success: function(response)
					{
						alert(response);
					}
				});
			}
		})
	});
</script>

<div id="calendar"></div>
