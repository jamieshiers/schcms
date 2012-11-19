<?php

class Model_Twitter extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'oauth_token',
		'oauth_token_secret',
		'user_id',
		'screen_name',
		'name',
		'description',
		'avatar',
	);
}