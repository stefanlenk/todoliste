<?php

namespace Application\Controller;

use Application\Controller;
use Application\Model\Input\Name;
use Application\Model\Response\Html;
use Application\Model\Storage\Database;
use Application\View\Html\Page\TodoUpdate;

class UpdateTodo extends Controller
{
	public function handleRequest()
	{
        $todo = $this->modelTodo();
        $view = new TodoUpdate($todo);
        $view->render();
		$this->response = new Html($view->getHtml());
	}

    /**
     * @return object
     */
    protected function modelTodo()
    {
        $connection = $this->setup->databaseConnection();
        $storage = new Database($connection);
        $todoId = $this->request->valueOfParameter(Name::TodoId);
        $result = $storage->updateTodo($todoId);

        return  $result;
    }
}
