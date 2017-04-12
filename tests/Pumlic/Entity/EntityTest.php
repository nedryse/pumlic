<?php

namespace Pumlic\Entity;

use Pumlic\BaseTestCase;
use Pumlic\Entity\Entity;

class EntityTest extends BaseTestCase
{

	/**
	 * Tester of id getter/setter implementation
	 *
	 * @param string $id
	 * @return void
	 * @dataProvider stringDataProvider
	 * @covers Entity::getId
	 * @covers Entity::setId
	 */
	public function testGetSetId($id)
	{
		$this->processTestGetSet(Entity::class, 'id', $id);
	}

	/**
	 * Tester of id setter for inserting unsupported value
	 *
	 * @param optional $id
	 * @param string $message
	 * @return void
	 * @dataProvider unsupportedStringDataProvider
	 * @covers Entity::setId
	 */
	public function testSetIdUnsupportedValue($id, $message)
	{
		$this->processTestSetUnsupportedValue(Entity::class, 'id', $id, $message);
	}

	/**
	 * Tester of id setter for overwriting already defined value
	 *
	 * @param optional $id
	 * @return void
	 * @dataProvider alreadyDefinedStringDataProvider
	 * @covers Entity::setId
	 */
	public function testSetIdAlreadyDefinedValue($id, $message)
	{
		$this->processTestSetAlreadyDefined(Entity::class, 'id', $id, $message);
	}

	/**
	 * Tester of name getter/setter implementation
	 *
	 * @param string $name
	 * @return void
	 * @dataProvider stringDataProvider
	 * @covers Entity::getId
	 * @covers Entity::setId
	 */
	public function testGetSetName($name)
	{
		$this->processTestGetSet(Entity::class, 'name', $name);
	}

	/**
	 * Tester of name setter for inserting unsupported value
	 *
	 * @param optional $name
	 * @param string $message
	 * @return void
	 * @dataProvider unsupportedStringDataProvider
	 * @covers Entity::setId
	 */
	public function testSetNameUnsupportedValue($name, $message)
	{
		$this->processTestSetUnsupportedValue(Entity::class, 'name', $name, $message);
	}

	/**
	 * Tester of name setter for overwriting already defined value
	 *
	 * @param optional $name
	 * @return void
	 * @dataProvider alreadyDefinedStringDataProvider
	 * @covers Entity::setId
	 */
	public function testSetNameAlreadyDefinedValue($name, $message)
	{
		$this->processTestSetAlreadyDefined(Entity::class, 'name', $name, $message);
	}
}
