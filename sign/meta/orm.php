<?php

/* ORMENTITYANNOTATION:Bitrix\Sign\Access\Permission\PermissionTable:sign\lib\Access\Permission\PermissionTable.php */
namespace Bitrix\Sign\Access\Permission {
	/**
	 * Permission
	 * @see \Bitrix\Sign\Access\Permission\PermissionTable
	 *
	 * Custom methods:
	 * ---------------
	 *
	 * @method \int getId()
	 * @method \Bitrix\Sign\Access\Permission\Permission setId(\int|\Bitrix\Main\DB\SqlExpression $id)
	 * @method bool hasId()
	 * @method bool isIdFilled()
	 * @method bool isIdChanged()
	 * @method \int getRoleId()
	 * @method \Bitrix\Sign\Access\Permission\Permission setRoleId(\int|\Bitrix\Main\DB\SqlExpression $roleId)
	 * @method bool hasRoleId()
	 * @method bool isRoleIdFilled()
	 * @method bool isRoleIdChanged()
	 * @method \int remindActualRoleId()
	 * @method \int requireRoleId()
	 * @method \Bitrix\Sign\Access\Permission\Permission resetRoleId()
	 * @method \Bitrix\Sign\Access\Permission\Permission unsetRoleId()
	 * @method \int fillRoleId()
	 * @method \string getPermissionId()
	 * @method \Bitrix\Sign\Access\Permission\Permission setPermissionId(\string|\Bitrix\Main\DB\SqlExpression $permissionId)
	 * @method bool hasPermissionId()
	 * @method bool isPermissionIdFilled()
	 * @method bool isPermissionIdChanged()
	 * @method \string remindActualPermissionId()
	 * @method \string requirePermissionId()
	 * @method \Bitrix\Sign\Access\Permission\Permission resetPermissionId()
	 * @method \Bitrix\Sign\Access\Permission\Permission unsetPermissionId()
	 * @method \string fillPermissionId()
	 * @method \string getValue()
	 * @method \Bitrix\Sign\Access\Permission\Permission setValue(\string|\Bitrix\Main\DB\SqlExpression $value)
	 * @method bool hasValue()
	 * @method bool isValueFilled()
	 * @method bool isValueChanged()
	 * @method \string remindActualValue()
	 * @method \string requireValue()
	 * @method \Bitrix\Sign\Access\Permission\Permission resetValue()
	 * @method \Bitrix\Sign\Access\Permission\Permission unsetValue()
	 * @method \string fillValue()
	 *
	 * Common methods:
	 * ---------------
	 *
	 * @property-read \Bitrix\Main\ORM\Entity $entity
	 * @property-read array $primary
	 * @property-read int $state @see \Bitrix\Main\ORM\Objectify\State
	 * @property-read \Bitrix\Main\Type\Dictionary $customData
	 * @property \Bitrix\Main\Authentication\Context $authContext
	 * @method mixed get($fieldName)
	 * @method mixed remindActual($fieldName)
	 * @method mixed require($fieldName)
	 * @method bool has($fieldName)
	 * @method bool isFilled($fieldName)
	 * @method bool isChanged($fieldName)
	 * @method \Bitrix\Sign\Access\Permission\Permission set($fieldName, $value)
	 * @method \Bitrix\Sign\Access\Permission\Permission reset($fieldName)
	 * @method \Bitrix\Sign\Access\Permission\Permission unset($fieldName)
	 * @method void addTo($fieldName, $value)
	 * @method void removeFrom($fieldName, $value)
	 * @method void removeAll($fieldName)
	 * @method \Bitrix\Main\ORM\Data\Result delete()
	 * @method void fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
	 * @method mixed[] collectValues($valuesType = \Bitrix\Main\ORM\Objectify\Values::ALL, $fieldsMask = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL)
	 * @method \Bitrix\Main\ORM\Data\AddResult|\Bitrix\Main\ORM\Data\UpdateResult|\Bitrix\Main\ORM\Data\Result save()
	 * @method static \Bitrix\Sign\Access\Permission\Permission wakeUp($data)
	 */
	class EO_Permission {
		/* @var \Bitrix\Sign\Access\Permission\PermissionTable */
		static public $dataClass = '\Bitrix\Sign\Access\Permission\PermissionTable';
		/**
		 * @param bool|array $setDefaultValues
		 */
		public function __construct($setDefaultValues = true) {}
	}
}
namespace Bitrix\Sign\Access\Permission {
	/**
	 * EO_Permission_Collection
	 *
	 * Custom methods:
	 * ---------------
	 *
	 * @method \int[] getIdList()
	 * @method \int[] getRoleIdList()
	 * @method \int[] fillRoleId()
	 * @method \string[] getPermissionIdList()
	 * @method \string[] fillPermissionId()
	 * @method \string[] getValueList()
	 * @method \string[] fillValue()
	 *
	 * Common methods:
	 * ---------------
	 *
	 * @property-read \Bitrix\Main\ORM\Entity $entity
	 * @method void add(\Bitrix\Sign\Access\Permission\Permission $object)
	 * @method bool has(\Bitrix\Sign\Access\Permission\Permission $object)
	 * @method bool hasByPrimary($primary)
	 * @method \Bitrix\Sign\Access\Permission\Permission getByPrimary($primary)
	 * @method \Bitrix\Sign\Access\Permission\Permission[] getAll()
	 * @method bool remove(\Bitrix\Sign\Access\Permission\Permission $object)
	 * @method void removeByPrimary($primary)
	 * @method void fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
	 * @method static \Bitrix\Sign\Access\Permission\EO_Permission_Collection wakeUp($data)
	 * @method \Bitrix\Main\ORM\Data\Result save($ignoreEvents = false)
	 * @method void offsetSet() ArrayAccess
	 * @method void offsetExists() ArrayAccess
	 * @method void offsetUnset() ArrayAccess
	 * @method void offsetGet() ArrayAccess
	 * @method void rewind() Iterator
	 * @method \Bitrix\Sign\Access\Permission\Permission current() Iterator
	 * @method mixed key() Iterator
	 * @method void next() Iterator
	 * @method bool valid() Iterator
	 * @method int count() Countable
	 * @method EO_Permission_Collection merge(?EO_Permission_Collection $collection)
	 * @method bool isEmpty()
	 */
	class EO_Permission_Collection implements \ArrayAccess, \Iterator, \Countable {
		/* @var \Bitrix\Sign\Access\Permission\PermissionTable */
		static public $dataClass = '\Bitrix\Sign\Access\Permission\PermissionTable';
	}
}
namespace Bitrix\Sign\Access\Permission {
	/**
	 * Common methods:
	 * ---------------
	 *
	 * @method EO_Permission_Result exec()
	 * @method \Bitrix\Sign\Access\Permission\Permission fetchObject()
	 * @method \Bitrix\Sign\Access\Permission\EO_Permission_Collection fetchCollection()
	 *
	 * Custom methods:
	 * ---------------
	 *
	 */
	class EO_Permission_Query extends \Bitrix\Main\ORM\Query\Query {}
	/**
	 * @method \Bitrix\Sign\Access\Permission\Permission fetchObject()
	 * @method \Bitrix\Sign\Access\Permission\EO_Permission_Collection fetchCollection()
	 */
	class EO_Permission_Result extends \Bitrix\Main\ORM\Query\Result {}
	/**
	 * @method \Bitrix\Sign\Access\Permission\Permission createObject($setDefaultValues = true)
	 * @method \Bitrix\Sign\Access\Permission\EO_Permission_Collection createCollection()
	 * @method \Bitrix\Sign\Access\Permission\Permission wakeUpObject($row)
	 * @method \Bitrix\Sign\Access\Permission\EO_Permission_Collection wakeUpCollection($rows)
	 */
	class EO_Permission_Entity extends \Bitrix\Main\ORM\Entity {}
}
/* ORMENTITYANNOTATION:Bitrix\Sign\Internal\BlankTable:sign\lib\internal\blanktable.php */
namespace Bitrix\Sign\Internal {
	/**
	 * Blank
	 * @see \Bitrix\Sign\Internal\BlankTable
	 *
	 * Custom methods:
	 * ---------------
	 *
	 * @method \int getId()
	 * @method \Bitrix\Sign\Internal\Blank setId(\int|\Bitrix\Main\DB\SqlExpression $id)
	 * @method bool hasId()
	 * @method bool isIdFilled()
	 * @method bool isIdChanged()
	 * @method \string getTitle()
	 * @method \Bitrix\Sign\Internal\Blank setTitle(\string|\Bitrix\Main\DB\SqlExpression $title)
	 * @method bool hasTitle()
	 * @method bool isTitleFilled()
	 * @method bool isTitleChanged()
	 * @method \string remindActualTitle()
	 * @method \string requireTitle()
	 * @method \Bitrix\Sign\Internal\Blank resetTitle()
	 * @method \Bitrix\Sign\Internal\Blank unsetTitle()
	 * @method \string fillTitle()
	 * @method \int getExternalId()
	 * @method \Bitrix\Sign\Internal\Blank setExternalId(\int|\Bitrix\Main\DB\SqlExpression $externalId)
	 * @method bool hasExternalId()
	 * @method bool isExternalIdFilled()
	 * @method bool isExternalIdChanged()
	 * @method \int remindActualExternalId()
	 * @method \int requireExternalId()
	 * @method \Bitrix\Sign\Internal\Blank resetExternalId()
	 * @method \Bitrix\Sign\Internal\Blank unsetExternalId()
	 * @method \int fillExternalId()
	 * @method \string getHost()
	 * @method \Bitrix\Sign\Internal\Blank setHost(\string|\Bitrix\Main\DB\SqlExpression $host)
	 * @method bool hasHost()
	 * @method bool isHostFilled()
	 * @method bool isHostChanged()
	 * @method \string remindActualHost()
	 * @method \string requireHost()
	 * @method \Bitrix\Sign\Internal\Blank resetHost()
	 * @method \Bitrix\Sign\Internal\Blank unsetHost()
	 * @method \string fillHost()
	 * @method \string getStatus()
	 * @method \Bitrix\Sign\Internal\Blank setStatus(\string|\Bitrix\Main\DB\SqlExpression $status)
	 * @method bool hasStatus()
	 * @method bool isStatusFilled()
	 * @method bool isStatusChanged()
	 * @method \string remindActualStatus()
	 * @method \string requireStatus()
	 * @method \Bitrix\Sign\Internal\Blank resetStatus()
	 * @method \Bitrix\Sign\Internal\Blank unsetStatus()
	 * @method \string fillStatus()
	 * @method array getFileId()
	 * @method \Bitrix\Sign\Internal\Blank setFileId(array|\Bitrix\Main\DB\SqlExpression $fileId)
	 * @method bool hasFileId()
	 * @method bool isFileIdFilled()
	 * @method bool isFileIdChanged()
	 * @method array remindActualFileId()
	 * @method array requireFileId()
	 * @method \Bitrix\Sign\Internal\Blank resetFileId()
	 * @method \Bitrix\Sign\Internal\Blank unsetFileId()
	 * @method array fillFileId()
	 * @method \string getConverted()
	 * @method \Bitrix\Sign\Internal\Blank setConverted(\string|\Bitrix\Main\DB\SqlExpression $converted)
	 * @method bool hasConverted()
	 * @method bool isConvertedFilled()
	 * @method bool isConvertedChanged()
	 * @method \string remindActualConverted()
	 * @method \string requireConverted()
	 * @method \Bitrix\Sign\Internal\Blank resetConverted()
	 * @method \Bitrix\Sign\Internal\Blank unsetConverted()
	 * @method \string fillConverted()
	 * @method \int getCreatedById()
	 * @method \Bitrix\Sign\Internal\Blank setCreatedById(\int|\Bitrix\Main\DB\SqlExpression $createdById)
	 * @method bool hasCreatedById()
	 * @method bool isCreatedByIdFilled()
	 * @method bool isCreatedByIdChanged()
	 * @method \int remindActualCreatedById()
	 * @method \int requireCreatedById()
	 * @method \Bitrix\Sign\Internal\Blank resetCreatedById()
	 * @method \Bitrix\Sign\Internal\Blank unsetCreatedById()
	 * @method \int fillCreatedById()
	 * @method \int getModifiedById()
	 * @method \Bitrix\Sign\Internal\Blank setModifiedById(\int|\Bitrix\Main\DB\SqlExpression $modifiedById)
	 * @method bool hasModifiedById()
	 * @method bool isModifiedByIdFilled()
	 * @method bool isModifiedByIdChanged()
	 * @method \int remindActualModifiedById()
	 * @method \int requireModifiedById()
	 * @method \Bitrix\Sign\Internal\Blank resetModifiedById()
	 * @method \Bitrix\Sign\Internal\Blank unsetModifiedById()
	 * @method \int fillModifiedById()
	 * @method \Bitrix\Main\Type\DateTime getDateCreate()
	 * @method \Bitrix\Sign\Internal\Blank setDateCreate(\Bitrix\Main\Type\DateTime|\Bitrix\Main\DB\SqlExpression $dateCreate)
	 * @method bool hasDateCreate()
	 * @method bool isDateCreateFilled()
	 * @method bool isDateCreateChanged()
	 * @method \Bitrix\Main\Type\DateTime remindActualDateCreate()
	 * @method \Bitrix\Main\Type\DateTime requireDateCreate()
	 * @method \Bitrix\Sign\Internal\Blank resetDateCreate()
	 * @method \Bitrix\Sign\Internal\Blank unsetDateCreate()
	 * @method \Bitrix\Main\Type\DateTime fillDateCreate()
	 * @method \Bitrix\Main\Type\DateTime getDateModify()
	 * @method \Bitrix\Sign\Internal\Blank setDateModify(\Bitrix\Main\Type\DateTime|\Bitrix\Main\DB\SqlExpression $dateModify)
	 * @method bool hasDateModify()
	 * @method bool isDateModifyFilled()
	 * @method bool isDateModifyChanged()
	 * @method \Bitrix\Main\Type\DateTime remindActualDateModify()
	 * @method \Bitrix\Main\Type\DateTime requireDateModify()
	 * @method \Bitrix\Sign\Internal\Blank resetDateModify()
	 * @method \Bitrix\Sign\Internal\Blank unsetDateModify()
	 * @method \Bitrix\Main\Type\DateTime fillDateModify()
	 *
	 * Common methods:
	 * ---------------
	 *
	 * @property-read \Bitrix\Main\ORM\Entity $entity
	 * @property-read array $primary
	 * @property-read int $state @see \Bitrix\Main\ORM\Objectify\State
	 * @property-read \Bitrix\Main\Type\Dictionary $customData
	 * @property \Bitrix\Main\Authentication\Context $authContext
	 * @method mixed get($fieldName)
	 * @method mixed remindActual($fieldName)
	 * @method mixed require($fieldName)
	 * @method bool has($fieldName)
	 * @method bool isFilled($fieldName)
	 * @method bool isChanged($fieldName)
	 * @method \Bitrix\Sign\Internal\Blank set($fieldName, $value)
	 * @method \Bitrix\Sign\Internal\Blank reset($fieldName)
	 * @method \Bitrix\Sign\Internal\Blank unset($fieldName)
	 * @method void addTo($fieldName, $value)
	 * @method void removeFrom($fieldName, $value)
	 * @method void removeAll($fieldName)
	 * @method \Bitrix\Main\ORM\Data\Result delete()
	 * @method void fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
	 * @method mixed[] collectValues($valuesType = \Bitrix\Main\ORM\Objectify\Values::ALL, $fieldsMask = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL)
	 * @method \Bitrix\Main\ORM\Data\AddResult|\Bitrix\Main\ORM\Data\UpdateResult|\Bitrix\Main\ORM\Data\Result save()
	 * @method static \Bitrix\Sign\Internal\Blank wakeUp($data)
	 */
	class EO_Blank {
		/* @var \Bitrix\Sign\Internal\BlankTable */
		static public $dataClass = '\Bitrix\Sign\Internal\BlankTable';
		/**
		 * @param bool|array $setDefaultValues
		 */
		public function __construct($setDefaultValues = true) {}
	}
}
namespace Bitrix\Sign\Internal {
	/**
	 * BlankCollection
	 *
	 * Custom methods:
	 * ---------------
	 *
	 * @method \int[] getIdList()
	 * @method \string[] getTitleList()
	 * @method \string[] fillTitle()
	 * @method \int[] getExternalIdList()
	 * @method \int[] fillExternalId()
	 * @method \string[] getHostList()
	 * @method \string[] fillHost()
	 * @method \string[] getStatusList()
	 * @method \string[] fillStatus()
	 * @method array[] getFileIdList()
	 * @method array[] fillFileId()
	 * @method \string[] getConvertedList()
	 * @method \string[] fillConverted()
	 * @method \int[] getCreatedByIdList()
	 * @method \int[] fillCreatedById()
	 * @method \int[] getModifiedByIdList()
	 * @method \int[] fillModifiedById()
	 * @method \Bitrix\Main\Type\DateTime[] getDateCreateList()
	 * @method \Bitrix\Main\Type\DateTime[] fillDateCreate()
	 * @method \Bitrix\Main\Type\DateTime[] getDateModifyList()
	 * @method \Bitrix\Main\Type\DateTime[] fillDateModify()
	 *
	 * Common methods:
	 * ---------------
	 *
	 * @property-read \Bitrix\Main\ORM\Entity $entity
	 * @method void add(\Bitrix\Sign\Internal\Blank $object)
	 * @method bool has(\Bitrix\Sign\Internal\Blank $object)
	 * @method bool hasByPrimary($primary)
	 * @method \Bitrix\Sign\Internal\Blank getByPrimary($primary)
	 * @method \Bitrix\Sign\Internal\Blank[] getAll()
	 * @method bool remove(\Bitrix\Sign\Internal\Blank $object)
	 * @method void removeByPrimary($primary)
	 * @method void fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
	 * @method static \Bitrix\Sign\Internal\BlankCollection wakeUp($data)
	 * @method \Bitrix\Main\ORM\Data\Result save($ignoreEvents = false)
	 * @method void offsetSet() ArrayAccess
	 * @method void offsetExists() ArrayAccess
	 * @method void offsetUnset() ArrayAccess
	 * @method void offsetGet() ArrayAccess
	 * @method void rewind() Iterator
	 * @method \Bitrix\Sign\Internal\Blank current() Iterator
	 * @method mixed key() Iterator
	 * @method void next() Iterator
	 * @method bool valid() Iterator
	 * @method int count() Countable
	 * @method BlankCollection merge(?BlankCollection $collection)
	 * @method bool isEmpty()
	 */
	class EO_Blank_Collection implements \ArrayAccess, \Iterator, \Countable {
		/* @var \Bitrix\Sign\Internal\BlankTable */
		static public $dataClass = '\Bitrix\Sign\Internal\BlankTable';
	}
}
namespace Bitrix\Sign\Internal {
	/**
	 * Common methods:
	 * ---------------
	 *
	 * @method EO_Blank_Result exec()
	 * @method \Bitrix\Sign\Internal\Blank fetchObject()
	 * @method \Bitrix\Sign\Internal\BlankCollection fetchCollection()
	 *
	 * Custom methods:
	 * ---------------
	 *
	 */
	class EO_Blank_Query extends \Bitrix\Main\ORM\Query\Query {}
	/**
	 * @method \Bitrix\Sign\Internal\Blank fetchObject()
	 * @method \Bitrix\Sign\Internal\BlankCollection fetchCollection()
	 */
	class EO_Blank_Result extends \Bitrix\Main\ORM\Query\Result {}
	/**
	 * @method \Bitrix\Sign\Internal\Blank createObject($setDefaultValues = true)
	 * @method \Bitrix\Sign\Internal\BlankCollection createCollection()
	 * @method \Bitrix\Sign\Internal\Blank wakeUpObject($row)
	 * @method \Bitrix\Sign\Internal\BlankCollection wakeUpCollection($rows)
	 */
	class EO_Blank_Entity extends \Bitrix\Main\ORM\Entity {}
}
/* ORMENTITYANNOTATION:Bitrix\Sign\Internal\BlockTable:sign\lib\internal\blocktable.php */
namespace Bitrix\Sign\Internal {
	/**
	 * Block
	 * @see \Bitrix\Sign\Internal\BlockTable
	 *
	 * Custom methods:
	 * ---------------
	 *
	 * @method \int getId()
	 * @method \Bitrix\Sign\Internal\Block setId(\int|\Bitrix\Main\DB\SqlExpression $id)
	 * @method bool hasId()
	 * @method bool isIdFilled()
	 * @method bool isIdChanged()
	 * @method \string getCode()
	 * @method \Bitrix\Sign\Internal\Block setCode(\string|\Bitrix\Main\DB\SqlExpression $code)
	 * @method bool hasCode()
	 * @method bool isCodeFilled()
	 * @method bool isCodeChanged()
	 * @method \string remindActualCode()
	 * @method \string requireCode()
	 * @method \Bitrix\Sign\Internal\Block resetCode()
	 * @method \Bitrix\Sign\Internal\Block unsetCode()
	 * @method \string fillCode()
	 * @method \string getType()
	 * @method \Bitrix\Sign\Internal\Block setType(\string|\Bitrix\Main\DB\SqlExpression $type)
	 * @method bool hasType()
	 * @method bool isTypeFilled()
	 * @method bool isTypeChanged()
	 * @method \string remindActualType()
	 * @method \string requireType()
	 * @method \Bitrix\Sign\Internal\Block resetType()
	 * @method \Bitrix\Sign\Internal\Block unsetType()
	 * @method \string fillType()
	 * @method \int getBlankId()
	 * @method \Bitrix\Sign\Internal\Block setBlankId(\int|\Bitrix\Main\DB\SqlExpression $blankId)
	 * @method bool hasBlankId()
	 * @method bool isBlankIdFilled()
	 * @method bool isBlankIdChanged()
	 * @method \int remindActualBlankId()
	 * @method \int requireBlankId()
	 * @method \Bitrix\Sign\Internal\Block resetBlankId()
	 * @method \Bitrix\Sign\Internal\Block unsetBlankId()
	 * @method \int fillBlankId()
	 * @method array getPosition()
	 * @method \Bitrix\Sign\Internal\Block setPosition(array|\Bitrix\Main\DB\SqlExpression $position)
	 * @method bool hasPosition()
	 * @method bool isPositionFilled()
	 * @method bool isPositionChanged()
	 * @method array remindActualPosition()
	 * @method array requirePosition()
	 * @method \Bitrix\Sign\Internal\Block resetPosition()
	 * @method \Bitrix\Sign\Internal\Block unsetPosition()
	 * @method array fillPosition()
	 * @method array getStyle()
	 * @method \Bitrix\Sign\Internal\Block setStyle(array|\Bitrix\Main\DB\SqlExpression $style)
	 * @method bool hasStyle()
	 * @method bool isStyleFilled()
	 * @method bool isStyleChanged()
	 * @method array remindActualStyle()
	 * @method array requireStyle()
	 * @method \Bitrix\Sign\Internal\Block resetStyle()
	 * @method \Bitrix\Sign\Internal\Block unsetStyle()
	 * @method array fillStyle()
	 * @method array getData()
	 * @method \Bitrix\Sign\Internal\Block setData(array|\Bitrix\Main\DB\SqlExpression $data)
	 * @method bool hasData()
	 * @method bool isDataFilled()
	 * @method bool isDataChanged()
	 * @method array remindActualData()
	 * @method array requireData()
	 * @method \Bitrix\Sign\Internal\Block resetData()
	 * @method \Bitrix\Sign\Internal\Block unsetData()
	 * @method array fillData()
	 * @method \int getPart()
	 * @method \Bitrix\Sign\Internal\Block setPart(\int|\Bitrix\Main\DB\SqlExpression $part)
	 * @method bool hasPart()
	 * @method bool isPartFilled()
	 * @method bool isPartChanged()
	 * @method \int remindActualPart()
	 * @method \int requirePart()
	 * @method \Bitrix\Sign\Internal\Block resetPart()
	 * @method \Bitrix\Sign\Internal\Block unsetPart()
	 * @method \int fillPart()
	 * @method \int getCreatedById()
	 * @method \Bitrix\Sign\Internal\Block setCreatedById(\int|\Bitrix\Main\DB\SqlExpression $createdById)
	 * @method bool hasCreatedById()
	 * @method bool isCreatedByIdFilled()
	 * @method bool isCreatedByIdChanged()
	 * @method \int remindActualCreatedById()
	 * @method \int requireCreatedById()
	 * @method \Bitrix\Sign\Internal\Block resetCreatedById()
	 * @method \Bitrix\Sign\Internal\Block unsetCreatedById()
	 * @method \int fillCreatedById()
	 * @method \int getModifiedById()
	 * @method \Bitrix\Sign\Internal\Block setModifiedById(\int|\Bitrix\Main\DB\SqlExpression $modifiedById)
	 * @method bool hasModifiedById()
	 * @method bool isModifiedByIdFilled()
	 * @method bool isModifiedByIdChanged()
	 * @method \int remindActualModifiedById()
	 * @method \int requireModifiedById()
	 * @method \Bitrix\Sign\Internal\Block resetModifiedById()
	 * @method \Bitrix\Sign\Internal\Block unsetModifiedById()
	 * @method \int fillModifiedById()
	 * @method \Bitrix\Main\Type\DateTime getDateCreate()
	 * @method \Bitrix\Sign\Internal\Block setDateCreate(\Bitrix\Main\Type\DateTime|\Bitrix\Main\DB\SqlExpression $dateCreate)
	 * @method bool hasDateCreate()
	 * @method bool isDateCreateFilled()
	 * @method bool isDateCreateChanged()
	 * @method \Bitrix\Main\Type\DateTime remindActualDateCreate()
	 * @method \Bitrix\Main\Type\DateTime requireDateCreate()
	 * @method \Bitrix\Sign\Internal\Block resetDateCreate()
	 * @method \Bitrix\Sign\Internal\Block unsetDateCreate()
	 * @method \Bitrix\Main\Type\DateTime fillDateCreate()
	 * @method \Bitrix\Main\Type\DateTime getDateModify()
	 * @method \Bitrix\Sign\Internal\Block setDateModify(\Bitrix\Main\Type\DateTime|\Bitrix\Main\DB\SqlExpression $dateModify)
	 * @method bool hasDateModify()
	 * @method bool isDateModifyFilled()
	 * @method bool isDateModifyChanged()
	 * @method \Bitrix\Main\Type\DateTime remindActualDateModify()
	 * @method \Bitrix\Main\Type\DateTime requireDateModify()
	 * @method \Bitrix\Sign\Internal\Block resetDateModify()
	 * @method \Bitrix\Sign\Internal\Block unsetDateModify()
	 * @method \Bitrix\Main\Type\DateTime fillDateModify()
	 *
	 * Common methods:
	 * ---------------
	 *
	 * @property-read \Bitrix\Main\ORM\Entity $entity
	 * @property-read array $primary
	 * @property-read int $state @see \Bitrix\Main\ORM\Objectify\State
	 * @property-read \Bitrix\Main\Type\Dictionary $customData
	 * @property \Bitrix\Main\Authentication\Context $authContext
	 * @method mixed get($fieldName)
	 * @method mixed remindActual($fieldName)
	 * @method mixed require($fieldName)
	 * @method bool has($fieldName)
	 * @method bool isFilled($fieldName)
	 * @method bool isChanged($fieldName)
	 * @method \Bitrix\Sign\Internal\Block set($fieldName, $value)
	 * @method \Bitrix\Sign\Internal\Block reset($fieldName)
	 * @method \Bitrix\Sign\Internal\Block unset($fieldName)
	 * @method void addTo($fieldName, $value)
	 * @method void removeFrom($fieldName, $value)
	 * @method void removeAll($fieldName)
	 * @method \Bitrix\Main\ORM\Data\Result delete()
	 * @method void fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
	 * @method mixed[] collectValues($valuesType = \Bitrix\Main\ORM\Objectify\Values::ALL, $fieldsMask = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL)
	 * @method \Bitrix\Main\ORM\Data\AddResult|\Bitrix\Main\ORM\Data\UpdateResult|\Bitrix\Main\ORM\Data\Result save()
	 * @method static \Bitrix\Sign\Internal\Block wakeUp($data)
	 */
	class EO_Block {
		/* @var \Bitrix\Sign\Internal\BlockTable */
		static public $dataClass = '\Bitrix\Sign\Internal\BlockTable';
		/**
		 * @param bool|array $setDefaultValues
		 */
		public function __construct($setDefaultValues = true) {}
	}
}
namespace Bitrix\Sign\Internal {
	/**
	 * BlockCollection
	 *
	 * Custom methods:
	 * ---------------
	 *
	 * @method \int[] getIdList()
	 * @method \string[] getCodeList()
	 * @method \string[] fillCode()
	 * @method \string[] getTypeList()
	 * @method \string[] fillType()
	 * @method \int[] getBlankIdList()
	 * @method \int[] fillBlankId()
	 * @method array[] getPositionList()
	 * @method array[] fillPosition()
	 * @method array[] getStyleList()
	 * @method array[] fillStyle()
	 * @method array[] getDataList()
	 * @method array[] fillData()
	 * @method \int[] getPartList()
	 * @method \int[] fillPart()
	 * @method \int[] getCreatedByIdList()
	 * @method \int[] fillCreatedById()
	 * @method \int[] getModifiedByIdList()
	 * @method \int[] fillModifiedById()
	 * @method \Bitrix\Main\Type\DateTime[] getDateCreateList()
	 * @method \Bitrix\Main\Type\DateTime[] fillDateCreate()
	 * @method \Bitrix\Main\Type\DateTime[] getDateModifyList()
	 * @method \Bitrix\Main\Type\DateTime[] fillDateModify()
	 *
	 * Common methods:
	 * ---------------
	 *
	 * @property-read \Bitrix\Main\ORM\Entity $entity
	 * @method void add(\Bitrix\Sign\Internal\Block $object)
	 * @method bool has(\Bitrix\Sign\Internal\Block $object)
	 * @method bool hasByPrimary($primary)
	 * @method \Bitrix\Sign\Internal\Block getByPrimary($primary)
	 * @method \Bitrix\Sign\Internal\Block[] getAll()
	 * @method bool remove(\Bitrix\Sign\Internal\Block $object)
	 * @method void removeByPrimary($primary)
	 * @method void fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
	 * @method static \Bitrix\Sign\Internal\BlockCollection wakeUp($data)
	 * @method \Bitrix\Main\ORM\Data\Result save($ignoreEvents = false)
	 * @method void offsetSet() ArrayAccess
	 * @method void offsetExists() ArrayAccess
	 * @method void offsetUnset() ArrayAccess
	 * @method void offsetGet() ArrayAccess
	 * @method void rewind() Iterator
	 * @method \Bitrix\Sign\Internal\Block current() Iterator
	 * @method mixed key() Iterator
	 * @method void next() Iterator
	 * @method bool valid() Iterator
	 * @method int count() Countable
	 * @method BlockCollection merge(?BlockCollection $collection)
	 * @method bool isEmpty()
	 */
	class EO_Block_Collection implements \ArrayAccess, \Iterator, \Countable {
		/* @var \Bitrix\Sign\Internal\BlockTable */
		static public $dataClass = '\Bitrix\Sign\Internal\BlockTable';
	}
}
namespace Bitrix\Sign\Internal {
	/**
	 * Common methods:
	 * ---------------
	 *
	 * @method EO_Block_Result exec()
	 * @method \Bitrix\Sign\Internal\Block fetchObject()
	 * @method \Bitrix\Sign\Internal\BlockCollection fetchCollection()
	 *
	 * Custom methods:
	 * ---------------
	 *
	 */
	class EO_Block_Query extends \Bitrix\Main\ORM\Query\Query {}
	/**
	 * @method \Bitrix\Sign\Internal\Block fetchObject()
	 * @method \Bitrix\Sign\Internal\BlockCollection fetchCollection()
	 */
	class EO_Block_Result extends \Bitrix\Main\ORM\Query\Result {}
	/**
	 * @method \Bitrix\Sign\Internal\Block createObject($setDefaultValues = true)
	 * @method \Bitrix\Sign\Internal\BlockCollection createCollection()
	 * @method \Bitrix\Sign\Internal\Block wakeUpObject($row)
	 * @method \Bitrix\Sign\Internal\BlockCollection wakeUpCollection($rows)
	 */
	class EO_Block_Entity extends \Bitrix\Main\ORM\Entity {}
}
/* ORMENTITYANNOTATION:Bitrix\Sign\Internal\DocumentTable:sign\lib\internal\documenttable.php */
namespace Bitrix\Sign\Internal {
	/**
	 * Document
	 * @see \Bitrix\Sign\Internal\DocumentTable
	 *
	 * Custom methods:
	 * ---------------
	 *
	 * @method \int getId()
	 * @method \Bitrix\Sign\Internal\Document setId(\int|\Bitrix\Main\DB\SqlExpression $id)
	 * @method bool hasId()
	 * @method bool isIdFilled()
	 * @method bool isIdChanged()
	 * @method \string getTitle()
	 * @method \Bitrix\Sign\Internal\Document setTitle(\string|\Bitrix\Main\DB\SqlExpression $title)
	 * @method bool hasTitle()
	 * @method bool isTitleFilled()
	 * @method bool isTitleChanged()
	 * @method \string remindActualTitle()
	 * @method \string requireTitle()
	 * @method \Bitrix\Sign\Internal\Document resetTitle()
	 * @method \Bitrix\Sign\Internal\Document unsetTitle()
	 * @method \string fillTitle()
	 * @method \string getHash()
	 * @method \Bitrix\Sign\Internal\Document setHash(\string|\Bitrix\Main\DB\SqlExpression $hash)
	 * @method bool hasHash()
	 * @method bool isHashFilled()
	 * @method bool isHashChanged()
	 * @method \string remindActualHash()
	 * @method \string requireHash()
	 * @method \Bitrix\Sign\Internal\Document resetHash()
	 * @method \Bitrix\Sign\Internal\Document unsetHash()
	 * @method \string fillHash()
	 * @method \string getSecCode()
	 * @method \Bitrix\Sign\Internal\Document setSecCode(\string|\Bitrix\Main\DB\SqlExpression $secCode)
	 * @method bool hasSecCode()
	 * @method bool isSecCodeFilled()
	 * @method bool isSecCodeChanged()
	 * @method \string remindActualSecCode()
	 * @method \string requireSecCode()
	 * @method \Bitrix\Sign\Internal\Document resetSecCode()
	 * @method \Bitrix\Sign\Internal\Document unsetSecCode()
	 * @method \string fillSecCode()
	 * @method \string getHost()
	 * @method \Bitrix\Sign\Internal\Document setHost(\string|\Bitrix\Main\DB\SqlExpression $host)
	 * @method bool hasHost()
	 * @method bool isHostFilled()
	 * @method bool isHostChanged()
	 * @method \string remindActualHost()
	 * @method \string requireHost()
	 * @method \Bitrix\Sign\Internal\Document resetHost()
	 * @method \Bitrix\Sign\Internal\Document unsetHost()
	 * @method \string fillHost()
	 * @method \int getBlankId()
	 * @method \Bitrix\Sign\Internal\Document setBlankId(\int|\Bitrix\Main\DB\SqlExpression $blankId)
	 * @method bool hasBlankId()
	 * @method bool isBlankIdFilled()
	 * @method bool isBlankIdChanged()
	 * @method \int remindActualBlankId()
	 * @method \int requireBlankId()
	 * @method \Bitrix\Sign\Internal\Document resetBlankId()
	 * @method \Bitrix\Sign\Internal\Document unsetBlankId()
	 * @method \int fillBlankId()
	 * @method \string getEntityType()
	 * @method \Bitrix\Sign\Internal\Document setEntityType(\string|\Bitrix\Main\DB\SqlExpression $entityType)
	 * @method bool hasEntityType()
	 * @method bool isEntityTypeFilled()
	 * @method bool isEntityTypeChanged()
	 * @method \string remindActualEntityType()
	 * @method \string requireEntityType()
	 * @method \Bitrix\Sign\Internal\Document resetEntityType()
	 * @method \Bitrix\Sign\Internal\Document unsetEntityType()
	 * @method \string fillEntityType()
	 * @method \int getEntityId()
	 * @method \Bitrix\Sign\Internal\Document setEntityId(\int|\Bitrix\Main\DB\SqlExpression $entityId)
	 * @method bool hasEntityId()
	 * @method bool isEntityIdFilled()
	 * @method bool isEntityIdChanged()
	 * @method \int remindActualEntityId()
	 * @method \int requireEntityId()
	 * @method \Bitrix\Sign\Internal\Document resetEntityId()
	 * @method \Bitrix\Sign\Internal\Document unsetEntityId()
	 * @method \int fillEntityId()
	 * @method array getMeta()
	 * @method \Bitrix\Sign\Internal\Document setMeta(array|\Bitrix\Main\DB\SqlExpression $meta)
	 * @method bool hasMeta()
	 * @method bool isMetaFilled()
	 * @method bool isMetaChanged()
	 * @method array remindActualMeta()
	 * @method array requireMeta()
	 * @method \Bitrix\Sign\Internal\Document resetMeta()
	 * @method \Bitrix\Sign\Internal\Document unsetMeta()
	 * @method array fillMeta()
	 * @method \string getProcessingStatus()
	 * @method \Bitrix\Sign\Internal\Document setProcessingStatus(\string|\Bitrix\Main\DB\SqlExpression $processingStatus)
	 * @method bool hasProcessingStatus()
	 * @method bool isProcessingStatusFilled()
	 * @method bool isProcessingStatusChanged()
	 * @method \string remindActualProcessingStatus()
	 * @method \string requireProcessingStatus()
	 * @method \Bitrix\Sign\Internal\Document resetProcessingStatus()
	 * @method \Bitrix\Sign\Internal\Document unsetProcessingStatus()
	 * @method \string fillProcessingStatus()
	 * @method \string getProcessingError()
	 * @method \Bitrix\Sign\Internal\Document setProcessingError(\string|\Bitrix\Main\DB\SqlExpression $processingError)
	 * @method bool hasProcessingError()
	 * @method bool isProcessingErrorFilled()
	 * @method bool isProcessingErrorChanged()
	 * @method \string remindActualProcessingError()
	 * @method \string requireProcessingError()
	 * @method \Bitrix\Sign\Internal\Document resetProcessingError()
	 * @method \Bitrix\Sign\Internal\Document unsetProcessingError()
	 * @method \string fillProcessingError()
	 * @method \string getLangId()
	 * @method \Bitrix\Sign\Internal\Document setLangId(\string|\Bitrix\Main\DB\SqlExpression $langId)
	 * @method bool hasLangId()
	 * @method bool isLangIdFilled()
	 * @method bool isLangIdChanged()
	 * @method \string remindActualLangId()
	 * @method \string requireLangId()
	 * @method \Bitrix\Sign\Internal\Document resetLangId()
	 * @method \Bitrix\Sign\Internal\Document unsetLangId()
	 * @method \string fillLangId()
	 * @method \int getResultFileId()
	 * @method \Bitrix\Sign\Internal\Document setResultFileId(\int|\Bitrix\Main\DB\SqlExpression $resultFileId)
	 * @method bool hasResultFileId()
	 * @method bool isResultFileIdFilled()
	 * @method bool isResultFileIdChanged()
	 * @method \int remindActualResultFileId()
	 * @method \int requireResultFileId()
	 * @method \Bitrix\Sign\Internal\Document resetResultFileId()
	 * @method \Bitrix\Sign\Internal\Document unsetResultFileId()
	 * @method \int fillResultFileId()
	 * @method \int getCreatedById()
	 * @method \Bitrix\Sign\Internal\Document setCreatedById(\int|\Bitrix\Main\DB\SqlExpression $createdById)
	 * @method bool hasCreatedById()
	 * @method bool isCreatedByIdFilled()
	 * @method bool isCreatedByIdChanged()
	 * @method \int remindActualCreatedById()
	 * @method \int requireCreatedById()
	 * @method \Bitrix\Sign\Internal\Document resetCreatedById()
	 * @method \Bitrix\Sign\Internal\Document unsetCreatedById()
	 * @method \int fillCreatedById()
	 * @method \int getModifiedById()
	 * @method \Bitrix\Sign\Internal\Document setModifiedById(\int|\Bitrix\Main\DB\SqlExpression $modifiedById)
	 * @method bool hasModifiedById()
	 * @method bool isModifiedByIdFilled()
	 * @method bool isModifiedByIdChanged()
	 * @method \int remindActualModifiedById()
	 * @method \int requireModifiedById()
	 * @method \Bitrix\Sign\Internal\Document resetModifiedById()
	 * @method \Bitrix\Sign\Internal\Document unsetModifiedById()
	 * @method \int fillModifiedById()
	 * @method \Bitrix\Main\Type\DateTime getDateCreate()
	 * @method \Bitrix\Sign\Internal\Document setDateCreate(\Bitrix\Main\Type\DateTime|\Bitrix\Main\DB\SqlExpression $dateCreate)
	 * @method bool hasDateCreate()
	 * @method bool isDateCreateFilled()
	 * @method bool isDateCreateChanged()
	 * @method \Bitrix\Main\Type\DateTime remindActualDateCreate()
	 * @method \Bitrix\Main\Type\DateTime requireDateCreate()
	 * @method \Bitrix\Sign\Internal\Document resetDateCreate()
	 * @method \Bitrix\Sign\Internal\Document unsetDateCreate()
	 * @method \Bitrix\Main\Type\DateTime fillDateCreate()
	 * @method \Bitrix\Main\Type\DateTime getDateModify()
	 * @method \Bitrix\Sign\Internal\Document setDateModify(\Bitrix\Main\Type\DateTime|\Bitrix\Main\DB\SqlExpression $dateModify)
	 * @method bool hasDateModify()
	 * @method bool isDateModifyFilled()
	 * @method bool isDateModifyChanged()
	 * @method \Bitrix\Main\Type\DateTime remindActualDateModify()
	 * @method \Bitrix\Main\Type\DateTime requireDateModify()
	 * @method \Bitrix\Sign\Internal\Document resetDateModify()
	 * @method \Bitrix\Sign\Internal\Document unsetDateModify()
	 * @method \Bitrix\Main\Type\DateTime fillDateModify()
	 * @method \Bitrix\Main\Type\DateTime getDateSign()
	 * @method \Bitrix\Sign\Internal\Document setDateSign(\Bitrix\Main\Type\DateTime|\Bitrix\Main\DB\SqlExpression $dateSign)
	 * @method bool hasDateSign()
	 * @method bool isDateSignFilled()
	 * @method bool isDateSignChanged()
	 * @method \Bitrix\Main\Type\DateTime remindActualDateSign()
	 * @method \Bitrix\Main\Type\DateTime requireDateSign()
	 * @method \Bitrix\Sign\Internal\Document resetDateSign()
	 * @method \Bitrix\Sign\Internal\Document unsetDateSign()
	 * @method \Bitrix\Main\Type\DateTime fillDateSign()
	 * @method \string getStatus()
	 * @method \Bitrix\Sign\Internal\Document setStatus(\string|\Bitrix\Main\DB\SqlExpression $status)
	 * @method bool hasStatus()
	 * @method bool isStatusFilled()
	 * @method bool isStatusChanged()
	 * @method \string remindActualStatus()
	 * @method \string requireStatus()
	 * @method \Bitrix\Sign\Internal\Document resetStatus()
	 * @method \Bitrix\Sign\Internal\Document unsetStatus()
	 * @method \string fillStatus()
	 * @method \string getUid()
	 * @method \Bitrix\Sign\Internal\Document setUid(\string|\Bitrix\Main\DB\SqlExpression $uid)
	 * @method bool hasUid()
	 * @method bool isUidFilled()
	 * @method bool isUidChanged()
	 * @method \string remindActualUid()
	 * @method \string requireUid()
	 * @method \Bitrix\Sign\Internal\Document resetUid()
	 * @method \Bitrix\Sign\Internal\Document unsetUid()
	 * @method \string fillUid()
	 * @method \int getScenario()
	 * @method \Bitrix\Sign\Internal\Document setScenario(\int|\Bitrix\Main\DB\SqlExpression $scenario)
	 * @method bool hasScenario()
	 * @method bool isScenarioFilled()
	 * @method bool isScenarioChanged()
	 * @method \int remindActualScenario()
	 * @method \int requireScenario()
	 * @method \Bitrix\Sign\Internal\Document resetScenario()
	 * @method \Bitrix\Sign\Internal\Document unsetScenario()
	 * @method \int fillScenario()
	 * @method \int getVersion()
	 * @method \Bitrix\Sign\Internal\Document setVersion(\int|\Bitrix\Main\DB\SqlExpression $version)
	 * @method bool hasVersion()
	 * @method bool isVersionFilled()
	 * @method bool isVersionChanged()
	 * @method \int remindActualVersion()
	 * @method \int requireVersion()
	 * @method \Bitrix\Sign\Internal\Document resetVersion()
	 * @method \Bitrix\Sign\Internal\Document unsetVersion()
	 * @method \int fillVersion()
	 *
	 * Common methods:
	 * ---------------
	 *
	 * @property-read \Bitrix\Main\ORM\Entity $entity
	 * @property-read array $primary
	 * @property-read int $state @see \Bitrix\Main\ORM\Objectify\State
	 * @property-read \Bitrix\Main\Type\Dictionary $customData
	 * @property \Bitrix\Main\Authentication\Context $authContext
	 * @method mixed get($fieldName)
	 * @method mixed remindActual($fieldName)
	 * @method mixed require($fieldName)
	 * @method bool has($fieldName)
	 * @method bool isFilled($fieldName)
	 * @method bool isChanged($fieldName)
	 * @method \Bitrix\Sign\Internal\Document set($fieldName, $value)
	 * @method \Bitrix\Sign\Internal\Document reset($fieldName)
	 * @method \Bitrix\Sign\Internal\Document unset($fieldName)
	 * @method void addTo($fieldName, $value)
	 * @method void removeFrom($fieldName, $value)
	 * @method void removeAll($fieldName)
	 * @method \Bitrix\Main\ORM\Data\Result delete()
	 * @method void fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
	 * @method mixed[] collectValues($valuesType = \Bitrix\Main\ORM\Objectify\Values::ALL, $fieldsMask = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL)
	 * @method \Bitrix\Main\ORM\Data\AddResult|\Bitrix\Main\ORM\Data\UpdateResult|\Bitrix\Main\ORM\Data\Result save()
	 * @method static \Bitrix\Sign\Internal\Document wakeUp($data)
	 */
	class EO_Document {
		/* @var \Bitrix\Sign\Internal\DocumentTable */
		static public $dataClass = '\Bitrix\Sign\Internal\DocumentTable';
		/**
		 * @param bool|array $setDefaultValues
		 */
		public function __construct($setDefaultValues = true) {}
	}
}
namespace Bitrix\Sign\Internal {
	/**
	 * DocumentCollection
	 *
	 * Custom methods:
	 * ---------------
	 *
	 * @method \int[] getIdList()
	 * @method \string[] getTitleList()
	 * @method \string[] fillTitle()
	 * @method \string[] getHashList()
	 * @method \string[] fillHash()
	 * @method \string[] getSecCodeList()
	 * @method \string[] fillSecCode()
	 * @method \string[] getHostList()
	 * @method \string[] fillHost()
	 * @method \int[] getBlankIdList()
	 * @method \int[] fillBlankId()
	 * @method \string[] getEntityTypeList()
	 * @method \string[] fillEntityType()
	 * @method \int[] getEntityIdList()
	 * @method \int[] fillEntityId()
	 * @method array[] getMetaList()
	 * @method array[] fillMeta()
	 * @method \string[] getProcessingStatusList()
	 * @method \string[] fillProcessingStatus()
	 * @method \string[] getProcessingErrorList()
	 * @method \string[] fillProcessingError()
	 * @method \string[] getLangIdList()
	 * @method \string[] fillLangId()
	 * @method \int[] getResultFileIdList()
	 * @method \int[] fillResultFileId()
	 * @method \int[] getCreatedByIdList()
	 * @method \int[] fillCreatedById()
	 * @method \int[] getModifiedByIdList()
	 * @method \int[] fillModifiedById()
	 * @method \Bitrix\Main\Type\DateTime[] getDateCreateList()
	 * @method \Bitrix\Main\Type\DateTime[] fillDateCreate()
	 * @method \Bitrix\Main\Type\DateTime[] getDateModifyList()
	 * @method \Bitrix\Main\Type\DateTime[] fillDateModify()
	 * @method \Bitrix\Main\Type\DateTime[] getDateSignList()
	 * @method \Bitrix\Main\Type\DateTime[] fillDateSign()
	 * @method \string[] getStatusList()
	 * @method \string[] fillStatus()
	 * @method \string[] getUidList()
	 * @method \string[] fillUid()
	 * @method \int[] getScenarioList()
	 * @method \int[] fillScenario()
	 * @method \int[] getVersionList()
	 * @method \int[] fillVersion()
	 *
	 * Common methods:
	 * ---------------
	 *
	 * @property-read \Bitrix\Main\ORM\Entity $entity
	 * @method void add(\Bitrix\Sign\Internal\Document $object)
	 * @method bool has(\Bitrix\Sign\Internal\Document $object)
	 * @method bool hasByPrimary($primary)
	 * @method \Bitrix\Sign\Internal\Document getByPrimary($primary)
	 * @method \Bitrix\Sign\Internal\Document[] getAll()
	 * @method bool remove(\Bitrix\Sign\Internal\Document $object)
	 * @method void removeByPrimary($primary)
	 * @method void fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
	 * @method static \Bitrix\Sign\Internal\DocumentCollection wakeUp($data)
	 * @method \Bitrix\Main\ORM\Data\Result save($ignoreEvents = false)
	 * @method void offsetSet() ArrayAccess
	 * @method void offsetExists() ArrayAccess
	 * @method void offsetUnset() ArrayAccess
	 * @method void offsetGet() ArrayAccess
	 * @method void rewind() Iterator
	 * @method \Bitrix\Sign\Internal\Document current() Iterator
	 * @method mixed key() Iterator
	 * @method void next() Iterator
	 * @method bool valid() Iterator
	 * @method int count() Countable
	 * @method DocumentCollection merge(?DocumentCollection $collection)
	 * @method bool isEmpty()
	 */
	class EO_Document_Collection implements \ArrayAccess, \Iterator, \Countable {
		/* @var \Bitrix\Sign\Internal\DocumentTable */
		static public $dataClass = '\Bitrix\Sign\Internal\DocumentTable';
	}
}
namespace Bitrix\Sign\Internal {
	/**
	 * Common methods:
	 * ---------------
	 *
	 * @method EO_Document_Result exec()
	 * @method \Bitrix\Sign\Internal\Document fetchObject()
	 * @method \Bitrix\Sign\Internal\DocumentCollection fetchCollection()
	 *
	 * Custom methods:
	 * ---------------
	 *
	 */
	class EO_Document_Query extends \Bitrix\Main\ORM\Query\Query {}
	/**
	 * @method \Bitrix\Sign\Internal\Document fetchObject()
	 * @method \Bitrix\Sign\Internal\DocumentCollection fetchCollection()
	 */
	class EO_Document_Result extends \Bitrix\Main\ORM\Query\Result {}
	/**
	 * @method \Bitrix\Sign\Internal\Document createObject($setDefaultValues = true)
	 * @method \Bitrix\Sign\Internal\DocumentCollection createCollection()
	 * @method \Bitrix\Sign\Internal\Document wakeUpObject($row)
	 * @method \Bitrix\Sign\Internal\DocumentCollection wakeUpCollection($rows)
	 */
	class EO_Document_Entity extends \Bitrix\Main\ORM\Entity {}
}
/* ORMENTITYANNOTATION:Bitrix\Sign\Internal\Integration\FormTable:sign\lib\internal\integration\form.php */
namespace Bitrix\Sign\Internal\Integration {
	/**
	 * EO_Form
	 * @see \Bitrix\Sign\Internal\Integration\FormTable
	 *
	 * Custom methods:
	 * ---------------
	 *
	 * @method \int getId()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form setId(\int|\Bitrix\Main\DB\SqlExpression $id)
	 * @method bool hasId()
	 * @method bool isIdFilled()
	 * @method bool isIdChanged()
	 * @method \int getBlankId()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form setBlankId(\int|\Bitrix\Main\DB\SqlExpression $blankId)
	 * @method bool hasBlankId()
	 * @method bool isBlankIdFilled()
	 * @method bool isBlankIdChanged()
	 * @method \int remindActualBlankId()
	 * @method \int requireBlankId()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form resetBlankId()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form unsetBlankId()
	 * @method \int fillBlankId()
	 * @method \int getPart()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form setPart(\int|\Bitrix\Main\DB\SqlExpression $part)
	 * @method bool hasPart()
	 * @method bool isPartFilled()
	 * @method bool isPartChanged()
	 * @method \int remindActualPart()
	 * @method \int requirePart()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form resetPart()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form unsetPart()
	 * @method \int fillPart()
	 * @method \int getFormId()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form setFormId(\int|\Bitrix\Main\DB\SqlExpression $formId)
	 * @method bool hasFormId()
	 * @method bool isFormIdFilled()
	 * @method bool isFormIdChanged()
	 * @method \int remindActualFormId()
	 * @method \int requireFormId()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form resetFormId()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form unsetFormId()
	 * @method \int fillFormId()
	 * @method \int getCreatedById()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form setCreatedById(\int|\Bitrix\Main\DB\SqlExpression $createdById)
	 * @method bool hasCreatedById()
	 * @method bool isCreatedByIdFilled()
	 * @method bool isCreatedByIdChanged()
	 * @method \int remindActualCreatedById()
	 * @method \int requireCreatedById()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form resetCreatedById()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form unsetCreatedById()
	 * @method \int fillCreatedById()
	 * @method \int getModifiedById()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form setModifiedById(\int|\Bitrix\Main\DB\SqlExpression $modifiedById)
	 * @method bool hasModifiedById()
	 * @method bool isModifiedByIdFilled()
	 * @method bool isModifiedByIdChanged()
	 * @method \int remindActualModifiedById()
	 * @method \int requireModifiedById()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form resetModifiedById()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form unsetModifiedById()
	 * @method \int fillModifiedById()
	 * @method \Bitrix\Main\Type\DateTime getDateCreate()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form setDateCreate(\Bitrix\Main\Type\DateTime|\Bitrix\Main\DB\SqlExpression $dateCreate)
	 * @method bool hasDateCreate()
	 * @method bool isDateCreateFilled()
	 * @method bool isDateCreateChanged()
	 * @method \Bitrix\Main\Type\DateTime remindActualDateCreate()
	 * @method \Bitrix\Main\Type\DateTime requireDateCreate()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form resetDateCreate()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form unsetDateCreate()
	 * @method \Bitrix\Main\Type\DateTime fillDateCreate()
	 * @method \Bitrix\Main\Type\DateTime getDateModify()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form setDateModify(\Bitrix\Main\Type\DateTime|\Bitrix\Main\DB\SqlExpression $dateModify)
	 * @method bool hasDateModify()
	 * @method bool isDateModifyFilled()
	 * @method bool isDateModifyChanged()
	 * @method \Bitrix\Main\Type\DateTime remindActualDateModify()
	 * @method \Bitrix\Main\Type\DateTime requireDateModify()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form resetDateModify()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form unsetDateModify()
	 * @method \Bitrix\Main\Type\DateTime fillDateModify()
	 *
	 * Common methods:
	 * ---------------
	 *
	 * @property-read \Bitrix\Main\ORM\Entity $entity
	 * @property-read array $primary
	 * @property-read int $state @see \Bitrix\Main\ORM\Objectify\State
	 * @property-read \Bitrix\Main\Type\Dictionary $customData
	 * @property \Bitrix\Main\Authentication\Context $authContext
	 * @method mixed get($fieldName)
	 * @method mixed remindActual($fieldName)
	 * @method mixed require($fieldName)
	 * @method bool has($fieldName)
	 * @method bool isFilled($fieldName)
	 * @method bool isChanged($fieldName)
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form set($fieldName, $value)
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form reset($fieldName)
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form unset($fieldName)
	 * @method void addTo($fieldName, $value)
	 * @method void removeFrom($fieldName, $value)
	 * @method void removeAll($fieldName)
	 * @method \Bitrix\Main\ORM\Data\Result delete()
	 * @method void fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
	 * @method mixed[] collectValues($valuesType = \Bitrix\Main\ORM\Objectify\Values::ALL, $fieldsMask = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL)
	 * @method \Bitrix\Main\ORM\Data\AddResult|\Bitrix\Main\ORM\Data\UpdateResult|\Bitrix\Main\ORM\Data\Result save()
	 * @method static \Bitrix\Sign\Internal\Integration\EO_Form wakeUp($data)
	 */
	class EO_Form {
		/* @var \Bitrix\Sign\Internal\Integration\FormTable */
		static public $dataClass = '\Bitrix\Sign\Internal\Integration\FormTable';
		/**
		 * @param bool|array $setDefaultValues
		 */
		public function __construct($setDefaultValues = true) {}
	}
}
namespace Bitrix\Sign\Internal\Integration {
	/**
	 * EO_Form_Collection
	 *
	 * Custom methods:
	 * ---------------
	 *
	 * @method \int[] getIdList()
	 * @method \int[] getBlankIdList()
	 * @method \int[] fillBlankId()
	 * @method \int[] getPartList()
	 * @method \int[] fillPart()
	 * @method \int[] getFormIdList()
	 * @method \int[] fillFormId()
	 * @method \int[] getCreatedByIdList()
	 * @method \int[] fillCreatedById()
	 * @method \int[] getModifiedByIdList()
	 * @method \int[] fillModifiedById()
	 * @method \Bitrix\Main\Type\DateTime[] getDateCreateList()
	 * @method \Bitrix\Main\Type\DateTime[] fillDateCreate()
	 * @method \Bitrix\Main\Type\DateTime[] getDateModifyList()
	 * @method \Bitrix\Main\Type\DateTime[] fillDateModify()
	 *
	 * Common methods:
	 * ---------------
	 *
	 * @property-read \Bitrix\Main\ORM\Entity $entity
	 * @method void add(\Bitrix\Sign\Internal\Integration\EO_Form $object)
	 * @method bool has(\Bitrix\Sign\Internal\Integration\EO_Form $object)
	 * @method bool hasByPrimary($primary)
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form getByPrimary($primary)
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form[] getAll()
	 * @method bool remove(\Bitrix\Sign\Internal\Integration\EO_Form $object)
	 * @method void removeByPrimary($primary)
	 * @method void fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
	 * @method static \Bitrix\Sign\Internal\Integration\EO_Form_Collection wakeUp($data)
	 * @method \Bitrix\Main\ORM\Data\Result save($ignoreEvents = false)
	 * @method void offsetSet() ArrayAccess
	 * @method void offsetExists() ArrayAccess
	 * @method void offsetUnset() ArrayAccess
	 * @method void offsetGet() ArrayAccess
	 * @method void rewind() Iterator
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form current() Iterator
	 * @method mixed key() Iterator
	 * @method void next() Iterator
	 * @method bool valid() Iterator
	 * @method int count() Countable
	 * @method EO_Form_Collection merge(?EO_Form_Collection $collection)
	 * @method bool isEmpty()
	 */
	class EO_Form_Collection implements \ArrayAccess, \Iterator, \Countable {
		/* @var \Bitrix\Sign\Internal\Integration\FormTable */
		static public $dataClass = '\Bitrix\Sign\Internal\Integration\FormTable';
	}
}
namespace Bitrix\Sign\Internal\Integration {
	/**
	 * Common methods:
	 * ---------------
	 *
	 * @method EO_Form_Result exec()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form fetchObject()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form_Collection fetchCollection()
	 *
	 * Custom methods:
	 * ---------------
	 *
	 */
	class EO_Form_Query extends \Bitrix\Main\ORM\Query\Query {}
	/**
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form fetchObject()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form_Collection fetchCollection()
	 */
	class EO_Form_Result extends \Bitrix\Main\ORM\Query\Result {}
	/**
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form createObject($setDefaultValues = true)
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form_Collection createCollection()
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form wakeUpObject($row)
	 * @method \Bitrix\Sign\Internal\Integration\EO_Form_Collection wakeUpCollection($rows)
	 */
	class EO_Form_Entity extends \Bitrix\Main\ORM\Entity {}
}
/* ORMENTITYANNOTATION:Bitrix\Sign\Internal\MemberTable:sign\lib\internal\membertable.php */
namespace Bitrix\Sign\Internal {
	/**
	 * Member
	 * @see \Bitrix\Sign\Internal\MemberTable
	 *
	 * Custom methods:
	 * ---------------
	 *
	 * @method \int getId()
	 * @method \Bitrix\Sign\Internal\Member setId(\int|\Bitrix\Main\DB\SqlExpression $id)
	 * @method bool hasId()
	 * @method bool isIdFilled()
	 * @method bool isIdChanged()
	 * @method \int getDocumentId()
	 * @method \Bitrix\Sign\Internal\Member setDocumentId(\int|\Bitrix\Main\DB\SqlExpression $documentId)
	 * @method bool hasDocumentId()
	 * @method bool isDocumentIdFilled()
	 * @method bool isDocumentIdChanged()
	 * @method \int remindActualDocumentId()
	 * @method \int requireDocumentId()
	 * @method \Bitrix\Sign\Internal\Member resetDocumentId()
	 * @method \Bitrix\Sign\Internal\Member unsetDocumentId()
	 * @method \int fillDocumentId()
	 * @method \int getContactId()
	 * @method \Bitrix\Sign\Internal\Member setContactId(\int|\Bitrix\Main\DB\SqlExpression $contactId)
	 * @method bool hasContactId()
	 * @method bool isContactIdFilled()
	 * @method bool isContactIdChanged()
	 * @method \int remindActualContactId()
	 * @method \int requireContactId()
	 * @method \Bitrix\Sign\Internal\Member resetContactId()
	 * @method \Bitrix\Sign\Internal\Member unsetContactId()
	 * @method \int fillContactId()
	 * @method \int getPart()
	 * @method \Bitrix\Sign\Internal\Member setPart(\int|\Bitrix\Main\DB\SqlExpression $part)
	 * @method bool hasPart()
	 * @method bool isPartFilled()
	 * @method bool isPartChanged()
	 * @method \int remindActualPart()
	 * @method \int requirePart()
	 * @method \Bitrix\Sign\Internal\Member resetPart()
	 * @method \Bitrix\Sign\Internal\Member unsetPart()
	 * @method \int fillPart()
	 * @method \string getHash()
	 * @method \Bitrix\Sign\Internal\Member setHash(\string|\Bitrix\Main\DB\SqlExpression $hash)
	 * @method bool hasHash()
	 * @method bool isHashFilled()
	 * @method bool isHashChanged()
	 * @method \string remindActualHash()
	 * @method \string requireHash()
	 * @method \Bitrix\Sign\Internal\Member resetHash()
	 * @method \Bitrix\Sign\Internal\Member unsetHash()
	 * @method \string fillHash()
	 * @method \string getSigned()
	 * @method \Bitrix\Sign\Internal\Member setSigned(\string|\Bitrix\Main\DB\SqlExpression $signed)
	 * @method bool hasSigned()
	 * @method bool isSignedFilled()
	 * @method bool isSignedChanged()
	 * @method \string remindActualSigned()
	 * @method \string requireSigned()
	 * @method \Bitrix\Sign\Internal\Member resetSigned()
	 * @method \Bitrix\Sign\Internal\Member unsetSigned()
	 * @method \string fillSigned()
	 * @method \string getVerified()
	 * @method \Bitrix\Sign\Internal\Member setVerified(\string|\Bitrix\Main\DB\SqlExpression $verified)
	 * @method bool hasVerified()
	 * @method bool isVerifiedFilled()
	 * @method bool isVerifiedChanged()
	 * @method \string remindActualVerified()
	 * @method \string requireVerified()
	 * @method \Bitrix\Sign\Internal\Member resetVerified()
	 * @method \Bitrix\Sign\Internal\Member unsetVerified()
	 * @method \string fillVerified()
	 * @method \string getMute()
	 * @method \Bitrix\Sign\Internal\Member setMute(\string|\Bitrix\Main\DB\SqlExpression $mute)
	 * @method bool hasMute()
	 * @method bool isMuteFilled()
	 * @method bool isMuteChanged()
	 * @method \string remindActualMute()
	 * @method \string requireMute()
	 * @method \Bitrix\Sign\Internal\Member resetMute()
	 * @method \Bitrix\Sign\Internal\Member unsetMute()
	 * @method \string fillMute()
	 * @method \string getCommunicationType()
	 * @method \Bitrix\Sign\Internal\Member setCommunicationType(\string|\Bitrix\Main\DB\SqlExpression $communicationType)
	 * @method bool hasCommunicationType()
	 * @method bool isCommunicationTypeFilled()
	 * @method bool isCommunicationTypeChanged()
	 * @method \string remindActualCommunicationType()
	 * @method \string requireCommunicationType()
	 * @method \Bitrix\Sign\Internal\Member resetCommunicationType()
	 * @method \Bitrix\Sign\Internal\Member unsetCommunicationType()
	 * @method \string fillCommunicationType()
	 * @method \string getCommunicationValue()
	 * @method \Bitrix\Sign\Internal\Member setCommunicationValue(\string|\Bitrix\Main\DB\SqlExpression $communicationValue)
	 * @method bool hasCommunicationValue()
	 * @method bool isCommunicationValueFilled()
	 * @method bool isCommunicationValueChanged()
	 * @method \string remindActualCommunicationValue()
	 * @method \string requireCommunicationValue()
	 * @method \Bitrix\Sign\Internal\Member resetCommunicationValue()
	 * @method \Bitrix\Sign\Internal\Member unsetCommunicationValue()
	 * @method \string fillCommunicationValue()
	 * @method array getUserData()
	 * @method \Bitrix\Sign\Internal\Member setUserData(array|\Bitrix\Main\DB\SqlExpression $userData)
	 * @method bool hasUserData()
	 * @method bool isUserDataFilled()
	 * @method bool isUserDataChanged()
	 * @method array remindActualUserData()
	 * @method array requireUserData()
	 * @method \Bitrix\Sign\Internal\Member resetUserData()
	 * @method \Bitrix\Sign\Internal\Member unsetUserData()
	 * @method array fillUserData()
	 * @method array getMeta()
	 * @method \Bitrix\Sign\Internal\Member setMeta(array|\Bitrix\Main\DB\SqlExpression $meta)
	 * @method bool hasMeta()
	 * @method bool isMetaFilled()
	 * @method bool isMetaChanged()
	 * @method array remindActualMeta()
	 * @method array requireMeta()
	 * @method \Bitrix\Sign\Internal\Member resetMeta()
	 * @method \Bitrix\Sign\Internal\Member unsetMeta()
	 * @method array fillMeta()
	 * @method \int getSignatureFileId()
	 * @method \Bitrix\Sign\Internal\Member setSignatureFileId(\int|\Bitrix\Main\DB\SqlExpression $signatureFileId)
	 * @method bool hasSignatureFileId()
	 * @method bool isSignatureFileIdFilled()
	 * @method bool isSignatureFileIdChanged()
	 * @method \int remindActualSignatureFileId()
	 * @method \int requireSignatureFileId()
	 * @method \Bitrix\Sign\Internal\Member resetSignatureFileId()
	 * @method \Bitrix\Sign\Internal\Member unsetSignatureFileId()
	 * @method \int fillSignatureFileId()
	 * @method \int getStampFileId()
	 * @method \Bitrix\Sign\Internal\Member setStampFileId(\int|\Bitrix\Main\DB\SqlExpression $stampFileId)
	 * @method bool hasStampFileId()
	 * @method bool isStampFileIdFilled()
	 * @method bool isStampFileIdChanged()
	 * @method \int remindActualStampFileId()
	 * @method \int requireStampFileId()
	 * @method \Bitrix\Sign\Internal\Member resetStampFileId()
	 * @method \Bitrix\Sign\Internal\Member unsetStampFileId()
	 * @method \int fillStampFileId()
	 * @method \int getCreatedById()
	 * @method \Bitrix\Sign\Internal\Member setCreatedById(\int|\Bitrix\Main\DB\SqlExpression $createdById)
	 * @method bool hasCreatedById()
	 * @method bool isCreatedByIdFilled()
	 * @method bool isCreatedByIdChanged()
	 * @method \int remindActualCreatedById()
	 * @method \int requireCreatedById()
	 * @method \Bitrix\Sign\Internal\Member resetCreatedById()
	 * @method \Bitrix\Sign\Internal\Member unsetCreatedById()
	 * @method \int fillCreatedById()
	 * @method \int getModifiedById()
	 * @method \Bitrix\Sign\Internal\Member setModifiedById(\int|\Bitrix\Main\DB\SqlExpression $modifiedById)
	 * @method bool hasModifiedById()
	 * @method bool isModifiedByIdFilled()
	 * @method bool isModifiedByIdChanged()
	 * @method \int remindActualModifiedById()
	 * @method \int requireModifiedById()
	 * @method \Bitrix\Sign\Internal\Member resetModifiedById()
	 * @method \Bitrix\Sign\Internal\Member unsetModifiedById()
	 * @method \int fillModifiedById()
	 * @method \Bitrix\Main\Type\DateTime getDateCreate()
	 * @method \Bitrix\Sign\Internal\Member setDateCreate(\Bitrix\Main\Type\DateTime|\Bitrix\Main\DB\SqlExpression $dateCreate)
	 * @method bool hasDateCreate()
	 * @method bool isDateCreateFilled()
	 * @method bool isDateCreateChanged()
	 * @method \Bitrix\Main\Type\DateTime remindActualDateCreate()
	 * @method \Bitrix\Main\Type\DateTime requireDateCreate()
	 * @method \Bitrix\Sign\Internal\Member resetDateCreate()
	 * @method \Bitrix\Sign\Internal\Member unsetDateCreate()
	 * @method \Bitrix\Main\Type\DateTime fillDateCreate()
	 * @method \Bitrix\Main\Type\DateTime getDateModify()
	 * @method \Bitrix\Sign\Internal\Member setDateModify(\Bitrix\Main\Type\DateTime|\Bitrix\Main\DB\SqlExpression $dateModify)
	 * @method bool hasDateModify()
	 * @method bool isDateModifyFilled()
	 * @method bool isDateModifyChanged()
	 * @method \Bitrix\Main\Type\DateTime remindActualDateModify()
	 * @method \Bitrix\Main\Type\DateTime requireDateModify()
	 * @method \Bitrix\Sign\Internal\Member resetDateModify()
	 * @method \Bitrix\Sign\Internal\Member unsetDateModify()
	 * @method \Bitrix\Main\Type\DateTime fillDateModify()
	 * @method \Bitrix\Main\Type\DateTime getDateSign()
	 * @method \Bitrix\Sign\Internal\Member setDateSign(\Bitrix\Main\Type\DateTime|\Bitrix\Main\DB\SqlExpression $dateSign)
	 * @method bool hasDateSign()
	 * @method bool isDateSignFilled()
	 * @method bool isDateSignChanged()
	 * @method \Bitrix\Main\Type\DateTime remindActualDateSign()
	 * @method \Bitrix\Main\Type\DateTime requireDateSign()
	 * @method \Bitrix\Sign\Internal\Member resetDateSign()
	 * @method \Bitrix\Sign\Internal\Member unsetDateSign()
	 * @method \Bitrix\Main\Type\DateTime fillDateSign()
	 * @method \Bitrix\Main\Type\DateTime getDateDocDownload()
	 * @method \Bitrix\Sign\Internal\Member setDateDocDownload(\Bitrix\Main\Type\DateTime|\Bitrix\Main\DB\SqlExpression $dateDocDownload)
	 * @method bool hasDateDocDownload()
	 * @method bool isDateDocDownloadFilled()
	 * @method bool isDateDocDownloadChanged()
	 * @method \Bitrix\Main\Type\DateTime remindActualDateDocDownload()
	 * @method \Bitrix\Main\Type\DateTime requireDateDocDownload()
	 * @method \Bitrix\Sign\Internal\Member resetDateDocDownload()
	 * @method \Bitrix\Sign\Internal\Member unsetDateDocDownload()
	 * @method \Bitrix\Main\Type\DateTime fillDateDocDownload()
	 * @method \Bitrix\Main\Type\DateTime getDateDocVerify()
	 * @method \Bitrix\Sign\Internal\Member setDateDocVerify(\Bitrix\Main\Type\DateTime|\Bitrix\Main\DB\SqlExpression $dateDocVerify)
	 * @method bool hasDateDocVerify()
	 * @method bool isDateDocVerifyFilled()
	 * @method bool isDateDocVerifyChanged()
	 * @method \Bitrix\Main\Type\DateTime remindActualDateDocVerify()
	 * @method \Bitrix\Main\Type\DateTime requireDateDocVerify()
	 * @method \Bitrix\Sign\Internal\Member resetDateDocVerify()
	 * @method \Bitrix\Sign\Internal\Member unsetDateDocVerify()
	 * @method \Bitrix\Main\Type\DateTime fillDateDocVerify()
	 * @method \string getIp()
	 * @method \Bitrix\Sign\Internal\Member setIp(\string|\Bitrix\Main\DB\SqlExpression $ip)
	 * @method bool hasIp()
	 * @method bool isIpFilled()
	 * @method bool isIpChanged()
	 * @method \string remindActualIp()
	 * @method \string requireIp()
	 * @method \Bitrix\Sign\Internal\Member resetIp()
	 * @method \Bitrix\Sign\Internal\Member unsetIp()
	 * @method \string fillIp()
	 * @method \int getTimeZoneOffset()
	 * @method \Bitrix\Sign\Internal\Member setTimeZoneOffset(\int|\Bitrix\Main\DB\SqlExpression $timeZoneOffset)
	 * @method bool hasTimeZoneOffset()
	 * @method bool isTimeZoneOffsetFilled()
	 * @method bool isTimeZoneOffsetChanged()
	 * @method \int remindActualTimeZoneOffset()
	 * @method \int requireTimeZoneOffset()
	 * @method \Bitrix\Sign\Internal\Member resetTimeZoneOffset()
	 * @method \Bitrix\Sign\Internal\Member unsetTimeZoneOffset()
	 * @method \int fillTimeZoneOffset()
	 * @method \int getEntityId()
	 * @method \Bitrix\Sign\Internal\Member setEntityId(\int|\Bitrix\Main\DB\SqlExpression $entityId)
	 * @method bool hasEntityId()
	 * @method bool isEntityIdFilled()
	 * @method bool isEntityIdChanged()
	 * @method \int remindActualEntityId()
	 * @method \int requireEntityId()
	 * @method \Bitrix\Sign\Internal\Member resetEntityId()
	 * @method \Bitrix\Sign\Internal\Member unsetEntityId()
	 * @method \int fillEntityId()
	 * @method \string getEntityType()
	 * @method \Bitrix\Sign\Internal\Member setEntityType(\string|\Bitrix\Main\DB\SqlExpression $entityType)
	 * @method bool hasEntityType()
	 * @method bool isEntityTypeFilled()
	 * @method bool isEntityTypeChanged()
	 * @method \string remindActualEntityType()
	 * @method \string requireEntityType()
	 * @method \Bitrix\Sign\Internal\Member resetEntityType()
	 * @method \Bitrix\Sign\Internal\Member unsetEntityType()
	 * @method \string fillEntityType()
	 * @method \int getPresetId()
	 * @method \Bitrix\Sign\Internal\Member setPresetId(\int|\Bitrix\Main\DB\SqlExpression $presetId)
	 * @method bool hasPresetId()
	 * @method bool isPresetIdFilled()
	 * @method bool isPresetIdChanged()
	 * @method \int remindActualPresetId()
	 * @method \int requirePresetId()
	 * @method \Bitrix\Sign\Internal\Member resetPresetId()
	 * @method \Bitrix\Sign\Internal\Member unsetPresetId()
	 * @method \int fillPresetId()
	 * @method \string getUid()
	 * @method \Bitrix\Sign\Internal\Member setUid(\string|\Bitrix\Main\DB\SqlExpression $uid)
	 * @method bool hasUid()
	 * @method bool isUidFilled()
	 * @method bool isUidChanged()
	 * @method \string remindActualUid()
	 * @method \string requireUid()
	 * @method \Bitrix\Sign\Internal\Member resetUid()
	 * @method \Bitrix\Sign\Internal\Member unsetUid()
	 * @method \string fillUid()
	 *
	 * Common methods:
	 * ---------------
	 *
	 * @property-read \Bitrix\Main\ORM\Entity $entity
	 * @property-read array $primary
	 * @property-read int $state @see \Bitrix\Main\ORM\Objectify\State
	 * @property-read \Bitrix\Main\Type\Dictionary $customData
	 * @property \Bitrix\Main\Authentication\Context $authContext
	 * @method mixed get($fieldName)
	 * @method mixed remindActual($fieldName)
	 * @method mixed require($fieldName)
	 * @method bool has($fieldName)
	 * @method bool isFilled($fieldName)
	 * @method bool isChanged($fieldName)
	 * @method \Bitrix\Sign\Internal\Member set($fieldName, $value)
	 * @method \Bitrix\Sign\Internal\Member reset($fieldName)
	 * @method \Bitrix\Sign\Internal\Member unset($fieldName)
	 * @method void addTo($fieldName, $value)
	 * @method void removeFrom($fieldName, $value)
	 * @method void removeAll($fieldName)
	 * @method \Bitrix\Main\ORM\Data\Result delete()
	 * @method void fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
	 * @method mixed[] collectValues($valuesType = \Bitrix\Main\ORM\Objectify\Values::ALL, $fieldsMask = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL)
	 * @method \Bitrix\Main\ORM\Data\AddResult|\Bitrix\Main\ORM\Data\UpdateResult|\Bitrix\Main\ORM\Data\Result save()
	 * @method static \Bitrix\Sign\Internal\Member wakeUp($data)
	 */
	class EO_Member {
		/* @var \Bitrix\Sign\Internal\MemberTable */
		static public $dataClass = '\Bitrix\Sign\Internal\MemberTable';
		/**
		 * @param bool|array $setDefaultValues
		 */
		public function __construct($setDefaultValues = true) {}
	}
}
namespace Bitrix\Sign\Internal {
	/**
	 * MemberCollection
	 *
	 * Custom methods:
	 * ---------------
	 *
	 * @method \int[] getIdList()
	 * @method \int[] getDocumentIdList()
	 * @method \int[] fillDocumentId()
	 * @method \int[] getContactIdList()
	 * @method \int[] fillContactId()
	 * @method \int[] getPartList()
	 * @method \int[] fillPart()
	 * @method \string[] getHashList()
	 * @method \string[] fillHash()
	 * @method \string[] getSignedList()
	 * @method \string[] fillSigned()
	 * @method \string[] getVerifiedList()
	 * @method \string[] fillVerified()
	 * @method \string[] getMuteList()
	 * @method \string[] fillMute()
	 * @method \string[] getCommunicationTypeList()
	 * @method \string[] fillCommunicationType()
	 * @method \string[] getCommunicationValueList()
	 * @method \string[] fillCommunicationValue()
	 * @method array[] getUserDataList()
	 * @method array[] fillUserData()
	 * @method array[] getMetaList()
	 * @method array[] fillMeta()
	 * @method \int[] getSignatureFileIdList()
	 * @method \int[] fillSignatureFileId()
	 * @method \int[] getStampFileIdList()
	 * @method \int[] fillStampFileId()
	 * @method \int[] getCreatedByIdList()
	 * @method \int[] fillCreatedById()
	 * @method \int[] getModifiedByIdList()
	 * @method \int[] fillModifiedById()
	 * @method \Bitrix\Main\Type\DateTime[] getDateCreateList()
	 * @method \Bitrix\Main\Type\DateTime[] fillDateCreate()
	 * @method \Bitrix\Main\Type\DateTime[] getDateModifyList()
	 * @method \Bitrix\Main\Type\DateTime[] fillDateModify()
	 * @method \Bitrix\Main\Type\DateTime[] getDateSignList()
	 * @method \Bitrix\Main\Type\DateTime[] fillDateSign()
	 * @method \Bitrix\Main\Type\DateTime[] getDateDocDownloadList()
	 * @method \Bitrix\Main\Type\DateTime[] fillDateDocDownload()
	 * @method \Bitrix\Main\Type\DateTime[] getDateDocVerifyList()
	 * @method \Bitrix\Main\Type\DateTime[] fillDateDocVerify()
	 * @method \string[] getIpList()
	 * @method \string[] fillIp()
	 * @method \int[] getTimeZoneOffsetList()
	 * @method \int[] fillTimeZoneOffset()
	 * @method \int[] getEntityIdList()
	 * @method \int[] fillEntityId()
	 * @method \string[] getEntityTypeList()
	 * @method \string[] fillEntityType()
	 * @method \int[] getPresetIdList()
	 * @method \int[] fillPresetId()
	 * @method \string[] getUidList()
	 * @method \string[] fillUid()
	 *
	 * Common methods:
	 * ---------------
	 *
	 * @property-read \Bitrix\Main\ORM\Entity $entity
	 * @method void add(\Bitrix\Sign\Internal\Member $object)
	 * @method bool has(\Bitrix\Sign\Internal\Member $object)
	 * @method bool hasByPrimary($primary)
	 * @method \Bitrix\Sign\Internal\Member getByPrimary($primary)
	 * @method \Bitrix\Sign\Internal\Member[] getAll()
	 * @method bool remove(\Bitrix\Sign\Internal\Member $object)
	 * @method void removeByPrimary($primary)
	 * @method void fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
	 * @method static \Bitrix\Sign\Internal\MemberCollection wakeUp($data)
	 * @method \Bitrix\Main\ORM\Data\Result save($ignoreEvents = false)
	 * @method void offsetSet() ArrayAccess
	 * @method void offsetExists() ArrayAccess
	 * @method void offsetUnset() ArrayAccess
	 * @method void offsetGet() ArrayAccess
	 * @method void rewind() Iterator
	 * @method \Bitrix\Sign\Internal\Member current() Iterator
	 * @method mixed key() Iterator
	 * @method void next() Iterator
	 * @method bool valid() Iterator
	 * @method int count() Countable
	 * @method MemberCollection merge(?MemberCollection $collection)
	 * @method bool isEmpty()
	 */
	class EO_Member_Collection implements \ArrayAccess, \Iterator, \Countable {
		/* @var \Bitrix\Sign\Internal\MemberTable */
		static public $dataClass = '\Bitrix\Sign\Internal\MemberTable';
	}
}
namespace Bitrix\Sign\Internal {
	/**
	 * Common methods:
	 * ---------------
	 *
	 * @method EO_Member_Result exec()
	 * @method \Bitrix\Sign\Internal\Member fetchObject()
	 * @method \Bitrix\Sign\Internal\MemberCollection fetchCollection()
	 *
	 * Custom methods:
	 * ---------------
	 *
	 */
	class EO_Member_Query extends \Bitrix\Main\ORM\Query\Query {}
	/**
	 * @method \Bitrix\Sign\Internal\Member fetchObject()
	 * @method \Bitrix\Sign\Internal\MemberCollection fetchCollection()
	 */
	class EO_Member_Result extends \Bitrix\Main\ORM\Query\Result {}
	/**
	 * @method \Bitrix\Sign\Internal\Member createObject($setDefaultValues = true)
	 * @method \Bitrix\Sign\Internal\MemberCollection createCollection()
	 * @method \Bitrix\Sign\Internal\Member wakeUpObject($row)
	 * @method \Bitrix\Sign\Internal\MemberCollection wakeUpCollection($rows)
	 */
	class EO_Member_Entity extends \Bitrix\Main\ORM\Entity {}
}
/* ORMENTITYANNOTATION:Bitrix\Sign\Model\SignDocumentGeneratorBlankTable:sign\lib\Model\SignDocumentGeneratorBlankTable.php */
namespace Bitrix\Sign\Model {
	/**
	 * SignDocumentGeneratorBlank
	 * @see \Bitrix\Sign\Model\SignDocumentGeneratorBlankTable
	 *
	 * Custom methods:
	 * ---------------
	 *
	 * @method \int getId()
	 * @method \Bitrix\Sign\Model\SignDocumentGeneratorBlank setId(\int|\Bitrix\Main\DB\SqlExpression $id)
	 * @method bool hasId()
	 * @method bool isIdFilled()
	 * @method bool isIdChanged()
	 * @method \int getBlankId()
	 * @method \Bitrix\Sign\Model\SignDocumentGeneratorBlank setBlankId(\int|\Bitrix\Main\DB\SqlExpression $blankId)
	 * @method bool hasBlankId()
	 * @method bool isBlankIdFilled()
	 * @method bool isBlankIdChanged()
	 * @method \int remindActualBlankId()
	 * @method \int requireBlankId()
	 * @method \Bitrix\Sign\Model\SignDocumentGeneratorBlank resetBlankId()
	 * @method \Bitrix\Sign\Model\SignDocumentGeneratorBlank unsetBlankId()
	 * @method \int fillBlankId()
	 * @method \int getDocumentGeneratorTemplateId()
	 * @method \Bitrix\Sign\Model\SignDocumentGeneratorBlank setDocumentGeneratorTemplateId(\int|\Bitrix\Main\DB\SqlExpression $documentGeneratorTemplateId)
	 * @method bool hasDocumentGeneratorTemplateId()
	 * @method bool isDocumentGeneratorTemplateIdFilled()
	 * @method bool isDocumentGeneratorTemplateIdChanged()
	 * @method \int remindActualDocumentGeneratorTemplateId()
	 * @method \int requireDocumentGeneratorTemplateId()
	 * @method \Bitrix\Sign\Model\SignDocumentGeneratorBlank resetDocumentGeneratorTemplateId()
	 * @method \Bitrix\Sign\Model\SignDocumentGeneratorBlank unsetDocumentGeneratorTemplateId()
	 * @method \int fillDocumentGeneratorTemplateId()
	 * @method \string getInitiator()
	 * @method \Bitrix\Sign\Model\SignDocumentGeneratorBlank setInitiator(\string|\Bitrix\Main\DB\SqlExpression $initiator)
	 * @method bool hasInitiator()
	 * @method bool isInitiatorFilled()
	 * @method bool isInitiatorChanged()
	 * @method \string remindActualInitiator()
	 * @method \string requireInitiator()
	 * @method \Bitrix\Sign\Model\SignDocumentGeneratorBlank resetInitiator()
	 * @method \Bitrix\Sign\Model\SignDocumentGeneratorBlank unsetInitiator()
	 * @method \string fillInitiator()
	 * @method \Bitrix\Main\Type\DateTime getCreatedAt()
	 * @method \Bitrix\Sign\Model\SignDocumentGeneratorBlank setCreatedAt(\Bitrix\Main\Type\DateTime|\Bitrix\Main\DB\SqlExpression $createdAt)
	 * @method bool hasCreatedAt()
	 * @method bool isCreatedAtFilled()
	 * @method bool isCreatedAtChanged()
	 * @method \Bitrix\Main\Type\DateTime remindActualCreatedAt()
	 * @method \Bitrix\Main\Type\DateTime requireCreatedAt()
	 * @method \Bitrix\Sign\Model\SignDocumentGeneratorBlank resetCreatedAt()
	 * @method \Bitrix\Sign\Model\SignDocumentGeneratorBlank unsetCreatedAt()
	 * @method \Bitrix\Main\Type\DateTime fillCreatedAt()
	 *
	 * Common methods:
	 * ---------------
	 *
	 * @property-read \Bitrix\Main\ORM\Entity $entity
	 * @property-read array $primary
	 * @property-read int $state @see \Bitrix\Main\ORM\Objectify\State
	 * @property-read \Bitrix\Main\Type\Dictionary $customData
	 * @property \Bitrix\Main\Authentication\Context $authContext
	 * @method mixed get($fieldName)
	 * @method mixed remindActual($fieldName)
	 * @method mixed require($fieldName)
	 * @method bool has($fieldName)
	 * @method bool isFilled($fieldName)
	 * @method bool isChanged($fieldName)
	 * @method \Bitrix\Sign\Model\SignDocumentGeneratorBlank set($fieldName, $value)
	 * @method \Bitrix\Sign\Model\SignDocumentGeneratorBlank reset($fieldName)
	 * @method \Bitrix\Sign\Model\SignDocumentGeneratorBlank unset($fieldName)
	 * @method void addTo($fieldName, $value)
	 * @method void removeFrom($fieldName, $value)
	 * @method void removeAll($fieldName)
	 * @method \Bitrix\Main\ORM\Data\Result delete()
	 * @method void fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
	 * @method mixed[] collectValues($valuesType = \Bitrix\Main\ORM\Objectify\Values::ALL, $fieldsMask = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL)
	 * @method \Bitrix\Main\ORM\Data\AddResult|\Bitrix\Main\ORM\Data\UpdateResult|\Bitrix\Main\ORM\Data\Result save()
	 * @method static \Bitrix\Sign\Model\SignDocumentGeneratorBlank wakeUp($data)
	 */
	class EO_SignDocumentGeneratorBlank {
		/* @var \Bitrix\Sign\Model\SignDocumentGeneratorBlankTable */
		static public $dataClass = '\Bitrix\Sign\Model\SignDocumentGeneratorBlankTable';
		/**
		 * @param bool|array $setDefaultValues
		 */
		public function __construct($setDefaultValues = true) {}
	}
}
namespace Bitrix\Sign\Model {
	/**
	 * EO_SignDocumentGeneratorBlank_Collection
	 *
	 * Custom methods:
	 * ---------------
	 *
	 * @method \int[] getIdList()
	 * @method \int[] getBlankIdList()
	 * @method \int[] fillBlankId()
	 * @method \int[] getDocumentGeneratorTemplateIdList()
	 * @method \int[] fillDocumentGeneratorTemplateId()
	 * @method \string[] getInitiatorList()
	 * @method \string[] fillInitiator()
	 * @method \Bitrix\Main\Type\DateTime[] getCreatedAtList()
	 * @method \Bitrix\Main\Type\DateTime[] fillCreatedAt()
	 *
	 * Common methods:
	 * ---------------
	 *
	 * @property-read \Bitrix\Main\ORM\Entity $entity
	 * @method void add(\Bitrix\Sign\Model\SignDocumentGeneratorBlank $object)
	 * @method bool has(\Bitrix\Sign\Model\SignDocumentGeneratorBlank $object)
	 * @method bool hasByPrimary($primary)
	 * @method \Bitrix\Sign\Model\SignDocumentGeneratorBlank getByPrimary($primary)
	 * @method \Bitrix\Sign\Model\SignDocumentGeneratorBlank[] getAll()
	 * @method bool remove(\Bitrix\Sign\Model\SignDocumentGeneratorBlank $object)
	 * @method void removeByPrimary($primary)
	 * @method void fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
	 * @method static \Bitrix\Sign\Model\EO_SignDocumentGeneratorBlank_Collection wakeUp($data)
	 * @method \Bitrix\Main\ORM\Data\Result save($ignoreEvents = false)
	 * @method void offsetSet() ArrayAccess
	 * @method void offsetExists() ArrayAccess
	 * @method void offsetUnset() ArrayAccess
	 * @method void offsetGet() ArrayAccess
	 * @method void rewind() Iterator
	 * @method \Bitrix\Sign\Model\SignDocumentGeneratorBlank current() Iterator
	 * @method mixed key() Iterator
	 * @method void next() Iterator
	 * @method bool valid() Iterator
	 * @method int count() Countable
	 * @method EO_SignDocumentGeneratorBlank_Collection merge(?EO_SignDocumentGeneratorBlank_Collection $collection)
	 * @method bool isEmpty()
	 */
	class EO_SignDocumentGeneratorBlank_Collection implements \ArrayAccess, \Iterator, \Countable {
		/* @var \Bitrix\Sign\Model\SignDocumentGeneratorBlankTable */
		static public $dataClass = '\Bitrix\Sign\Model\SignDocumentGeneratorBlankTable';
	}
}
namespace Bitrix\Sign\Model {
	/**
	 * Common methods:
	 * ---------------
	 *
	 * @method EO_SignDocumentGeneratorBlank_Result exec()
	 * @method \Bitrix\Sign\Model\SignDocumentGeneratorBlank fetchObject()
	 * @method \Bitrix\Sign\Model\EO_SignDocumentGeneratorBlank_Collection fetchCollection()
	 *
	 * Custom methods:
	 * ---------------
	 *
	 */
	class EO_SignDocumentGeneratorBlank_Query extends \Bitrix\Main\ORM\Query\Query {}
	/**
	 * @method \Bitrix\Sign\Model\SignDocumentGeneratorBlank fetchObject()
	 * @method \Bitrix\Sign\Model\EO_SignDocumentGeneratorBlank_Collection fetchCollection()
	 */
	class EO_SignDocumentGeneratorBlank_Result extends \Bitrix\Main\ORM\Query\Result {}
	/**
	 * @method \Bitrix\Sign\Model\SignDocumentGeneratorBlank createObject($setDefaultValues = true)
	 * @method \Bitrix\Sign\Model\EO_SignDocumentGeneratorBlank_Collection createCollection()
	 * @method \Bitrix\Sign\Model\SignDocumentGeneratorBlank wakeUpObject($row)
	 * @method \Bitrix\Sign\Model\EO_SignDocumentGeneratorBlank_Collection wakeUpCollection($rows)
	 */
	class EO_SignDocumentGeneratorBlank_Entity extends \Bitrix\Main\ORM\Entity {}
}