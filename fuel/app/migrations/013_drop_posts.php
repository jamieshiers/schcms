<?php

namespace Fuel\Migrations;

class Drop_posts
{
	public function up()
	{
		\DBUtil::drop_table('posts');	
	}

	public function down()
	{
		\DBUtil::create_table('postss', array(
		));
	}
}