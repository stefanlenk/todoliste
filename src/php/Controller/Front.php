<?php

namespace Application\Controller;

use Application\Controller;
use Application\Model\Input\Name;

class Front extends Controller
{
	public function handleRequest()
	{
		$task = $this->request->valueOfParameter(Name::Task);

		switch($task)
		{
			case 'create-todo':
				$controllerClassName = CreateTodo::class;
				break;
			default:
				$controllerClassName = ShowTodoList::class;
				break;
		}

		/** @var Controller $controller */
		$controller = new $controllerClassName($this->request);
		$controller->handleRequest();
		$this->response = $controller->getResponse();
	}
}
