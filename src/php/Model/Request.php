<?php

namespace Application\Model;

class Request
{
	/** @var array */
	protected $parameters;

	/**
	 * @param array $parameters
	 */
	public function __construct($parameters)
	{
		$this->parameters = $parameters;
	}

	/**
	 * @param string $name
	 * @param string|null $defaultValue
	 * @return string
	 */
	public function valueOfParameter($name, $defaultValue = null)
	{
		return (array_key_exists($name, $this->parameters))
			? $this->parameters[$name]
			: $defaultValue;
	}
}
