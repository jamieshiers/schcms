<?php 
class Controller_Admin_Twitter extends Controller_Admin
{

	public function action_login()
	{
		Twitter::set_callback(Uri::create('admin/twitter/callback'));
		Twitter::login();	
	}

	public function action_logout()
	{
		Session::destroy();
		Response::redirect(Uri::create('admin/settings/accounts'));
	}

	public function action_callback()
	{
		$tokens = Twitter::get_tokens();
		$twitter_user = Twitter::call('get', 'account/verify_credentials');


		$account = new Model_twitter();

		$account->oauth_token = $tokens['oauth_token'];
		$account->oauth_token_secret = $tokens['oauth_token_secret'];
		$account->user_id = $twitter_user->id;
		$account->screen_name = $twitter_user->screen_name;
		$account->name = $twitter_user->name;
		$account->description = $twitter_user->description;
		$account->avatar = $twitter_user->profile_image_url;
		$account->save();

		Config::load('twitter', true);
		Config::set('twitter.active_twitter', 'set');
		config::save('twitter', 'twitter');


		Response::redirect(Uri::create('admin/settings/accounts'));
	}

	public function action_test()
	{

		$twitter_user = Twitter::get('account/verify_credentials');

		print_r($twitter_user);




	}
}