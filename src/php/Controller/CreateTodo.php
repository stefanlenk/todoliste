<?php

namespace Application\Controller;

use Application\Controller;
use Application\Model\Input\Name;
use Application\Model\Response\Html;
use Application\Model\Storage\Database;
use Application\View\Html\Page\TodoCreate;

class CreateTodo extends Controller
{
	public function handleRequest()
	{
	    if($this->request->methodLowercased() == 'get');

		$todo = $this->modelTodo();
		$view = new TodoCreate($todo);
		$view->render();
		$this->response = new Html(null);
	}

        protected function modelTodo()
    {
        $connection = $this->setup->databaseConnection();
        $storage = new Database($connection);
        $todoID = $this->request->valueOfParameter(Name::TodoId);
        $result = $storage->createTodo($todoID);

        return $result;
    }
}
