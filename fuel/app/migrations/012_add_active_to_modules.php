<?php

namespace Fuel\Migrations;

class Add_active_to_modules
{
	public function up()
	{
		\DBUtil::add_fields('modules', array(
			'active' => array('constraint' => 11, 'type' => 'int'),

		));	
	}

	public function down()
	{
		\DBUtil::drop_fields('modules', array(
			'active'
    
		));
	}
}