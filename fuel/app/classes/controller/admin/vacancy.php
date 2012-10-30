<?php
class Controller_Admin_Vacancy extends Controller_Admin 
{

	public function before()
	{
		parent::before();

		if ( ! Auth::member(100))
		{
			Session::set_flash('error', 'Sorry, you dont have access to this area!');
			Response::redirect('admin');
		}
	}

	public function action_index()
	{

			$data['vacancies'] = Model_Vacancy::find('all');
			$this->template->title = "Vacancies";
			$this->template->content = View::forge('admin/vacancy/index', $data);
		
		

	}

	public function action_view($id = null)
	{
		$data['vacancy'] = Model_Vacancy::find($id);

		$this->template->title = "Vacancy";
		$this->template->content = View::forge('admin/vacancy/view', $data, false);

	}

	public function action_create($id = null)
	{
		if(Input::post('drag_drop') == 1)
		{
			$uploaded_files = Input::post('files');
			if($uploaded_files == "Array")
			{
				$uploaded_files = NULL;
			}
		}
		else
		{
			$config = array('ext_whitelist' => array('img', 'jpg', 'pdf'), 'path' =>DOCROOT.DS.'files');

			Upload::process($config);


			if(Upload::is_valid())
			{
				Upload::save(); 
			}

			$old_files = array();
				
			foreach(Upload::get_files() as $a_file)
			{
				$old_files[] = $a_file['name'];
			}

			$uploaded_files = implode(',', $old_files);	
		}
		
		if (Input::method() == 'POST')
		{
			$val = Model_Vacancy::validate('create');
			
			if ($val->run())
			{
				$vacancy = Model_Vacancy::forge(array(
					'job_title' => Input::post('job_title'),
					'location' => Input::post('location'),
					'contract_type' => Input::post('contract_type'),
					'contract_term' => Input::post('contract_term'),
					'start_date' => Input::post('start_date'),
					'end_date' => Input::post('end_date'),
					'description' => Input::post('description'),
					'files' => $uploaded_files,
					'salary' => Input::post('salary'),
				));

				if ($vacancy and $vacancy->save())
				{
					Session::set_flash('success', 'Added vacancy #'.$vacancy->id.'.');

					Response::redirect('admin/vacancy');
				}

				else
				{
					Session::set_flash('error', 'Could not save vacancy.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Vacancies";
		$this->template->content = View::forge('admin/vacancy/create');

	}

	public function action_edit($id = null)
	{
		$vacancy = Model_Vacancy::find($id);
		$val = Model_Vacancy::validate('edit');

		$des = str_replace('\\', "", $vacancy->description);
		$vacancy->description = $des;

		if(Input::post('drag_drop') == 1)
		{
			$uploaded_files = Input::post('files');

			if($uploaded_files == "Array")
			{
				$uploaded_files = Input::post('databasefiles');
			}
			else
			{
				$uploaded_files = $uploaded_files .",". Input::post('databasefiles');
			}
				
				
		}
		else
		{

			$config = array('ext_whitelist' => array('img', 'jpg', 'pdf'), 'path' =>DOCROOT.DS.'files');

			Upload::process($config);


			if(Upload::is_valid())
			{
				Upload::save(); 
			}

			$old_files = array();
				
			foreach(Upload::get_files() as $a_file)
			{
				$old_files[] = $a_file['name'];
			}

			$uploaded_files = implode(',', $old_files);
			$uploaded_files = $uploaded_files .",". Input::post('databasefiles');
		}
		
		
		
		


		if ($val->run())
		{
			$vacancy->job_title = Input::post('job_title');
			$vacancy->location = Input::post('location');
			$vacancy->contract_type = Input::post('contract_type');
			$vacancy->contract_term = Input::post('contract_term');
			$vacancy->start_date = Input::post('start_date');
			$vacancy->end_date = Input::post('end_date');
			$vacancy->description = Input::post('description');
			$vacancy->files = $uploaded_files;

			if ($vacancy->save())
			{
				Session::set_flash('success', 'Updated vacancy #' . $id);

				Response::redirect('admin/vacancy');
			}

			else
			{
				Session::set_flash('error', 'Could not update vacancy #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$vacancy->job_title = $val->validated('job_title');
				$vacancy->location = $val->validated('location');
				$vacancy->contract_type = $val->validated('contract_type');
				$vacancy->contract_term = $val->validated('contract_term');
				$vacancy->start_date = $val->validated('start_date');
				$vacancy->end_date = $val->validated('end_date');
				$vacancy->description = $val->validated('description');
				$vacancy->files = $val->validated('files');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('vacancy', $vacancy);
		}

		$this->template->title = "Vacancies";
		$this->template->content = View::forge('admin/vacancy/edit', false);

	}

	public function action_delete($id = null)
	{
		if ($vacancy = Model_Vacancy::find($id))
		{
			$vacancy->delete();

			Session::set_flash('success', 'Deleted vacancy #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete vacancy #'.$id);
		}

		Response::redirect('admin/vacancy');

	}


}