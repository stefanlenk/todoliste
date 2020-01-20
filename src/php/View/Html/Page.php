<?php

namespace Application\View\Html;

use Application\View\Html;

abstract class Page extends Html
{
	public function render()
	{
		$this->html =
			'<!DOCTYPE html>
			<html lang="de">
			  <head>
				<meta charset="utf-8" />
				<meta name="viewport" content="width=device-width, initial-scale=1.0" />
				<title>' . $this->htmlPageTitle() . ' | ToDo-Liste</title>
			  </head>
			  <body>
			  ' . $this->htmlBody() . '
			  </body>
			</html>';
	}

	/**
	 * @return string
	 */
	abstract protected function htmlPageTitle();

	/**
	 * @return string|null
	 */
	abstract protected function htmlBody();
}
