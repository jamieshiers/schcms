<?php

class Controller_Vacancy extends Controller_Base
{
	public function action_index()
	{
		$date = date('Y-m-d');
		$data['vacancies'] = Model_Vacancy::find('all', array(
			'where' => array(
				array('end_date', '>=', $date),
				),
			'order_by' => array('start_date' => 'asc'),
			));
		$this->template->title = "Vacancies";
		$this->template->content = View::forge('vacancy/index', $data);
	}

	public function action_view($id = null)
	{
		$data['vacancy'] = Model_Vacancy::find($id);
		$this->template->title = "Vacancy";
		$this->template->content = View::forge('vacancy/view', $data, false);

	}
}