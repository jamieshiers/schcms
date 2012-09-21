<?php print_r($alerts);?>
<?php if($alerts)
{
	foreach ($alerts as $alert): ?>
	<div class="<?php echo $alert->alert_type;?>">
		<span><?php echo $alert->alert_desc;?></span>
	</div>
<?php endforeach; } ?>
<h1><?php echo $content->title;?></h1>
<?php echo $content->body; echo "<br />";?>





