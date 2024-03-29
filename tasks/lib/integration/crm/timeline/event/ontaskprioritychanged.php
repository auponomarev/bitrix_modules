<?php

namespace Bitrix\Tasks\Integration\CRM\Timeline\Event;

use Bitrix\Tasks\Integration\CRM\Timeline\EventTrait;
use Bitrix\Tasks\Internals\TaskObject;

class OnTaskPriorityChanged implements TimeLineEvent
{
	use EventTrait;

	private ?TaskObject $task;
	private int $userId;

	public function __construct(?TaskObject $task, int $userId)
	{
		$this->userId = $userId;
		$this->task = $task;
	}

	public function getPayload(): array
	{
		return [
			'TASK_ID' => $this->task->getId(),
			'AUTHOR_ID' => $this->userId,
			'REFRESH_TASK_ACTIVITY' => false,
			'IGNORE_IN_LOGS' => true,
		];
	}

	public function getEndpoint(): string
	{
		return 'onTaskPriorityChanged';
	}
}