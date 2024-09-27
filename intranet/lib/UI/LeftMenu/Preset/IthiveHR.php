<?php

namespace Bitrix\Intranet\UI\LeftMenu\Preset;

use Bitrix\Main\Config\Option;
use Bitrix\Main\Diag\Debug;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;

/**
 * Class IthiveHR
 * @package Bitrix\Intranet\UI\LeftMenu\Preset
 */
class IthiveHR extends PresetAbstract
{
    /**
     * Preset code
     */
    const CODE = 'ithivehr';

    /**
     * Preset menu items structure array
     */
    const STRUCTURE = [
		'shown' => [
			'menu_teamwork' => [
				'menu_live_feed',
				'menu_im_messenger',
				'menu_calendar',
				'menu_documents',
				'menu_files',
				'menu_external_mail',
				'menu_all_groups',
			],
			'menu_tasks',
			'menu_crm_favorite',
			'menu_crm_store',
			'menu_marketing',
			'menu_sites',
			'menu_shop',
			'menu_sign',
			'menu_company',
			'menu_bizproc_sect',
			'menu_automation',
			'menu_marketplace_group' => [
				'menu_marketplace_sect',
				'menu_devops_sect',
			],
		],
		'hidden' => [
			'menu_timeman_sect',
			'menu_rpa',
			"menu_contact_center",
			"menu_crm_tracking",
			"menu_analytics",
			"menu-sale-center",
			"menu_openlines",
			"menu_telephony",
			"menu_ai",
			"menu_onec_sect",
			"menu_tariff",
			"menu_updates",
			'menu_knowledge',
			'menu_conference',
			'menu_configs_sect',
		]
	];
    /**
     * Maps which menu element corresponds to which module
     */
    const MODULES_SECTIONS = [
		'ithive.helpdesk' => '/helpdesk/',
		'ithive.knowledgebase' => '/knowledgebase/',
		'ithive.ipr' => '/university/',
		'ithive.assessment360' => '/assessment-360/list/',
		'ithive.goalsmanagement' => '/goals-management/',
		'ithive.gamification' => '/bonus/',
		'ithive.polls' => '/vote/',
		'ithive.workplaces' => '/company/seat-reservation/'
	];

    /**
     * Return preset name
     * @return string preset name
     */
    public function getName(): string
	{
		return 'IthiveHR';
	}

	/**
     * Return structure preset array based on STRUCTURE
     * @return array preset structure array
	 * @throws LoaderException
	 */
	public function getStructure(): array
	{
		$structure = self::STRUCTURE;
		$modules = array_reverse(self::MODULES_SECTIONS);
		foreach ($modules as $module => $section) {
			$section = crc32($section);
			if (Loader::includeModule($module)) {
				array_unshift($structure['shown'], $section);
			}
		}
		if (Loader::includeModule('ithive.homepage')) {
			array_unshift($structure['shown'], crc32('/proposals/'));
			array_unshift($structure['shown'], crc32('/mainpage/'));
		}
		return $structure;
	}

    /** Standard required function. Always returns true
     * @return bool
     */
    public static function isAvailable(): bool
	{
		return true;
	}
}