<?php

use Bitrix\Main\Web\Json;
use Bitrix\Main\Web\Uri;
use Bitrix\TransformerController\Limits;
use Bitrix\TransformerController\Queue;

global $APPLICATION;

if(is_object($APPLICATION))
	$APPLICATION->RestartBuffer();

if(!\Bitrix\Main\Loader::includeModule('transformercontroller'))
{
	echo Json::encode([
		'success' => false,
		'result' => [
			'code' => 'MODULE_NOT_INSTALLED',
			'msg' => 'Module transformercontroller isn`t installed',
		]
	]);
	return;
}

$request = \Bitrix\Main\Context::getCurrent()->getRequest()->getPostList()->toArray();
if(!\Bitrix\Main\Application::getInstance()->isUtfMode())
{
	$request = (array)\Bitrix\Main\Text\Encoding::convertEncoding($request, 'UTF-8', SITE_CHARSET);
}

$verification = \Bitrix\Main\DI\ServiceLocator::getInstance()->get('transformercontroller.verification');
$verificationResult = $verification->check($request);

if(!$verificationResult->isSuccess())
{
	$code = null;
	foreach($verificationResult->getErrors() as $error)
	{
		if(!$code)
		{
			$code = $error->getCode();
		}
	}
	if(!$code)
	{
		$code = 'RIGHT_CHECK_FAILED';
	}

	echo Json::encode([
		'success' => false,
		'result' => [
			'code' => $code,
			'msg' => implode(', ', $verificationResult->getErrorMessages()),
		],
	]);
	return;
}

$clientInfo = $verificationResult->getData();
$licenseKey = $clientInfo['LICENSE_KEY'] ?? null;
$tarif = $clientInfo['TARIF'] ?? null;

$params = $request['params'] ?? [];
$command = $request['command'] ?? null;

$backUri = new Uri($params['back_url'] ?? null);
$domain = $backUri->getHost();

if(isset($request['QUEUE']))
{
	$queueName = $request['QUEUE'];
}
else
{
	$queueName = Queue::getDefaultQueueName();
}
$queueId = Queue::getQueueIdByName($queueName);
if(!$queueId)
{
	echo Json::encode([
		'success' => false,
		'result' => [
			'code' => 'WRONG_QUEUE_NAME',
			'msg' => 'Queue with name '.$queueName.' not found',
		],
	]);
	return;
}

$ban = \Bitrix\TransformerController\BanList::getByDomain($domain, $queueName);
if($ban)
{
	echo Json::encode([
		'success' => false,
		'result' => [
			'code' => 'KEY_BAN',
			'msg' => $ban['REASON'] ?? null,
		],
	]);
	return;
}

if(!Limits::isDomainUnlimited($domain))
{
	$limits = new Limits([
		'TARIF' => $tarif,
		'COMMAND_NAME' => $command,
		'DOMAIN' => $domain,
		'LICENSE_KEY' => $licenseKey === 'stub' ? null : $licenseKey,
		'QUEUE_ID' => $queueId,
		'TYPE' => $request['BX_TYPE'] ?? null,
	]);
	$resultLimit = $limits->check();
	if(!$resultLimit->isSuccess())
	{
		echo Json::encode([
			'success' => false,
			'result' => [
				'code' => 'LIMIT_EXCEED',
				'msg' => implode(', ', $resultLimit->getErrorMessages()),
			],
		]);
		return;
	}
}

$exchange = Queue::createExchange($queueName);
$queue = new Queue($exchange, new \AMQPQueue($exchange->getChannel()), $queueName);
$result = $queue->checkCommand($command, $params);

if($result->isSuccess())
{
	$guid = null;
	$parsedUrl = parse_url((string)$backUri);
	if (is_array($parsedUrl) && isset($parsedUrl['query']))
	{
		$backUrlParams = [];
		parse_str($parsedUrl['query'], $backUrlParams);
		if (isset($backUrlParams['id']))
		{
			$guid = $backUrlParams['id'];
		}
	}

	$result = $queue->addMessage(
		$command,
		$params,
		[
			'TIME' => time(),
			'LICENSE_KEY' => $licenseKey,
			'TARIF' => $tarif,
			'DOMAIN' => $domain,
			'QUEUE_ID' => $queueId,
			'GUID' => $guid,
		],
	);

	if($result->isSuccess())
	{
		\Bitrix\TransformerController\Entity\UsageStatisticTable::add([
			'COMMAND_NAME' => $command,
			'FILE_SIZE' => $params['fileSize'] ?? 0,
			'DOMAIN' => $domain,
			'LICENSE_KEY' => $licenseKey,
			'TARIF' => $tarif,
			'QUEUE_ID' => $queueId,
			'GUID' => $guid,
		]);
	}
}

if($result->isSuccess())
{
	echo Json::encode([
		'success' => true,
	]);
}
else
{
	echo Json::encode([
		'success' => false,
		'result' => [
			'code' => $result->getErrors()[0]->getCode(),
			'msg' => implode(', ', $result->getErrorMessages()),
		],
	]);
}