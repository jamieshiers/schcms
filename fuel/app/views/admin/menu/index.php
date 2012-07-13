<h2>Listing Menus</h2>
<br>
<?php if ($menus): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Parent id</th>
			<th>Page id</th>
			<th>Name</th>
			<th>Content type</th>
			<th>Link</th>
			<th>Position</th>
			<th>Active</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($menus as $menu): ?>		<tr>

			<td><?php echo $menu->parent_id; ?></td>
			<td><?php echo $menu->page_id; ?></td>
			<td><?php echo $menu->name; ?></td>
			<td><?php echo $menu->content_type; ?></td>
			<td><?php echo $menu->link; ?></td>
			<td><?php echo $menu->position; ?></td>
			<td><?php echo $menu->active; ?></td>
			<td>
				<?php echo Html::anchor('admin/menu/view/'.$menu->id, 'View'); ?> |
				<?php echo Html::anchor('admin/menu/edit/'.$menu->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/menu/delete/'.$menu->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Menus.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/menu/create', 'Add new Menu', array('class' => 'btn success')); ?>

</p>
