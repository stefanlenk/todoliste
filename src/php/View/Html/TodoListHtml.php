<?php

namespace Application\View\Html;

use Application\Model\Input\Name;
use Application\Model\Input\Task;
use Application\Model\Todo;
use Application\View\Html;

class TodoListHtml extends Html
{
    /** @var array */
    protected $todos;

    /**
     * @param array $todos
     */
    public function __construct($todos)
    {
        $this->todos = $todos;
    }

    public function render()
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
				    ' . $this->htmlTableRows() . '					
                <tr>
                    <td></td>
                    <td>' . $this->htmlAktionCreate() . '</td>
                    <td></td>
                </tr> 
			    </tbody>
			</table>
			';
    }

    /**
     * @return string|null
     */
    protected function htmlTableRows()
    {
        $result = null;

        foreach ($this->todos as $todo)
            $result .= $this->htmlTableRow($todo);

        return $result;
    }

    /**
     * @param Todo $todo
     * @return string
     */
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
        return $this->htmlAktionAnzeigen($todo)
            . $this->htmlAktionBearbeiten($todo)
            . $this->htmlAktionEntfernen($todo);
    }

    /**
     * @param Todo $todo
     * @return string
     */
    protected function htmlAktionAnzeigen($todo)
    {
        $query = http_build_query(array(
            Name::Task => Task::ShowTodo,
            Name::TodoId => $todo->getTodoId(),

        ));

        $result = '<a href="/?' . $query . '">Anzeigen</a>';
        return $result;
    }

    /**
     * @param Todo $todo
     * @return string
     */
    protected function htmlAktionBearbeiten($todo)
    {
        $query = http_build_query(array(
            Name::Task => Task::UpdateTodo,
            Name::TodoId => $todo->getTodoId(),
        ));

        $result = '<a href="/?' . $query . '">Bearbeiten</a>';
        return $result;
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

    protected function htmlAktionCreate()
    {
        $query = http_build_query(array(
            Name::Task => Task::CreateTodo
            /*Name::TodoId => $todo->setTodoId(),*/
        ));

        $result = '<a href="/?' . $query . '">Todo anlegen</a>';
        return $result;
    }
}
