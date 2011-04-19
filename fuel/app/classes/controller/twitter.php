<?php

use Twitter\Tweet;

class Controller_Twitter extends Controller {

	public function action_login()
	{
		if ( ! Tweet::instance()->logged_in() )
		{
			Tweet::instance()->set_callback(Uri::create('twitter/callback'));
			Tweet::instance()->login();
		}
		else
		{
			Response::redirect(Uri::create('/'));
		}
	}

	public function action_logout()
	{
		Session::destroy();
		Response::redirect(Uri::create('/'));
	}


	public function action_callback()
	{
		$tokens = Tweet::instance()->get_tokens();
		$twitter_user = Tweet::instance()->call('get', 'account/verify_credentials');

		$user = Model_User::find_by_screen_name($twitter_user->screen_name);
		if ( ! $user)
		{
			$user = new Model_User();
		}
		$user->screen_name = $twitter_user->screen_name;
		$user->name = $twitter_user->name;
		$user->description = $twitter_user->description;
		$user->avatar = $twitter_user->profile_image_url;
		$user->oauth_token = $tokens['oauth_token'];
		$user->oauth_token_secret = $tokens['oauth_token_secret'];
		$user->save();
		
		Session::set('user_id', $user->id);
		
		Response::redirect(Uri::create('/'));
	}
	
}