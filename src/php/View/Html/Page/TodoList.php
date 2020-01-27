<?php

namespace Application\View\Html\Page;

use Application\View\Html\Page;
use Application\View\Html\TodoListHtml;

class TodoList extends Page
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
		return 'Komplette Todo-Liste';
	}

	/**
	 * @inheritDoc
	 */
	protected function htmlBody()
	{
		return $this->htmlTodoTabelle();
	}

	protected function htmlTodoTabelle()
	{
		$view = new TodoListHtml($this->todos);
		$view->render();
		$result = $view->getHtml();
		return $result;
	}
}
