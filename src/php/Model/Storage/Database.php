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

		// TODO: was passiert wenn gar kein Ergebnis kommt?

		$row = $statement->fetch(PDO::FETCH_ASSOC);

		$result = $this->newTodo($row);
        return $result;
	}

	/**
	 * @inheritDoc
	 */
	public function createTodo($todo)
	{
        $sql =  'INSERT INTO todo 
                    (inhalt, ist_erledigt, erstellt_um, aktualisiert_um)
                    VALUES (:inhalt, :ist_erledigt, NOW(), NOW())';

        $statement = $this->connection->prepare($sql);

        switch ($_REQUEST['ist_erledigt'])
        {
            case 'on':
                $todo->setIstErledigt(true);
                break;
            default:
                $todo->setIstErledigt(false);
        }

        $statement->execute(array(
            ':inhalt' => $todo->getInhalt(),
            ':ist_erledigt' => $todo->getIstErledigt(),
        ));

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
	}

	/**
	 * @inheritDoc
	 */
	public function updateTodo($todo)
    {
        $sql = 'UPDATE todo SET inhalt= :inhalt, ist_erledigt= :ist_erledigt,
                aktualisiert_um = NOW()
                WHERE todo_id = :todo_id';

        $statement = $this->connection->prepare($sql);

        switch ($_REQUEST['ist_erledigt'])
        {
            case 'on':
                $todo->setIstErledigt(true);
                break;
            default:
                $todo->setIstErledigt(false);
                break;
        }

        $statement->execute(array(
            ':inhalt' => $todo->getInhalt(),
            ':ist_erledigt' => $todo->getIstErledigt(),
        ));

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
	/**
	 * @inheritDoc
	 */
	public function deleteTodo($todoId)
	{
        $sql = 'DELETE FROM todo WHERE todo_id = :todo_id';
        $statement = $this->connection->prepare($sql);
        $statement->execute(array(':todo_id' => $todoId));

       //$result = $statement->fetch(PDO::FETCH_ASSOC);
        //return $result;
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

		$istErledigt = ($row['ist_erledigt'] == 1);
			//? true
			//: false;

		$result->setIstErledigt($istErledigt);
		//$result->setIstErledigt($row['ist_erledigt']);
		$result->setErstelltUm($row['erstellt_um']);
		$result->setAktualisiertUm($row['aktualisiert_um']);

		return $result;
	}
}
