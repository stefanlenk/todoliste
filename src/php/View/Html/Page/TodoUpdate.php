<?php

namespace Application\View\Html\Page;

use Application\View\Html\Page;
use Application\View\Html\TodoUpdateHtml;

class TodoUpdate extends Page
{
	/** @var object */
	protected $todo;

	/**
	 * @param $todo
	 */
	public function __construct($todo)
	{
		$this->todo = $todo;
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
		return $this->htmlTodoUpdate();
	}

	protected function htmlTodoUpdate()
	{
		$view = new TodoUpdateHtml($this->todo);
		$view->render();
		$result = $view->getHtml();
		return $result;
	}
}
