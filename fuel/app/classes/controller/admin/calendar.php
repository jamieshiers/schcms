<?php
class Controller_Admin_Calendar extends Controller_Admin 
{

	public function action_index()
	{
		$data['calendars'] = Model_Calendar::find('all');
		$data['cal'] = Model_Cal::find('all');
		$this->template->title = "Calendars";
		$this->template->content = View::forge('admin/calendar/index', $data);

	}

	public function action_view($id = null)
	{
		$data['calendar'] = Model_Calendar::find($id);

		$this->template->title = "Calendar";
		$this->template->content = View::forge('admin/calendar/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Calendar::validate('create');
			
			if ($val->run())
			{
				$calendar = Model_Calendar::forge(array(
					'title' => Input::post('title'),
					'allday' => Input::post('allday'),
					'start' => Input::post('start'),
					'end' => Input::post('end'),
					'editable' => Input::post('editable'),
					'url' => Input::post('url'),
				));

				if ($calendar and $calendar->save())
				{
					Session::set_flash('success', 'Added calendar #'.$calendar->id.'.');

					Response::redirect('admin/calendar');
				}

				else
				{
					Session::set_flash('error', 'Could not save calendar.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Calendars";
		$this->template->content = View::forge('admin/calendar/create');

	}

	public function action_edit($id = null)
	{
		$calendar = Model_Calendar::find($id);
		$val = Model_Calendar::validate('edit');

		if ($val->run())
		{
			$calendar->title = Input::post('title');
			$calendar->allday = Input::post('allday');
			$calendar->start = Input::post('start');
			$calendar->end = Input::post('end');
			$calendar->editable = Input::post('editable');
			$calendar->url = Input::post('url');

			if ($calendar->save())
			{
				Session::set_flash('success', 'Updated calendar #' . $id);
			}

			else
			{
				Session::set_flash('error', 'Could not update calendar #' . $id);
			}
		}


	}

	public function action_delete($id = null)
	{
		if ($calendar = Model_Calendar::find($id))
		{
			$calendar->delete();

			Session::set_flash('success', 'Deleted calendar #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete calendar #'.$id);
		}

		Response::redirect('admin/calendar');

	}

	


}