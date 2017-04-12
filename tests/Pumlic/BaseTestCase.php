<?php

namespace Pumlic;

use Exception;
use Nette\Utils\AssertionException;
use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject as MockObject;
use ReflectionClass;

abstract class BaseTestCase extends TestCase
{

	use DataProvider;

	/**
	 * Tester of standard getter/setter implementation
	 *
	 * @param string $className
	 * @param string $propertyName
	 * @param mixed $value
	 * @return void
	 */
	protected function processTestGetSet($className, $propertyName, $value)
	{
		$classMock = $this->createClassMock($className);
		$this->assertEmpty($classMock->{'get' . ucfirst($propertyName)}());
		$this->assertSame($classMock, $classMock->{'set' . ucfirst($propertyName)}($value));
		$this->assertSame($value, $classMock->{'get' . ucfirst($propertyName)}());
	}

	/**
	 * Tester of standard setter for inserting unsupported value
	 *
	 * @param string $className
	 * @param string $propertyName
	 * @param mixed $value
	 * @param string $message
	 * @return void
	 */
	public function processTestSetUnsupportedValue($className, $propertyName, $value, $message)
	{
		try {
			$classMock = $this->createClassMock($className);
			$classMock->{'set' . ucfirst($propertyName)}($value);
		} catch (Exception $exception) {
			$this->assertInstanceOf(AssertionException::class, $exception);
			$this->assertSame(sprintf($message, ucfirst($propertyName)), $exception->getMessage());
		}
	}

	/**
	 * Tester of standard setter for overwriting already defined value
	 *
	 * @param string $className
	 * @param string $propertyName
	 * @param mixed $value
	 * @param string $message
	 * @return void
	 */
	public function processTestSetAlreadyDefined($className, $propertyName, $value, $message)
	{
		try {
			$classMock = $this->createClassMock($className);
			$classMock->{'set' . ucfirst($propertyName)}($value);
			$classMock->{'set' . ucfirst($propertyName)}($value);
		} catch (Exception $exception) {
			$this->assertInstanceOf(AssertionException::class, $exception);
			$this->assertSame(sprintf($message, $propertyName), $exception->getMessage());
		}
	}

	/**
	 * Helper for returning clone of the object for fluent interface
	 *
	 * @param object $object
	 * @return object
	 */
	protected function getClone($object)
	{
		return clone $object;
	}

	/**
	 * Allow access private property content
	 *
	 * @param object $object
	 * @param string $propertyName
	 * @return mixed Depend on the property value
	 */
	protected function getNonPublicPropertyValue($object, $propertyName)
	{
		$class = new ReflectionClass($object);
		$property = $class->getProperty($propertyName);
		$property->setAccessible(TRUE);
		return $property->getValue();
	}

	/**
	 * Allow call protected methods
	 *
	 * @param object $object
	 * @param string $methodName
	 * @param mixed $_ [OPTIONAL] Arguments of the called method
	 * @return mixed Depend on the called method
	 */
	protected function callNonPublicMethod($object, $methodName, $_ = NULL)
	{
		$arguments = array_slice(func_get_args(), 2);
		$class = new ReflectionClass($object);
		$method = $class->getMethod($methodName);
		$method->setAccessible(TRUE);
		return $method->invokeArgs($object, $arguments);
	}

	/**
	 * Class mock factory
	 *
	 * @param array|null $methods [OPTIONAL]
	 * @return MockObject
	 */
	protected function createClassMock($className, $methods = NULL)
	{
		$entityMockBuilder = $this->getMockBuilder($className);
		$entityMockBuilder->setMethods($methods);
		$entityMock = $entityMockBuilder->getMock();
		return $entityMock;
	}
}
