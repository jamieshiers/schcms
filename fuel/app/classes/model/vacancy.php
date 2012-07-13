<?php
class Model_Vacancy extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'job_title',
		'location',
		'contract_type',
		'contract_term',
		'start_date',
		'end_date',
		'description',
		'created_at',
		'updated_at',
		'files',
		'salary',
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
		$val->add_field('job_title', 'Job Title', 'required|max_length[255]');
		$val->add_field('location', 'Location', 'required|max_length[255]');
		$val->add_field('contract_type', 'Contract Type', 'required|max_length[255]');
		$val->add_field('contract_term', 'Contract Term', 'required|max_length[255]');
		$val->add_field('start_date', 'Start Date', 'required');
		$val->add_field('end_date', 'End Date', 'required');
		$val->add_field('description', 'Description', 'required');
		$val->add_field('salary', 'Salary', 'required');

		return $val;
	}

}
