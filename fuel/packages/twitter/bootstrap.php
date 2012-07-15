<?php

Autoloader::add_core_namespace('Twitter');

Autoloader::add_classes(array(
	'Twitter\\Twitter'                 => __DIR__.'/classes/twitter.php',
	'Twitter\\TwitterException'        => __DIR__.'/classes/twitter.php',
	'Twitter\\Twitter_Connection'      => __DIR__.'/classes/twitter/connection.php',
	'Twitter\\Twitter_Oauth'           => __DIR__.'/classes/twitter/oauth.php',
	'Twitter\\Twitter_Oauth_Response'  => __DIR__.'/classes/twitter/oauth/response.php',
));
