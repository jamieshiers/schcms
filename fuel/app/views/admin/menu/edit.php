<h2>Editing Menu</h2>
<br>

<?php echo render('admin/menu/_form'); ?>
<p>
	<?php echo Html::anchor('admin/menu/view/'.$menu->id, 'View'); ?> |
	<?php echo Html::anchor('admin/menu', 'Back'); ?></p>
