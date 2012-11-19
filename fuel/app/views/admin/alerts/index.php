<h2>Listing Alerts</h2>
<br>
<?php if ($alerts): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Alert name</th>
			<th>Alert desc</th>
			<th>Alert type</th>
			<th>Alert expires</th>
			<th>Active</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($alerts as $alert): ?>		<tr>

			<td><?php echo $alert->alert_name; ?></td>
			<td><?php echo $alert->alert_desc; ?></td>
			<td><?php echo $alert->alert_type; ?></td>
			<td><?php echo $alert->alert_expires; ?></td>
			<td><?php echo $alert->active; ?></td>
			<td>
				<?php echo Html::anchor('admin/alerts/view/'.$alert->id, 'View'); ?> |
				<?php echo Html::anchor('admin/alerts/edit/'.$alert->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/alerts/delete/'.$alert->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Alerts.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/alerts/create', 'Add new Alert', array('class' => 'btn success')); ?>

</p>
