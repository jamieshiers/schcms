<h2>Listing Staffs</h2>
<br>
<?php if ($staffs): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>First name</th>
			<th>Surname</th>
			<th>Job title</th>
			<th>Img</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($staffs as $staff): ?>		<tr>

			<td><?php echo $staff->title; ?></td>
			<td><?php echo $staff->first_name; ?></td>
			<td><?php echo $staff->surname; ?></td>
			<td><?php echo $staff->job_title; ?></td>
			<td><?php echo $staff->img; ?></td>
			<td>
				<?php echo Html::anchor('admin/staff/view/'.$staff->id, 'View'); ?> |
				<?php echo Html::anchor('admin/staff/edit/'.$staff->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/staff/delete/'.$staff->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Staffs.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/staff/create', 'Add new Staff', array('class' => 'btn success')); ?>

</p>
