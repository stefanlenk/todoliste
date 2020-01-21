<?php

namespace Application\Controller;

use Application\Controller;
use Application\Model\Response\Html;
use Application\Model\Todo;
use Application\View\Html\Page\Update;

class UpdateTodo extends Controller
{

	public function handleRequest()
	{
        $todos = $this->modelTodos();
        $view = new Update($todos);
        $view->render();
		$this->response = new Html($view->getHtml());
	}

    /**
     * @return array
     */
    protected function modelTodos()
    {
        $todo = new Todo();

        $todo->setTodoId(1);
        $todo->setInhalt('Todo Liste erstellt');
        $todo->setIstErledigt(true);
        $todo->setErstelltUm('2020-01-21 12:19:36');
        $todo->setAktualisiertUm($todo->getErstelltUm());

        return Array(
            $todo,
        );
    }
}
