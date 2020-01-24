<?php

namespace Application\Controller;

use Application\Controller;
use Application\Model\Input\Name;
use Application\Model\Input\Task;

class Front extends Controller
{
	public function handleRequest()
	{
		$task = $this->request->valueOfParameter(Name::Task);

		switch($task)
		{
			case Task::CreateTodo:
				$controllerClassName = CreateTodo::class;
				break;
            case Task::UpdateTodo:
                $controllerClassName = UpdateTodo::class;
                break;
            case Task::DeleteTodo:
                $controllerClassName = DeleteTodo::class;
                break;
            case Task::ShowTodo:
                $controllerClassName = ShowTodo::class;
                break;
			default:
				$controllerClassName = ShowTodoList::class;
				break;
		}

		/** @var Controller $controller */
		$controller = new $controllerClassName($this->setup, $this->request);
		$controller->handleRequest();
		$this->response = $controller->getResponse();
	}
}
