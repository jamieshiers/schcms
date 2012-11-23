<?php

namespace Fuel\Migrations;

class Add_published_to_posts
{
	public function up()
	{
		\DBUtil::add_fields('posts', array(
			'published' => array('constraint' => 11, 'type' => 'int'),

		));	
	}

	public function down()
	{
		\DBUtil::drop_fields('posts', array(
			'published'
    
		));
	}
}