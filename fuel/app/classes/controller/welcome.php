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

		

		//$page = Model_Page::find_by_title($name);

		$data['content'] = Model_Post::find_by_url($name);

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
