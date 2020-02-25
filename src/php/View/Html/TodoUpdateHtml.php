<?php

namespace Application\View\Html;

use Application\Model\Input\Name;
use Application\Model\Input\Task;
use Application\Model\Todo;
use Application\View\Html;

class TodoUpdateHtml extends Html
{
	/** @var object */
	protected $todo;

	/**
	 * @param object $todo
	 */
	public function __construct($todo)
	{
		$this->todo = $todo;
	}

    public function render()
    {
        $this->html =
            '<table>
				<tbody>
					' . $this->htmlTableSingle($this->todo) . '
				</tbody>
			</table>';
    }

	/*public function render()
	{
		$this->html =
			'<table>
				<thead>
					<tr>
						<th>Inhalt</th>
						<th>Erledigt</th>
						<th>Aktionen</th>
					</tr>
				</thead>
				<tbody>
					' . $this->htmlTableRow($this->todo) . '
				</tbody>
			</table>';
	}*/
    protected function htmlTableSingle($todo)
    {
        return
            '<tr>
                <th>Inhalt:</th>
				<td>' . htmlspecialchars($todo->getInhalt()) . '</td>
			</tr>
            <tr>
                <th>Erledigt:</th>
                <td>' . $this->htmlIstErledigt($todo) . '</td>  
            </tr>
            <tr>
                <th>Erstellungsdatum:</th>
                <td>' . htmlspecialchars($todo->getErstelltUm()) . '</td>  
            </tr>
			<tr>
                <th>Aktionen:</th>
                <td>' . $this->htmlAktionen($todo) . '</td>
            </tr>';
    }
	protected function htmlTableRow($todo)
	{
		return
			'<tr>
				<td>' . htmlspecialchars($todo->getInhalt()) . '</td>
				<td>' . $this->htmlIstErledigt($todo) . '</td>
				<td>' . $this->htmlAktionen($todo) . '</td>
			</tr>';
	}

	/**
	 * @param Todo $todo
	 * @return string
	 */
	protected function htmlIstErledigt($todo)
	{
		return ($todo->getIstErledigt())
			? 'Ja'
			: 'Nein';
	}

	/**
	 * @param Todo $todo
	 * @return string|null
	 */
	protected function htmlAktionen($todo)
	{
		return $this->htmlAktionEntfernen($todo)
            . $this->htmlAktionSpeichern($todo);
	}

	/**
	 * @param Todo $todo
	 * @return string
	 */
	protected function htmlAktionEntfernen($todo)
	{
	    $query = http_build_query(array(
	        Name::Task => Task::DeleteTodo,
            Name::TodoId => $todo->getTodoId(),
        ));

        $result = '<a href="/?' . $query . '">Entfernen</a>';
		return $result;
	}

	protected function htmlAktionSpeichern($todo)
    {
        $query = http_build_query(array(
            Name::Task => Task::UpdateTodo,
            Name::TodoId => $todo->updateTodo(),
        ));

        $result = '<a href="/?' . $query . '">Speichern</a>';
        return $result;
    }
}
