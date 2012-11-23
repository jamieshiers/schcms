<?php

namespace Fuel\Migrations;

class Add_time_to_calendars
{
	public function up()
	{
		\DBUtil::add_fields('calendars', array(
			'time' => array('constraint' => 255, 'type' => 'varchar'),

		));	
	}

	public function down()
	{
		\DBUtil::drop_fields('calendars', array(
			'time'
    
		));
	}
}