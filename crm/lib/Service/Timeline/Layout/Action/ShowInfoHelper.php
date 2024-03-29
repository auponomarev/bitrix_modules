<?php

namespace Bitrix\Crm\Service\Timeline\Layout\Action;

use Bitrix\Crm\Service\Timeline\Layout\Action;

class ShowInfoHelper extends Action
{
	protected string $code;

	public function __construct(string $code)
	{
		$this->code = $code;
	}

	public function getCode(): string
	{
		return $this->code;
	}

	public function toArray(): array
	{
		return [
			'type' => 'showInfoHelper',
			'value' => $this->getCode(),
			'animation' => $this->getAnimation(),
			'analytics' => $this->getAnalytics(),
		];
	}
}
