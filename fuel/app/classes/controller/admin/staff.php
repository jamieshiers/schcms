<?php
class Controller_Admin_Staff extends Controller_Admin 
{

	public function action_index()
	{
		$data['staffs'] = Model_Staff::find('all');
		$this->template->title = "Staffs";
		$this->template->content = View::forge('admin/staff/index', $data);

	}

	public function action_view($id = null)
	{
		$data['staff'] = Model_Staff::find($id);

		$this->template->title = "Staff";
		$this->template->content = View::forge('admin/staff/view', $data);

	}

	public function action_create($id = null)
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Staff::validate('create');
			
			if ($val->run())
			{
				$staff = Model_Staff::forge(array(
					'title' => Input::post('title'),
					'first_name' => Input::post('first_name'),
					'surname' => Input::post('surname'),
					'job_title' => Input::post('job_title'),
					'img' => Input::post('img'),
				));

				if ($staff and $staff->save())
				{
					Session::set_flash('success', 'Added staff #'.$staff->id.'.');

					Response::redirect('admin/staff');
				}

				else
				{
					Session::set_flash('error', 'Could not save staff.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Staffs";
		$this->template->content = View::forge('admin/staff/create');

	}

	public function action_edit($id = null)
	{
		$staff = Model_Staff::find($id);
		$val = Model_Staff::validate('edit');

		if ($val->run())
		{
			$staff->title = Input::post('title');
			$staff->first_name = Input::post('first_name');
			$staff->surname = Input::post('surname');
			$staff->job_title = Input::post('job_title');
			$staff->img = Input::post('img');

			if ($staff->save())
			{
				Session::set_flash('success', 'Updated staff #' . $id);

				Response::redirect('admin/staff');
			}

			else
			{
				Session::set_flash('error', 'Could not update staff #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$staff->title = $val->validated('title');
				$staff->first_name = $val->validated('first_name');
				$staff->surname = $val->validated('surname');
				$staff->job_title = $val->validated('job_title');
				$staff->img = $val->validated('img');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('staff', $staff, false);
		}

		$this->template->title = "Staffs";
		$this->template->content = View::forge('admin/staff/edit');

	}

	public function action_delete($id = null)
	{
		if ($staff = Model_Staff::find($id))
		{
			$staff->delete();

			Session::set_flash('success', 'Deleted staff #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete staff #'.$id);
		}

		Response::redirect('admin/staff');

	}


}