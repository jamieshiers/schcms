<h2>Viewing #<?php echo $menu->id; ?></h2>

<p>
	<strong>Parent id:</strong>
	<?php echo $menu->parent_id; ?></p>
<p>
	<strong>Page id:</strong>
	<?php echo $menu->page_id; ?></p>
<p>
	<strong>Name:</strong>
	<?php echo $menu->name; ?></p>
<p>
	<strong>Content type:</strong>
	<?php echo $menu->content_type; ?></p>
<p>
	<strong>Link:</strong>
	<?php echo $menu->link; ?></p>
<p>
	<strong>Position:</strong>
	<?php echo $menu->position; ?></p>
<p>
	<strong>Active:</strong>
	<?php echo $menu->active; ?></p>

<?php echo Html::anchor('admin/menu/edit/'.$menu->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/menu', 'Back'); ?>