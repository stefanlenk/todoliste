<?php

namespace Application\View;

use Application\View;

abstract class Html extends View
{
	/** @var string */
	protected $html;

	/**
	 * @return string
	 */
	public function getHtml()
	{
		return $this->html;
	}
}
