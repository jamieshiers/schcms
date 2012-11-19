<?php if($twitter)
{
	foreach($twitter as $t):
		echo "@".$t->screen_name;
		echo $t->name;
		echo $t->description;?>
		<img src="<?php echo $t->avatar;?>" />
		<?php
		echo Html::anchor('admin/twitter/logout', 'Delete', array('class' => 'btn error'));

 endforeach;
}
else
{
	echo Html::anchor('admin/twitter/login', 'Add Twitter Account', array('class' => 'btn success'));
	echo Html::anchor('admin/twitter/logout', 'logout', array('class' => 'btn')); 
}


