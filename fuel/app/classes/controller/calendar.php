<?php

class Controller_Calendar extends Controller_Base
{
	public function action_index()
	{
		
		$this->template->title = "Calendar";
		$this->template->content = View::forge('calendar/index');
	}



}