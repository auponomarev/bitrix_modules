<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage tasks
 * @copyright 2001-2016 Bitrix
 */

namespace Bitrix\Tasks\Item\Task\Template;

use Bitrix\Tasks\Util\Type;
use Bitrix\Tasks\Util\Error;

final class SystemLogEntry extends \Bitrix\Tasks\Item\SubItem
{
	const TYPE_NOTICE = 1;
	const TYPE_WARNING = 2;
	const TYPE_ERROR = 3;

	public static function getEntityType()
	{
		return 1;
	}

	protected static function getParentConnectorField()
	{
		return 'ENTITY_ID';
	}

	public static function getDataSourceClass()
	{
		return '\\Bitrix\\Tasks\\Internals\\SystemLogTable';
	}

	public function externalizeFieldValue($name, $value)
	{
		if($name == 'ERROR')
		{
			if(!\CheckSerializedData($value))
			{
				return null;
			}

			$value = unserialize($value);

			return Error\Collection::makeFromArray($value);
		}

		return parent::externalizeFieldValue($name, $value);
	}

	public function internalizeFieldValue($name, $value)
	{
		if($name == 'ERROR' && $value instanceof Error\Collection)
		{
			// we are not able to store error`s additional data
			return serialize($value->transform(array('DATA' => null))->getArray());
		}

		return $value;
	}

	protected function prepareData()
	{
		$data = $this->getTransitionState();
		$result = $data->getResult();
		if ($data->isInProgress())
		{
			$id = $this->getId();
			if(!$id)
			{
				if(!$data->containsKey('CREATED_DATE')) // created date was not set manually
				{
					$data['CREATED_DATE'] = $data->getEnterTimeFormatted();
				}
				if(!$data->containsKey('TYPE')) // created date was not set manually
				{
					$data['TYPE'] = static::TYPE_NOTICE;
					// todo:
					/*
					if($data->containsKey('ERROR'))
					{
						if($data['ERROR'] instanceof Error\Collection && !$data['ERROR']->isEmpty())
						{
							$data['LEVEL'] = $data['ERROR']->filter(array('TYPE' => Error::TYPE_FATAL))->isEmpty() ? static::TYPE_WARNING : static::TYPE_ERROR;
						}
					}
					*/
				}

				$data['ENTITY_TYPE'] = static::getEntityType();
			}
		}

		return $result;
	}

	protected static function getBindCondition($parentId)
	{
		return parent::getBindCondition($parentId) + array(
			'=ENTITY_TYPE' => static::getEntityType(),
		);
	}
}