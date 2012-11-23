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
<?php
	$description = $vacancy->description;
	$des = str_replace('\\', "", $description);
	?>

	<p><?php echo $des; ?></p>



<div class="important_files">

<?php 
	
	$files = explode(',', $vacancy->files);
	echo "<p>";
	echo "<strong>Files:</strong>"; echo "<br />";
	foreach($files as $file)
	{
		echo Html::anchor('files/'.$file, $file); echo "<br />";
	}
	echo "</p>";
?>

</div>


