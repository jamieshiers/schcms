<?php
class Controller_Admin_Posts extends Controller_Admin 
{
	public function before()
	{
		parent::before();

		if (!Auth::member(100))
		{
		}
	}	


	public function action_index()
	{
		
		$data['posts'] = Model_Post::find('all');
		$this->template->title = "Posts";
		$this->template->content = View::forge('admin/posts/index', $data);

	}

	public function action_view($id = null)
	{
		$data['post'] = Model_Post::find($id);

		$this->template->title = "Post";
		$this->template->content = View::forge('admin/posts/view', $data);

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
			$val = Model_Post::validate('create');
			
			if ($val->run())
			{
				$url = str_replace(' ', '_', Input::post('title'));

				$post = Model_Post::forge(array(
					'title' => Input::post('title'),
					'body' => Input::post('body'),
					'user_id' => Input::post('user_id'),
					'url' => $url, 
					'published' => Input::post('published'),
					'approved' => Input::post('approve'),
				));

				if ($post and $post->save())
				{
					Session::set_flash('success', 'Added post #'.$post->id.'.');

					Response::redirect('admin/posts');
				}

				else
				{
					Session::set_flash('error', 'Could not save post.');
				}
			}
			else
			{
				Session::set_flash('error', $val->show_errors());
			}
		}

		$this->template->title = "Posts";
		$this->template->content = View::forge('admin/posts/create');

	}

	public function action_edit($id = null)
	{
		$post = Model_Post::find($id);
		$val = Model_Post::validate('edit');

		if ($val->run())
		{
			$post->title = Input::post('title');

			$post->body = Input::post('body');
			$post->user_id = Input::post('user_id');
			$post->page = Input::post('page');

			if ($post->save())
			{
				Session::set_flash('success', 'Updated post #' . $id);

				Response::redirect('admin/posts');
			}

			else
			{
				Session::set_flash('error', 'Could not update post #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$post->title = $val->validated('title');


				$post->body = $val->validated('body');
				$post->user_id = $val->validated('user_id');
				$post->page = $val->validated('page');

				Session::set_flash('error', $val->show_errors());
			}
			
			$this->template->set_global('post', $post, false);
		}

		$this->template->title = "Posts";
		$this->template->content = View::forge('admin/posts/edit');

	}

	public function action_delete($id = null)
	{
		if ($post = Model_Post::find($id))
		{
			$post->delete();

			Session::set_flash('success', 'Deleted post #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete post #'.$id);
		}

		Response::redirect('admin/posts');

	}


}