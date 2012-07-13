<?php

namespace Fuel\Migrations;

class Create_scheduled_tweets
{
	public function up()
	{
		\DBUtil::create_table('scheduled_tweets', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'id' => array('constraint' => 11, 'type' => 'int'),
			'event_id' => array('constraint' => 11, 'type' => 'int'),
			'send_date' => array('type' => 'datetime'),
			'message' => array('constraint' => 255, 'type' => 'varchar'),
			'sent' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('scheduled_tweets');
	}
}