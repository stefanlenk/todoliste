<?php

namespace Application\Model\Storage;

use Application\Model\Storage;
use Application\Model\Todo;
use PDO;

class Database extends Storage
{
	/** @var PDO */
	protected $connection;

	/**
	 * @param PDO $connection
	 */
	public function __construct($connection)
	{
		parent::__construct();

		$this->connection = $connection;
	}

	/**
	 * @inheritDoc
	 */
	public function getAllTodos()
	{
		$sql = 'SELECT * FROM todo';
		$statement = $this->connection->prepare($sql);
		$statement->execute();
		$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

		$result = array();

		foreach($rows as $row)
			$result[] = $this->newTodo($row);

		return $result;
	}

	/**
	 * @inheritDoc
	 */
	public function getTodo($todoId)
	{
		$sql =  'SELECT * FROM todo WHERE todo_id = :todo_id';
		$statement = $this->connection->prepare($sql);

		$statement->execute(array(
			':todo_id' => $todoId
		));

		// Todo was passiert wenn gar kein Ergebnis kommt?

		$row = $statement->fetch(PDO::FETCH_ASSOC);
		$result = $this->newTodo($row);
		return $result;
	}

	/**
	 * @inheritDoc
	 */
	public function createTodo($todo)
	{
		// TODO: Implement createTodo() method.
	}

	/**
	 * @inheritDoc
	 */
	public function updateTodo($todo)
	{
		// TODO: Implement updateTodo() method.
	}

	/**
	 * @inheritDoc
	 */
	public function deleteTodo($todoId)
	{
		// TODO: Implement deleteTodo() method.
	}

	/**
	 * @param array $row
	 * @return Todo
	 */
	protected function newTodo($row)
	{
		$result = new Todo();

		$result->setTodoId($row['todo_id']);
		$result->setInhalt($row['inhalt']);

		$istErledigt = ($row['ist_erledigt'] == 0)
			? false
			: true;

		$result->setIstErledigt($istErledigt);
		$result->setErstelltUm($row['erstellt_um']);
		$result->setAktualisiertUm($row['aktualisiert_um']);

		return $result;
	}
}
