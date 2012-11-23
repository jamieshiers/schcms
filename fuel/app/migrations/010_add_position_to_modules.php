<?php

namespace Fuel\Migrations;

class Add_position_to_modules
{
	public function up()
	{
		\DBUtil::add_fields('modules', array(
			'position' => array('constraint' => 255, 'type' => 'varchar'),

		));	
	}

	public function down()
	{
		\DBUtil::drop_fields('modules', array(
			'position'
    
		));
	}
}