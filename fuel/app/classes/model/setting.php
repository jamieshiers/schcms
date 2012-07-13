<?php
class Model_Setting extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'setting_name',
		'setting_value',
		'created_at',
		'updated_at',
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
		$val->add_field('setting_name', 'Setting Name', 'required|max_length[255]');
		$val->add_field('setting_value', 'Setting Value', 'required|max_length[255]');

		return $val;
	}

}
