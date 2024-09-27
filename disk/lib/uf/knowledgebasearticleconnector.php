<?php

namespace Bitrix\Disk\Uf;

use Bitrix\Main\Loader;
use Bitrix\Disk\Ui;
use Bitrix\Main\LoaderException;
use Bitrix\Main\Localization\Loc;

final class KnowledgeBaseArticleConnector extends StubConnector
{
    private $canRead = false;
	protected static $pathToUser  = '/company/personal/user/#user_id#/';

	/**
	 * Required method to show message
	 * @todo checks user's rights to read element(perhaps)
	 * @param $userId
	 * @return true
	 * @throws LoaderException
	 */
	public function canRead($userId)
	{
		if (Loader::includeModule('ithive.knowledgebase'))
			$this->canRead = true;
		return $this->canRead;
	}

	/**
	 * Parent's required method
	 * @return array
	 */
	public function getDataToShow(): array
	{
		return $this->getDataToShowByUser($this->getUser()->getId());
	}

	/**
	 * Extended method to get data to who
	 * @param int $userId
	 * @return array
	 */
	public function getDataToShowForUser(int $userId): array
	{
		$dataToShow = $this->prepareDataToShow();
		return [
			'TITLE' => $dataToShow['NAME'],
			'DETAIL_URL' => $dataToShow['URL'],
			'DESCRIPTION' => $dataToShow['DESCRIPTION'],
			'MEMBERS' => $dataToShow['MEMBERS']
		];
	}

	/**
	 * Prepares data, custom method
	 * @return array
	 */
	protected function prepareDataToShow(): array
	{
		$result = [];
		$oArticle = \CIBlockElement::GetList([],['ID' => $this->entityId], false, false, ['NAME', 'IBLOCK_SECTION_ID', 'CREATED_BY', 'MODIFIED_BY']);
		if ($article = $oArticle->fetch()) {
			$result['NAME'] = Loc::getMessage('KNB_NAME') . $article['NAME'];
			$result['URL'] = '/knowledgebase/show/'.$this->entityId.'/';
			$result['DESCRIPTION'] = Loc::getMessage('KNB_SECTION') . self::getKBSectionName($article['IBLOCK_SECTION_ID']);
			$result['MEMBERS'] = $this->prepapreMembers($article['CREATED_BY'], $article['MODIFIED_BY']);
		}
		return $result;
	}

	/**
	 * Custom static method, gets  knowledgebase iblock sections
	 * @param $sectionId
	 * @return mixed|string
	 */
	private static function getKBSectionName($sectionId): mixed
	{
		$result = '';
		$oSection = \CIBlockSection::GetList([], ['ID' => $sectionId], false, ['NAME']);
		if ($section = $oSection->fetch()) {
			$result = $section['NAME'];
		}
		return $result;
	}

	/**
	 * Prepares member's data
	 * @param $created
	 * @param $modified
	 * @return array
	 */
	private function prepapreMembers($created, $modified = ''): array
	{
		$result = [];
		$members = [];
		if ($created === $modified || $modified == '' || $modified == null)
			$members[] = $created;
		else
			$members = [$created, $modified];
		if (!empty($members)) {
			foreach ($members as $member) {
				$user = \CUser::GetByID($member);
				if ($data = $user->fetch()) {
					$result[] = array(
						"NAME" => \CIntranetUtils::FormatName('#NAME# #LAST_NAME#', $data),
						"LINK" => \CComponentEngine::makePathFromTemplate($this->getPathToUser(), array("user_id" => $member)),
						'AVATAR_SRC' => UI\Avatar::getPerson($data['PERSONAL_PHOTO']),
						"IS_EXTRANET" => "N",
					);
				}
			}
		}
		return $result;
	}

	/**
	 * returns user cabinet url
	 * @return string
	 */
	public function getPathToUser(): string
	{
		return $this::$pathToUser;
	}

}