<?php
class Model_Menu extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'parent_id',
		'page_id',
		'name',
		'content_type',
		'link',
		'position',
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
		$val->add_field('parent_id', 'Parent Id', 'valid_string[numeric]');
		$val->add_field('page_id', 'Page Id', 'max_length[255]');
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('content_type', 'Content Type', 'max_length[255]');
		$val->add_field('link', 'Link', 'max_length[255]');
		$val->add_field('position', 'Position', 'valid_string[numeric]');
		$val->add_field('active', 'Active', 'valid_string[numeric]');

		return $val;
	}

}
