<?php

namespace Application;

use Application\Model\Request;
use Application\Model\Response;
use Application\Model\Setup;

abstract class Controller
{
	/** @var Setup */
	protected $setup;
	/** @var Request */
	protected $request;

	/** @var Response */
	protected $response;

	/**
	 * @param Setup $setup
	 * @param Request $request
	 */
	public function __construct($setup, $request)
	{
		$this->setup = $setup;
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
