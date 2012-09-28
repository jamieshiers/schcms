<?php 

namespace Calendar;



class Calendar
{
	
	

	public static function build($events)
	{
		$data['events'] = $events;
		return \View::forge('build', $data);
	}
}