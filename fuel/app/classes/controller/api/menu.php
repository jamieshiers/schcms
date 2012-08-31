<?php

/**
* 
* @package 		Digital School CMS / Calendar API 
* @author 		Digital School Dev Team / Jamie Shiers
* @copyright    Copyright Digital School Limited 2012
* @since 		Version "BETA"
* 
*/

class Controller_Api_Menu extends Controller_Rest
{


	public function test()
	{
		$this->response('oh yeah');
	}

	public function post_updatePosition()
	{
		

		$i = 0;
		foreach(Input::post('list') as $k => $v)
		{
			$i++;
			$data['parent_id'] = intval($v);
			$data['position'] = intval($i);

			$menu = Model_Menu::find(Input::post('list["id"]'));
			$val = Model_Menu::validate('edit');

		
			$menu->parent_id = Input::post($data['parent_id']);
			$menu->position = Input::post($data['position']);
			$menu->save();
		

		}

	}



}
