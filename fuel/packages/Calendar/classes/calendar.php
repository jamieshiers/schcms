<?php 

namespace Calendar;

class Calendar
{

	public static function build($events, $cal)
	{
		$data['calendar'] = \Request::forge(\config::get('base_url').'api/calendar/list.json?events='.$events.'&cal='.$cal, array(
			'driver' => 'curl',
		))->execute()->response();
		return \View::forge('list', $data);
	}

	public static function right()
	{
		return "Right";
	}
}