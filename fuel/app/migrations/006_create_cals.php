<?php

namespace Fuel\Migrations;

class Create_cals
{
	public function up()
	{
		\DBUtil::create_table('cals', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'color' => array('constraint' => 255, 'type' => 'varchar'),
			'text_color' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('cals');
	}
}