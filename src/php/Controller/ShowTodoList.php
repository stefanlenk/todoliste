<?php

namespace Application\Controller;

use Application\Controller;
use Application\Model\Response\Html;
use Application\Model\Storage\Database;
use Application\View\Html\Page\TodoList;

class ShowTodoList extends Controller
{
	public function handleRequest()
	{
		$todos = $this->modelTodos();
        $view = new TodoList($todos);
        $view->render();
		$this->response = new Html($view->getHtml());
	}

	/**
	 * @return array
	 */
	protected function modelTodos()
	{
		$connection = $this->setup->databaseConnection();
		$storage = new Database($connection);
		$result = $storage->getAllTodos();
		return $result;
	}
}
