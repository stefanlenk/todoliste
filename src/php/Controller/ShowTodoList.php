<?php

namespace Application\Controller;

use Application\Controller;
use Application\Model\Response\Html;
use Application\Model\Todo;
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
		$todo = new Todo();

		$todo->setTodoId(1);
		$todo->setInhalt('Todo Liste erstellen');
		$todo->setIstErledigt(true);
		$todo->setErstelltUm('2020-01-20 14:28:43');
		$todo->setAktualisiertUm($todo->getErstelltUm());

		return array(
			$todo,
		);
	}
}
