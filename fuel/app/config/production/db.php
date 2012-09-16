<?php
/**
 * The production database settings.
 */

return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host='.$_SERVER['DB1_HOST'].'port='.$_SERVER['DB1_PORT'].';dbname='.$_SERVER['DB1_NAME'],
			'username'   => $_SERVER['DB1_USER'],
			'password'   => $_SERVER['DB1_PASS'],
		),
	),
);
