<?php

/**
* 
* @package 		Digital School CMS 
* @author 		Digital School Dev Team / Jamie Shiers
* @copyright    Copyright Jamie Shiers 2011
* @since 		Version "BETA"
* 
*/

class Controller_Api_Calendar extends Controller_Rest
{
	public function post_edit()
	{
		
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
}
