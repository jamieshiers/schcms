<?php

namespace Fuel\Migrations;

class Drop_pages
{
	public function up()
	{
		\DBUtil::drop_table('pages');
	}

	public function down()
	{
		\DBUtil::create_table('pages');
	}
}