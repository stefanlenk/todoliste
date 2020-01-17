<?php

namespace Application;

use Application\Model\Request;
use Application\Model\Response;

abstract class Controller
{
	/** @var Request */
	protected $request;
	/** @var Response */
	protected $response;

	/**
	 * @param Request $request
	 */
	public function __construct($request)
	{
		$this->request = $request;

		$this->response = null;
	}

	/**
	 * @return Response
	 */
	public function getResponse()
	{
		return $this->response;
	}

	abstract public function handleRequest();
}
