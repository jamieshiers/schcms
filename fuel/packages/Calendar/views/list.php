
<div class="calendar">
	<h2>Upcoming Events</h2>
	<div class="eventsList">
		<?php if ($calendar->status == "200") { 
			foreach ($calendar->body as $cal): ?>
				<span class="eventTitle"><?php echo $cal['title']; ?></span><br>
				<span class="eventDate"><?php echo $cal['start']; ?></span><br>
				<span class="cal"><?php echo $cal['cal_name']; ?></span><br>
			<?php endforeach; ?>
		<?php } else {
			echo "No Upcoming Events";
		} ?>

	</div>
</div>
