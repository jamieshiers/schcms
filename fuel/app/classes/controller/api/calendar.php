<?php

/**
* 
* @package 		Digital School CMS / Calendar API 
* @author 		Digital School Dev Team / Jamie Shiers
* @copyright    Copyright Digital School Limited 2012
* @since 		Version "BETA"
* 
*/

class Controller_Api_Calendar extends Controller_Rest
{

	public function post_edit()
	{
		$valid_key = "c6a6da323866fa01d0d4d6f3c1d88c79";

		if(Input::post('key') !== $valid_key)
		{
			$this->response('Unauthorised', "401");
			die();
		}

		$time = Input::post('time');

		if($time)
		{
			$start_date = date_create(Input::post('start'));
			$date_start = $start_date->format('Y-m-d');
			$start_time = date_create(Input::post('time'));
			$time_start = $start_time->format('H:i.s');
			$event_start = $date_start." ".$time_start;
		}
		else
		{
			$start_date = date_create(Input::post('start'));
			$event_start = $start_date->format('Y-m-d h:i.s');
		}
		
		

		$end_date = date_create(Input::post('end'));

		if($end_date)
		{
			$date_end = $end_date->format('Y-m-d h:i.s');
		}
		else
		{
			$date_end = $event_start;
		}
		

		$calendar = Model_Calendar::find(Input::post('id'));
		$val = Model_Calendar::validate('edit');

		if ($val->run())
		{
			$calendar->title = Input::post('title');
			$calendar->allday = Input::post('allday');
			$calendar->start = $event_start;
			$calendar->end = $date_end;
			$calendar->editable = Input::post('editable');
			$calendar->url = Input::post('url');
			$calendar->cal_id = Input::post('calendar');
			$calendar->time = $time_start;

			if ($calendar->save())
			{
				$this->response('saved');
			}

			else
			{
				$this->response('failed');
			}
		}
	}

//---------------------------------------------------------------------------

	public function post_delete()
	{
		$valid_key = "c6a6da323866fa01d0d4d6f3c1d88c79";

		if(Input::post('key') !== $valid_key)
		{
			$this->response('failed');
			die();
		}

		$id = Input::Post('id');

		$calendar = Model_Calendar::find($id);

		$calendar->delete();

		$this->response("Success"); 
	}

//---------------------------------------------------------------------------

	public function get_events()
	{
		$start_time = date("Y-m-d", $_GET['start']);

		$end_time = date("Y-m-d", $_GET['end']);



		$events = Model_Calendar::find('all', array(
				'where' => array(
					array('start','>=' ,$start_time), 
					array('end', '<=', $end_time),
					),
				'related' => array('cal'),

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
				'url'		=> $url, 
				'color'		=> "#".$event->cal['color'],
				'cal' 		=> $event->cal['id'],
				'time'		=> $event->time,
 				);

		endforeach;

		$this->response($calendar);


	}

//---------------------------------------------------------------------------

	public function post_create()
	{

		$valid_key = "c6a6da323866fa01d0d4d6f3c1d88c79";

		if(Input::post('key') !== $valid_key)
		{
			$this->response('failed');
			die();
		}

		$start_date = date_create(Input::post('start'));
		$date_start = $start_date->format('Y-m-d');
		
		$start_time = date_create(Input::post('time'));
		$time_start = $start_time->format('H:i.s');

		$time_date = $date_start." ".$time_start;

		$end_date = date_create(Input::post('end'));
		$date_end = $end_date->format('Y-m-d h:i.s');
	
		$val = Model_Calendar::validate('create');
			
			if ($val->run())
			{
				$calendar = Model_Calendar::forge(array(
					'title' 	=> Input::post('title'),
					'allday'	=> Input::post('allday'),
					'start' 	=> $time_date,
					'end' 		=> $date_end,
					'editable' 	=> true,
					'url' 		=> null,
					'cal_id' 	=> Input::post('calendar'),
					'time'		=> $time_start,
				));

				if ($calendar->save())
				{
					$this->response('saved');
				}
				else
				{
					$this->response('failed');
				}
			}

	}


	
}
