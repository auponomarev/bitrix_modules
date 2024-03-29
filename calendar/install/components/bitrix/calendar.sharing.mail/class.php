<?php

use Bitrix\Calendar\Sharing;
use Bitrix\Main\Localization\Loc;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

/**
 * mail template for
 * 'EVENT_NAME' => 'CALENDAR_SHARING'
 */
class CalendarSharingMailComponent extends CBitrixComponent
{
	protected const MEETING_STATUS_CREATED = 'created';
	protected const MEETING_STATUS_CANCELLED = 'cancelled';

	public function executeComponent()
	{
		Sharing\Helper::setSiteLanguage();

		$this->arParams['COMPONENT_PATH'] = $this->getPath();
		$status = $this->arParams['STATUS'];
		$this->prepareStatusPhrases($status);
		$this->arParams['IS_CREATED'] = $status === self::MEETING_STATUS_CREATED;
		$this->arParams['IS_CANCELLED'] = $status === self::MEETING_STATUS_CANCELLED;

		$this->prepareAvatars();

		$this->includeComponentTemplate();
	}

	protected function prepareStatusPhrases($status): void
	{
		if ($status === self::MEETING_STATUS_CREATED)
		{
			$this->arParams['ICON'] = $this->arParams['COMPONENT_PATH'] . '/templates/.default/images/calendar-sharing-email-icon-success.png';
			$this->arParams['ICON_BUTTON_CANCEL'] = $this->arParams['COMPONENT_PATH'] . '/templates/.default/images/calendar-sharing-email-icon-button-cancel-x2.png';
			$this->arParams['LOC_MEETING_STATUS'] = Loc::getMessage('CALENDAR_SHARING_MAIL_TITLE_CREATED');
		}
		if ($status === self::MEETING_STATUS_CANCELLED)
		{
			$this->arParams['ICON'] = $this->arParams['COMPONENT_PATH'] . '/templates/.default/images/calendar-sharing-email-icon-decline.png';
			$this->arParams['LOC_MEETING_STATUS'] = Loc::getMessage('CALENDAR_SHARING_MAIL_TITLE_CANCELLED');
		}

		$this->arParams['MAIL_BG_GRAY'] = $this->arParams['COMPONENT_PATH'] . '/templates/.default/images/calendar-sharing-email-bg-gray.jpg';
		$this->arParams['LOGO_RU'] = $this->arParams['COMPONENT_PATH'] . '/templates/.default/images/logo-ru-x2.png';
	}

	protected function prepareAvatars(): void
	{
		if (empty($this->arParams['AVATARS']))
		{
			return;
		}

		$maxAvatarsCount = 4;
		$avatars = explode(',', $this->arParams['AVATARS']);
		if (count($avatars) > $maxAvatarsCount)
		{
			$avatars = array_slice($avatars, 0, $maxAvatarsCount - 1);
			$this->arParams['SHOW_DOTS'] = true;
		}

		$this->arParams['AVATARS'] = array_map([$this, 'prepareAvatar'], $avatars);

		$this->arParams['ICON_DOTS'] = $this->arParams['COMPONENT_PATH'] . '/templates/.default/images/calendar-sharing-email-dots.png';
	}

	protected function prepareAvatar(string $avatar): string
	{
		if (trim($avatar) === '')
		{
			$avatar = $this->arParams['COMPONENT_PATH'] . '/templates/.default/images/ui-user.png';
		}

		return $avatar;
	}
}
