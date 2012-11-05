
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, inital-scale=1.0">
	<title><?php echo $title; ?> | <?php echo Config::get('settings.school_name')?></title>
	<?php echo Asset::css('main.css'); ?>
	<?php echo Asset::js(array(
		'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js',
		'bootstrap.js', 
		'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js'
	)); ?>
</head>
<body>
	<div class="wrap">
		<header>
			<a title="Open Navigation" class="menu-link"><i class="icon-large icon-reorder"></i></a>
			<div class="logo"><a href="/"></a></div>
			<nav role="navigation">
				<?php echo $menu; ?>
			</nav>
		</header>
		<?php echo $content;?>

		<footer>
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>
		</footer>

	</div>


		

	<script>
  $(document).ready(function(){
   $('body').addClass('js');
   $('.menu-link').click(function(){
    $('.menu-link').toggleClass('active');
    $('.wrap').toggleClass('active');
    });
   });
</script>
</body>
</html>
