<?php

namespace Application\Controller;

use Application\Controller;
use Application\Model\Input\Name;
use Application\Model\Response\Html;
use Application\Model\Storage\Database;
use Application\View\Html\Page\TodoSingle;

// Todo nur ein Todo verarbeiten
class ShowTodo extends Controller
{
	public function handleRequest()
	{
		$todos = $this->modelTodo();
		$view = new TodoSingle($todos);
		$view->render();
		$this->response = new Html($view->getHtml());
	}

	/**
	 * @return array
	 */
	protected function modelTodo()
	{
		$connection = $this->setup->databaseConnection();
		$storage = new Database($connection);
		$todoId = $this->request->valueOfParameter(Name::TodoId);
		$todo = $storage->getTodo($todoId);

		return array(
			$todo,
		);
	}
}
