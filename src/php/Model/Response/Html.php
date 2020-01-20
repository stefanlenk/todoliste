<?php

namespace Application\Model\Response;

use Application\Model\Response;

class Html extends Response
{
	/** @var string */
	protected $html;

	/**
	 * @param string $html
	 */
	public function __construct($html)
	{
		$this->html = $html;
	}

	public function send()
	{
		echo $this->html;
	}
}
