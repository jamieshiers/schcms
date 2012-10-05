<?php

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 * 
 * @package  app
 * @extends  Controller
 */
class Controller_Welcome extends Controller_Base
{

	/**
	 * The basic welcome message
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		return Response::forge(View::forge('welcome/index'));
	}

	/**
	 * A typical "Hello, Bob!" type example.  This uses a ViewModel to
	 * show how to use them.
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_hello()
	{
		return Response::forge(ViewModel::forge('welcome/hello'));
	}

	/**
	 * The 404 action for the application.
	 * 
	 * @access  public
	 * @return  Response
	 */
	public function action_404()
	{
		return Response::forge(ViewModel::forge('welcome/404'), 404);
	}

	public function action_pages()
	{
		$url = Uri::segment('2');

		if($url)
		{
			$name = Uri::segment('2');
		}
		else
		{
			$name = Uri::segment('1');
		}
		if(!$name)
		{
			$name = 'home';
		}

		$date = date('Y-m-d');

		// Get any alerts that may need showing
		$data['alerts'] = Model_Alert::find('all', array(
				'where' => array(
					array('alert_expires', '>=', $date), 
					),
			));
		if($data['alerts'])
		{
			foreach($data['alerts'] as $alert)
				{
					$data['alert'] =  "<div class='".$alert->alert_type."'>";
					$data['alert'] .= "<span>".$alert->alert_desc."</span>";
					$data['alert'] .= "</div>";
				}
		}
		else
		{
			$data['alert'] = null;
		}
		

		// We know which page we need, retrive it from the database

		$data['content'] = Model_Post::find_by_url($name);

		//find out if the page has any modules that it needs loading into it
		//work out where they need to be placed on the page.
		
		$data['left'] = '';
		$data['right'] = '';

		$modules = Model_Module::find('all');
		
		foreach($modules as $module)
		{

			if($module['position'] == 'left')
			{
				Package::load($module['module_name']);
				$data['left'] .= $module['module_name']::build(2, 3);
			}
			if($module['position'] == 'right')
			{
				Package::load($module['module_name']);
				$data['right'] .= $module['module_name']::build(2, 3);
			}



			

		
		}
		
			
		

		//Package::load('Calendar');
		//$data['left'] = Calendar::build(2, 3);

		if(!$data['content'])
		{
			return Response::forge(ViewModel::forge('welcome/404'), 404);
		}

		if($data['content']->published == "0")
		{
			return Response::forge(ViewModel::forge('welcome/404'), 404);
		}


		$this->template->title = $data['content']->title; 
		$this->template->content = View::forge('welcome/pages', $data, FALSE);
	}

	
}
