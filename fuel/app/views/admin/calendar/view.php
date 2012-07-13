<h2>Viewing #<?php echo $calendar->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $calendar->title; ?></p>
<p>
	<strong>Allday:</strong>
	<?php echo $calendar->allday; ?></p>
<p>
	<strong>Start:</strong>
	<?php echo $calendar->start; ?></p>
<p>
	<strong>End:</strong>
	<?php echo $calendar->end; ?></p>
<p>
	<strong>Editable:</strong>
	<?php echo $calendar->editable; ?></p>
<p>
	<strong>Url:</strong>
	<?php echo $calendar->url; ?></p>

<?php echo Html::anchor('admin/calendar/edit/'.$calendar->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/calendar', 'Back'); ?>