<?php

namespace Application\Controller;

use Application\Controller;
use Application\Model\Response;

class ShowTodoList extends Controller
{
	public function handleRequest()
	{
		var_dump(__CLASS__);
		$this->response = new Response();
	}
}
