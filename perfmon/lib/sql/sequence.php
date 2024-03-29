<?php
namespace Bitrix\Perfmon\Sql;

class Sequence extends BaseObject
{
	/**
	 * Creates sequence object from tokens.
	 * <p>
	 * Current position should point to the name of the sequence.
	 *
	 * @param Tokenizer $tokenizer Tokens collection.
	 *
	 * @return Sequence
	 */
	public static function create(Tokenizer $tokenizer)
	{
		$name = $tokenizer->getCurrentToken()->text;
		$sequence = new self($name);

		$tokenizer->resetState();
		$definition = '';
		while (!$tokenizer->endOfInput())
		{
			$definition .= $tokenizer->getCurrentToken()->text;
			$tokenizer->nextToken();
		}

		$sequence->setBody($definition);

		return $sequence;
	}

	/**
	 * Return DDL for sequence creation.
	 *
	 * @param string $dbType Database type (ORACLE only).
	 *
	 * @return array|string
	 */
	public function getCreateDdl($dbType = '')
	{
		if ($dbType === 'ORACLE')
		{
			return $this->body;
		}
		else
		{
			return '// ' . get_class($this) . ':getDropDdl for database type [' . $dbType . '] not implemented';
		}
	}

	/**
	 * Return DDL for sequence destruction.
	 *
	 * @param string $dbType Database type (ORACLE only).
	 *
	 * @return array|string
	 */
	public function getDropDdl($dbType = '')
	{
		if ($dbType === 'ORACLE')
		{
			return 'DROP SEQUENCE ' . $this->name;
		}
		else
		{
			return '// ' . get_class($this) . ':getDropDdl for database type [' . $dbType . '] not implemented';
		}
	}

	/**
	 * Return DDL for sequence modification (drop with subsequent create).
	 *
	 * @param BaseObject $target Target object.
	 * @param string $dbType Database type (ORACLE only).
	 *
	 * @return array|string
	 */
	public function getModifyDdl(BaseObject $target, $dbType = '')
	{
		if ($dbType === 'ORACLE')
		{
			return [
				$this->getDropDdl($dbType),
				$target->getCreateDdl($dbType),
			];
		}
		else
		{
			return '// ' . get_class($this) . ':getDropDdl for database type [' . $dbType . '] not implemented';
		}
	}
}
