<?php

declare(strict_types = 1);

namespace Bitrix\CrmMobile\Controller\Terminal\Actions\App;

use Bitrix\Sale\Controller\Action\Entity;
use Bitrix\CrmMobile\Controller\Action;

class InitiatePayAction extends Action
{
	final public function run(int $paymentId, int $paySystemId, string $accessCode): ?array
	{
		$action = new Entity\InitiatePayAction($this->name, $this->controller, $this->config);
		$result = $action->run([
			'PAYMENT_ID' => $paymentId,
			'PAY_SYSTEM_ID' => $paySystemId,
			'ACCESS_CODE' => $accessCode,
		]);

		$errors = $action->getErrors();
		if ($errors)
		{
			$serviceResult = $action->getServiceResult();
			if ($serviceResult && !$serviceResult->isSuccess())
			{
				$this->addErrors($serviceResult->getErrors());
			}

			return null;
		}

		return [
			'qr' => $result['qr'],
		];
	}
}
