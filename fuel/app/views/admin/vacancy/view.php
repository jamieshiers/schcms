<h2>Viewing #<?php echo $vacancy->id; ?></h2>

<p>
	<strong>Job title:</strong>
	<?php echo $vacancy->job_title; ?></p>
<p>
	<strong>Location:</strong>
	<?php echo $vacancy->location; ?></p>
<p>
	<strong>Contract type:</strong>
	<?php echo $vacancy->contract_type; ?></p>
<p>
	<strong>Contract term:</strong>
	<?php echo $vacancy->contract_term; ?></p>
<p>
	<strong>Start date:</strong>
	<?php echo $vacancy->start_date; ?></p>
<p>
	<strong>End date:</strong>
	<?php echo $vacancy->end_date; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $vacancy->description; ?></p>

<?php echo Html::anchor('admin/vacancy/edit/'.$vacancy->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/vacancy', 'Back'); ?>