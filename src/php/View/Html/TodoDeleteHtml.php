<?php

namespace Application\View\Html;

use Application\Model\Input\Name;
use Application\Model\Input\Task;
use Application\Model\Todo;
use Application\View\Html;

class TodoDeleteHtml extends Html
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
                <td>Sind Sie sicher?</td>
				<td>' . $this->htmlConfirmDelete($this->todo) . '</td>
			</tbody>				
			</table>';
    }

    /*protected function htmlAktionen($todo)
    {
        return
            '<td>' . $this->htmlConfirmDelete($todo) . '</td>';
    }*/

    /**
     * @param Todo $todo
     * @return string
     */
    protected function htmlConfirmDelete($todo)
    {
        $query = http_build_query(array(
            Name::Task => Task::ConfirmDelete,
            Name::TodoId => $todo->getTodoId(),
        ));

        $result = '<a href="/?' . $query . '">Endgültig löschen</a>';
        return $result;
    }
}