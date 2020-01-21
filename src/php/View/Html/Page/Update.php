<?php

namespace Application\View\Html\Page;

use Application\View\Html\Page;
use Application\View\Html\TodoRow;

class Update extends Page
{
	/** @var array */
	protected $todos;

	/**
	 * @param array $todos
	 */
	public function __construct($todos)
	{
		$this->todos = $todos;
	}

	protected function htmlPageTitle()
	{
		return 'Todo bearbeiten';
	}

	/**
	 * @inheritDoc
	 */
	protected function htmlBody()
	{
		return $this->htmlTodoZeile();
	}

	protected function htmlTodoZeile()
	{
		$view = new TodoRow($this->todos);
		$view->render();
		$result = $view->getHtml();
		return $result;
	}
}
