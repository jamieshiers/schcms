
<!-- Echo out any alerts there might be -->
<?php echo $alert ;?>

<!-- Produce the main Page contents -->

<h1><?php echo $content->title;?></h1>
<?php echo $content->body; echo "<br />";?>

<div class="left">
	<?php echo($module['left']); ?>
</div>
<div class="right">
	<?php echo($module['right']); ?>
</div>


