<?php
class Controller_Admin_Alerts extends Controller_Admin 
{

	public function before()
	{
		parent::before();

		if (!Auth::member(100))
		{
			Response::redirect('admin/login');
		}
	}	

	public function action_index()
	{
		$data['alerts'] = Model_Alert::find('all');
		$this->template->title = "Alerts";
		$this->template->content = View::forge('admin/alerts/index', $data);

	}

	public function action_view($id = null)
	{
		$data['alert'] = Model_Alert::find($id);

		$this->template->title = "Alert";
		$this->template->content = View::forge('admin/alerts/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Alert::validate('create');
			
			if ($val->run())
			{
				$alert = Model_Alert::forge(array(
					'alert_name' => Input::post('alert_name'),
					'alert_desc' => Input::post('alert_desc'),
					'alert_type' => Input::post('alert_type'),
					'alert_expires' => Input::post('alert_expires'),
					'active' => Input::post('active'),
				));

				if(Config::get('twitter.active_twitter') == 'set')
				{
					Twitter::get('account/verify_credentials');
					Twitter::post('statuses/update', array('status' => Input::post('alert_desc')));
				}

				

				if ($alert and $alert->save())
				{
					Session::set_flash('success', 'Added alert #'.$alert->id.'.');

					Response::redirect('admin/alerts');
				}

				else
				{
					Session::set_flash('error', 'Could not save alert.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Alerts";
		$this->template->content = View::forge('admin/alerts/create');

	}

	public function action_edit($id = null)
	{
		$alert = Model_Alert::find($id);
		$val = Model_Alert::validate('edit');

		if ($val->run())
		{
			$alert->alert_name = Input::post('alert_name');
			$alert->alert_desc = Input::post('alert_desc');
			$alert->alert_type = Input::post('alert_type');
			$alert->alert_expires = Input::post('alert_expires');
			$alert->active = Input::post('active');

			$token = Model_Twitter::find('first');
			$key = $token->oauth_token;
			Twitter::call(post, 'statuses/update', array('status' => Input::post('alert_desc')), $key);

			if ($alert->save())
			{
				Session::set_flash('success', 'Updated alert #' . $id);

				Response::redirect('admin/alerts');
			}

			else
			{
				Session::set_flash('error', 'Could not update alert #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$alert->alert_name = $val->validated('alert_name');
				$alert->alert_desc = $val->validated('alert_desc');
				$alert->alert_type = $val->validated('alert_type');
				$alert->alert_expires = $val->validated('alert_expires');
				$alert->active = $val->validated('active');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('alert', $alert, false);
		}

		$this->template->title = "Alerts";
		$this->template->content = View::forge('admin/alerts/edit');

	}

	public function action_delete($id = null)
	{
		if ($alert = Model_Alert::find($id))
		{
			$alert->delete();

			Session::set_flash('success', 'Deleted alert #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete alert #'.$id);
		}

		Response::redirect('admin/alerts');

	}


}