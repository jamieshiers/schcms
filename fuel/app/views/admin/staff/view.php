<h2>Viewing #<?php echo $staff->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $staff->title; ?></p>
<p>
	<strong>First name:</strong>
	<?php echo $staff->first_name; ?></p>
<p>
	<strong>Surname:</strong>
	<?php echo $staff->surname; ?></p>
<p>
	<strong>Job title:</strong>
	<?php echo $staff->job_title; ?></p>
<p>
	<strong>Img:</strong>
	<?php echo $staff->img; ?></p>

<?php echo Html::anchor('admin/staff/edit/'.$staff->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/staff', 'Back'); ?>