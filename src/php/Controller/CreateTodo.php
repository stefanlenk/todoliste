<?php

namespace Application\Controller;

use Application\Controller;
use Application\Model\Response\Html;

class CreateTodo extends Controller
{
	public function handleRequest()
	{
	    if($this->request->methodLowercased() == 'get');

		$todo = $this->modelTodo();
		$view = new TodoCreate($todo);
		$this->response = new Html(null);
	}
}
