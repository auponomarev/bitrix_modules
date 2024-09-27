<?php

namespace Bitrix\Sign\Connector\Field;

use Bitrix\Sign\Connector\Crm\SmartDocument;
use Bitrix\Sign\Connector\MemberConnectorFactory;
use Bitrix\Sign\Contract;
use Bitrix\Sign\Item;
use Bitrix\Sign\Item\Connector\FieldCollection;
use Bitrix\Sign\Service\Container;
use Bitrix\Sign\Type\Field\EntityType;

class CrmEntity implements Contract\Connector
{
	private MemberConnectorFactory $memberConnectorFactory;
	private SmartDocument $documentConnector;

	public function __construct(
		private Item\Field $field,
		private Item\Member $member,
		?MemberConnectorFactory $memberConnectorFactory = null,
		?SmartDocument $documentConnector = null,
	)
	{
		$this->memberConnectorFactory = $memberConnectorFactory ?? Container::instance()->getMemberConnectorFactory();
		$this->documentConnector = $documentConnector
			?? new SmartDocument(
				Container::instance()->getDocumentRepository()
				->getById($this->member->documentId)->entityId)
		;
	}

	public function fetchFields(): FieldCollection
	{
		$result = new FieldCollection();
		if ($this->field->entityType === null)
		{
			return $result;
		}
		return match ($this->field->entityType)
		{
			EntityType::DOCUMENT => $this->fetchDocumentField(),
			EntityType::MEMBER => $this->fetchMemberField(),
		};
	}

	public function fetchMemberField(): FieldCollection
	{
		$memberConnector = $this->memberConnectorFactory->create($this->member);
		$fields = $memberConnector->fetchFields();
		$field = $fields->findFirst(fn (Item\Connector\Field $field) => $field->name === $this->field->entityCode
			&& Item\Connector\Field::isValueTypeSupported($field->data)
		);

		$result = new FieldCollection();
		if ($field !== null)
		{
			$result->add($field);
		}
		return $result;
	}

	public function fetchDocumentField(): FieldCollection
	{
		$fields = $this->documentConnector->fetchFields();
		$field = $fields->findFirst(fn (Item\Connector\Field $field) => $field->name === $this->field->entityCode
			&& Item\Connector\Field::isValueTypeSupported($field->data)
		);

		$result = new FieldCollection();
		if ($field !== null)
		{
			$result->add($field);
		}
		return $result;
	}
}