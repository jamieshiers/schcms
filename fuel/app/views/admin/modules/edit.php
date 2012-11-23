<h2>Editing Module</h2>
<br>

<?php echo render('admin/modules/_form'); ?>
<p>
	<?php echo Html::anchor('admin/modules/view/'.$module->id, 'View'); ?> |
	<?php echo Html::anchor('admin/modules', 'Back'); ?></p>
