<?php

namespace Fuel\Migrations;

class Add_order_to_modules
{
	public function up()
	{
		\DBUtil::add_fields('modules', array(
			'order' => array('constraint' => 11, 'type' => 'int'),

		));	
	}

	public function down()
	{
		\DBUtil::drop_fields('modules', array(
			'order'
    
		));
	}
}