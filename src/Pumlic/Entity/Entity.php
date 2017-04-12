<?php

namespace Pumlic\Entity;

use Nette\Utils\Validators;

abstract class Entity
{
	/** @var string */
	protected $id;

	/** @var string */
	protected $name;

	// <editor-fold defaultstate="collapsed" desc="Getters & Setters">
	/**
	 * Id getter
	 *
	 * @return string
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Id setter
	 *
	 * @param string $id
	 * @return self Provides fluent interface
	 * @throws AssertionException
	 */
	public function setId($id)
	{
		Validators::assert($this->id, 'null', 'Already defined id');
		Validators::assert($id, 'string', 'Id');
		$this->id = $id;
		return $this;
	}

	/**
	 * Name getter
	 *
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Name setter
	 *
	 * @param string $name
	 * @return self Provides fluent interface
	 * @throws AssertionException
	 */
	public function setName($name)
	{
		Validators::assert($this->name, 'null', 'Already defined name');
		Validators::assert($name, 'string', 'Name');
		$this->name = $name;
		return $this;
	}
	// </editor-fold>
}
