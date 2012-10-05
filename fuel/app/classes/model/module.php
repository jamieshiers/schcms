<?php
class Model_Module extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'module_name',
		'page_id',
		'created_at',
		'updated_at',
		'position', 
		'order',
		'active',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('module_name', 'Module Name', 'required|max_length[255]');
		$val->add_field('page_id', 'Page Id', 'required|valid_string[numeric]');
		

		return $val;
	}

}
