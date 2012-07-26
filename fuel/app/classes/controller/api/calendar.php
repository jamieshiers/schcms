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
			$this->response('failed');
			die();
		}
		
		$start_date = date_create(Input::post('start'));
		$date_start = $start_date->format('Y-m-d h:i.s');

		$end_date = date_create(Input::post('end'));
		$date_end = $end_date->format('Y-m-d h:i.s');
		

		$calendar = Model_Calendar::find(Input::post('id'));
		$val = Model_Calendar::validate('edit');

		if ($val->run())
		{
			$calendar->title = Input::post('title');
			$calendar->allday = Input::post('allday');
			$calendar->start = $date_start;
			$calendar->end = $date_end;
			$calendar->editable = Input::post('editable');
			$calendar->url = Input::post('url');

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
 				);

		endforeach;

		$this->response($calendar);

		//return(json_encode($calendar));

	}

//---------------------------------------------------------------------------

	public function post_create()
	{
		
	}


	
}
