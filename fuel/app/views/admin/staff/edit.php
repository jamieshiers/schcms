<h2>Editing Staff</h2>
<br>

<?php echo render('admin/staff/_form'); ?>
<p>
	<?php echo Html::anchor('admin/staff/view/'.$staff->id, 'View'); ?> |
	<?php echo Html::anchor('admin/staff', 'Back'); ?></p>
