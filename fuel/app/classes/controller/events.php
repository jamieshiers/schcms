<?php

class Controller_events extends Controller
{

	public function action_index()
	{
		$start_time = date("Y-m-d", $_GET['start']);

		$end_time = date("Y-m-d", $_GET['end']);

	

		$events = Model_Calendar::find('all', array(
				'where' => array(
					array('start','>=' ,$start_time), 
					array('end', '<=', $end_time),
					),

			));

		$calendar = array();

		foreach($events as $event):

			if($event->allday === 'false')
			{
				$false = false;
			}
			else
			{
				$false = true;
			}

			if($event->url === 'false')
			{
				$url = false;
			}
			else
			{
				$url = $event->url;
			}

			$calendar[] = array(
				'id' 		=> $event->id, 
				'title'		=> $event->title,
				'start' 	=> $event->start, 
				'end' 		=> $event->end,
				'allDay'	=> $false,
				'url'		=> $url
 				);

		endforeach;

		return(json_encode($calendar));

		
	}

	public function action_upload()
	{
		$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : FALSE);

		if($fn)
		{
	// AJAX call
	file_put_contents(
		'files/' . $fn,
		file_get_contents('php://input')
	);
	echo "$fn uploaded";
	exit();

		}
	}
}