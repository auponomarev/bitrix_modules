<?php
namespace Bitrix\Tasks\Internals;

use Bitrix\Main,
	Bitrix\Main\Localization\Loc;
use Bitrix\Tasks\Util\Type\DateTime;

//Loc::loadMessages(__FILE__);

/**
 * Class ViolationTable
 *
 * @package Bitrix\Tasks
 **/

class ViolationLogTable extends Main\Entity\DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'b_tasks_violation_log';
	}

	/**
	 * @return static
	 */
	public static function getClass()
	{
		return get_called_class();
	}

	/**
	 * Returns entity map definition.
	 *
	 * @return array
	 */
	public static function getMap()
	{
		return array(
			'ID' => array(
				'data_type' => 'integer',
				'primary' => true,
				'autocomplete' => true,
			),
			'TASK_ID' => array(
				'data_type' => 'integer',
				'required' => true,
			),
			'VALUE' => array(
				'data_type' => 'integer',
				'required' => true,
			),
			'USER_ID' => array(
				'data_type' => 'integer',
				'required' => true,
			),
			'USER_TYPE' => array(
				'data_type' => 'string',
				'required' => true,
			),
			'DESCRIPTION' => array(
				'data_type' => 'text',
				'required' => false,
			),

			// references
			'USER' => array(
				'data_type' => 'Bitrix\Main\UserTable',
				'reference' => array('=this.USER_ID' => 'ref.ID')
			),
			new Main\Entity\ReferenceField('TASK', 'Bitrix\Tasks\TaskTable', array('=this.TASK_ID' => 'ref.ID'))
		);
	}

	public function OnTaskExpired($taskId)
	{
		$task = \Bitrix\Tasks\Item\Task::getInstance($taskId);
		if($task->responsibleId == $task->createdBy)
		{
			return true;
		}

		$data = array(
			'TASK_ID'=>$taskId,
			'DATE'=>new DateTime(),
			'VALUE'=>1,
			'DESCRIPTION'=>''
		);

		$data['USER_ID'] = $task->responsibleId;
		$data['USER_TYPE'] = 'R';
		self::add($data);

		if($task->accomplices)
		{
			foreach($task->accomplices->toArray() as $userId)
			{
				$data['USER_ID'] = $userId;
				$data['USER_TYPE'] = 'A';
				self::add($data);
			}
		}
	}
}