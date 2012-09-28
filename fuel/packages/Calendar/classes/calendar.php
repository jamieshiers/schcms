<?php 

namespace Calendar;

class Calendar
{
	
	

	public static function build($events)
	{
		$curl = \Request::forge(\config::get('base_url').'api/calendar/list', array(
			'driver' => 'curl',

		))->execute()->response();
		$data['calendar'] = $curl;

		return \View::forge('list', $data);
	}
}