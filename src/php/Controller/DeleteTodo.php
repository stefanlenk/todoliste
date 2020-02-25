<?php

namespace Application\Controller;

use Application\Controller;
use Application\Model\Input\Name;
use Application\Model\Response\Html;
use Application\Model\Storage\Database;
use Application\View\Html\Page\TodoDelete;

class DeleteTodo extends Controller
{

	public function handleRequest()
	{
        $todo = $this->modelTodo();
        $view = new TodoDelete($todo);
        $view->render();
        $this->response = new Html($view->getHtml());
	}
    protected function modelTodo()
    {
        $connection = $this->setup->databaseConnection();
        $storage = new Database($connection);
        $todoId = $this->request->valueOfParameter(Name::TodoId);
        $result = $storage->deleteTodo($todoId);

        return $result;
    }
}
