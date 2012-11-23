<?php
class Controller_Admin_Menu extends Controller_Admin 
{

	public function action_index()
	{
		//$data['menus'] = Model_Menu::find('all');
		
		Package::load('Menu');

		$data['menus'] = MenuBuilder::get_sort_menu();
		$data['pages'] = DB::select('url', 'title', 'category')->from('posts')->execute();

		$this->template->title = "Menus";
		$this->template->content = View::forge('admin/menu/index', $data, false);

	}

	public function action_view($id = null)
	{
		$data['menu'] = Model_Menu::find($id);

		$this->template->title = "Menu";
		$this->template->content = View::forge('admin/menu/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Menu::validate('create');
			
			if ($val->run())
			{
				$menu = Model_Menu::forge(array(
					'parent_id' => Input::post('parent_id'),
					'page_id' => Input::post('page_id'),
					'name' => Input::post('name'),
					'content_type' => Input::post('content_type'),
					'link' => Input::post('link'),
					'position' => Input::post('position'),
					'active' => Input::post('active'),
				));

				if ($menu and $menu->save())
				{
					Session::set_flash('success', 'Added menu #'.$menu->id.'.');

					Response::redirect('admin/menu');
				}

				else
				{
					Session::set_flash('error', 'Could not save menu.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Menus";
		$this->template->content = View::forge('admin/menu/create');

	}

	public function action_edit($id = null)
	{
		$menu = Model_Menu::find($id);
		$val = Model_Menu::validate('edit');

		if ($val->run())
		{
			$menu->parent_id = Input::post('parent_id');
			$menu->page_id = Input::post('page_id');
			$menu->name = Input::post('name');
			$menu->content_type = Input::post('content_type');
			$menu->link = Input::post('link');
			$menu->position = Input::post('position');
			$menu->active = Input::post('active');

			if ($menu->save())
			{
				Session::set_flash('success', 'Updated menu #' . $id);

				Response::redirect('admin/menu');
			}

			else
			{
				Session::set_flash('error', 'Could not update menu #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$menu->parent_id = $val->validated('parent_id');
				$menu->page_id = $val->validated('page_id');
				$menu->name = $val->validated('name');
				$menu->content_type = $val->validated('content_type');
				$menu->link = $val->validated('link');
				$menu->position = $val->validated('position');
				$menu->active = $val->validated('active');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('menu', $menu, false);
		}

		$this->template->title = "Menus";
		$this->template->content = View::forge('admin/menu/edit');

	}

	public function action_delete($id = null)
	{
		if ($menu = Model_Menu::find($id))
		{
			$menu->delete();

			Session::set_flash('success', 'Deleted menu #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete menu #'.$id);
		}

		Response::redirect('admin/menu');

	}


}