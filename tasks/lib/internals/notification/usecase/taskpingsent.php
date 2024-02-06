<?php

namespace Bitrix\Tasks\Internals\Notification\UseCase;

use Bitrix\Tasks\Internals\Notification\BufferInterface;
use Bitrix\Tasks\Internals\Notification\EntityCode;
use Bitrix\Tasks\Internals\Notification\EntityOperation;
use Bitrix\Tasks\Internals\Notification\Message;
use Bitrix\Tasks\Internals\Notification\Metadata;
use Bitrix\Tasks\Internals\Notification\ProviderCollection;
use Bitrix\Tasks\Internals\Notification\UserRepositoryInterface;
use Bitrix\Tasks\Internals\TaskObject;

class TaskPingSent
{
	private TaskObject $task;
	private BufferInterface $buffer;
	private UserRepositoryInterface $userRepository;
	private ProviderCollection $providers;

	public function __construct(
		TaskObject $task,
		BufferInterface $buffer,
		UserRepositoryInterface $userRepository,
		ProviderCollection $providers
	)
	{
		$this->task = $task;
		$this->buffer = $buffer;
		$this->userRepository = $userRepository;
		$this->providers = $providers;
	}

	public function execute(int $authorId, $params = []): bool
	{
		$sender = $this->userRepository->getUserById($authorId);
		if (!$sender)
		{
			return false;
		}

		$recepients = $this->userRepository->getRecepients($this->task, $sender, $params);
		if (empty($recepients))
		{
			return false;
		}

		foreach ($this->providers as $provider)
		{
			foreach ($recepients as $recepient)
			{
				$provider->addMessage(new Message(
					$sender,
					$recepient,
					new Metadata(
						EntityCode::CODE_TASK,
						EntityOperation::PING_STATUS,
						[
							'task' => $this->task
						]
					)
				));
			}

			$this->buffer->addProvider($provider);
		}

		return true;
	}
}