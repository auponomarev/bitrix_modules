<?php

namespace Bitrix\Disk\Uf;

use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Bitrix\Main\Localization\Loc;
use Bitrix\Disk\Ui;
final class KnowledgeBaseArticleMessageConnector extends StubConnector
{
	private bool $canRead = false;
	protected static $pathToUser = '/company/personal/user/#user_id#/';

	/**
	 * Required method to show message
	 * @todo checks user's rights to read element(perhaps)
	 * @param $userId
	 * @return true
	 * @throws LoaderException
	 */
	public function canRead($userId): bool
	{
		if (Loader::includeModule('ithive.knowledgebase') || Loader::includeModule('forum'))
			$this->canRead = true;
		return $this->canRead;
	}

	/**
	 * Parent's required method
	 * @return array
	 */
	public function getDataToShow()
	{
		return $this->getDataToShowByUser($this->getUser()->getId());
	}

	/**
	 * Prepares data, custom method
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
		Loader::includeModule('forum');
		$forumMessage = \CForumMessage::GetByID($this->entityId);
		if (empty($forumMessage)) {
			return  [];
		}
		$documentId = str_replace("KNOWLEADGEBASE", "", $forumMessage["XML_ID"]);
		$oArticle = \CIBlockElement::GetList([],['ID' => $documentId], false, false, ['NAME', 'IBLOCK_SECTION_ID', 'CREATED_BY', 'MODIFIED_BY']);
		if ($article = $oArticle->fetch()) {
			$result['NAME'] = Loc::getMessage('KNB_ARTICLE_FORUM_MESSAGE') . $article['NAME'];
			$result['URL'] = '/knowledgebase/show/' . $documentId . '/?MID=' . $this->entityId . '#com' . $this->entityId;
			$result['DESCRIPTION'] = Loc::getMessage('KNB_ARTICLE_SECTION_FORUM_MESSAGE') . self::getKBSectionName($article['IBLOCK_SECTION_ID']);
			$result['MEMBERS'][] = $this->prepapreMembers($forumMessage['AUTHOR_ID']);
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
	private function prepapreMembers($author): array
	{
		$user = \CUser::GetByID($author);
		if ($data = $user->fetch()) {
			return [
				"NAME" => \CIntranetUtils::FormatName('#NAME# #LAST_NAME#', $data),
				"LINK" => \CComponentEngine::makePathFromTemplate($this->getPathToUser(), array("user_id" => $author)),
				'AVATAR_SRC' => UI\Avatar::getPerson($data['PERSONAL_PHOTO']),
				"IS_EXTRANET" => "N",
			];
		}
		return [];
	}

	/**
	 * returns user cabinet url
	 * @return string
	 */
	public function getPathToUser()
	{
		return $this::$pathToUser;
	}
}