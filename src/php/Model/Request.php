<?php

namespace Application\Model;

class Request
{
	/** @var array */
	protected $parameters;
	/** @var string */
	protected $method;

    /**
     * @param array $parameters
     * @param string $method
     */
	public function __construct($parameters, $method)
	{
		$this->parameters = $parameters;
		$this->method = $method;
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

    /**
     * @return string
     */
    public function methodLowercased()
    {
        return strtolower($this->method);
    }
}
