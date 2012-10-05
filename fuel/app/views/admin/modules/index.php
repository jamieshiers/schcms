<h2>Listing Modules</h2>
<br>
<?php if ($modules): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Module name</th>
			<th>Page id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($modules as $module): ?>		<tr>

			<td><?php echo $module->module_name; ?></td>
			<td><?php echo $module->page_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/modules/view/'.$module->id, 'View'); ?> |
				<?php echo Html::anchor('admin/modules/edit/'.$module->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/modules/delete/'.$module->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Modules.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/modules/create', 'Add new Module', array('class' => 'btn success')); ?>

</p>
