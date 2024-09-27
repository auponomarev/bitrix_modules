<?php
namespace Bitrix\Tasks\Rest\Controllers\Task\Counters;

use Bitrix\Tasks\Rest\Controllers\Base;

use Bitrix\Tasks\Internals\Effective as InternalsEffective;

class Effective extends Base
{
	/**
	 * Get efficiency data
	 *
	 * @param int $userId
	 * @param int $groupId
	 * @param array $params
	 * @return array
	 * @throws \Bitrix\Main\ArgumentException
	 * @throws \Bitrix\Main\ObjectException
	 * @throws \Bitrix\Main\ObjectPropertyException
	 * @throws \Bitrix\Main\SystemException
	 */
	public function getAction($userId = 0, $groupId=0, array $params = array())
	{
		if (!$userId)
		{
			$userId = $this->getCurrentUser()->getId();
		}

		$datesRange = InternalsEffective::getDatesRange();
		$dateFrom = $datesRange['FROM'];
		$dateTo = $datesRange['TO'];

		$tasksCounters = InternalsEffective::getCountersByRange($dateFrom, $dateTo, $userId, $groupId);

		$efficiency = 100;
		$violations = $tasksCounters['VIOLATIONS'];
		$inProgress = $tasksCounters['IN_PROGRESS'];

		if ($inProgress > 0)
		{
			$efficiency = (int)round(100 - ($violations / $inProgress) * 100);
		}
		else if ($violations > 0)
		{
			$efficiency = 0;
		}

		if ($efficiency < 0)
		{
			$efficiency = 0;
		}

		return [
			'effective' => $efficiency,
			'violations' => $violations,
			'in_progress' => $inProgress,
			'date_start' => $dateFrom,
			'date_end' => $dateTo
		];
	}

	/**
	 * Get efficiency data by days
	 *
	 * @param int $userId
	 * @param int $groupId
	 * @param array $params
	 * @return array
	 * @throws \Bitrix\Main\ArgumentException
	 * @throws \Bitrix\Main\ObjectException
	 * @throws \Bitrix\Main\ObjectPropertyException
	 * @throws \Bitrix\Main\SystemException
	 */
	public function statByDayAction($userId = 0 , $groupId = 0, array $params = array())
	{
		if (!$userId)
		{
			$userId = $this->getCurrentUser()->getId();
		}

		$datesRange = InternalsEffective::getDatesRange();
		$dateFrom = $datesRange['FROM'];
		$dateTo = $datesRange['TO'];

		return InternalsEffective::getEfficiencyForGraph($dateFrom, $dateTo, $userId, $groupId);
	}
}