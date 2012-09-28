
<div class="calendar">
	<h2>Upcoming Events</h2>
	<div class="eventsList">
		<?php foreach ($calendar->body['item'] as $cal): ?>
		<span class="eventTitle"><?php echo $cal['title']; ?></span><br>
		<span class="eventDate"><?php echo $cal['start']; ?></span><br>
		<?php endforeach; ?>

	</div>
</div>
