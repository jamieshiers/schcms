<?php
class Controller_Admin_Settings extends Controller_Admin 
{

	public function action_index()
	{
		$data['settings'] = Model_Setting::find('all');
		$this->template->title = "Settings";
		$this->template->content = View::forge('admin/settings/index', $data);

	}

	public function action_view($id = null)
	{
		$data['setting'] = Model_Setting::find($id);

		$this->template->title = "Setting";
		$this->template->content = View::forge('admin/settings/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Setting::validate('create');
			
			if ($val->run())
			{
				$setting = Model_Setting::forge(array(
					'setting_name' => Input::post('setting_name'),
					'setting_value' => Input::post('setting_value'),
				));

				if ($setting and $setting->save())
				{
					Session::set_flash('success', 'Added setting #'.$setting->id.'.');

					Response::redirect('admin/settings');
				}

				else
				{
					Session::set_flash('error', 'Could not save setting.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Settings";
		$this->template->content = View::forge('admin/settings/create');

	}

	public function action_edit($id = null)
	{
		$setting = Model_Setting::find($id);
		$val = Model_Setting::validate('edit');

		if ($val->run())
		{
			$setting->setting_name = Input::post('setting_name');
			$setting->setting_value = Input::post('setting_value');

			if ($setting->save())
			{
				Session::set_flash('success', 'Updated setting #' . $id);

				Response::redirect('admin/settings');
			}

			else
			{
				Session::set_flash('error', 'Could not update setting #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$setting->setting_name = $val->validated('setting_name');
				$setting->setting_value = $val->validated('setting_value');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('setting', $setting, false);
		}

		$this->template->title = "Settings";
		$this->template->content = View::forge('admin/settings/edit');

	}

	public function action_delete($id = null)
	{
		if ($setting = Model_Setting::find($id))
		{
			$setting->delete();

			Session::set_flash('success', 'Deleted setting #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete setting #'.$id);
		}

		Response::redirect('admin/settings');

	}

	public function action_accounts()
	{

		new Model_Twitter();

		$data['twitter'] = Model_Twitter::find('all');

		
		$this->template->title = "Connected Accounts";
		$this->template->content = view::forge('admin/settings/accounts', $data);

	}


}





