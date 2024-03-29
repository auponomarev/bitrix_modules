<?php

namespace Bitrix\Tasks\Internals\Counter;

use Bitrix\Tasks\Internals\Task\MemberTable;

class Role
{
	public const ALL = 'view_all';
	public const RESPONSIBLE = 'view_role_responsible';
	public const ACCOMPLICE = 'view_role_accomplice';
	public const AUDITOR = 'view_role_auditor';
	public const ORIGINATOR = 'view_role_originator';

	public const RESPONSIBLE_STATE = 'sR400';
	public const ACCOMPLICE_STATE = 'sR800';
	public const AUDITOR_STATE = 'sRc00';
	public const ORIGINATOR_STATE = 'sRg00';

	public const ROLE_MAP = [
		self::ALL => null,
		self::RESPONSIBLE => MemberTable::MEMBER_TYPE_RESPONSIBLE,
		self::ACCOMPLICE => MemberTable::MEMBER_TYPE_ACCOMPLICE,
		self::AUDITOR => MemberTable::MEMBER_TYPE_AUDITOR,
		self::ORIGINATOR => MemberTable::MEMBER_TYPE_ORIGINATOR
	];

	public const STATE_MAP = [
		self::RESPONSIBLE_STATE => self::RESPONSIBLE,
		self::ACCOMPLICE_STATE => self::ACCOMPLICE,
		self::AUDITOR_STATE => self::AUDITOR,
		self::ORIGINATOR_STATE => self::ORIGINATOR,
	];

	public static function getRoles()
	{
		static $roles = array();

		if (!$roles)
		{
			foreach (self::getKnownRoles() as $roleId => $roleCode)
			{
				$roles[$roleCode] = array(
					'ID' => $roleId,
					'CODE' => $roleCode,
					'TITLE' => self::getRoleName($roleId),
				);
			}
		}

		return $roles;
	}

	/**
	 * @return string[]
	 */
	private static function getKnownRoles(): array
	{
		return [
			\CTaskListState::VIEW_ROLE_RESPONSIBLE => self::RESPONSIBLE,
			\CTaskListState::VIEW_ROLE_ACCOMPLICE => self::ACCOMPLICE,
			\CTaskListState::VIEW_ROLE_ORIGINATOR => self::ORIGINATOR,
			\CTaskListState::VIEW_ROLE_AUDITOR => self::AUDITOR
		];
	}

	// \CTaskListState::getKnownRoles
	public static function getRoleName($roleId)
	{
		/** @noinspection PhpDeprecationInspection */
		return \CTaskListState::getRoleNameById($roleId);
	}

	public static function getByState(string $state): string
	{
		return static::STATE_MAP[$state] ?? '';
	}
}