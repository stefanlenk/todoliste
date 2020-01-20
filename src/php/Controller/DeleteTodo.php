<?php

namespace Application\Controller;

use Application\Controller;
use Application\Model\Response\Html;

class DeleteTodo extends Controller
{

	public function handleRequest()
	{
		$this->response = new Html(null);
	}
}
