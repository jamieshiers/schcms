<h2>Listing Vacancies</h2>
<br>
<?php if ($vacancies): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Job title</th>
			<th>Location</th>
			<th>Contract type</th>
			<th>Contract term</th>
			<th>Start date</th>
			<th>End date</th>
			<th>Description</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($vacancies as $vacancy): ?>		<tr>

			<td><?php echo $vacancy->job_title; ?></td>
			<td><?php echo $vacancy->location; ?></td>
			<td><?php echo $vacancy->contract_type; ?></td>
			<td><?php echo $vacancy->contract_term; ?></td>
			<td><?php echo $vacancy->start_date; ?></td>
			<td><?php echo $vacancy->end_date; ?></td>
			<td><?php echo $vacancy->description; ?></td>
			<td>
				<?php echo Html::anchor('admin/vacancy/view/'.$vacancy->id, 'View'); ?> |
				<?php echo Html::anchor('admin/vacancy/edit/'.$vacancy->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/vacancy/delete/'.$vacancy->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Vacancies.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/vacancy/create', 'Add new Vacancy', array('class' => 'btn success')); ?>

</p>
