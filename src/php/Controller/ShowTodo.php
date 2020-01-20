<?php

namespace Application\Controller;

use Application\Controller;
use Application\Model\Response;

class ShowTodo extends Controller
{

	public function handleRequest()
	{
		$this->response = new Response();
	}
}