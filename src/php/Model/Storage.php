<?php

namespace Application\Model;

abstract class Storage
{
	/** @var mixed */
	protected $error;

	/**
	 */
	public function __construct()
	{
		$this->error = null;
	}

	/**
	 * @return mixed
	 */
	public function getError()
	{
		return $this->error;
	}

	/**
	 * @return array
	 */
	abstract public function getAllTodos();

	/**
	 * @param int $todoId
	 * @return Todo
	 */
	abstract public function getTodo($todoId);

	/**
	 * @param Todo $todo
	 */
	abstract public function createTodo($todo);

	/**
	 * @param Todo $todo
	 */
	abstract public function updateTodo($todo);

	/**
	 * @param int $todoId
	 */
	abstract public function deleteTodo($todoId);
}
