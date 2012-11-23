<?php
class Model_Staff extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'title',
		'first_name',
		'surname',
		'job_title',
		'img',
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
		$val->add_field('title', 'Title', 'required|max_length[12]');
		$val->add_field('first_name', 'First Name', 'required|max_length[255]');
		$val->add_field('surname', 'Surname', 'required|max_length[255]');
		$val->add_field('job_title', 'Job Title', 'required|max_length[255]');
		$val->add_field('img', 'Img', 'required|max_length[255]');

		return $val;
	}

}
