<?php

namespace Application\Model;

class Todo
{
	/** @var int */
	protected $todoId;

	/** @var string */
	protected $inhalt;
	/** @var bool */
	protected $istErledigt;

	/** @var string */
	protected $erstelltUm;
	/** @var  string */
	protected $aktualisiertUm;

	/**
	 * @param int $todoId
	 */
	public function setTodoId($todoId)
	{
		$this->todoId = $todoId;
	}

	/**
	 * @param string $inhalt
	 */
	public function setInhalt($inhalt)
	{
		$this->inhalt = $inhalt;
	}

	/**
	 * @param bool $istErledigt
	 */
	public function setIstErledigt($istErledigt)
	{
		$this->istErledigt = $istErledigt;
	}

	/**
	 * @param string $erstelltUm
	 */
	public function setErstelltUm($erstelltUm)
	{
		$this->erstelltUm = $erstelltUm;
	}

	/**
	 * @param string $aktualisiertUm
	 */
	public function setAktualisiertUm($aktualisiertUm)
	{
		$this->aktualisiertUm = $aktualisiertUm;
	}

	/**
	 * @return int
	 */
	public function getTodoId()
	{
		return $this->todoId;
	}

	/**
	 * @return string
	 */
	public function getInhalt()
	{
		return $this->inhalt;
	}

	/**
	 * @return bool
	 */
	public function getIstErledigt()
	{
		return $this->istErledigt;
	}

	/**
	 * @return string
	 */
	public function getErstelltUm()
	{
		return $this->erstelltUm;
	}

	/**
	 * @return string
	 */
	public function getAktualisiertUm()
	{
		return $this->aktualisiertUm;
	}
}
