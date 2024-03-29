<?php
namespace Bitrix\Imopenlines\Update;

use \Bitrix\ImOpenLines\Model\ConfigTable;

use \Bitrix\Main\Loader,
	\Bitrix\Main\Application,
	\Bitrix\Main\Config\Option,
	\Bitrix\Main\Update\Stepper,
	\Bitrix\Main\Localization\Loc;


/**
 * @deprecated
 */
final class Update190500 extends Stepper
{
	const OPTION_NAME = "imopenlines_new_option_check_available";
	protected static $moduleId = "imopenlines";

	/**
	 * @inheritdoc
	 *
	 * @param array $result
	 * @return bool
	 */
	public function execute(array &$result)
	{
		return parent::FINISH_EXECUTION;
		/*
		$return = false;

		if (Loader::includeModule(self::$moduleId))
		{
			$connection = Application::getConnection();

			$params = Option::get(self::$moduleId, self::OPTION_NAME, "");
			$params = ($params !== "" ? @unserialize($params, ['allowed_classes' => false]) : []);
			$params = (is_array($params) ? $params : []);
			if (empty($params))
			{
				$params = [
					"lastId" => 0,
					"number" => 0,
					"count" => ConfigTable::getCount(),
				];
			}

			if (
				!empty($connection->getTableField(ConfigTable::getTableName(), 'TIMEMAN')) &&
				!empty($connection->getTableField(ConfigTable::getTableName(), 'CHECK_ONLINE'))
			)
			{
				if ($params["count"] > 0)
				{
					$result["title"] = Loc::getMessage("IMOL_UPDATE_CONFIG_CHECK_AVAILABLE");
					$result["progress"] = 1;
					$result["steps"] = "";
					$result["count"] = $params["count"];

					$cursor = ConfigTable::getList([
						'select' => ['ID', 'TIMEMAN', 'CHECK_ONLINE'],
						'filter' => ['>ID' => $params["lastId"]],
						'order' => ['ID' => 'ASC']
					]);

					$found = false;
					while ($row = $cursor->fetch())
					{
						$checkAvailable = 'N';

						if($row['TIMEMAN'] == 'Y' || $row['CHECK_ONLINE'] == 'Y')
						{
							$checkAvailable = 'Y';
						}

						ConfigTable::update($row['ID'], ['CHECK_AVAILABLE' => $checkAvailable]);

						$params["lastId"] = $row['ID'];
						$params["number"]++;
						$found = true;
					}

					if ($found)
					{
						Option::set(self::$moduleId, self::OPTION_NAME, serialize($params));
						$return = true;
					}

					$result["progress"] = intval($params["number"] * 100/ $params["count"]);
					$result["steps"] = $params["number"];

					if ($found === false)
					{
						Option::delete(self::$moduleId, ["name" => self::OPTION_NAME]);
					}
				}
			}
			else
			{
				Option::delete(self::$moduleId, ["name" => self::OPTION_NAME]);
			}
		}

		return $return;
		*/
	}
}