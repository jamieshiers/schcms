<?php

namespace Fuel\Migrations;

class Add_category_to_posts
{
	public function up()
	{
		\DBUtil::add_fields('posts', array(
			'category' => array('type' => 'text'),

		));	
	}

	public function down()
	{
		\DBUtil::drop_fields('posts', array(
			'category'
    
		));
	}
}