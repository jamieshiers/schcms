<h2>Viewing #<?php echo $alert->id; ?></h2>

<p>
	<strong>Alert name:</strong>
	<?php echo $alert->alert_name; ?></p>
<p>
	<strong>Alert desc:</strong>
	<?php echo $alert->alert_desc; ?></p>
<p>
	<strong>Alert type:</strong>
	<?php echo $alert->alert_type; ?></p>
<p>
	<strong>Alert expires:</strong>
	<?php echo $alert->alert_expires; ?></p>
<p>
	<strong>Active:</strong>
	<?php echo $alert->active; ?></p>

<?php echo Html::anchor('admin/alerts/edit/'.$alert->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/alerts', 'Back'); ?>