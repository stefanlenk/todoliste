<?php

namespace Application\Controller;

use Application\Controller;
use Application\Model\Response\Html;
use Application\Model\Todo;
use Application\View\Html\Page\TodoSingle;

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
        $todo = new Todo();

        $todo->setTodoId(2);
        $todo->setInhalt('Todo Liste erstellt');
        $todo->setIstErledigt(false);
        $todo->setErstelltUm('2020-01-23 14:28:43');
        $todo->setAktualisiertUm($todo->getErstelltUm());

        return array(
            $todo,
        );
    }
}