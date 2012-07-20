<?php
class Model_Calendar extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'title',
		'allday',
		'start',
		'end',
		'editable',
		'url',
		'created_at',
		'updated_at',
		'cal_id', 
	);

	protected static $_belongs_to = array('cal');

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
		$val->add_field('title', 'Title', 'required|max_length[255]');
		$val->add_field('allday', 'Allday', 'required|max_length[255]');
		$val->add_field('start', 'Start', 'required');
		$val->add_field('end', 'End', 'required');

		return $val;
	}

}
