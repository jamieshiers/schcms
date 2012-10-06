<?php

class Controller_Base extends Controller_Template {

	public function before()
	{

		$segments = count(Uri::segments());

		$temp = Uri::segment('1');

		if($segments == '2')
		{
			

			$file = APPPATH."views/template_".$temp.".php";

			if(file_exists($file))
			{
				$this->template = 'template_'.$temp;
			}
			else
			{
				$this->template = 'template';
			}

			if(Uri::segment('1') === 'admin')
			{
				$this->template = 'admin/template';
			}

			
		}

		parent::before();
		
		// Assign current_user to the instance so controllers can use it
		$this->current_user = Auth::check() ? Model_User::find_by_username(Auth::get_screen_name()) : null;
		
		// Set a global variable so views can use it
		View::set_global('current_user', $this->current_user);
		
		// load menus on each page of the front end of the website
		Package::load('Menu');

		$menus = MenuBuilder::get_menu_html();
		View::set_global('menu', $menus, false);
	}

}