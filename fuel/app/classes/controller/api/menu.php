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
		$valid_secure = "1c138fd52ddd771388a5b4c410a9603a";
		$half_secure = "71388a5b4c410a9603a";
		$secure = $_SERVER['HTTP_SECURE'];
		$full_secure = $secure.$half_secure;

		if($key !== $valid_key && $full_secure !== $valid_secure)
		{
			$this->response('Unauthorised', '401');
		}
			
		
			$menu = Model_Menu::forge(array(
				'parent_id' => 0,
				'page_id' => null,
				'name' => Input::post('name'),
				'content_type' => null,
				'link' => Input::post('url'),
				'position' => 0,
				'active' => Input::post('active'),
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
	public function post_delete()
	{

		$valid_key = "c6a6da323866fa01d0d4d6f3c1d88c79";
		$key = $_SERVER['HTTP_KEY'];
		$valid_secure = "1c138fd52ddd771388a5b4c410a9603a";
		$half_secure = "71388a5b4c410a9603a";
		$secure = $_SERVER['HTTP_SECURE'];
		$full_secure = $secure.$half_secure;

		if($key !== $valid_key && $full_secure !== $valid_secure)
		{
			$this->response('Unauthorised', '401');
		}
//$this->response(Input::post('id'));
	$id = Input::Post('id');
	$menu = Model_Menu::find($id);
	$menu->delete();
	$this->response("Success"); 
		
		
	}
	public function post_edit()
	{
		$valid_key = "c6a6da323866fa01d0d4d6f3c1d88c79";
		$key = $_SERVER['HTTP_KEY'];
		$valid_secure = "1c138fd52ddd771388a5b4c410a9603a";
		$half_secure = "71388a5b4c410a9603a";
		$secure = $_SERVER['HTTP_SECURE'];
		$full_secure = $secure.$half_secure;

		if($key !== $valid_key && $full_secure !== $valid_secure)
		{
			$this->response('Unauthorised', '401');
		}

		$menu = Model_Menu::find(Input::post('id'));
		$val = Model_Menu::validate('edit');

		$link = Input::post('url');

		if ($val->run())
		{
			$menu->name = Input::post('name');
			$menu->link = $link;
			$menu->active = Input::post('active');

			if ($menu->save())
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
