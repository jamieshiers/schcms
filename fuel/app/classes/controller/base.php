<?php

class Controller_Base extends Controller_Template {

	public function before()
	{
		parent::before();
		
		// Assign current_user to the instance so controllers can use it
		$this->current_user = Auth::check() ? Model_User::find_by_username(Auth::get_screen_name()) : null;
		
		// Set a global variable so views can use it
		View::set_global('current_user', $this->current_user);
		//get the menu items from the database
		$menu = DB::select()->from('menus')->order_by('parent_id', 'asc')->order_by('position', 'asc')->as_assoc()->execute();
		
		$menus = $menu->as_array();

		View::set_global('menu', $menus);
	}

}