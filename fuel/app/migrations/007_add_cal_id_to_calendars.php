<?php

namespace Fuel\Migrations;

class Add_cal_id_to_calendars
{
	public function up()
	{
		\DBUtil::add_fields('calendars', array(
			'cal_id' => array('constraint' => 11, 'type' => 'int'),

		));	
	}

	public function down()
	{
		\DBUtil::drop_fields('calendars', array(
			'cal_id'
    
		));
	}
}