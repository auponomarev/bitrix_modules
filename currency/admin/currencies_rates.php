<?php
/** @global CMain $APPLICATION */
use Bitrix\Main;
use Bitrix\Main\Loader;
use Bitrix\Currency;

require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_before.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/currency/prolog.php");
$CURRENCY_RIGHT = $APPLICATION->GetGroupRight("currency");
if ($CURRENCY_RIGHT <= "D")
{
	$APPLICATION->AuthForm(GetMessage("ACCESS_DENIED"));
}
Loader::includeModule('currency');

IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/currency/currencies_rates.php");

$adminListTableID = "t_currency_rates";
$adminSort = new CAdminSorting($adminListTableID, 'DATE_RATE', 'DESC');
$adminList = new CAdminList($adminListTableID, $adminSort);

$arFilterFields = [
	"filter_period_from",
	"filter_period_to",
	"filter_currency",
	"filter_base_currency",
];

$currentFilter = $adminList->InitFilter($arFilterFields);

foreach ($arFilterFields as $fieldName)
{
	$currentFilter[$fieldName] = (string)($currentFilter[$fieldName] ?? '');
}

$adminFilter = new CAdminFilter(
	$adminListTableID . "_filter",
	[
		GetMessage("curr_rates_date1"),
		GetMessage("curr_rates_curr1"),
		GetMessage("BX_CURRENCY_RATE_BASE_CURRENCY"),
	]
);

$filter = [];

if ($currentFilter['filter_currency'] !== '')
{
	$filter['=CURRENCY'] = $currentFilter['filter_currency'];
}
if ($currentFilter['filter_base_currency'] !== '')
{
	$filter["=BASE_CURRENCY"] = $currentFilter['filter_base_currency'];
}
if ($currentFilter['filter_period_from'] !== '')
{
	try
	{
		$filter['>=DATE_RATE'] = new Main\Type\Date($currentFilter['filter_period_from']);
	}
	catch (Main\ObjectException $e)
	{
		$currentFilter['filter_period_from'] = '';
	}
}
if ($currentFilter['filter_period_to'] !== '')
{
	try
	{
		$filter['<=DATE_RATE'] = new Main\Type\Date($currentFilter['filter_period_to']);
	}
	catch (Main\ObjectException $e)
	{
		$currentFilter['filter_period_to'] = '';
	}
}

$orderConvert = [
	'CURR' => 'CURRENCY',
	'DATE' => 'DATE_RATE',
];

$by = mb_strtoupper($adminSort->getField());
if (isset($orderConvert[$by]))
{
	$by = $orderConvert[$by];
}

$order = mb_strtoupper($adminSort->getOrder());
$rateOrder = [$by => $order];
if ($by !== 'ID')
{
	$rateOrder['ID'] = 'DESC';
}

if ($CURRENCY_RIGHT >="W" && $adminList->EditAction())
{
	foreach ($adminList->GetEditFields() as $ID => $arFields)
	{
		$ID = (int)$ID;

		$arCurR = CCurrencyRates::GetByID($ID);
		$arFields["CURRENCY"] = $arCurR["CURRENCY"];

		$res = CCurrencyRates::Update($ID, $arFields);
		if (!$res)
		{
			$e = $APPLICATION->GetException();
			if ($e)
			{
				$adminList->AddUpdateError(
					GetMessage("SAVE_ERROR") . $ID . ": "
						. str_replace("<br>", " ", $e->GetString())
					,
					$ID
				);
			}
		}
	}
}

$arID = $adminList->GroupAction();
if ($CURRENCY_RIGHT >="W" && !empty($arID) && is_array($arID))
{
	if ($adminList->IsGroupActionToAll())
	{
		$arID = [];
		$rateIterator = Currency\CurrencyRateTable::getList([
			'select' => ['ID'],
			'filter' => $filter,
		]);
		while ($rate = $rateIterator->fetch())
		{
			$arID[] = (int)$rate['ID'];
		}
		unset($rate, $rateIterator);
	}

	$action = $adminList->GetAction();

	foreach($arID as $ID)
	{
		$ID = (int)($ID);
		if ($ID <= 0)
		{
			continue;
		}

		switch ($action)
		{
			case "delete":
				CCurrencyRates::Delete($ID);
			break;
		}
	}
}

$currencyList = Currency\Helpers\Admin\Tools::getCurrencyLinkList();

$usePageNavigation = true;
$navyParams = [];
if ($adminList->isExportMode())
{
	$usePageNavigation = false;
}
else
{
	$navyParams = CDBResult::GetNavParams(CAdminResult::GetNavSize($adminListTableID));
	if ($navyParams['SHOW_ALL'])
	{
		$usePageNavigation = false;
	}
	else
	{
		$navyParams['PAGEN'] = (int)$navyParams['PAGEN'];
		$navyParams['SIZEN'] = (int)$navyParams['SIZEN'];
	}
}
$selectFields = ['*'];
$getListParams = [
	'select' => $selectFields,
	'filter' => $filter,
	'order' => $rateOrder
];
if ($usePageNavigation)
{
	$getListParams['limit'] = $navyParams['SIZEN'];
	$getListParams['offset'] = $navyParams['SIZEN']*($navyParams['PAGEN']-1);
}
$totalPages = 0;
$totalCount = 0;
if ($usePageNavigation)
{
	$countQuery = new Main\Entity\Query(Currency\CurrencyRateTable::getEntity());
	$countQuery->addSelect(new Main\Entity\ExpressionField('CNT', 'COUNT(1)'));
	$countQuery->setFilter($getListParams['filter']);
	$totalCount = $countQuery->exec()->fetch();
	unset($countQuery);
	$totalCount = (int)$totalCount['CNT'];
	if ($totalCount > 0)
	{
		$totalPages = ceil($totalCount/$navyParams['SIZEN']);
		if ($navyParams['PAGEN'] > $totalPages)
		{
			$navyParams['PAGEN'] = $totalPages;
		}
		$getListParams['limit'] = $navyParams['SIZEN'];
		$getListParams['offset'] = $navyParams['SIZEN']*($navyParams['PAGEN']-1);
	}
	else
	{
		$navyParams['PAGEN'] = 1;
		$getListParams['limit'] = $navyParams['SIZEN'];
		$getListParams['offset'] = 0;
	}
}
$rateIterator = new CAdminResult(Currency\CurrencyRateTable::getList($getListParams), $adminListTableID);
if ($usePageNavigation)
{
	$rateIterator->NavStart($getListParams['limit'], $navyParams['SHOW_ALL'], $navyParams['PAGEN']);
	$rateIterator->NavRecordCount = $totalCount;
	$rateIterator->NavPageCount = $totalPages;
	$rateIterator->NavPageNomer = $navyParams['PAGEN'];
}
else
{
	$rateIterator->NavStart();
}

$adminList->NavText($rateIterator->GetNavPrint(GetMessage("curr_rates_nav")));

$arHeaders = [];
$arHeaders[] = [
	"id" => "ID",
	"content" => "ID",
	"default" => false,
];
$arHeaders[] = [
	"id" => "CURRENCY",
	"content" => GetMessage('curr_rates_curr1'),
	"sort" => "CURRENCY",
	"default" => true,
];
$arHeaders[] = [
	"id" => "BASE_CURRENCY",
	"content" => GetMessage('BX_CURRENCY_RATE_BASE_CURRENCY'),
	"sort" => "BASE_CURRENCY",
	"default" => true,
];
$arHeaders[] = [
	"id" => "DATE_RATE",
	"content" => GetMessage('curr_rates_date1'),
	"sort" => "DATE_RATE",
	"default" => true,
];
$arHeaders[] = [
	"id" => "RATE_CNT",
	"content" => GetMessage('curr_rates_rate_cnt'),
	"sort" => "RATE_CNT",
	"default" => true,
];
$arHeaders[] = [
	"id" => "RATE",
	"content" => GetMessage('curr_rates_rate'),
	"sort" => "RATE",
	"default" => true,
];

$adminList->AddHeaders($arHeaders);

while ($rate = $rateIterator->Fetch())
{
	$editUrl = "/bitrix/admin/currency_rate_edit.php?ID=" . $rate['ID']
		. "&lang=" . LANGUAGE_ID
		. GetFilterParams("filter_")
	;
	$row = &$adminList->AddRow($rate['ID'], $rate, $editUrl, GetMessage('CURRENCY_RATES_A_EDIT'));

	$row->AddViewField(
		'ID',
		'<a href="' . $editUrl . '" title="' . GetMessage('CURRENCY_RATES_A_EDIT_TITLE') . '">'
			. $rate['ID']
			. '</a>'
	);
	$row->AddViewField(
		'CURRENCY',
		($currencyList[$rate['CURRENCY']] ?? htmlspecialcharsbx($rate['CURRENCY']))
	);
	$row->AddViewField(
		'BASE_CURRENCY',
		($currencyList[$rate['BASE_CURRENCY']] ?? htmlspecialcharsbx($rate['BASE_CURRENCY']))
	);
	$row->AddCalendarField('DATE_RATE');

	$row->AddInputField("RATE_CNT", ["size" => "5"]);
	$row->AddInputField("RATE", ["size" => "10"]);

	$arActions = [];

	$arActions[] = [
		"ICON" => "edit",
		"TEXT" => GetMessage("MAIN_ADMIN_MENU_EDIT"),
		"DEFAULT" => "Y",
		"ACTION" => $adminList->ActionRedirect($editUrl),
	];

	if ($CURRENCY_RIGHT >= "W")
	{
		$arActions[] = ["SEPARATOR" => true];
		$arActions[] = [
			"ICON" => "delete",
			"TEXT" => GetMessage("MAIN_ADMIN_MENU_DELETE"),
			"ACTION" => "if(confirm('".GetMessage('CONFIRM_DEL_MESSAGE')."')) "
				. $adminList->ActionDoGroup($rate['ID'], "delete")
			,
		];
	}

	$row->AddActions($arActions);

	unset($editUrl);
}

$adminList->AddFooter([
	[
		"title" => GetMessage("MAIN_ADMIN_LIST_SELECTED"),
		"value" => $rateIterator->SelectedRowsCount(),
	],
	[
		"counter" => true,
		"title" => GetMessage("MAIN_ADMIN_LIST_CHECKED"),
		"value" => "0",
	],
]);

if ($CURRENCY_RIGHT >= "W")
{
	$adminList->AddGroupActionTable([
		"delete"=>GetMessage("MAIN_ADMIN_LIST_DELETE"),
	]);
}

$aContext = [
	[
		"ICON" => "btn_new",
		"TEXT"=>GetMessage("CURRENCY_NEW_TITLE"),
		"LINK"=>"/bitrix/admin/currency_rate_edit.php?lang=" . LANGUAGE_ID . GetFilterParams("filter_"),
		"TITLE"=>GetMessage("CURRENCY_NEW_TITLE"),
	],
];

$adminList->AddAdminContextMenu($aContext);

$adminList->CheckListMode();

$APPLICATION->SetTitle(GetMessage("CURRENCY_TITLE"));
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
?>
<form method="get" action="<?=$APPLICATION->GetCurPage()?>" name="find_form"><?php
$adminFilter->Begin();
?>
	<tr>
		<td><?= GetMessage("curr_rates_date1")?>:</td>
		<td>
			<?= CalendarPeriod(
					"filter_period_from",
					$currentFilter['filter_period_from'],
					"filter_period_to",
					$currentFilter['filter_period_to'],
					"find_form",
					"Y"
				);
			?>
		</td>
	</tr>
	<tr>
		<td><?= GetMessage("curr_rates_curr1")?>:</td>
		<td>
			<?= CCurrency::SelectBox(
					"filter_currency",
					$currentFilter['filter_currency'],
					GetMessage("curr_rates_all"),
					true,
					"",
					""
				);
			?>
		</td>
	</tr>
	<tr>
		<td><?= GetMessage("BX_CURRENCY_RATE_BASE_CURRENCY"); ?>:</td>
		<td>
			<?= CCurrency::SelectBox(
					"filter_base_currency",
					$currentFilter['filter_base_currency'],
					GetMessage("curr_rates_all"),
					true,
					"",
					""
				);
			?>
		</td>
	</tr>
<?php
$adminFilter->Buttons([
	"table_id" => $adminListTableID,
	"url" => $APPLICATION->GetCurPage(),
	"form" => "find_form",
]);
$adminFilter->End();?>
</form>
<?php
$adminList->DisplayList();
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_admin.php");
