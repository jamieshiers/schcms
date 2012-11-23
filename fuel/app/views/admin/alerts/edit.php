<h2>Editing Alert</h2>
<br>

<?php echo render('admin/alerts/_form'); ?>
<p>
	<?php echo Html::anchor('admin/alerts/view/'.$alert->id, 'View'); ?> |
	<?php echo Html::anchor('admin/alerts', 'Back'); ?></p>
