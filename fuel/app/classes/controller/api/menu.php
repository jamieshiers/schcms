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

	public function post_updatePosition()
	{
		

		$i = 0;
		foreach(Input::post('list') as $k => $v)
		{
			$i++;
			$data['parent_id'] = intval($v);
			$data['position'] = intval($i);

			$menu = Model_Menu::find($k);
			
		
			$menu->parent_id = $data['parent_id'];
			$menu->position = $data['position'];
			if($menu->save())
			{
				$this->response('success');
			}
		

		}

	}

	public function post_create()
	{
		$valid_key = "c6a6da323866fa01d0d4d6f3c1d88c79";

		$key = $_SERVER['HTTP_KEY'];

		if($key !== $valid_key)
		{
			$this->response('Unauthorised', '401');
		}
		
		//$val = Model_Menu::validate('create');
			
		
			$menu = Model_Menu::forge(array(
				'parent_id' => 0,
				'page_id' => null,
				'name' => Input::post('name'),
				'content_type' => null,
				'link' => Input::post('url'),
				'position' => 0,
				'active' => 1,
			));

				if ($menu and $menu->save())
				{
					$this->response('success');
				}

				else
				{
					$this->response('failed');
				}
		
		


	}



}
