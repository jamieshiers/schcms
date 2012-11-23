<h2>Editing Calendar</h2>
<br>

<?php echo render('admin/calendar/_form'); ?>
<p>
	<?php echo Html::anchor('admin/calendar/view/'.$calendar->id, 'View'); ?> |
	<?php echo Html::anchor('admin/calendar', 'Back'); ?></p>
