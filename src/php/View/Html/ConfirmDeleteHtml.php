<?php

namespace Application\View\Html;

use Application\Model\Input\Name;
use Application\Model\Input\Task;
use Application\Model\Todo;
use Application\View\Html;

class ConfirmDeleteHtml extends Html
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
					' . $this->htmlDelete($this->todo) . '
				</tbody>
			</table>';
    }

    protected function htmlDelete($todo)
    {
        return
        '<tr>
            <td>Zu spät</td>
            <td>
                <button name="Task" value="' . Task::ConfirmDelete .'">Endgültig löschen</button>
            </td>
        </tr>';
    }

    protected function confirmDelete($todo)
    {
        $query = http_build_query(array(
            Name::Task => Task::ConfirmDelete,
            Name::TodoId => $todo->getTodoId(),
        ));
        $result = '<a herf="/?' . $query . '">endgültig löschen</a>';
    }
}