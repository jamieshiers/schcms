<?php
class Model_Alert extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'alert_name',
		'alert_desc',
		'alert_type',
		'alert_expires',
		'active',
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
		$val->add_field('alert_name', 'Alert Name', 'required|max_length[255]');
		$val->add_field('alert_desc', 'Alert Desc', 'required');
		$val->add_field('alert_type', 'Alert Type', 'required|max_length[255]');
		$val->add_field('alert_expires', 'Alert Expires', 'required');
		$val->add_field('active', 'Active', 'required|valid_string[numeric]');

		return $val;
	}

}
