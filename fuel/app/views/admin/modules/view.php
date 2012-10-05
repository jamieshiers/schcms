<h2>Viewing #<?php echo $module->id; ?></h2>

<p>
	<strong>Module name:</strong>
	<?php echo $module->module_name; ?></p>
<p>
	<strong>Page id:</strong>
	<?php echo $module->page_id; ?></p>

<?php echo Html::anchor('admin/modules/edit/'.$module->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/modules', 'Back'); ?>