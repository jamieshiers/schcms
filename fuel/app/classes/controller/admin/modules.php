<?php
class Controller_Admin_Modules extends Controller_Admin 
{

	public function action_index()
	{
		$data['modules'] = Model_Module::find('all');
		$this->template->title = "Modules";
		$this->template->content = View::forge('admin/modules/index', $data);

	}

	public function action_view($id = null)
	{
		$data['module'] = Model_Module::find($id);

		$this->template->title = "Module";
		$this->template->content = View::forge('admin/modules/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Module::validate('create');

			if ($val->run())
			{
				$module = Model_Module::forge(array(
					'module_name' => Input::post('module_name'),
					'page_id' => Input::post('page_id'),
				));

				if ($module and $module->save())
				{
					Session::set_flash('success', e('Added module #'.$module->id.'.'));

					Response::redirect('admin/modules');
				}

				else
				{
					Session::set_flash('error', e('Could not save module.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Modules";
		$this->template->content = View::forge('admin/modules/create');

	}

	public function action_edit($id = null)
	{
		$module = Model_Module::find($id);
		$val = Model_Module::validate('edit');

		if ($val->run())
		{
			$module->module_name = Input::post('module_name');
			$module->page_id = Input::post('page_id');

			if ($module->save())
			{
				Session::set_flash('success', e('Updated module #' . $id));

				Response::redirect('admin/modules');
			}

			else
			{
				Session::set_flash('error', e('Could not update module #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$module->module_name = $val->validated('module_name');
				$module->page_id = $val->validated('page_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('module', $module, false);
		}

		$this->template->title = "Modules";
		$this->template->content = View::forge('admin/modules/edit');

	}

	public function action_delete($id = null)
	{
		if ($module = Model_Module::find($id))
		{
			$module->delete();

			Session::set_flash('success', e('Deleted module #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete module #'.$id));
		}

		Response::redirect('admin/modules');

	}


}