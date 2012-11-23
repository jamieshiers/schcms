<?php

namespace Fuel\Migrations;

class Create_modules
{
	public function up()
	{
		\DBUtil::create_table('modules', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'module_name' => array('constraint' => 255, 'type' => 'varchar'),
			'page_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('modules');
	}
}