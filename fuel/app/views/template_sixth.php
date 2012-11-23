 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?> | Heart of England School</title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		body { margin: 50px; }
	</style>
	<?php echo Asset::js(array(
		'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js',
		'bootstrap.js', 
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js'
	)); ?>

	<script>
		$(function(){ $('.topbar').dropdown(); });
	</script>
</head>
<body>
	<div class="container">
		<div class="topbar">
	    	<div class="fill">
	        	<div class="container">
	            	<h3><a href="/">Sixth Form</a></h3>
	            	<!-- echo out the main menu -->
	            		<?php echo $menu;?>

	        	</div>
	    	</div>
		</div>
		<div class="row">
			<div class="span16">
				
				<hr>
<?php if (Session::get_flash('success')): ?>
				<div class="alert-message success">
					<p>
					<?php echo implode('</p><p>', (array) Session::get_flash('success')); ?>
					</p>
				</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
				<div class="alert-message error">
					<p>
					<?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
					</p>
				</div>
<?php endif; ?>
			</div>
			<div class="span16">
<?php echo $content; ?>





			</div>
		</div>
		<footer>
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>
		</footer>
	</div>
</body>
</html>
