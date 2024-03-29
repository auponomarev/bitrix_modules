<?php

namespace Bitrix\Crm\Conversion;

use Bitrix\Main;

class OrderConversionScheme
{
	public const UNDEFINED = 0;
	public const DEAL = 1;
	public const INVOICE = 2;

	public const DEAL_NAME = 'DEAL';
	public const INVOICE_NAME = 'INVOICE';

	private static array $allDescriptions = [];

	public static function isDefined($schemeID)
	{
		if (!is_numeric($schemeID))
		{
			return false;
		}

		$schemeID = (int)$schemeID;
		
		return $schemeID >= self::DEAL && $schemeID <= self::INVOICE;
	}
	
	public static function getDefault()
	{
		return self::DEAL;
	}
	
	public static function resolveName($schemeID)
	{
		if (!is_numeric($schemeID))
		{
			return '';
		}

		$schemeID = (int)$schemeID;
		if ($schemeID <= 0)
		{
			return '';
		}

		switch($schemeID)
		{
			case self::DEAL:
				return self::DEAL_NAME;
			case self::INVOICE:
				return self::INVOICE_NAME;
			case self::UNDEFINED:
			default:
				return '';
		}
	}

	public static function getDescription($schemeID)
	{
		if (!is_numeric($schemeID))
		{
			return '';
		}

		$schemeID = (int)$schemeID;
		$descriptions = self::getAllDescriptions();

		return $descriptions[$schemeID] ?? '';
	}

	/**
	* @return array Array of strings
	*/
	public static function getAllDescriptions()
	{
		if (empty(self::$allDescriptions[LANGUAGE_ID]))
		{
			Main\Localization\Loc::loadMessages(__FILE__);
			self::$allDescriptions[LANGUAGE_ID] = array(
				self::DEAL => Main\Localization\Loc::getMessage('CRM_ORDER_CONV_DEAL'),
				self::INVOICE => Main\Localization\Loc::getMessage('CRM_ORDER_CONV_INVOICE')
			);
		}

		return self::$allDescriptions[LANGUAGE_ID];
	}

	/**
	* @return array Array of strings
	*/
	public static function getJavaScriptDescriptions($checkPermissions = false)
	{
		$result = [];
		$descriptions = self::getAllDescriptions();

		if (!$checkPermissions)
		{
			$isInvoicePermitted = true;
			$isDealPermitted = true;
		}
		else
		{
			$flags = [];
			\Bitrix\Crm\Order\Permissions\Order::prepareConversionPermissionFlags(0, $flags);
			$isDealPermitted = $flags['CAN_CONVERT_TO_DEAL'];
			$isInvoicePermitted = $flags['CAN_CONVERT_TO_INVOICE'];
		}

		if ($isDealPermitted && $isInvoicePermitted)
		{
			foreach($descriptions as $schemeID => $description)
			{
				$result[self::resolveName($schemeID)] = $description;
			}
		}
		else
		{
			$schemes = [];
			if ($isDealPermitted)
			{
				$schemes[] = self::DEAL;
			}

			if ($isInvoicePermitted)
			{
				$schemes[] = self::INVOICE;
			}

			foreach($schemes as $schemeID)
			{
				$result[self::resolveName($schemeID)] = $descriptions[$schemeID];
			}
		}

		return $result;
	}

	public static function getEntityTypeIds(int $schemeId): array
	{
		if ($schemeId === static::INVOICE)
		{
			return [\CCrmOwnerType::Invoice];
		}
		
		if ($schemeId === static::DEAL)
		{
			return [\CCrmOwnerType::Deal];
		}

		return [];
	}
}
