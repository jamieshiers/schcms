<h2>Viewing #<?php echo $setting->id; ?></h2>

<p>
	<strong>Setting name:</strong>
	<?php echo $setting->setting_name; ?></p>
<p>
	<strong>Setting value:</strong>
	<?php echo $setting->setting_value; ?></p>

<?php echo Html::anchor('admin/settings/edit/'.$setting->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/settings', 'Back'); ?>