<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use Bitrix\Crm\Integration\Intranet\ToolsManager;
use Bitrix\Crm\Service\Container;
use Bitrix\Crm\Service\Router;
use Bitrix\Main\Loader;

if(!Loader::includeModule('crm'))
{
	ShowError('Module "crm" is not installed');
	return;
}

class CrmRouterComponent extends Bitrix\Crm\Component\Base
{
	/** @var Router */
	protected $router;

	public function onPrepareComponentParams($arParams): array
	{
		$arParams = parent::onPrepareComponentParams($arParams);

		if(!is_array($arParams))
		{
			$arParams = [];
		}

		$this->fillParameterFromRequest('isSefMode', $arParams);

		return $arParams;
	}

	protected function init(): void
	{
		parent::init();

		$isSefMode = true;
		if(($this->arParams['isSefMode'] ?? null) === 'n')
		{
			$isSefMode = false;
		}

		$this->router = Container::getInstance()->getRouter();
		$this->router->setSefMode($isSefMode);
		$root = $this->arParams['root'];
		if(is_string($root) && !empty($root))
		{
			$this->router->setRoot($root);
		}
	}

	public function executeComponent()
	{
		$this->init();

		if($this->getErrors())
		{
			$this->includeComponentTemplate();
			return;
		}

		$parseResult = $this->getComponentData();
		$componentName = $parseResult->getComponentName();
		$componentParameters = $parseResult->getComponentParameters();

		$this->arResult['componentName'] = $componentName;
		$this->arResult['componentParameters'] = $componentParameters;
		$this->arResult['templateName'] = $parseResult->getTemplateName();
		$this->arResult['isIframe'] = $this->isIframe();
		$this->arResult['isUsePadding'] = $this->isUsePadding($componentName);
		$this->arResult['isPlainView'] = $this->isPlainView($componentName);
		$this->arResult['isUseBitrix24Theme'] = $this->isUseBitrix24Theme($componentName);
		$this->arResult['defaultBitrix24Theme'] = $this->getDefaultBitrix24Theme($componentName);
		$this->arResult['roots'] = $this->getAllRoots();
		$this->arResult['isUseToolbar'] = $this->isUseToolbar($componentName);

		$templateName = '';
		$entityTypeId = $parseResult->getEntityTypeId();

		if (CCrmOwnerType::IsDefined($entityTypeId))
		{
			$this->arResult['entityTypeId'] = $entityTypeId;
		}

		if (
			!$this->arResult['isIframe']
			&& $this->arResult['isPlainView']
			&& CCrmOwnerType::IsDefined($entityTypeId)
		)
		{
			$templateName = 'details';
		}

		$entityTypeId = $componentParameters['entityTypeId'] ?? $entityTypeId;

		$toolsManager = Container::getInstance()->getIntranetToolsManager();

		$isAvailable = false;
		$sliderCode = ToolsManager::CRM_SLIDER_CODE;

		if ($entityTypeId)
		{
			$factory = Container::getInstance()->getFactory($entityTypeId);
			if ($factory && $factory->isInCustomSection())
			{
				$isAvailable = $toolsManager->checkExternalDynamicAvailability();
				$sliderCode = $toolsManager->getSliderCodeByEntityTypeId($entityTypeId);
			}
			elseif ($toolsManager->checkCrmAvailability())
			{
				$isAvailable = $toolsManager->checkEntityTypeAvailability($entityTypeId);
				$sliderCode = $toolsManager->getSliderCodeByEntityTypeId($entityTypeId);
			}
		}
		else
		{
			$isExternal = $componentParameters['isExternal'] ?? false;
			if ($isExternal)
			{
				$isAvailable = $toolsManager->checkExternalDynamicAvailability();
				$sliderCode = ToolsManager::EXTERNAL_DYNAMIC_SLIDER_CODE;
			}
			elseif ($toolsManager->checkCrmAvailability())
			{
				$isAvailable = $toolsManager->checkDynamicAvailability();
				$sliderCode = ToolsManager::DYNAMIC_SLIDER_CODE;
			}
		}

		if (!$isAvailable)
		{
			$this->arResult['sliderCode'] = $sliderCode;
			$templateName = 'disabled';
		}

		$this->includeComponentTemplate($templateName);
	}

	protected function getComponentData(): Router\ParseResult
	{
		$useUrlParsing = $this->arParams['useUrlParsing'] ?? true;

		$defaultComponentName = $this->router->getDefaultComponent();
		$defaultComponentParameters = $this->router->getDefaultComponentParameters();

		if (!$useUrlParsing)
		{
			return new Router\ParseResult(
				$this->arParams['componentName'] ?? $defaultComponentName,
				$this->arParams['componentParameters'] ?? $defaultComponentParameters,
				$this->arParams['componentTemplate'] ?? null,
				$this->arParams['entityTypeId'] ?? \CCrmOwnerType::Undefined
			);
		}

		$parseResult = $this->router->parseRequest();
		if(!$parseResult->isFound())
		{
			return new Router\ParseResult(
				$defaultComponentName,
				$defaultComponentParameters,
			);
		}

		return $parseResult;
	}

	protected function isUsePadding(string $componentName): bool
	{
		return false;
	}

	protected function isUseToolbar(string $componentName): bool
	{
		return $componentName !== 'bitrix:crm.item.automation';
	}

	protected function isPlainView(string $componentName): bool
	{
		$detailComponentNames = array_values($this->router->getItemDetailComponentNamesMap());

		return in_array($componentName, $detailComponentNames, true);
	}

	protected function isUseBitrix24Theme(string $componentName): bool
	{
		return $componentName === 'bitrix:crm.item.automation';
	}

	protected function getDefaultBitrix24Theme(string $componentName): ?string
	{
		return $componentName === 'bitrix:crm.item.automation' ? 'light:robots' : null;
	}

	protected function getAllRoots(): array
	{
		$customRoots = array_values($this->router->getCustomRoots());

		$currentRoot = $this->router->getRoot();
		$defaultRoot = $this->router->getDefaultRoot();

		return array_merge($customRoots, [$currentRoot, $defaultRoot]);
	}
}
